<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\POS;
use App\Models\Customer;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

class POSController extends Controller
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
        $poss = POS::all();
        return view('backend.pages.pos.index', compact('poss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastId = DB::getPdo()->lastInsertId();
        //dd($lastId);
        return view('backend.pages.pos.create',compact('lastId'));
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
            'invoice_id' => 'required',
            'customer_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|min:1',
        ]);
        // dd($request->all());
        // Create New purchage
        foreach($request->product_id as $key=>$product){
            $invoice = new POS();
            $invoice->invoice_id = $request->invoice_id;
            $invoice->customer_id = $request->customer_id;
            $invoice->product_id = $product;
            $invoice->quantity = $request->quantity[$key];
            $invoice->unit_price = $request->unit_price[$key];
            $invoice->sub_total = $request->sub_total[$key];
            $invoice->status = $request->status;
            $invoice->save();
        }

        Alert::success('Created Successful', 'Purchage Entry has been created !!');
        return redirect()->route('admin.pos.index');
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
