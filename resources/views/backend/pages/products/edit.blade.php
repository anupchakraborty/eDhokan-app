@extends('backend.layouts.master')

@section('title')
   Edit Product Page | eDhokan - Admin Dashboard
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Manage Product</a></li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Edit Product</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Edit Product</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-name-input" class="form-label">Product Name</label>
                                                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" value="{{ $product->product_name }}">
                                                @error('product_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-email-input" class="form-label">Category</label>
                                                <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ $product->category }}">
                                                @error('category')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-name-input" class="form-label">Distributor</label>
                                                <input type="text" class="form-control @error('distributor') is-invalid @enderror" id="distributor" name="distributor" value="{{ $product->distributor }}">
                                                @error('distributor')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-phone-input" class="form-label">Sell Price</label>
                                                <input type="text" class="form-control @error('sell_price') is-invalid @enderror" id="sell_price" name="sell_price" value="{{ $product->sell_price }}">
                                                @error('sell_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--password-->
                                    
                                    <div class="row">   
                                        <!--buy_price-->    
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-username-input" class="form-label">Buy Price</label>
                                                <input type="text" name="buy_price" class="form-control @error('buy_price') is-invalid @enderror" id="inputGroupFile01" value="{{ $product->buy_price }}">
                                                @error('buy_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--status--> 
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-username-input" class="form-label">Product Status</label>
                                                <select name="status" id="status" class="form-control @error('buy_price') is-invalid @enderror">
                                                    <option value="1" {{($product->status == 1) ? 'selected' : ''}}>Active</option>
                                                    <option value="0" {{($product->status == 0) ? 'selected' : ''}}>Deactive</option>
                                                </select>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-role-input" class="form-label">Old Product Image</label>
                                                <input type="hidden" name="old_image" class="form-control" value="{{ $product->product_image }}">
                                                <img src="{{ asset('backend/img/products/'.$product->product_image)}}" style="height:100px; width:100px"/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formrow-role-input" class="form-label">Upload Product Image</label>
                                                <input type="file" name="product_image" class="form-control" id="inputGroupFile01">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-role-input">Quantity</label>
                                                <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ $product->quantity }}">
                                                @error('quantity')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-username-input" class="form-label">Product Size</label>
                                                <div class="input-group" id="datepicker1">
                                                    <input type="text" name="product_size" class="form-control @error('product_size') is-invalid @enderror" value="{{ $product->product_size }}">
                                                </div><!-- input-group -->
                                                @error('product_size')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>  
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">Update Product</button>
                                </form>
                            </div>
                    
                        </div><!-- /.card -->
                    </div><!-- End row -->

                </div> <!-- container-fluid -->
            </section>
        </div>
        <!-- end content-wrapper-->

    </div>
    <!-- END layout-wrapper -->
    @include('backend.partials.footer')
@endsection