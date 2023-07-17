<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@hasSection('title') @yield('title') | @endif
        {{ config('app.name', 'POS SAR KOLAKA') }}</title>

    <!-- Scripts -->
    @livewireStyles
    <link rel="shortcut icon" href="{{ url('/') }}/assets/img/kolaka.png">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="/home" class="logo">
                    <img src="{{url('/')}}/assets/img/kolaka.png" alt="Logo">
                </a>
                <a href="/home" class="logo logo-small">
                    <span class="">KELURAHAN SABILAMBO</span>
                    <!-- <img src="{{url('/')}}/assets/img/logo-small.png" alt="Logo" width="30" height="30"> -->
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list win-maximize">
                        <img src="{{url('/')}}/assets/img/icons/header-icon-04.svg" alt="">
                    </a>
                </li>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{url('/')}}/assets/img/icons/teacher-icon-01.svg"
                                width="31" alt="gambar admin">
                            <div class="user-text">
                                <h6>
                                    @if (Auth::check())
                                    {{ ucfirst(Auth::user()->name) }}
                                    @endif
                                </h6>
                                <p class="text-muted mb-0">
                                    @if (Auth::check())
                                    {{ ucfirst(Auth::user()->role) }}
                                    @endif
                                </p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{url('/')}}/assets/img/icons/teacher-icon-01.svg" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>
                                    @if (Auth::check())
                                    {{ ucfirst(Auth::user()->name) }}
                                    @endif
                                </h6>
                                <p class="text-muted mb-0">
                                    @if (Auth::check())
                                    {{ ucfirst(Auth::user()->role) }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    @auth()
                    <ul class="navbar-nav mr-auto">
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>
                        <!--Nav Bar Hooks - Do not delete!!-->
                        <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/home') }}"><i class="feather-grid"></i> Beranda</a>
                        </li>
                        <li class="nav-item {{ Request::is('manajuser') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/manajuser') }}"><i class="feather-user"></i> User</a>
                        </li>
                        <li class="nav-item {{ Request::is('masyarakats') ? 'active' : '' }}">
                            <a href="{{ url('/masyarakats') }}" class="nav-link"><i class="feather-users"></i> Masyarakat</a>
                        </li>
                        <li class="nav-item {{ Request::is('jenispembangunans') ? 'active' : '' }}">
                            <a href="{{ url('/jenispembangunans') }}" class="nav-link"><i class="feather-grid"></i> Jenis pembangunan</a>
                        </li>
                        <li class="nav-item {{ Request::is('pembangunans') ? 'active' : '' }}">
                            <a href="{{ url('/pembangunans') }}" class="nav-link"><i class="feather-grid"></i> Pembangunan</a>
                        </li>
                        <li class="nav-item {{ Request::is('kategoripenilaians') ? 'active' : '' }}">
                            <a href="{{ url('/kategoripenilaians') }}" class="nav-link"><i class="feather-grid"></i> Kategori penilaian</a>
                        </li>
                        <li class="nav-item {{ Request::is('penilaians') ? 'active' : '' }}">
                            <a href="{{ url('/penilaians') }}" class="nav-link"><i class="feather-grid"></i> Penilaian</a>
                        </li>
						<!-- <li class="nav-item {{ Request::is('penilaianmasyarakats') ? 'active' : '' }}">
                            <a href="{{ url('/penilaianmasyarakats') }}" class="nav-link"><i class="feather-grid"></i> Penilaian masyarakat</a>
                        </li> -->
                        <li class="nav-item {{ Request::is('realisasipembangunans') ? 'active' : '' }}">
                            <a href="{{ url('/realisasipembangunans') }}" class="nav-link"><i class="feather-grid"></i> Realisasi pembangunan</a>
                        </li>
                        <li class="nav-item {{ Request::is('laporan') ? 'active' : '' }}">
                            <a href="{{ url('/laporan') }}" class="nav-link"><i class="feather-printer"></i> Laporan</a>
                        </li>
                    </ul>
                    @endauth()
                </div>
            </div>
        </div>


        <div class="page-wrapper">
            <div class="content container-fluid">
                @yield('content')

                <footer>
                    <p>Copyright © 2023 KELURAHAN SABILAMBO.</p>
                </footer>
            </div>
        </div>
    </div>
    @livewireScripts
    <script>
        window.addEventListener('closeModal', event => {
            $("#updateDataModal").modal('hide');
            $("#createDataModal").modal('hide');
            $("#kembalikanDataModal").modal('hide');
        })
    </script>
    <script src="{{ url('/') }}/assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/js/feather.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/apexchart/chart-data.js"></script>
    <script src="{{ url('/') }}/assets/js/script.js"></script>
</body>

</html>
