@extends('layouts.dashboard')
@section('erga')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Blog Details</h2>
                        <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas
                            consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione
                            sint. Sit quaerat ipsum dolorem.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Kumpulan Berita</li>
                </ol>
            </div>
        </nav>
    </div>

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-posts" class="recent-posts sections-bg" style="background-color: white">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Berita Bantu Mereka</h2>
                <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto
                    accusamus fugit aut qui distinctio</p>

                <div class="blog d-flex justify-content-center mt-5">
                    <div class="sidebar" style="width: 50%">
                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Pencarian Berita</h3>
                            <form action="/blogspot" class="mt-3">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan Judul, Kategori, atau Penulis Berita...">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-4">

                @if ($berita->count() == 0)
                    <h2 class="text-center">Berita Tidak Ditemukan</h2>
                @else
                    @foreach ($berita as $ber)
                        <div class="col-xl-4 col-md-6">
                            <article>

                                <div class="post-img">
                                    <img src="{{ asset('storage/' . $ber->gambar) }}" style="height: 300px; width: 420px"
                                        alt="" class="img-fluid">
                                </div>

                                <p class="post-category">{{ $ber->kategori->nama }}</p>

                                <div class="judul" style="height:150px">
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

            </div>

        </div>
    </section>
@endsection
