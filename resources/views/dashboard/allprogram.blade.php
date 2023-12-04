@extends('layouts.dashboard')
@section('erga')
    <main id="main">
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Mari Menggalang Dana untuk Mereka</h2>
                            <p>“Sedekah itu dapat menghapus dosa sebagaimana air itu memadamkan api.“ (HR. Tirmidzi)</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Program Donasi Bantu Mereka</li>
                    </ol>
                </div>
            </nav>
        </div>

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

                    <div class="blog d-flex justify-content-center my-5">
                        <div class="sidebar" style="width: 50%">
                            <div class="sidebar-item search-form">
                                <h3 class="sidebar-title">Pencarian Program Donasi</h3>
                                <form action="/programdonasi" class="mt-3">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan nama program donasi...">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div>
                        <ul class="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($kategori as $kat)
                                <li data-filter=".{{ $kat->slug }}">{{ ucwords($kat->nama) }}</li>
                            @endforeach
                        </ul><!-- End Portfolio Filters -->
                    </div>


                    <div class="row gy-4 portfolio-container mb-5">
                        @if ($program->count() == 0)
                            <div class="d-flex justify-content-center mt-4">
                                <h4>Program "{{ $search }}" Tidak Ditemukan</h4>
                            </div>
                        @else
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
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 30px">
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
                        @endif
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
