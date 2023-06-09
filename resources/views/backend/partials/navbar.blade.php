  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-user">   {{ Auth::guard('admin')->user()->name }}</i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('admin.logout.submit') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                <i class="fas fa-file mr-2"></i> SignOut
              </a>
              <form id="logout-form" action="{{ route('admin.logout.submit') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->