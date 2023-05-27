<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\CustomerInvoice;
use App\Models\Customer;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerInvoiceController extends Controller
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
        if (is_null($this->user) || !$this->user->can('invoice.view')) {
            abort(403, 'Sorry !! You are Unauthorized to View any Customer Invoice !');
        }

        $customerInvoices = CustomerInvoice::all();
        return view('backend.pages.customers.customerInvoice.index', compact('customerInvoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('invoice.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any customer Invoice !');
        }

        return view('backend.pages.customers.customerInvoice.create');
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
            'customer_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|min:1',
        ]);
        //dd($request->all());
        // Create New customer
        foreach($request->product_id as $key=>$product){
            $invoice = new CustomerInvoice();
            $invoice->customer_id = $request->customer_id;
            $invoice->product_id = $product;
            $invoice->quantity = $request->quantity[$key];
            $invoice->status = $request->status;
            $invoice->save();
        }

        Alert::success('Created Successful', 'Customer Invoice has been created !!');
        return redirect()->route('admin.customer.invoice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCustomer(Request $request)
    {
        $output = '';
        $customer = Customer::find($request->cid);
        $output .=
            '<div>
                <div class="text-center" style="font-size: 25px">'.$customer->first_name.' '.$customer->last_name.'</div>
                <div class="text-center">Mobile:'.$customer->phone.'</div>
                <div class="text-center">Address:'.$customer->address.'</div>
            </div>';
        return response($output);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
