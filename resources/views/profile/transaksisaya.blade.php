<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ ucwords($title) }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
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
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    {{-- form --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="form/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/form/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('form/css/main.css') }}" rel="stylesheet" media="all">



    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <style type="text/css">
        body {
            color: #797979;
            background: #f1f2f7;
            font-family: 'Open Sans', sans-serif;
            padding: 0px !important;
            margin: 0px !important;
            font-size: 13px;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
        }

        .profile-nav,
        .profile-info {
            margin-top: 30px;
        }

        .profile-nav .user-heading {
            background: #008374;
            color: #fff;
            border-radius: 4px 4px 0 0;
            -webkit-border-radius: 4px 4px 0 0;
            padding: 30px;
            text-align: center;
        }

        .profile-nav .user-heading.round a {
            border-radius: 50%;
            -webkit-border-radius: 50%;
            border: 10px solid rgba(255, 255, 255, 0.3);
            display: inline-block;
        }

        .profile-nav .user-heading a img {
            width: 112px;
            height: 112px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
        }

        .profile-nav .user-heading h1 {
            font-size: 22px;
            font-weight: 300;
            margin-bottom: 5px;
        }

        .profile-nav .user-heading p {
            font-size: 12px;
        }

        .profile-nav ul {
            margin-top: 1px;
        }

        .profile-nav ul>li {
            border-bottom: 1px solid #ebeae6;
            margin-top: 0;
            line-height: 30px;
        }

        .profile-nav ul>li:last-child {
            border-bottom: none;
        }

        .profile-nav ul>li>a {
            border-radius: 0;
            -webkit-border-radius: 0;
            color: #89817f;
            border-left: 5px solid #fff;
        }

        .profile-nav ul>li>a:hover,
        .profile-nav ul>li>a:focus,
        .profile-nav ul li.active a {
            background: #f8f7f5 !important;
            border-left: 5px solid #008374;
            color: #89817f !important;
        }

        .profile-nav ul>li:last-child>a:last-child {
            border-radius: 0 0 4px 4px;
            -webkit-border-radius: 0 0 4px 4px;
        }

        .profile-nav ul>li>a>i {
            font-size: 16px;
            padding-right: 10px;
            color: #bcb3aa;
        }

        .r-activity {
            margin: 6px 0 0;
            font-size: 12px;
        }


        .p-text-area,
        .p-text-area:focus {
            border: none;
            font-weight: 300;
            box-shadow: none;
            color: #c3c3c3;
            font-size: 16px;
        }

        .profile-info .panel-footer {
            background-color: #f8f7f5;
            border-top: 1px solid #e7ebee;
        }

        .profile-info .panel-footer ul li a {
            color: #7a7a7a;
        }

        .bio-graph-heading {
            background: black;
            color: #fff;
            text-align: center;
            font-style: italic;
            padding: 40px 110px;
            border-radius: 4px 4px 0 0;
            -webkit-border-radius: 4px 4px 0 0;
            font-size: 16px;
            font-weight: 300;
        }

        .bio-graph-info {
            color: #89817e;
        }

        .bio-graph-info h1 {
            font-size: 22px;
            font-weight: 300;
            margin: 0 0 20px;
        }

        .bio-row {
            width: 50%;
            float: left;
            margin-bottom: 10px;
            padding: 0 15px;
        }

        .bio-row p span {
            width: 100px;
            display: inline-block;
        }

        .bio-chart,
        .bio-desk {
            float: left;
        }

        .bio-chart {
            width: 40%;
        }

        .bio-desk {
            width: 60%;
        }

        .bio-desk h4 {
            font-size: 15px;
            font-weight: 400;
        }

        .bio-desk h4.terques {
            color: #4CC5CD;
        }

        .bio-desk h4.red {
            color: #e26b7f;
        }

        .bio-desk h4.green {
            color: #97be4b;
        }

        .bio-desk h4.purple {
            color: #caa3da;
        }

        .file-pos {
            margin: 6px 0 10px 0;
        }

        .profile-activity h5 {
            font-weight: 300;
            margin-top: 0;
            color: #c3c3c3;
        }

        .summary-head {
            background: #ee7272;
            color: #fff;
            text-align: center;
            border-bottom: 1px solid #ee7272;
        }

        .summary-head h4 {
            font-weight: 300;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .summary-head p {
            color: rgba(255, 255, 255, 0.6);
        }

        ul.summary-list {
            display: inline-block;
            padding-left: 0;
            width: 100%;
            margin-bottom: 0;
        }

        ul.summary-list>li {
            display: inline-block;
            width: 19.5%;
            text-align: center;
        }

        ul.summary-list>li>a>i {
            display: block;
            font-size: 18px;
            padding-bottom: 5px;
        }

        ul.summary-list>li>a {
            padding: 10px 0;
            display: inline-block;
            color: #818181;
        }

        ul.summary-list>li {
            border-right: 1px solid #eaeaea;
        }

        ul.summary-list>li:last-child {
            border-right: none;
        }

        .activity {
            width: 100%;
            float: left;
            margin-bottom: 10px;
        }

        .activity.alt {
            width: 100%;
            float: right;
            margin-bottom: 10px;
        }

        .activity span {
            float: left;
        }

        .activity.alt span {
            float: right;
        }

        .activity span,
        .activity.alt span {
            width: 45px;
            height: 45px;
            line-height: 45px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            background: #eee;
            text-align: center;
            color: #fff;
            font-size: 16px;
        }

        .activity.terques span {
            background: #8dd7d6;
        }

        .activity.terques h4 {
            color: #8dd7d6;
        }

        .activity.purple span {
            background: #b984dc;
        }

        .activity.purple h4 {
            color: #b984dc;
        }

        .activity.blue span {
            background: #90b4e6;
        }

        .activity.blue h4 {
            color: #90b4e6;
        }

        .activity.green span {
            background: #aec785;
        }

        .activity.green h4 {
            color: #aec785;
        }

        .activity h4 {
            margin-top: 0;
            font-size: 16px;
        }

        .activity p {
            margin-bottom: 0;
            font-size: 13px;
        }

        .activity .activity-desk i,
        .activity.alt .activity-desk i {
            float: left;
            font-size: 18px;
            margin-right: 10px;
            color: #bebebe;
        }

        .activity .activity-desk {
            margin-left: 70px;
            position: relative;
        }

        .activity.alt .activity-desk {
            margin-right: 70px;
            position: relative;
        }

        .activity.alt .activity-desk .panel {
            float: right;
            position: relative;
        }

        .activity-desk .panel {
            background: #F4F4F4;
            display: inline-block;
        }


        .activity .activity-desk .arrow {
            border-right: 8px solid #F4F4F4 !important;
        }

        .activity .activity-desk .arrow {
            border-bottom: 8px solid transparent;
            border-top: 8px solid transparent;
            display: block;
            height: 0;
            left: -7px;
            position: absolute;
            top: 13px;
            width: 0;
        }

        .activity-desk .arrow-alt {
            border-left: 8px solid #F4F4F4 !important;
        }

        .activity-desk .arrow-alt {
            border-bottom: 8px solid transparent;
            border-top: 8px solid transparent;
            display: block;
            height: 0;
            right: -7px;
            position: absolute;
            top: 13px;
            width: 0;
        }

        .activity-desk .album {
            display: inline-block;
            margin-top: 10px;
        }

        .activity-desk .album a {
            margin-right: 10px;
        }

        .activity-desk .album a:last-child {
            margin-right: 0px;
        }
    </style>
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
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>
    <!-- End Top Bar -->

    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a style="text-decoration: none" href="/" class="logo d-flex align-items-center">
                <h1>Bantu Mereka<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar" style="padding-right: 75px">
                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><a href="/#progam">Program</a></li>
                    <li><a href="/#recent-posts">Blogspot</a></li>
                    <li><a href="/#testimonials">Rating</a></li>
                    @auth
                        <li class="dropdown" style="margin-right: -27px"><a href="#"
                                style="text-decoration: none"><span>{{ auth()->user()->username }}</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                @can('admin')
                                    <li><a href="/dashboard" class="bi bi-easel2-fill"
                                            style="padding-right: 60px; text-decoration: none">
                                            Administrator</a></li>
                                    <hr style="border: 2px; solid black;">
                                @endcan

                                <li><a href="/profile" class="bi bi-person-fill"
                                        style="padding-right: 120px; text-decoration: none"> Profil</a>
                                </li>
                                <li><a href="/ubahpassword" class="bi bi-key-fill"
                                        style="padding-right: 45px; text-decoration: none">Ubah
                                        Password</a></li>
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
    <main id="main">
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="margin-top: -1px">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-7 text-center">
                            <h2>Berbagi Untuk Memberi</h2>
                            <p style="font-weight: 400">"Tidaklah seseorang menjadi miskin karena bersedekah.
                                Barangsiapa yang mau menjaga diri
                                dari
                                kekikiran, Allah akan menolongnya menjaga hartanya. Barangsiapa yang mau berlindung dari
                                keserakahan, Allah akan menolongnya mencukupi kebutuhan-kebutuhannya." (HR. Muslim)</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav style="margin-top: -22px">
                <div class="container">
                    <ol>
                        <li><a style="text-decoration: none" href="/">Home</a></li>
                        <li><a style="text-decoration: none" href="/profile">Profil Donatur</a></li>
                        <li>Riwayat Donasi</li>
                    </ol>
                </div>
            </nav>
        </div>
        <!-- End Breadcrumbs -->

        <section id="profile" class="profile">
            <div class="container bootstrap snippets bootdey">
                <div class="row">
                    <div class="profile-nav col-md-3">
                        <div class="panel">
                            <div class="user-heading round">
                                @if (auth()->user()->gambar)
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('storage/' . auth()->user()->gambar) }}"
                                            alt="">
                                    </a>
                                @else
                                    <a href="#">
                                        <img class="img-fluid"
                                            src="data:image/png;base64,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"
                                            alt="">
                                    </a>
                                @endif

                                <h1>{{ ucwords(auth()->user()->name) }}</h1>
                                <p>{{ auth()->user()->email }}</p>
                            </div>

                            <ul class="nav nav-pills nav-stacked">
                                <li style="width: 100%"><a href="/profile"> <i class="fa fa-user"></i>
                                        Profil</a></li>
                                <li style="width: 100%"><a href="/programyangdiikuti"> <i class="fa fa-diamond"></i> Donasi Yang Diikuti
                                        <span class="label pull-right r-activity"
                                            style="background: #008374">{{ $program->count() }}</span></a></li>
                                <li class="active" style="width: 100%"><a href="#"> <i
                                            class="fa fa-handshake-o"></i>
                                        Transaksi Saya <span class="label pull-right r-activity"
                                            style="background: #008374">{{ $donasi->count() }}</span></a></li>
                                <li style="width: 100%"><a href="/penggalangandanasaya"> <i class="fa fa-university"></i>
                                        Penggalangan Dana Saya <span class="label pull-right r-activity"
                                            style="background: #008374">{{ $my->count() }}</span></a></li>
                                <li style="width: 100%"><a href="/editprofile"> <i class="fa fa-edit"></i> Edit
                                        profile</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="profile-info col-md-9">
                        <section id="portfolio-details" class="portfolio-details">
                            <div data-aos="fade-up">
                                <div class="d-flex justify-content-start gy-4">
                                    <div class="col-lg-12">
                                        <div class="portfolio-isotope" data-portfolio-filter="*"
                                            data-portfolio-layout="masonry" data-portfolio-sort="original-order"
                                            data-aos="fade-up" data-aos-delay="100">
                                            <div>
                                                <ul class="portfolio-flters">
                                                    <li data-filter="*" class="filter-active">All</li>
                                                    <li data-filter=".filter-app">Sudah Terbayar</li>
                                                    <li data-filter=".filter-product">
                                                        Belum Terbayar</li>
                                                    <li data-filter=".filter-batal">Batal</li>
                                                </ul>
                                            </div>

                                            <div class="row gy-4 portfolio-container">
                                                @if ($donasi->count() == 0)
                                                    <h1 class="text-center">Belum ada riwayat donasi</h1>
                                                @else
                                                    @foreach ($donasi as $don)
                                                        @if ($don->status == 2)
                                                            <div
                                                                class="portfolio-description portfolio-item filter-app">
                                                                <div class="portfolio-wrap container"
                                                                    style="width: 100%">
                                                                    <div class="portfolio-info my-3">
                                                                        <a href="/detailtransaksi/{{ $don->slug }}"
                                                                            style="text-decoration: none; color: black">
                                                                            <div class="card container py-3 "
                                                                                style="border-radius: 5px; background-color: #F1F1F1; max-width: 100%;">
                                                                                <div class="row">
                                                                                    <div class="col-lg-11">
                                                                                        <h4>{{ $don->program->nama }}
                                                                                        </h4>
                                                                                        <span>{{ $don->doa }}</span>
                                                                                        <p>Rp
                                                                                            {{ number_format($don->nominal, 2, ',', '.') }}
                                                                                        </p>
                                                                                        <small>{{ \Carbon\Carbon::parse($don->updated_at)->translatedFormat('l, d F Y H:i') }}</small>
                                                                                    </div>
                                                                                    <div class="col-lg-1">
                                                                                        <i class="bi bi-clipboard-check text-success fs-1"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif ($don->status == 1)
                                                            <div
                                                                class="portfolio-description portfolio-item filter-product">
                                                                <div class="portfolio-wrap container"
                                                                    style="width: 100%">
                                                                    <div class="portfolio-info my-3">
                                                                        <a href="/detaildonasi/{{ $don->slug }}"
                                                                            style="text-decoration: none; color: black">
                                                                            <div class="card container py-3 "
                                                                                style="border-radius: 5px; background-color: #F1F1F1; max-width: 100%;">
                                                                                <div class="row">
                                                                                    <div class="col-lg-11">
                                                                                        <h4>{{ $don->program->nama }}
                                                                                        </h4>
                                                                                        <span>{{ $don->doa }}</span>
                                                                                        <p>Rp
                                                                                            {{ number_format($don->nominal, 2, ',', '.') }}
                                                                                        </p>
                                                                                        <small>{{ \Carbon\Carbon::parse($don->updated_at)->translatedFormat('l, d F Y H:i') }}</small>
                                                                                    </div>
                                                                                    <div class="col-lg-1">
                                                                                        <i class="bi bi-clipboard-pulse text-warning fs-1"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div
                                                                class="portfolio-description portfolio-item filter-batal">
                                                                <div class="portfolio-wrap container"
                                                                    style="width: 100%">
                                                                    <div class="portfolio-info my-3">
                                                                        <a href="/detailtransaksi/{{ $don->slug }}"
                                                                            style="text-decoration: none; color: black">
                                                                            <div class="card container py-3 "
                                                                                style="border-radius: 5px; background-color: #F1F1F1; max-width: 100%;">
                                                                                <div class="row">
                                                                                    <div class="col-lg-11">
                                                                                        <h4>{{ $don->program->nama }}
                                                                                        </h4>
                                                                                        <span>{{ $don->doa }}</span>
                                                                                        <p>Rp
                                                                                            {{ number_format($don->nominal, 2, ',', '.') }}
                                                                                        </p>
                                                                                        <small>{{ \Carbon\Carbon::parse($don->updated_at)->translatedFormat('l, d F Y H:i') }}</small>
                                                                                    </div>
                                                                                    <div class="col-lg-1">
                                                                                        <i class="bi bi-clipboard-x text-danger fs-1"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>

    </main>
    {{-- End Content --}}

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>Bantu Mereka</span>
                    </a>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                        valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        A108 KaliKepiting <br>
                        Surabaya, SBY 60237<br>
                        indonesia <br><br>
                        <strong>Phone:</strong> +62 8331 2331 57716<br>
                        <strong>Email:</strong> unairbantumereka@gmail.com<br>
                    </p>

                </div>

            </div>
        </div>

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

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

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
