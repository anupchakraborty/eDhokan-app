@extends('backend.layouts.master')

@section('title')
    Role Page | Admin Dashboard
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Manage Roles</a></li>
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
                                <h4 class="mb-sm-0 font-size-18">Roles & Permission List</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">
                                            <a href="{{ route('admin.roles.create') }}">Add New Roles</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">            
                                    <div class="table-responsive">
                                        <table class="table align-middle table-check">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width: 20px;" class="align-middle">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                                            <label class="form-check-label" for="checkAll"></label>
                                                        </div>
                                                    </th>
                                                    <th class="align-middle">ID</th>
                                                    <th class="align-middle">Permission Name</th>
                                                    <th class="align-middle">Permission</th>
                                                    <th class="align-middle">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $role)
                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                            <label class="form-check-label" for="orderidcheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="javascript: void(0);" class="text-body fw-bold">{{ $loop->index+1 }}</a> 
                                                    </td>
                                                    <td>{{ $role->name }}</td>
                                                    <td>
                                                        @foreach ($role->permissions as $perm)
                                                            <span class="badge badge-dark p-2 mr-1 mb-1">
                                                                {{ $perm->name }}
                                                            </span>
                                                        @endforeach
                                                    </td>

                                                    <td>
                                                        <div class="d-flex gap-3">
                                                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="text-success"><i class="fas fa-edit"></i></a>&nbsp;
                                                            <a href="#delete-form{{ $role->id }}" class="text-danger"><i class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul class="pagination pagination-rounded justify-content-end mb-2">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                                <i class="mdi mdi-chevron-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row -->

                </div> <!-- container-fluid -->
            </section>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    @include('backend.partials.footer')
@endsection