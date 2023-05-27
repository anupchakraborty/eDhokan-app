<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\SupplierInvoice;
use App\Models\Supplier;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierInvoiceController extends Controller
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
            abort(403, 'Sorry !! You are Unauthorized to View any Supplier Invoice !');
        }

        $supplierInvoices = SupplierInvoice::all();
        return view('backend.pages.suppliers.supplierInvoice.index', compact('supplierInvoices'));
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
            abort(403, 'Sorry !! You are Unauthorized to view any Supplier Invoice !');
        }

        return view('backend.pages.suppliers.supplierInvoice.create');
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
            'supplier_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|min:1',
        ]);
        //dd($request->all());
        // Create New supplier
        foreach($request->product_id as $key=>$product){
            $invoice = new SupplierInvoice();
            $invoice->supplier_id = $request->supplier_id;
            $invoice->product_id = $product;
            $invoice->quantity = $request->quantity[$key];
            $invoice->status = $request->status;
            $invoice->save();
        }

        Alert::success('Created Successful', 'Supplier Invoice has been created !!');
        return redirect()->route('admin.supplier.invoice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function shoSupplier(Request $request)
    {
        $output = '';
        $supplier = Supplier::find($request->sid);
        $output .=
            '<div>
                <div class="text-center" style="font-size: 25px">'.$supplier->supplier_name.'</div>
                <div class="text-center">Mobile:'.$supplier->phone.'</div>
                <div class="text-center">Address:'.$supplier->address.'</div>
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
