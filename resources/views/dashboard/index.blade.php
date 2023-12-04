@extends('layouts.dashboard')
@section('erga')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>Selamat Datang <span>Dermawan</span></h2>
                    <p>Mari Saling Mengasihi dengan Saling Berbagi</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div>
        </div>

        <div class="icon-boxes position-relative">
            <div class="container position-relative">
                <div class="row gy-4 mt-5">

                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-newspaper"></i></div>
                            <h4 class="title"><a href="/blogspot" class="stretched-link">Blogspot</a></h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-person-workspace"></i></div>
                            <h4 class="title"><a href="/tentangkami" class="stretched-link">Tentang Kami</a></h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-gem"></i></div>
                            <h4 class="title"><a href="/programdonasi" class="stretched-link">Progam Bantuan</a></h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">

        {{-- Carousel Bantu Mereka --}}
        <section id="carousel" class="carousel d-flex justify-content-center">
            <div id="carouselExampleIndicators" class="carousel slide" style="width: 85%; height: 70%;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item img-fluid active">
                        <img src="img/poster/poster1.jpg" style="height: 700px; width: 100%" class="d-block w-80"
                            alt="...">
                    </div>
                    <div class="carousel-item img-fluid">
                        <a href="/detailprogram/LFiBpnZCcEAratpw8aPh8gwzmdJ9mP">
                            <img src="img/poster/poster2.png" style="height: 700px; width: 100%" class="d-block w-80"
                                alt="...">
                        </a>
                    </div>
                    <div class="carousel-item img-fluid">
                        <a href="/detailprogram/ZhNjZ29VSYsUKZkgrjqBa9rGpMD4XO">
                            <img src="img/poster/poster3.png" style="height: 700px; width: 100%" class="d-block w-80"
                                alt="...">
                        </a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        {{-- End Carousel Bantu Mereka --}}

        <section id="progam" class="portfolio sections-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header" style="margin-bottom: -30px">
                    <h2>Program Donasi</h2>
                    <p>Kita tidak dapat mengubah dunia secara keseluruhan, tetapi kita dapat membuat perbedaan bagi satu
                        orang</p>
                </div>
                <div class="text-center">
                    <a class="btn btn-light"
                        style="background-color: #008374; color: white; padding: 12px; font-family: sans-serif"
                        href="/createprogram">Buat Progam Baru</a>
                </div>

                <div class="portfolio-isotope" style="margin-top: 15px" data-portfolio-filter="*"
                    data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up"
                    data-aos-delay="100">
                    <div>
                        <ul class="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($kategori as $kat)
                                <li data-filter=".{{ $kat->slug }}">{{ ucwords($kat->nama) }}</li>
                            @endforeach
                        </ul><!-- End Portfolio Filters -->
                    </div>

                    <div class="row gy-4 portfolio-container">
                        @foreach ($program as $prog)
                            <div class="col-xl-4 col-md-6 portfolio-item {{ $prog->kategori->slug }}">
                                <div class="portfolio-wrap">
                                    <a href="{{ asset('storage/' . $prog->gambar) }}" data-gallery="portfolio-gallery-app"
                                        class="glightbox"><img src="{{ asset('storage/' . $prog->gambar) }}"
                                            style="height: 311px; width: 420px" class="img-fluid" alt=""></a>
                                    <div class="portfolio-info">
                                        <div class="nama" style="height: 65px">
                                            <h4><a href="/detailprogram/{{ $prog->slug }}"
                                                    title="lihat detail program">{{ ucwords($prog->nama) }}</a>
                                            </h4>
                                        </div>
                                        <p>{{ \Carbon\Carbon::parse($prog->deadline)->diffForHumans() }}</p>
                                        <strong>Rp {{ number_format($prog->danaskrg, 2, ',', '.') }}</strong>
                                        <div class="progress" role="progressbar" aria-label="Example 100px high"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                                            style="height: 30px">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                style="width: {{ ($prog->danaskrg / $prog->targetdana) * 100 }}%"></div>
                                        </div>
                                        <small>terkumpul dari Rp
                                            {{ number_format($prog->targetdana, 2, ',', '.') }}</small>
                                        <div class="text-center mt-3">
                                            <a class="btn"
                                                style="background-color: #008374; color: white; padding: 12px; font-family: sans-serif"
                                                href="/detailprogram/{{ $prog->slug }}">Lihat Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-posts" class="recent-posts sections-bg" style="background-color: white">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Recent Blog Posts</h2>
                    <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto
                        accusamus fugit aut qui distinctio</p>
                </div>

                <div class="row gy-4">

                    @if ($berita->count() == 0)
                        <h2 class="text-center">Berita Tidak Ditemukan</h2>
                    @else
                        @foreach ($berita as $ber)
                            <div class="col-xl-4 col-md-6">
                                <article>

                                    <div class="post-img">
                                        <img src="{{ asset('storage/' . $ber->gambar) }}"
                                            style="height: 300px; width: 420px" alt="" class="img-fluid">
                                    </div>

                                    <p class="post-category">{{ $ber->kategori->nama }}</p>

                                    <div class="judul" style="height:100px">
                                        <h2 class="title">
                                            <a href="/detailberita/{{ $ber->slug }}">{{ ucwords($ber->judul) }}</a>
                                        </h2>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        @if ($ber->user->gambar)
                                            <img src="{{ asset('storage/' . $ber->user->gambar) }}" alt=""
                                                class="img-fluid post-author-img flex-shrink-0">
                                        @else
                                            <img src="https://cdn-icons-png.flaticon.com/512/21/21104.png" alt=""
                                                class="img-fluid post-author-img flex-shrink-0">
                                        @endif
                                        <div class="post-meta">
                                            <p class="post-author">{{ ucwords($ber->user->name) }}</p>
                                            <p class="post-date">
                                                <time
                                                    datetime="2022-01-01">{{ \Carbon\Carbon::parse($ber->created_at)->translatedFormat('l, d F Y') }}</time>
                                            </p>
                                        </div>
                                    </div>

                                </article>
                            </div>
                        @endforeach
                    @endif

                </div><!-- End recent posts list -->

            </div>
        </section><!-- End Recent Blog Posts Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients" style="background-color: #F6F6F6">
            <div class="container" data-aos="zoom-out">

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="img/clients/client-1.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="img/clients/client-2.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="img/clients/client-3.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="img/clients/client-4.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="img/clients/client-5.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="img/clients/client-6.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="img/clients/client-7.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="img/clients/client-8.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials" style="background-color: #F6F6F6">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Review Pengguna Website Bantu Mereka</h2>
                    <p>Terima kasih atas penilaian serta saran dan masukannya</p>
                </div>

                <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        @foreach ($rating as $rat)
                            <div class="swiper-slide">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item" style="height: 200px">
                                        <div class="d-flex align-items-center">
                                            @if ($rat->user->gambar)
                                                <img src="{{ asset('storage/'.$rat->user->gambar) }}" class="testimonial-img flex-shrink-0" alt="">
                                            @else
                                                <img src="https://cdn-icons-png.flaticon.com/512/21/21104.png" class="testimonial-img flex-shrink-0" alt="">
                                            @endif
                                            <div>
                                                <h3>{{ ucwords($rat->user->name) }}</h3>
                                                <h4>{{ $rat->user->username }}</h4>
                                                <div class="stars">
                                                    @for ($i = 1; $i <= $rat->rating; $i++)
                                                        <i class="bi bi-star-fill"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                                {{ $rat->comment }}
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

        @auth
            <!-- ======= Contact Section ======= -->
            <section id="rating" class="contact">
                <div class="container" data-aos="fade-up">

                    <div class="section-header">
                        <h2>Rating Website</h2>
                        <p>
                            Pesan dan masukan anda sangat berarti dalam pengembangan website kami
                        </p>
                    </div>

                    @if (session()->has('success'))
                        <div class="row justify-content-center">
                            <div class="alert alert-success alert-dismissible text-center col-lg-7 fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="row gx-lg-0 gy-4">

                        <div class="col-lg-4">

                            <div class="info-container d-flex flex-column align-items-center justify-content-center">
                                <div class="info-item d-flex">
                                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                                    <div>
                                        <h4>Location:</h4>
                                        <p>Jl. Airlangga No.4 - 6, Airlangga, Kec. Gubeng, Kota SBY, Jawa Timur 60115</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <div class="info-item d-flex">
                                    <i class="bi bi-envelope flex-shrink-0"></i>
                                    <div>
                                        <h4>Email:</h4>
                                        <p>unairbantumereka@gmail.com</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <div class="info-item d-flex">
                                    <i class="bi bi-phone flex-shrink-0"></i>
                                    <div>
                                        <h4>Call:</h4>
                                        <p>+62 8331233157716</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <div class="info-item d-flex">
                                    <i class="bi bi-clock flex-shrink-0"></i>
                                    <div>
                                        <h4>Open Hours:</h4>
                                        <p>Mon-Sat: 11AM - 23PM</p>
                                    </div>
                                </div><!-- End Info Item -->
                            </div>

                        </div>

                        <div class="col-lg-8">
                            <form action="/rating" method="POST" class="rating">
                                @csrf
                                <div class="form-group mb-5">
                                    <h3>Berikan penilaian anda</h3>
                                    <div class="col">
                                        <div class="rate">
                                            <input type="radio" id="star5" class="rate" name="rating"
                                                value="5" required />
                                            <label for="star5" title="Sangat Baik">5 stars</label>
                                            <input type="radio" id="star4" class="rate" name="rating"
                                                value="4" required />
                                            <label for="star4" title="Cukup Baik">4 stars</label>
                                            <input type="radio" id="star3" class="rate" name="rating"
                                                value="3" required />
                                            <label for="star3" title="Baik">3 stars</label>
                                            <input type="radio" id="star2" class="rate" name="rating"
                                                value="2" required />
                                            <label for="star2" title="Kurang">2 stars</label>
                                            <input type="radio" id="star1" class="rate" name="rating"
                                                value="1" required />
                                            <label for="star1" title="Sangat Kurang">1 star</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="comment" rows="7" placeholder="Pesan dan Masukan" required></textarea>
                                </div>
                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>
                                <div class="text-center">
                                    <button type="submit">Kirim</button>
                                </div>
                            </form>
                        </div><!-- End Contact Form -->

                    </div>

                </div>
            </section><!-- End Contact Section -->
        @endauth

    </main><!-- End #main -->
@endsection
@section('css')
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .star-rating-complete {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rated:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ffc700;
        }

        .rated:not(:checked)>label:before {
            content: '★ ';
        }

        .rated>input:checked~label {
            color: #ffc700;
        }

        .rated:not(:checked)>label:hover,
        .rated:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rated>input:checked+label:hover,
        .rated>input:checked+label:hover~label,
        .rated>input:checked~label:hover,
        .rated>input:checked~label:hover~label,
        .rated>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
@endsection
