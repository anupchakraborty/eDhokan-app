@extends('backend.layouts.master')

@section('title')
    POS Page | eDhokan - Admin Dashboard
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.pos.index') }}">Manage Purchage</a></li>
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
                                <h4 class="mb-sm-0 font-size-18">Purchage List</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">
                                            <a href="{{ route('admin.pos.create') }}">Add Purchage</a>
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
                                                    <th class="align-middle">Invoice No</th>
                                                    <th class="align-middle">Customer Name</th>
                                                    <th class="align-middle">Product Name</th>
                                                    <th class="align-middle">Quantity</th>
                                                    <th class="align-middle">Unit Price</th>
                                                    <th class="align-middle">Sub Total</th>
                                                    <th class="align-middle">Status</th>
                                                    <th class="align-middle">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($poss as $pos)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $pos->invoice_id }}</a> </td>
                                                    <td>
                                                        @php
                                                            $customer = App\Models\Customer::find($pos->customer_id);
                                                        @endphp
                                                        {{$customer->first_name}} {{$customer->last_name}}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $product = App\Models\Product::find($pos->product_id);
                                                        @endphp
                                                         {{ $product->product_name }}
                                                    </td>
                                                    <td> {{ $pos->quantity }}</td>
                                                    <td> {{ $pos->unit_price }}</td>
                                                    <td> {{ $pos->sub_total }}</td>
                                                    <td>
                                                        @if($pos->status == 0)
                                                                <span class="badge badge-danger">Due</span>
                                                        @else
                                                                <span class="badge badge-success">Paid</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="d-flex gap-3">
                                                            <a href="{{ route('admin.pos.edit', $pos->id) }}" class="text-success"><i class="fas fa-edit"></i></a>&nbsp;
                                                            <a class="text-danger" href="#delete-form{{ $pos->id }}" data-toggle="modal">
                                                            <i class="fas fa-trash"></i>
                                                            </a>
                                                                <!--Delete Modal -->
                                                                <div id="delete-form{{ $pos->id }}" class="modal fade">
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
                                                                                    <form action="{{ route('admin.pos.destroy', $pos->id) }}" method="POST">
                                                                                        @method('DELETE')
                                                                                        @csrf
                                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
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
        @include('backend.partials.footer')
    </div>
    <!-- END layout-wrapper -->
@endsection