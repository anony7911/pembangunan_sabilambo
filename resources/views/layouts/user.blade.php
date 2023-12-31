<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        @hasSection('title') @yield('title') | @endif
        {{ config('app.name', 'POS SAR KOLAKA') }}
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon kolaka" href="{{ url('/') }}/assets/img/kolaka.png">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/assets1/img/favicon.ico"> -->

    <link rel="stylesheet" href="{{ url('/') }}/assets1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets1/css/templatemo.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets1/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ url('/') }}/assets1/css/fontawesome.min.css">
    @livewireStyles
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:kelurahansabilambo@gmail.com">kelurahansabilambo@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:0822-4312-9847">0822-4312-9847</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/kelurahansabilambo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/kelurahansabilambo" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/kelurahansabilambo" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/kelurahansabilambo" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="/">
                SI-PKP
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto fw-bold">
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="#pembangunan">Pembangunan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="#realisasi">Realisasi</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    @if (Auth::check())
                    <a class="nav-icon position-relative text-decoration-none mr-3" href="#">
                        <!-- <i class="fa fa-fw fa-user text-dark mr-3"></i> -->
                        <span class="position-absolute top-100 left-100 translate-middle badge rounded-pill bg-light text-dark">
                            {{ Auth::user()->name}}
                        </span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none mx-3 text-red" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    title="Keluar" style="color: red;">
                        <i class="fa fa-fw fa-sign-out-alt text-dark mr-3 text-danger" style="color: red !important;"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                    <a class="nav-icon position-relative text-decoration-none" href="{{ route('login') }}">
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                            Login
                        </span>
                    </a>
                    @endif
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    @yield('content')

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">SI-PKP</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Jl. Pemuda, Sabilambo, Kec. Kolaka
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:0822-4312-9847">0822-4312-9847</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:kelurahansabilambo@gmail.com">kelurahansabilambo@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">USER</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="/login">LOGIN</a></li>
                        <li><a class="text-decoration-none" href="/register">REGISTER</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">MENU</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="/">Home</a></li>
                        <li><a class="text-decoration-none" href="#pembangunan">PEMBANGUNAN</a></li>
                        <li><a class="text-decoration-none" href="#realisasi">REALISASI</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/kelurahansabilambo"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/kelurahansabilambo"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/kelurahansabilambo"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/kelurahansabilambo"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; {{
                                date('Y') }} KELURAHAN SABILAMBO

                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->
     @livewireScripts
    <script>
        window.addEventListener('closeModal', event => {
            $("#updateDataModal").modal('hide');
            $("#createDataModal").modal('hide');
            $("#kembalikanDataModal").modal('hide');
        })
    </script>

    <!-- Start Script -->
    <script src="{{ url('/') }}/assets1/js/jquery-1.11.0.min.js"></script>
    <script src="{{ url('/') }}/assets1/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ url('/') }}/assets1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets1/js/templatemo.js"></script>
    <script src="{{ url('/') }}/assets1/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>
