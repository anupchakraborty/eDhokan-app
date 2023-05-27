@extends('backend.layouts.master')

@section('title')
   Create Admin Page | eDhokan- Admin Dashboard
@endsection

@section('admin_content')
    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== navbar Start ========== -->
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}">Manage Admin</a></li>
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
                                <h4 class="mb-sm-0 font-size-18">Create Admin</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">
                                            <a href="{{ route('admin.admins.index') }}">Manage Admin</a>
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
                              <h3 class="card-title">Create Admin</h3>
                            </div>
                            @include('backend.partials.message');
                            <div class="card-body">
                                <form action="{{ route('admin.admins.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-name-input" class="form-label">Admin Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-email-input" class="form-label">Admin Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                                            </div>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                    
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-password-input" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-email-input" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-username-input" class="form-label">Admin Username</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-role-input" class="form-label">Assign Roles</label>
                                                <select name="roles[]" id="roles" class="form-control select2-search-disable">
                                                    <option>Select Any Role</option>
                                                    @foreach ($roles as $role)
                                                    <optgroup label="{{ $role->name }}">
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    </optgroup>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="form-label">Upload Profile Picture</label>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                            <input type="file" name="image" class="form-control" id="inputGroupFile01">
                                        </div>   
                                    </div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save Admin</button>
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

@section('style')
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <style>
        .select2-container--default .select2-selection--multiple {
            padding-bottom: 0;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #007bff;
            border: 1px solid #000;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #000;
        }
    </style>
@endsection
@section('script')
    <script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })
    </script>
@endsection