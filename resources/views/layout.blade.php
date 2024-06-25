<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Testing </title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('argon/vendor/select2/dist/css/select2.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/html-duration-picker@latest/dist/html-duration-picker.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('argon/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('argon/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('OrgChart/src/css/jquery.orgchart.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  
  
</head>

<style type="text/css">
  
  table td {
    word-break: break-word;
    vertical-align: top;
    white-space: normal !important;
  }

  .position-relative {
    position: relative;
  }

  .indicator{
    background: #dd3b3b;
    border-radius: 50%;
    box-shadow: 0 .1rem .2rem rgba(0, 0, 0, .05);
    color: #fff;
    font-size: .675rem;
    margin-left: -18px;
    height: 18px;
    padding: 1px;
    position: absolute;
    text-align: center;
    top: -10px; /* Sesuaikan jarak vertikal sesuai kebutuhan */
    width: 20px;
    z-index: 1; /* Pastikan z-index lebih tinggi daripada tautan btn */
  }

</style>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <div class="mt-5">
          <h3> Testing </h3>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          @include('sidebar')
          <!-- Divider -->
          
          <!-- Heading -->
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center">
            <h3 class="text-white"> {{ Request::segment(1) == '' ? 'Dashboard' : ucwords(Request::segment(1)) }} </h3>
          </ul>
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <i class="bi bi-person"></i>
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"> Guest </span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid mt-4 mb-4">
      @if ($message = Session::get('message'))
        <div class="alert alert-{{ $message[1] }} alert-block">
          {{ $message[0] }}
        </div>
      @endif
      @yield('content')
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('argon/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.min.js"></script>
  <script src="{{ asset('OrgChart/src/js/jquery.orgchart.js') }}"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <!-- Argon JS -->
  <script src="{{ asset('argon/js/argon.js?v=1.2.0') }}"></script>
  <script src="{{ asset('argon/vendor/select2/dist/js/select2.min.js') }}"></script>
  <script src="{{ asset('argon/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('argon/vendor/datatables.net/js/jquery.dataTables.min.js') }}"> </script>
  <script src="{{ asset('argon/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"> </script>
  @yield('addon-script')
</body>

</html>
