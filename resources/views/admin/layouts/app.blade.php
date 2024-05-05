<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Titan App</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ekko Lightbox -->
    <!-- <link rel="stylesheet" href="{{ asset('/admin/plugins/ekko-lightbox/ekko-lightbox.css') }}"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/admin/dist/css/adminlte.min.css') }}">


  <link rel="stylesheet" href="{{ asset('/admin/plugins/uplot/uPlot.min.css') }}">


  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

   <!-- Icon for the tab -->
   <link rel="icon" href="{{ asset('/admin/dist/img/N.png') }}" type="image/png">

   <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">




   <!-- Add this in the head section of your HTML file -->


</head>
<!-- <body class="hold-transition sidebar-mini  "> -->
<body class="sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/dashboard') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        {{-- <a href="#" class="nav-link">Contact</a> --}}
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>

      </li> --}}
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">1+</span>
        </a>
      </li>

      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('/admin/dist/img/b.png') }}" class="user-image img-circle elevation-2" alt="User Image">
          {{-- <span class="d-none d-md-inline"> {{ auth()->user()->name }}</span> --}}
        </a>
        {{-- <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right"> --}}
        <ul class="dropdown-menu  dropdown-menu-right" style="width: 10px">

          <!-- Menu Footer-->
          <li class="user-footer" >

            {{-- <form method="POST" action="{{ route('logout') }}" >
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form> --}}
          </li>
        </ul>
      </li>



      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> --}}
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #290527">
  {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #033843"> --}}

    <!-- Brand Logo -->

    <a href="#" class="brand-link">
      <img src="{{ asset('/admin/dist/img/Nexdecade_one.png') }}" class="brand-image img-circle elevation-3" style="opacity: .8;">
      <span class="brand-text font-weight-light">Nexdecade</span>
    </a>




    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
        @include('admin.layouts.nav')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top: 0px;padding-bottom: 0px;">
      <div class="container-fluid">
        {{-- @include('flash::message') --}}
        @yield('page_title')
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     @yield('content')
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  {{-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> --}}

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/admin/dist/js/adminlte.min.js') }}"></script>
<!-- jquery knob -->
<script src="{{ asset('/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- Ekko Lightbox -->
<script src="{{ asset('/admin/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<!-- Filterizr-->
<script src="{{ asset('/admin/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('/admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- uPlot -->
<script src="{{ asset('/admin/plugins/uplot/uPlot.iife.min.js') }}"></script>




<!-- Include jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->


<!-- Include Select2 CSS and JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@3.0.1/dist/chartjs-plugin-annotation.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script> -->
<!-- https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js -->








</body>
</html>
