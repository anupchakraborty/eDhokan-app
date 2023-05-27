@extends('backend.layouts.master')

@section('title')
   Create Product Page | eDhokan - Admin Dashboard
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Manage product</a></li>
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
                                <h4 class="mb-sm-0 font-size-18">Create product</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">
                                            <a href="{{ route('admin.product.index') }}">Manage product</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Create Product</h3>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-name-input" class="form-label">Product Name</label>
                                                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" placeholder="Enter Your First Name">
                                                @error('product_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-email-input" class="form-label">Category</label>
                                                <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" placeholder="Enter Your Last Name">
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
                                                <input type="text" class="form-control @error('distributor') is-invalid @enderror" id="distributor" name="distributor" placeholder="Enter Your distributor">
                                                @error('distributor')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-phone-input" class="form-label">Sell Price</label>
                                                <input type="text" class="form-control @error('sell_price') is-invalid @enderror" id="sell_price" name="sell_price" placeholder="Enter Your sell_price No">
                                                @error('sell_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-password-input" class="form-label">Buy Price</label>
                                                <input type="text" class="form-control @error('buy_price') is-invalid @enderror" id="buy_price" name="buy_price" placeholder="Enter buy_price">
                                                @error('buy_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-email-input" class="form-label">Quantity</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity">
                                                @error('quantity')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--password-->
                                    <!--upload image-->    
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-username-input" class="form-label">Product Size</label>
                                                <div class="input-group" id="datepicker1">
                                                    <input type="text" name="product_size" class="form-control @error('product_size') is-invalid @enderror" placeholder="Enter Product Size">
                                                </div><!-- input-group -->
                                                @error('product_size')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-role-input" class="form-label">Upload Image</label>
                                                <input type="file" name="product_image" class="form-control @error('product_image') is-invalid @enderror" id="inputGroupFile01">
                                                @error('product_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-role-input">Product Weight</label>
                                            <input type="text" name="product_weight" class="form-control @error('product_weight') is-invalid @enderror" placeholder="Enter Product Weight">
                                            @error('product_weight')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>   
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">Save Product</button>
                                </form>
                            </div>
                    
                        </div><!-- /.card -->
                    </div><!-- End row -->

                </div> <!-- container-fluid -->
            </section>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @include('backend.partials.footer')
@endsection