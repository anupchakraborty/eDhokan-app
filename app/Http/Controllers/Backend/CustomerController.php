<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Customer;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('customer.view')) {
            abort(403, 'Sorry !! You are Unauthorized to View any customer !');
        }

        $customers = Customer::all();
        return view('backend.pages.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('customer.create')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete any customer !');
        }

        return view('backend.pages.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:customers',
            'phone' => 'required|max:100|unique:customers',
            'password' => 'required|min:6|confirmed',
            'marital_status' => 'required',
            'age' => 'required|max:100',
            'employment_contract' => 'required|min:10',
            'net_income' => 'required|min:4',
            'number_of_payments_per_year' => 'required',
            'city_of_purchase' => 'required|max:100',
            'savings' => 'required:min:4',
            'address' => 'required|max:400',
            'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
        ]);
        // dd($request->all());
        // Create New Customer
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = Hash::make($request->password);
        $customer->marital_status = $request->marital_status;
        $customer->number_of_children = $request->number_of_children;
        $customer->age = $request->age;
        $customer->employment_contract = $request->employment_contract;
        $customer->length_of_service = $request->length_of_service;
        $customer->net_income = $request->net_income;
        $customer->number_of_payments_per_year = $request->number_of_payments_per_year;
        $customer->total_loan_repayments = $request->total_loan_repayments;
        $customer->city_of_purchase = $request->city_of_purchase;
        $customer->savings = $request->savings;
        $customer->address = $request->address;
        $customer->date_of_birth = $request->date_of_birth;
        if ($request->hasfile('image')) {
            // File store in public folder------
             $image = $request->file('image'); //catch File from input field
             $extension = $image->getClientOriginalExtension(); //File extension define
             $filename = time().'.'.$extension; //File filename define
             $image->move('backend/img/customers/',$filename); //File location define im public folder
             $customer->image = $filename; //File name save in db
         }
        //  dd($customer);
        $customer->save();

        Alert::success('created Successful', 'Customer has been created !!');
        return redirect()->route('admin.customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('customer.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete any customer !');
        }

        $customer = Customer::find($id);
        return view('backend.pages.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation Data
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|max:100|email',
            'phone' => 'required|max:100',
            'marital_status' => 'required',
            'age' => 'required|max:100',
            'employment_contract' => 'required|min:10',
            'net_income' => 'required:min:4',
            'number_of_payments_per_year' => 'required',
            'city_of_purchase' => 'required|max:100',
            'savings' => 'required:min:4',
            'address' => 'required|max:400',
        ]);
        // dd($request->all());
        // Create New Customer
        $customer = Customer::find($id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->marital_status = $request->marital_status;
        $customer->number_of_children = $request->number_of_children;
        $customer->age = $request->age;
        $customer->employment_contract = $request->employment_contract;
        $customer->length_of_service = $request->length_of_service;
        $customer->net_income = $request->net_income;
        $customer->number_of_payments_per_year = $request->number_of_payments_per_year;
        $customer->total_loan_repayments = $request->total_loan_repayments;
        $customer->city_of_purchase = $request->city_of_purchase;
        $customer->savings = $request->savings;
        $customer->address = $request->address;
        $customer->date_of_birth = $request->date_of_birth;
        if ($request->hasfile('image')) {
            if($request->old_image){
                unlink('backend/img/customers/'.$request->old_image);
            }else{            
            // Image store in public folder------
            $image = $request->file('image'); //catch image from input field
            $extension = $image->getClientOriginalExtension(); //image extension define
            $filename = time().'.'.$extension; //image filename define
            $image->move('backend/img/customers/',$filename); //image location define im public folder
            $customer->image = $filename; //image name save in db
            }
        }else{
            $customer->image = $request->old_image;
        }
        //  dd($customer);
        $customer->save();

        Alert::success('Updated Successful', 'Customer has been Updated !!');
        return redirect()->route('admin.customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('customer.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete any customer !');
        }
        
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }

        Alert::success('Delete Successful', 'Customer has been deleted !!');
        return back();
    }
}
