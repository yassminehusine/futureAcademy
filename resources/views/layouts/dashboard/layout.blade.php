<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href="{{asset('assets')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/css/index.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!-- Other CSS files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{asset('assets')}}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

  <!-- ./Wrapper -->
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{asset('assets')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
        width="60">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
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
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{asset('assets')}}/dist/img/user1-128x128.jpg" alt="User Avatar"
                  class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{asset('assets')}}/dist/img/user8-128x128.jpg" alt="User Avatar"
                  class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{asset('assets')}}/dist/img/user3-128x128.jpg" alt="User Avatar"
                  class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="https://futureacademyedu.com/wp-content/uploads/2023/02/Logo-2048x1491.png" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Future Academyed</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset(auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="{{route('user.profile', ['id' => Auth::user()->id])}}" class="d-block">{{auth()->user()->name}}</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            @if(auth()->user()->role === 'Admin' || auth()->user()->role === 'doctors')
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
            USERS
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('user.create')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>create user</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>show user</p>
            </a>
          </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>
            Department
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('department.create')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>create department</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('department.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> show department </p>
            </a>
          </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>
            Posts
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('post.create')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>create post</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('post.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> show post </p>
            </a>
          </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <!-- <i class="fa-solid fa-bookmark"></i> -->
          <i class="nav-icon fas fa-bookmark"></i>
          <p>
            Courses
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('course.create')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>create course</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('course.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> show course </p>
            </a>
          </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <!-- <i class="fa-solid fa-bookmark"></i> -->
          <i class="fa-solid fa-id-card"></i>
          <p>
            user_courses
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('user_course.create')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>create user_course</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user_course.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> show user_course </p>
            </a>
          </li>
          
          <li class="nav-item">
          <a href="{{route('user.courses', ['id' => Auth::user()->id])}}" class="nav-link">
          <i class="fa-solid fa-address-card"></i>
          <p>
            My Courses
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
        </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <!-- <i class="fa-solid fa-bookmark"></i> -->
          <i class="fa-solid fa-id-card"></i>
          <p>
            Materials
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('material.create')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>create material</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('material.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> show material </p>
            </a>
          </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <!-- <i class="fa-solid fa-bookmark"></i> -->
          <i class="nav-icon fas fa-bookmark"></i>
          <p>
            Front Elements
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('navbar.create')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>create navbar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('navbar.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> show navbars </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('slider.create')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>create Slider</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('slider.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> show sliders </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('header.create')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>create header</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('header.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> show headers </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('footer.create')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>create footer</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('footer.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> show footers </p>
            </a>
          </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{route('user.courses', ['id' => Auth::user()->id])}}" class="nav-link">
          <i class="fa-solid fa-address-card"></i>
          <p>
            My Courses
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('assignment.show', ['id' => Auth::user()->id])}}" class="nav-link">
          <i class="fa-solid fa-address-card"></i>
          <p>
            My Assignments
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('user.settings', ['id' => Auth::user()->id])}}" class="nav-link">
          <i class="fa-solid fa-address-card"></i>
          <p>
            Account Settings
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>
            Logout
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
          </form>
        </li>

      @endif
      @if(auth()->user()->role === 'students')
        <li class="nav-item">
          <a href="{{route('user.courses', ['id' => Auth::user()->id])}}" class="nav-link">
          <i class="fa-solid fa-address-card"></i>
          <p>
            My Courses
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('assignment.show', ['id' => Auth::user()->id])}}" class="nav-link">
          <i class="fa-solid fa-address-card"></i>
          <p>
            My Assignments
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
        </li>
        <!-- <ul class="nav nav-treeview"> -->
        <li class="nav-item">
          <a href="{{route('user.profile', ['id' => Auth::user()->id])}}" class="nav-link">
          <i class="fa-solid fa-address-card"></i>
          <p>
            Profile
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('user.settings', ['id' => Auth::user()->id])}}" class="nav-link">
          <i class="fa-solid fa-address-card"></i>
          <p>
            Account Settings
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>
            Logout
          </p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
          </form>
        </li>

      @endif
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- دي بتاعن الفرعي -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <!-- ./col -->
            @yield('content2')
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
</body>
<script src="{{asset('assets')}}/dist/js/nny.js"></script>

<script src="{{asset('assets')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="{{asset('assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('assets')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('assets')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('assets')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('assets')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('assets')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('assets')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('assets')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets')}}/dist/js/pages/dashboard.js"></script>
<!-- Table -->
<!-- jQuery -->
<script src="{{asset('assets')}}/plugins/jquery/jquery.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('assets')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('assets')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jsGrid -->
<script src="{{asset('assets')}}/plugins/jsgrid/demos/db.js"></script>
<script src="{{asset('assets')}}/plugins/jsgrid/jsgrid.min.js"></script>
<script src="{{asset('assets')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets')}}/dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="{{asset('assets')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="{{asset('assets')}}/plugins/codemirror/codemirror.js"></script>
<script src="{{asset('assets')}}/plugins/codemirror/mode/css/css.js"></script>
<script src="{{asset('assets')}}/plugins/codemirror/mode/xml/xml.js"></script>
<script src="{{asset('assets')}}/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('assets')}}/dist/js/demo.js"></script> -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
AdminLTE App -->
<!-- <script src="../../dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
  function checkAutofill(){
    datal = document.getElementById('user_search');
    datal = document.getElementById('user_id');


  }
</script>
</body>

</html>