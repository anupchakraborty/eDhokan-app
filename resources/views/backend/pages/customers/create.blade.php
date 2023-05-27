@extends('backend.layouts.master')

@section('title')
   Create Customer Page | Admin Dashboard
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.customer.index') }}">Manage Customer</a></li>
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
                                <h4 class="mb-sm-0 font-size-18">Create Customer</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">
                                            <a href="{{ route('admin.customer.index') }}">Manage Customer</a>
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
                              <h3 class="card-title">Create Customer</h3>
                            </div>
                            @include('backend.partials.message')
                            <div class="card-body">
                                <form action="{{ route('admin.customer.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-name-input" class="form-label">Customer First Name</label>
                                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="Enter Your First Name">
                                                @error('first_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-email-input" class="form-label">Customer Last Name</label>
                                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Enter Your Last Name">
                                                @error('last_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-name-input" class="form-label">Customer Email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Your Email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-phone-input" class="form-label">Customer Phone</label>
                                                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter Your Phone No">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-password-input" class="form-label">Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Password">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-email-input" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                                            </div>
                                        </div>
                                    </div>
                                    <!--password-->
                                    <!--upload image-->    
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-username-input" class="form-label">Customer Date of Birth</label>
                                                <div class="input-group" id="datepicker1">
                                                    <input type="text" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" placeholder="dd M, yyyy"
                                                        data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker">

                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div><!-- input-group -->

                                                @error('date_of_birth')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-role-input" class="form-label">Upload Image</label>
                                                <input type="file" name="image" class="form-control @error('images') is-invalid @enderror" id="inputGroupFile01">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-role-input">Address</label>
                                            <textarea id="textarea" name="address" class="form-control @error('address') is-invalid @enderror" rows="2"></textarea>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>   
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">Save Customer</button>
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