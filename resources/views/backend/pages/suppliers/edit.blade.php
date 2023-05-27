@extends('backend.layouts.master')

@section('title')
   Edit Supplier Page | Admin Dashboard
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.customer.index') }}">Manage Supplier</a></li>
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
                                <h4 class="mb-sm-0 font-size-18">Edit Supplier</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Edit Supplier</h3>
                            </div>
                            {{-- @include('backend.partials.message'); --}}
                            <div class="card-body">
                            <div class="card-body">
                                <form action="{{ route('admin.supplier.update', $supplier->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">      
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="formrow-name-input" class="form-label">Supplier Name</label>
                                                <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" id="supplier_name" name="supplier_name" value="{{$supplier->supplier_name}}">
                                                @error('supplier_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-name-input" class="form-label">Supplier Email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$supplier->email}}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-phone-input" class="form-label">Supplier Phone</label>
                                                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$supplier->phone}}">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-role-input">Address</label>
                                                <textarea id="textarea" name="address" class="form-control @error('address') is-invalid @enderror" rows="2">{{$supplier->address}}</textarea>
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-phone-input" class="form-label">Supplier Regisration No</label>
                                                <input type="text" class="form-control @error('regi_no') is-invalid @enderror" id="regi_no" name="regi_no" value="{{$supplier->regi_no}}">
                                                @error('regi_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--status--> 
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-username-input" class="form-label">Supplier Status</label>
                                                <select name="status" id="status" class="form-control @error('buy_price') is-invalid @enderror">
                                                    <option value="1" {{($supplier->status == 1) ? 'selected' : ''}}>Active</option>
                                                    <option value="0" {{($supplier->status == 0) ? 'selected' : ''}}>Deactive</option>
                                                </select>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">Save suplier</button>
                                </form>
                            </div>
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