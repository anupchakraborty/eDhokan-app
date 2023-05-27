<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

    @include('backend.partials.styles')
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @yield('admin_content')
    </div>

    @include('backend.partials.scripts')
    @include('sweetalert::alert')

</body>
</html>