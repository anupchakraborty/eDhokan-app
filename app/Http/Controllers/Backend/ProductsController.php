<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

class ProductsController extends Controller
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
        if (is_null($this->user) || !$this->user->can('product.view')) {
            abort(403, 'Sorry !! You are Unauthorized to View any customer !');
        }

        $products = Product::all();
        return view('backend.pages.products.index', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stocks()
    {
        //Role Base Authentication Permision create
        // if (is_null($this->user) || !$this->user->can('product.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized to View any customer !');
        // }

        $products = Product::all();

        $remaining_product = Product::orderBy('quantity', 'desc')->get();
        return view('backend.pages.products.stocks', compact('remaining_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('product.create')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete any product !');
        }

        return view('backend.pages.products.create');
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
            'product_name' => 'required|max:50',
            'category' => 'required',
            'distributor' => 'required',
            'sell_price' => 'required',
            'buy_price' => 'required',
            'quantity' => 'required',
            'product_size' => 'required',
            'product_image' => 'required',
        ]);
        // dd($request->all());
        // Create New Product
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category = $request->category;
        $product->distributor = $request->distributor;
        $product->sell_price = $request->sell_price;
        $product->buy_price = $request->buy_price;
        $product->quantity = $request->quantity;
        $product->product_size = $request->product_size;
        $product->product_weight = $request->product_weight;
        $product->product_image = $request->product_image;
        $product->status = $request->status;
        if ($request->hasfile('product_image')) {
            // File store in public folder------
             $product_image = $request->file('product_image'); //catch File from input field
             $extension = $product_image->getClientOriginalExtension(); //File extension define
             $filename = time().'.'.$extension; //File filename define
             $product_image->move('backend/img/products/',$filename); //File location define im public folder
             $product->product_image = $filename; //File name save in db
         }
        //  dd($customer);
        $product->save();

        Alert::success('created Successful', 'Product has been created !!');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProduct(Request $request)
    {
        $product = Product::find($request->pid);
        //return response($product);
        return response()->json($product);
    }

    public function getPrice()
    {
        $id = $_GET['id'];
        $price = Product::find($id);
        return response()->json($price);
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
        if (is_null($this->user) || !$this->user->can('product.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete any product !');
        }

        $product = Product::find($id);
        return view('backend.pages.products.edit', compact('product'));
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
            'product_name' => 'required|max:50',
            'category' => 'required',
            'distributor' => 'required',
            'sell_price' => 'required',
            'buy_price' => 'required',
            'quantity' => 'required',
            'product_size' => 'required',
        ]);
        // dd($request->all());
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->category = $request->category;
        $product->distributor = $request->distributor;
        $product->sell_price = $request->sell_price;
        $product->buy_price = $request->buy_price;
        $product->quantity = $request->quantity;
        $product->product_size = $request->product_size;
        $product->product_weight = $request->product_weight;
        $product->status = $request->status;
        if ($request->hasfile('product_image')) {
            if($request->old_image){
                unlink('backend/img/products/'.$request->old_image);
                // Image store in public folder------
                $product_image = $request->file('product_image'); //catch image from input field
                $extension = $product_image->getClientOriginalExtension(); //image extension define
                $filename = time().'.'.$extension; //image filename define
                $product_image->move('backend/img/products/',$filename); //image location define im public folder
                $product->product_image = $filename; //image name save in db
            }else{            
            // Image store in public folder------
            $product_image = $request->file('product_image'); //catch image from input field
            $extension = $product_image->getClientOriginalExtension(); //image extension define
            $filename = time().'.'.$extension; //image filename define
            $product_image->move('backend/img/products/',$filename); //image location define im public folder
            $product->product_image = $filename; //image name save in db
            }
        }else{
            $product->product_image = $request->old_image;
        }
        //  dd($product);
        $product->save();

        Alert::success('Updated Successful', 'Product has been Updated !!');
        return redirect()->route('admin.product.index');
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
        if (is_null($this->user) || !$this->user->can('product.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete any product !');
        }
        
        $product = Product::find($id);
        if (!is_null($product)) {
            $product->delete();
        }

        Alert::success('Delete Successful', 'Product has been deleted !!');
        return back();
    }
}
