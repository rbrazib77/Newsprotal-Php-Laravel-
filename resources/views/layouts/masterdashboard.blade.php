
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>Dashboard</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('dashboard_assets')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dashboard_assets')}}/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('dashboard_assets')}}/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="{{asset('dashboard_assets')}}/plugins/bootstrap-switch/css/bootstrap-switch.min.js">

  <!-- Data table-->
  <link rel="stylesheet" href="{{asset('dashboard_assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/')}}" target="_blank"  class="nav-link">website</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
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
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('dashboard_assets')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" ">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dashboard_assets')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('home')}}" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

    @if (Auth::user()->category==1)
    <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
        Categories
        <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{route('category.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Category</p>
            <span class="badge badge-info right"></span>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{route('subcategory.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Sub-category</p>
            <span class="badge badge-info right"></span>
        </a>
        </li>
    </ul>
    </li>
    @endif

    @if (Auth::user()->district==1)
    <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
        Distriets
        <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{route('district.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>District</p>
            <span class="badge badge-info right"></span>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{route('subdistrict.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Sub-district</p>
            <span class="badge badge-info right"></span>
        </a>
        </li>
    </ul>
    </li>
    @endif
    @if (Auth::user()->post==1)
    <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
        Post
        <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{route('insert.post')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Post</p>
            <span class="badge badge-info right"></span>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{route('all.post')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>All Post</p>
            <span class="badge badge-info right"></span>
        </a>
        </li>
    </ul>
    </li>
    @endif

    @if (Auth::user()->setting==1)
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
            Setting
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{route('social.setting')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Social Setting</p>
                <span class="badge badge-info right"></span>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{route('sco.setting')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sco Setting</p>
                <span class="badge badge-info right"></span>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{route('namaz.setting')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Namaz Setting</p>
                <span class="badge badge-info right"></span>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{route('livetv.setting')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>LiveTV Setting</p>
                <span class="badge badge-info right"></span>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{route('notice.setting')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Notice Setting</p>
                <span class="badge badge-info right"></span>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{route('insert.improtantwebsite')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Improtant Website</p>
                <span class="badge badge-info right"></span>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{route('website.setting')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Website Setting</p>
                <span class="badge badge-info right"></span>
            </a>
            </li>
        </ul>
    </li>
    @endif

    @if (Auth::user()->gallery==1)
    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                Gallery
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('insert.photo')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Photo</p>
                    <span class="badge badge-info right"></span>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{route('insert.video')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Video</p>
                    <span class="badge badge-info right"></span>
                </a>
                </li>
            </ul>
    </li>
    @endif
    @if (Auth::user()->ads==1)
    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                Advertisement
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('horizontalvertical.ads')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ads</p>
                    <span class="badge badge-info right"></span>
                </a>
                </li>
            </ul>
    </li>
    @endif
    @if (Auth::user()->role==1)
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
            User Role
            <i class="fas fa-angle-left right"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('insert.writer')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Writer</p>
            <span class="badge badge-info right"></span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('index.writer')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>All Writer</p>
            <span class="badge badge-info right"></span>
            </a>
        </li>
        </ul>
    </li>
    @endif

    <li class="nav-header">LABELS</li>
    <li class="nav-item">
    <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
        <i class="nav-icon far fa-circle text-danger"></i>
        <p class="text">Logout</p>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-circle text-warning"></i>
        <p>Warning</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-circle text-info"></i>
        <p>Informational</p>
    </a>
    </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            @yield('content')
        <!-- /.row -->
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

  <!-- Main Footer -->
  {{-- <footer class="main-footer">
    <strong>Copyright &copy; {{Carbon\Carbon::now()->format('Y')}}<a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer> --}}
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('dashboard_assets')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('dashboard_assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="{{asset('dashboard_assets')}}/dist/js/adminlte.js"></script>

<script src="{{asset('dashboard_assets')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('dashboard_assets')}}/plugins/chart.js/Chart.min.js"></script>
<script src="{{asset('dashboard_assets')}}/dist/js/demo.js"></script>
<script src="{{asset('dashboard_assets')}}dist/js/pages/dashboard3.js"></script>
<!-- Summernote -->
<script src="{{asset('dashboard_assets')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
{{-- <script>
    $(function () {
    //   $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script> --}}
</body>
</html>
