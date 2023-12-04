<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ ucwords($title) }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @yield('payment')
    {{-- <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment --> --}}

    <!-- Favicons -->
    <link href="{{ asset('img/logo.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin>
    <link
        href="{{ asset('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap') }}"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    {{-- form --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="form/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/form/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
    rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="/form/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/form/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('form/css/main.css') }}" rel="stylesheet" media="all">
    {{-- end form --}}


    <!-- Template Main CSS File -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
        input[type=file]::file-selector-button {
            /* margin-top: -7px; */
            border: none;
            background: #8daef3;
            /* padding: 9px 10px; */
            border-radius: 10px;/ color: #ffffff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        a {
            color: var(--color-primary);
            text-decoration: none;
        }

        input[type=file]::file-selector-button:hover {
            background-color: #0d45a5;
        }
    </style>
    @yield('css')
</head>

<body>
    <!-- ======= Header ======= -->
    <section id="topbar" class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope-at d-flex align-items-center"><a href="/#contact"
                        style="text-decoration: none">bantumereka@gmail.com</a></i>
                {{-- <i class="bi bi-whatsapp d-flex align-items-center ms-4"><a href="" style="text-decoration: none">+62 8331233157716</a></i> --}}
                <i class="bi bi-whatsapp d-flex align-items-center ms-4"><a href=""
                        style="text-decoration: none">+62 8331233157716</a></i>
                {{-- <i class="bi bi-bank d-flex align-items-center ms-4"><a href="">{{ auth()->user()->created_at->format('d / m / Y') }}</a></i> --}}
            </div>
        </div>
    </section>
    <!-- End Top Bar -->

    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <h1>Bantu Mereka<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar" style="padding-right: 75px">
                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><a href="/#progam">Program</a></li>
                    <li><a href="/#recent-posts">Blogspot</a></li>
                    <li><a href="/#testimonials">Rating</a></li>
                    @auth
                        <li class="dropdown" style="margin-right: -27px"><a
                                href="#"><span>{{ auth()->user()->username }}</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                @can('admin')
                                    <li><a href="/dashboard" class="bi bi-easel2-fill" style="padding-right: 60px">
                                            Administrator</a></li>
                                    <hr>
                                @endcan

                                <li><a href="/profile" class="bi bi-person-fill" style="padding-right: 120px"> Profil</a>
                                </li>
                                <li><a href="/ubahpassword" class="bi bi-key-fill" style="padding-right: 45px">Ubah Password</a></li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button class="dropdown-item bi bi-box-arrow-right"
                                            style="padding-right: 112px">Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="dropdown" style="margin-right: -27px"><a href="#"><span>User</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a class="bi bi-person-plus-fill" style="padding-right: 113px"
                                        href="/register">Daftar</a></li>
                                <li><a class="bi bi-box-arrow-left" style="padding-right: 110px" href="/login">Masuk</a>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </nav>
            <!-- .navbar -->

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <!-- End Header -->

    {{-- Start Content --}}
    @yield('erga')
    {{-- End Content --}}

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span>BantuMereka</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
                Designed by arek"
            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"
        style="background-color:#008374"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

    <script src="{{ asset('../../assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('../../assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        const toastTrigger = document.getElementById('liveToastBtn')
        const toastLiveExample = document.getElementById('liveToast')

        if (toastTrigger) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            toastTrigger.addEventListener('click', () => {
                toastBootstrap.show()
            })
        }
    </script>

    {{-- form --}}
    <!-- Jquery JS-->

    <script src="form/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="form/vendor/select2/select2.min.js"></script>
    <script src="form/vendor/datepicker/moment.min.js"></script>
    <script src="form/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="form/js/global.js"></script>
    @yield('script')
    {{-- end form --}}

</body>

</html>
