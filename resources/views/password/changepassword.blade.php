<!doctype html>
<html lang="en">
    <head>
        <title>Ubah Password</title>
        <link href="{{ asset('img/logo.png') }}" rel="icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="auth/css/style.css">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    </head>
	<body class="img js-fullheight" style="background-image: url({{ asset('auth/imgauth.jpg') }});">
        <!-- ======= Header ======= -->
        <section id="topbar" class="topbar d-flex align-items-center" style="background-color: transparent">
            <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope-at d-flex align-items-center"><a href="/#contact" style="text-decoration: none">bantumereka@gmail.com</a></i>
                {{-- <i class="bi bi-whatsapp d-flex align-items-center ms-4"><a href="" style="text-decoration: none">+62 8331233157716</a></i> --}}
                <i class="bi bi-whatsapp d-flex align-items-center ms-4"><a href="" style="text-decoration: none">+62 8331233157716</a></i>
                {{-- <i class="bi bi-bank d-flex align-items-center ms-4"><a href="">{{ auth()->user()->created_at->format('d / m / Y') }}</a></i> --}}
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
            </div>
        </section>
        <!-- End Top Bar -->

        <header id="header" class="header d-flex align-items-center" style="background-color: transparent">>

            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <h1>Bantu Mereka<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar" style="padding-right: 75px">
                <ul>
                <li><a href="/">Beranda</a></li>
                <li><a href="/#progam">Progam</a></li>
                <li><a href="/#about">About</a></li>
                <li><a href="/#services">Services</a></li>
                <li><a href="/#team">Team</a></li>
                <li><a href="/#recent-posts">Blog</a></li>
                <li><a href="/#contact">Contact</a></li>
                @auth
                    <li class="dropdown" style="margin-right: -27px"><a href="#"><span>{{ auth()->user()->username }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            @can('admin')
                                <li><a href="/dashboard" class="bi bi-easel2-fill" style="padding-right: 60px"> Administrator</a></li>
                                <hr>
                            @endcan

                            <li><a href="" class="bi bi-person-fill" style="padding-right: 120px"> Profil</a></li>
                            <li><a href="/ubahpassword" class="bi bi-key-fill" style="padding-right: 45px">Ubah Password</a></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="dropdown-item bi bi-box-arrow-right" style="padding-right: 112px">Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown" style="margin-right: -27px"><a href="#"><span>User</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                        <li><a class="bi bi-person-plus-fill" style="padding-right: 113px" href="/register">Daftar</a></li>
                        <li><a class="bi bi-box-arrow-left" style="padding-right: 110px" href="/login">Masuk</a></li>
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

        <section class="ftco-section">
            <div class="container">
                @if (session()->has('success'))
                    <div class="row justify-content-center">
                        <div class="alert alert-success alert-dismissible fade show col-lg-6 text-center d-flex justify-content-center" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Ubah Password</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">

                            <form action="/ubahpassword" method="POST" class="signin-form">
                                @csrf
                                <div class="form-group">
                                    <input id="password-field3" type="password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Password saat ini" name="current_password" required>
                                    <span toggle="#password-field3" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    @error('current_password')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password baru" required>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    @error('password')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password-field2" type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                                    <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Ubah Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="auth/js/jquery.min.js"></script>
        <script src="auth/js/popper.js"></script>
        <script src="auth/js/bootstrap.min.js"></script>
        <script src="auth/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>

