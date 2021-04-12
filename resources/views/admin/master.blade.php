<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield("title")</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('backend/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('backend/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('backend/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Data Table LINKs-- -->
  <link rel="stylesheet" href="{{url('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- End Data Table-- -->
  <!-- toggle -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('admin')}}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
                          @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-user"></i>&nbsp;&nbsp;
                                {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                  </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <i class="fas fa-user"></i>&nbsp;&nbsp;
                                    {{ Auth::user()->fname }}&nbsp;{{ Auth::user()->lname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4" style="background-color: #138086;">
    <!-- Brand Logo -->
    <a href="{{url('admin')}}" class="brand-link">
      <img src="{{url('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span style="color: white" class="brand-text font-weight-light"><b>{{ Auth::user()->fname }}&nbsp;{{ Auth::user()->lname }}</b></span>
    </a>
    <p style="border-bottom-style: ridge;border-bottom-color: white;"></p>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel pb-3 d-flex">
        <div class="info">
          <a style="color: white;font-size:18px" href="{{url('admin')}}" class="d-block"><i class="fas fa-envelope"></i>&nbsp; {{ Auth::user()->email }}</a>
          <a style="color: white;font-size:18px" href="{{url('admin')}}" class="d-block"><i class="fas fa-user"></i>&nbsp; {{ Auth::user()->role }}</a>
        </div>
      </div>
      <p style="border-bottom-style: ridge;border-bottom-color: white;"></p>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('admin')}}" class="nav-link">
              <i style="color: white" class="nav-icon fas fa-tachometer-alt"></i>
              <p style="color: white">
                Dashboard
              
              </p>
            </a>
          </li>
          <nav class="mt-2 os-viewport-native-scrollbars-invisible" style="padding: 0px 8px; height: 100%; width: 100%;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active" style="background-color: black!important">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Avalible Courses
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/category')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>Category List</p>
                </a>
              </li>
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/course')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>Courses List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active" style="background-color: black!important">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Our Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/contact')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>ContactUs</p>
                </a>
              </li>
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/subscribers')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>Subscribers</p>
                </a>
              </li>
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/coupan')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>Coupan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active" style="background-color: black!important">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Frontend Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/navbar')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>Navbar</p>
                </a>
              </li>
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/alert')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>Alerts</p>
                </a>
              </li>
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/banner')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>Banner</p>
                </a>
              </li>
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/special')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>Features</p>
                </a>
              </li>
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/ourteam')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>Our Team</p>
                </a>
              </li>
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/interns')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>Our Interns</p>
                </a>
              </li>
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/placements')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>Placements</p>
                </a>
              </li>
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/workshop')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>Workshops</p>
                </a>
              </li>
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/about')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>AboutUs</p>
                </a>
              </li>
              <li class="nav-item" style="background-color: white">
                <a href="{{url('admin/portfolio')}}" class="nav-link ">
                  <i class="fas fa-eye"></i>
                  <p>Portfolio</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <p class="btn btn-success">
                <i class="nav-icon fas fa-th"></i>
                {{ __('Logout') }}
              </p>
            </a>
            </a>
          </li>
          <br>
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @section("content")

  @show


  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="#">PN-Infosys || PN-Education</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('backend/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('backend/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('backend/dist/js/demo.js')}}"></script>
<!-- Data Tables Scripts -->
<script src="{{url('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
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
  let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
  elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small' });
  });
</script>
<!-- End Data table--- -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
</body>
</html>