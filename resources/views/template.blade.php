<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/logo/logo.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/logo.png') }}">
    <title>{{ $title }} - Sintek PBMTI</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <style>
      .hidden {
        display: none !important;
      }

      .btn-close {
        color: black !important;
      }

      .dataTables_filter,
      .dataTables_paginate {
        float: right;
      }

      .next {
        color: black !important;
      }

      .form-select {
        min-width: 69px;
      }

      .btn.btn-xxs {
        padding: 0.305rem 1rem;
        font-size: 0.68rem;
        text-transform: unset;
      }

      .dataTables_empty {
        text-align: center;
      }
    </style>
    <script>
      function readURL(input, level) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          var fileimport = $('#' + input.id).val();
          var allowedExtensions = /(\.png|\.jpg|\.jpeg)$/i;
          if (!allowedExtensions.exec(fileimport)) {
            alert('Gambar harus bertipe gambar');
            $('#' + input.id).val('');
            return false;
          }
          reader.onload = function(e) {
            $('#blah_' + level).attr('src', e.target.result).width(200);
            // .height();
          };
          reader.readAsDataURL(input.files[0]);
        }
      }

      function imgError(data) {
        console.log('error_img');
        data.setAttribute('src', '{{ asset("assets/img/logo/logo.png") }}');
      }
    </script>
  </head>
  <body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" >
          <img src="{{ asset('assets/img/logo/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        </a>
      </div>
      <hr class="horizontal dark mt-0">
      <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link menu-dashboard" data-id="dashboard" href="{{ route('dashboard') }}">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>shop </title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(0.000000, 148.000000)">
                          <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                          <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Main</h6>
          </li>
          <li class="nav-item">
            <a class="nav-link menu-parser" data-id="parser" href="{{ route('produk.add')}}">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>settings</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(304.000000, 151.000000)">
                          <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                          <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                          <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Tambah Produk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu-list" data-id="list" href="{{ route('produk.list')}}">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>shop </title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(0.000000, 148.000000)">
                          <path class="color-background" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" opacity="0.598981585"></path>
                          <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="nav-link-text ms-1">List Produk</span>
            </a>
          </li>
          {{-- <li class="nav-item">
											<a data-bs-toggle="collapse" href="#report" class="nav-link collapsed" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
												<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
													<svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
														xmlns="http://www.w3.org/2000/svg"
														xmlns:xlink="http://www.w3.org/1999/xlink">
														<title>shop </title>
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
																<g transform="translate(1716.000000, 291.000000)">
																	<g transform="translate(0.000000, 148.000000)">
																		<path class="color-background" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" opacity="0.598981585"></path>
																		<path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
																	</g>
																</g>
															</g>
														</g>
													</svg>
												</div>
												<span class="nav-link-text ms-1">Laporan</span>
											</a>
											<div class="collapse" id="report" style="">
												<ul class="nav ms-4 ps-3">
													<li class="nav-item ">
														<a class="nav-link " href="{{ route('report.feedback') }}"> <span class="sidenav-mini-icon"> F </span>
          <span class="sidenav-normal"> Feedback </span>
          </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="{{ route('report.read') }}">
              <span class="sidenav-mini-icon"> B </span>
              <span class="sidenav-normal"> Baca </span>
            </a>
          </li>
        </ul>
      </div>
      </li> --}} </ul>
      </div>
      <div class="sidenav-footer mx-3 ">
        <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
          <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpg')"></div>
          <div class="card-body text-start p-3 w-100">
            <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
              <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
            </div>
            <div class="docs-info">
              <h6 class="text-white up mb-0">Perlu Bantuan?</h6>
              <p class="text-xs font-weight-bold">Silahkan buka dokumentasinya disini</p>
              <a onclick="alert('Wah dokumentasi belum jadi nih')" class="btn btn-white btn-sm w-100 mb-0">Dokumentasi</a>
            </div>
          </div>
        </div>
        <a class="btn bg-gradient-primary mt-3 w-100" href="{{ route('access.logout') }}">Keluar</a>
      </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5"> @for ($i = 0; $i < count($pages); $i++) @if(count($pages)==($i+1)) <li class="breadcrumb-item text-sm">
                <a class="opacity-5 text-dark" href="javascript:;">{{ $pages[$i] }}</a>
                </li> @else <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $pages[$i] }}</li> @endif @endfor </ol>
            <h6 class="font-weight-bolder mb-0">{{ $title }}</h6>
          </nav>
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group" style="display:none;">
                <span class="input-group-text text-body">
                  <i class="fas fa-search" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" placeholder="Cari disini...">
              </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-flex align-items-center">
                <a href="{{ route('access.profile') }}" class="nav-link text-body font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">{{ session('name_user') }}</span>
                </a>
              </li>
              <li class="nav-item px-3 d-flex align-items-center">
                <a href="{{ route('access.logout') }}" class="nav-link text-body p-0">
                  <i class="fa fa-sign-out text-danger cursor-pointer"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="container-fluid py-4"> @yield('content') <footer class="footer pt-3  ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start"> © <script>
                    document.write(new Date().getFullYear())
                  </script> Sintek PBMTI</a> </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </main>
    <div class="fixed-plugin">
      <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"></i>
      </a>
      <div class="card shadow-lg ">
        <div class="card-header pb-0 pt-3 ">
          <div class="float-start">
            <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
            <p>See our dashboard options.</p>
          </div>
          <div class="float-end mt-4">
            <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
              <i class="fa fa-close"></i>
            </button>
          </div>
          <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
          <!-- Sidebar Backgrounds -->
          <div>
            <h6 class="mb-0">Sidebar Colors</h6>
          </div>
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors my-2 text-start">
              <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
            </div>
          </a>
          <!-- Sidenav Type -->
          <div class="mt-3">
            <h6 class="mb-0">Sidenav Type</h6>
            <p class="text-sm">Choose between 2 different sidenav types.</p>
          </div>
          <div class="d-flex">
            <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
            <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          </div>
          <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
          <!-- Navbar Fixed -->
          <div class="mt-3">
            <h6 class="mb-0">Navbar Fixed</h6>
          </div>
          <div class="form-check form-switch ps-0">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
          <hr class="horizontal dark my-sm-4">
          <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free Download</a>
          <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
          <div class="w-100 text-center">
            <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
            <h6 class="mt-3">Thank you for sharing!</h6>
            <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
              <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
              <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share </a>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
      $(document).ready(function() {
          if (localStorage.getItem('menu-active') == undefined) {
              menuDashboardActive('dashboard');
          } else {
              menuDashboardActive(localStorage.getItem('menu-active'));
          }
      })

      function menuDashboardActive(menu) {
          $('.nav-link').removeClass('active');
          var arr = menu.split('-');
          for (var i = 0; i < arr.length; i++) {
              $('.menu-' + arr[i]).addClass('active');
              $('.menu-' + arr[i]).addClass('collapsed');
              $('.menu-' + arr[i]).attr('aria-expanded', 'true');
              $('#' + arr[i]).addClass('show');
          }
          $('.menu-' + menu).addClass('active');
          localStorage.setItem('menu-active', menu);
          // alert('menu-' + menu);
      }

      $('.nav-link').click(function() {
        // alert('sasa');
          menuDashboardActive($(this).attr('data-id'));
      })


      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
  </body>
</html>