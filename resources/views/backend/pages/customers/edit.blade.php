@extends('backend.layouts.master')

@section('title')
   Edit Customer Page | Admin Dashboard
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
            
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Edit Customer</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Edit Customer</h3>
                            </div>
                            {{-- @include('backend.partials.message'); --}}
                            <div class="card-body">
                                <form action="{{ route('admin.customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-name-input" class="form-label">Customer First Name</label>
                                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ $customer->first_name }}">
                                                @error('first_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-email-input" class="form-label">Customer Last Name</label>
                                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $customer->last_name }}">
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
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $customer->email }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-phone-input" class="form-label">Customer Phone</label>
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $customer->phone }}">
                                                @error('phone')
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
                                                <label for="formrow-username-input" class="form-label">Customer Date of Birth</label>
                                                <input type="text" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" id="inputGroupFile01" value="{{ $customer->date_of_birth }}">
                                                @error('date_of_birth')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="formrow-role-input" class="form-label">Old Image</label>
                                                <input type="hidden" name="old_image" class="form-control" value="{{ $customer->image }}">
                                                <img src="{{ asset('backend/img/customers/'.$customer->image)}}"/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formrow-role-input" class="form-label">Upload Image</label>
                                                <input type="file" name="image" class="form-control" id="inputGroupFile01">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-role-input">Address</label>
                                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="2">{{ $customer->address }}</textarea>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>   
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">Update Customer</button>
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