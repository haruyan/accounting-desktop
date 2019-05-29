<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  @yield('title')

  <!-- Custom fonts for this template-->
  <link href="{{ asset('startbootstrap/vendor/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('startbootstrap/css/sb-admin-2.css') }}" rel="stylesheet">
  <link href="{{ asset('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  
  {{-- <script src="node_modules/handsontable/dist/handsontable.full.min.js"></script>
  <link href="node_modules/handsontable/dist/handsontable.full.min.css" rel="stylesheet" media="screen"> --}}
  @yield('headscript')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/entries') }}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Accounting</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/entries') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Kelola
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/table') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabel</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/balances') }}">
          <i class="fas fa-fw fa-lock"></i>
          <span>Anggaran Tahunan</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/faculties') }}">
          <i class="fas fa-fw fa-lock"></i>
          <span>Bidang</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link" href="#" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Profil</span>
                <img class="img-profile rounded-circle" src="{{ asset('/img/avatar.jpg') }}">
              </a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Logout Nav -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link" href="{{ url('/logout') }}" id="userDropdown" role="button">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                Logout <i class="fas fa-arrow-right fa-sm fa-fw mr-2 text-gray"></i>
                </span>
              </a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

@yield('page-content')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-arrow-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('startbootstrap/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('startbootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('startbootstrap/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('startbootstrap/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('startbootstrap/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('startbootstrap/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>


  <!-- Page level custom scripts -->
  {{-- <script src="{{ asset('startbootstrap/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('startbootstrap/js/demo/chart-pie-demo.js') }}"></script> --}}
  <script src="{{ asset('startbootstrap/js/demo/datatables-demo.js') }}"></script>

  @yield('script')

</body>

</html>
