@extends('backend.layouts.master')

@section('title')
    Admin Page | eDhokan - Admin Dashboard
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
                                <h4 class="mb-sm-0 font-size-18">Admin List</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">
                                            <a href="{{ route('admin.admins.create') }}">Add New Admin</a>
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
                                        <table class="table align-middle table-nowrap table-check">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="align-middle">ID</th>
                                                    <th class="align-middle">Name</th>
                                                    <th class="align-middle">Email</th>
                                                    <th class="align-middle">Role</th>
                                                    <th class="align-middle">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($admins as $admin)
                                                    
                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $admin->name }}</a> </td>
                                                        <td>{{ $admin->email }}</td>
                                                        <td>
                                                        @foreach ($admin->roles as $role)
                                                            <span class="badge badge-info mr-1">
                                                                {{ $role->name }}
                                                            </span>
                                                        @endforeach
                                                        </td>

                                                        <td>
                                                        <div class="d-flex gap-3">
                                                            @if(Auth::guard('admin')->user()->can('admin.edit'))
                                                            <a href="{{ route('admin.admins.edit', $admin->id) }}" class="text-success"><i class="fas fa-edit"></i></a>&nbsp;
                                                            @endif
                                                            @if(Auth::guard('admin')->user()->can('admin.edit'))
                                                            <a class="text-danger" href="#delete-form{{ $admin->id }}" data-toggle="modal">
                                                            <i class="fas fa-trash"></i>
                                                            </a>
                                                            @endif
                                                                @if(Auth::guard('admin')->user()->can('admin.delete'))
                                                                <!--Delete Modal -->
                                                                <div id="delete-form{{ $admin->id }}" class="modal fade">
                                                                    <div class="modal-dialog modal-confirm">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header flex-column">
                                                                                <div class="icon-box">
                                                                                    <i class="material-icons">&#xE5CD;</i>
                                                                                </div>
                                                                                <h4 class="modal-title w-100">Are you sure?</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Do you really want to delete these records? This process cannot be undone.</p>
                                                                            </div>
                                                                            <div class="modal-footer justify-content-center">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST">
                                                                                    @method('DELETE')
                                                                                    @csrf
                                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif
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