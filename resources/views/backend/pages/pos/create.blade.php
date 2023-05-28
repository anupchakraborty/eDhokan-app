@extends('backend.layouts.master')

@section('title')
   Create POS Page | eDhokan - Admin Dashboard
@endsection

@section('admin_content')
    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== Header Start ========== -->
        @include('backend.partials.navbar')

        <!-- ========== Left Sidebar Start ========== -->
        @include('backend.partials.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{Auth::guard('admin')->user()->name}} Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.pos.index') }}">Manage POS</a></li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Create Purchage</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">
                                            <a href="{{ route('admin.supplier.invoice.index') }}">Manage Purchage</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div>
                        <form action="{{ route('admin.pos.store') }}" method="POST">
                            @csrf
                            <div class="d-flex justify-content-center">
                                <div class="card" style="width:50%">
                                    <div class="card-header">
                                        <h3 class="card-title">Create Purchage</h3>
                                    </div>
    
                                    <div class="card-body">
                                        <div>
                                            <div class="row">
                                                <label for="formrow-name-input" class="form-label">Customer Info</label>
                                                @include('backend.partials.message')
                                            </div>      
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <!--customer_name--> 
                                                        <select name="customer_id" id="customer_id" class="form-control @error('customer_id') is-invalid @enderror">
                                                            <option selected>Select Your Customer</option>
                                                            @php
                                                                $customers = App\Models\Customer::all();
                                                            @endphp
                                                            @foreach ($customers as $customer)
                                                                <option value="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('customer_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone No">
                                                    @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-info" onclick="showCustomer()">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="formrow-username-input" class="form-label">Product Name</label>
                                            <table class="table table-stipe">
                                                <thead>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td>Quantity</td>
                                                        <td>Price</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50%">
                                                            @php
                                                                $products = App\Models\Product::all();
                                                            @endphp
                                                            <!--product_name--> 
                                                            <select id="product_id" class="form-control">
                                                                <option selected>Select Your Product</option>
                                                                @foreach ($products as $product)
                                                                    <option id="{{$product->id}}" value="{{$product->product_id}}">{{$product->product_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td style="width: 20%">
                                                            <input type="number" id="qty" min="0" class="form-control" value="0">
    
                                                            <div role="alert" id="errorMsg" class="mt-2">
    
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%">
                                                            <h5 class="mt-1" id="price"></h5>
                                                        </td>
                                                        <td style="width: 10%">
                                                            <button type="button" id="addProduct" class="btn btn-primary waves-effect waves-light">Add</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            
                                </div><!-- /.card -->
                                <div class="card" style="width:50%">
                                    <div class="card-header">
                                        <h3 class="card-title">Invoice Info</h3>
                                    </div>
                                    <div class="card-body" >
                                        <div id="showcustomer">
    
                                        </div>
                                        <div id="invoice_info" class="mt-4">
                                            <div class="row">
                                                <div class="col-md-6 text-left">
                                                    <p>Invoice No : 
                                                        <span id="invoiceId">
                                                            <input type="hidden" id="getInvoiceId" value="10{{ $lastId }}">
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <p>Date : <span id="current_date"></span></p>
                                                </div>
                                            </div>
                                            <div id="productInfo" style="margin-top: 10px">
                                                <table class="table table-border" id="getProduct">
                                                    <thead>
                                                        <tr>
                                                            <td>#</td>
                                                            <td>Product Name</td>
                                                            <td>Quantity</td>
                                                            <td>Unit Price</td>
                                                            <td>Sub Total</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="new">
                                                        
                                                    </tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="text-right text-dark">
                                                            <h5><strong style="font-size: 16px">Sub Total:</strong></h5>
                                                            <p><strong style="font-size: 14px">Tax (5%) :</strong></p>
                                                        </td>
                                                        <td class="text-left text-dark">
                                                            <h5><strong id="subTotal" style="font-size: 18px"></strong></h5>
                                                            <h5><strong id="taxTotal" style="font-size: 16px"></strong></h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="text-right text-dark">
                                                            <h5><strong style="font-size: 16px">Gross Total:</strong></h5>
                                                        </td>
                                                        <td class="text-left text-dark">
                                                            <h5><strong id="grossTotal" style="font-size: 18px"></strong></h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">Save suplier</button>
                        </form>
                    </div><!-- End row -->

                </div> <!-- container-fluid -->
            </section>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    @include('backend.pages.pos.scripts.invoice')
    @include('backend.partials.footer')
@endsection

