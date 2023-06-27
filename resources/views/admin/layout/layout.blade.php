
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="refresh" content="5">
  <title>{{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('admin/css/adminlte.min.css') }}">

  @stack('css')
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.layout.header')

    @include('admin.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> --}}
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

 @include('admin.layout.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ url('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ url('admin/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
{{-- <script src="{{ url('admin/plugins/chart.js/Chart.min.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ url('admin/js/demo.js') }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ url('admin/js/pages/dashboard3.js') }}"></script> --}}
<!-- DataTables  & Plugins -->
@stack('scripts')
</body>
</html>
