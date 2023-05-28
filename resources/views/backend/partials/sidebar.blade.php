@php
    $usr = Auth::guard('admin')->user();
    $total_admin = count(App\Models\Admin::select('id')->get());
    $total_pos = count(App\Models\POS::select('id')->get());
    $total_product = count(App\Models\Product::select('id')->get());
    $total_customer = count(App\Models\Customer::select('id')->get());
    $total_supplier = count(App\Models\Supplier::select('id')->get());
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">eDhokan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if ($usr->can('dashboard.view'))
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @endif
          @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
          <li class="nav-item">
              <a href="#" class="nav-link {{ Route::is('admin.roles.create')||Route::is('admin.roles.index')||Route::is('admin.roles.edit')||Route::is('admin.roles.show')?'menu-open':'' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Roles
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">New</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @if ($usr->can('role.view'))
                <li class="nav-item">
                  <a href="{{ Route('admin.roles.index') }}" class="nav-link {{ Route::is('admin.roles.index')||Route::is('admin.roles.edit')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Roles</p>
                  </a>
                </li>
                @endif
              </ul>
          </li>
          @endif

          @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
          <li class="nav-item">
              <a href="#" class="nav-link {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'menu-open' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Admin
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">{{ $total_admin }}</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @if ($usr->can('admin.view'))
                <li class="nav-item">
                  <a href="{{ Route('admin.admins.index') }}" class="nav-link {{ route::is('admin.admins.index')  ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Admin</p>
                  </a>
                </li>
                @endif
              </ul>
          </li>
          @endif

          @if ($usr->can('customer.create') || $usr->can('customer.view') ||  $usr->can('customer.edit') ||  $usr->can('customer.delete'))
          <li class="nav-item">
              <a href="#" class="nav-link {{ Route::is('admin.customer.create') || Route::is('admin.customer.index') || Route::is('admin.customer.edit') || Route::is('admin.customer.show') ? 'menu-open' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Customer
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">{{ $total_customer }}</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @if ($usr->can('customer.view'))
                <li class="nav-item">
                  <a href="{{ Route('admin.customer.index') }}" class="nav-link {{ route::is('admin.customer.index')  ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Customer</p>
                  </a>
                </li>
                @endif
                <li class="nav-item">
                  <a href="{{ Route('admin.customer.invoice.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Customer Invoice</p>
                  </a>
                </li>
              </ul>
          </li>
          @endif
          @if ($usr->can('product.create') || $usr->can('product.view') ||  $usr->can('product.edit') ||  $usr->can('product.delete'))
          <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Products
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">{{ $total_product }}</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @if ($usr->can('product.view'))
                <li class="nav-item">
                  <a href="{{ Route('admin.product.index') }}" class="nav-link {{ route::is('admin.product.index')  ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Products</p>
                  </a>
                </li>
                @endif
                <li class="nav-item">
                  <a href="{{ Route('admin.product.stock') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Products Stock</p>
                  </a>
                </li>
              </ul>
          </li>
          @endif
          @if ($usr->can('supplier.create') || $usr->can('supplier.view') ||  $usr->can('supplier.edit') ||  $usr->can('supplier.delete'))
          <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Supplier
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">{{ $total_supplier }}</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @if ($usr->can('supplier.view'))
                <li class="nav-item">
                  <a href="{{ Route('admin.supplier.index') }}" class="nav-link {{ route::is('admin.supplier.index')  ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Supplier</p>
                  </a>
                </li>
                @endif
                <li class="nav-item">
                  <a href="{{ Route('admin.supplier.invoice.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Supplier Invoice</p>
                  </a>
                </li>
              </ul>
          </li>
          @endif
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Purchage
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{$total_pos}}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('admin.pos.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Purchage</p>
                </a>
              </li>
            </ul>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>