<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Supplier;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
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
        if (is_null($this->user) || !$this->user->can('supplier.view')) {
            abort(403, 'Sorry !! You are Unauthorized to View any supplier !');
        }

        $suppliers = Supplier::all();
        return view('backend.pages.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('supplier.create')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete any supplier !');
        }

        return view('backend.pages.suppliers.create');
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
            'supplier_name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:suppliers',
            'phone' => 'required|max:100|unique:suppliers',
            'address' => 'required|max:400',
        ]);
        // dd($request->all());
        // Create New supplier
        $supplier = new Supplier();
        $supplier->supplier_name = $request->supplier_name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->regi_no = $request->regi_no;
        $supplier->status = $request->status;
        $supplier->save();

        Alert::success('Created Successful', 'Supplier has been created !!');
        return redirect()->route('admin.supplier.index');
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
        if (is_null($this->user) || !$this->user->can('supplier.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete any supplier !');
        }

        $supplier = supplier::find($id);
        return view('backend.pages.suppliers.edit', compact('supplier'));
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
            'supplier_name' => 'required|max:50',
            'email' => 'required|max:100|',
            'phone' => 'required|max:100|',
            'address' => 'required|max:400',
        ]);
        // dd($request->all());
        // Create New supplier
        $supplier = supplier::find($id);
        $supplier->supplier_name = $request->supplier_name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->regi_no = $request->regi_no;
        $supplier->status = $request->status;
        $supplier->save();

        Alert::success('Updated Successful', 'Supplier has been Updated !!');
        return redirect()->route('admin.supplier.index');
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
        if (is_null($this->user) || !$this->user->can('supplier.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete any supplier !');
        }
        
        $supplier = supplier::find($id);
        if (!is_null($supplier)) {
            $supplier->delete();
        }

        Alert::success('Delete Successful', 'supplier has been deleted !!');
        return back();
    }
}
