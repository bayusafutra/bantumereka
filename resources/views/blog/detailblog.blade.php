@extends('layouts.dashboard')
@section('erga')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
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
                        <li><a href="/blogspot">Blogspot</a></li>
                        <li>Berita Program: {{ ucwords($berita->program->nama) }}</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Details Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <article class="blog-details">
                            <div class="post-img">
                                <img src="{{ asset('storage/' . $berita->gambar) }}" style="width: 850px" alt=""
                                    class="img-fluid">
                            </div>
                            <h2 class="title">{{ $berita->judul }}</h2>
                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="blog-details.html">{{ ucwords($berita->user->name) }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-details.html"><time
                                                datetime="2020-01-01">{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('l, d F Y') }}</time></a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                            href="blog-details.html">{{ $komentar->count() }} Komentar</a></li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                {!! $berita->kontent !!}
                            </div>

                            <div class="meta-bottom">

                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    <li><a href="#">{{ ucwords($berita->kategori->nama) }}</a></li>
                                </ul>
                            </div><!-- End meta bottom -->

                        </article>

                        <div class="comments">
                            <h4 class="comments-count">{{ $komentar->count() }} Komentar</h4>

                            @if ($komentar->count() == 0)
                                <div id="comment-1" class="comment">
                                    <div class="d-flex">
                                        <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt="">
                                        </div>
                                        <div>
                                            <h5>Belum ada komentar pada berita ini!</h5>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @foreach ($komentar as $kom)
                                    <div id="comment-1" class="comment">
                                        <div class="d-flex">
                                            @if ($kom->user->gambar)
                                                <div class="comment-img"><img
                                                        src="{{ asset('storage/' . $kom->user->gambar) }}" alt="">
                                            @else
                                            <div class="comment-img"><img src="https://cdn-icons-png.flaticon.com/512/21/21104.png" alt="">
                                            @endif
                                        </div>
                                        <div>
                                            <h5>{{ ucwords($kom->user->name) }}</h5>
                                            <time
                                                datetime="2020-01-01">{{ \Carbon\Carbon::parse($kom->created_at)->translatedFormat('l, d F Y') }}
                                            </time>
                                            <p>
                                                {{ $kom->comment }}
                                            </p>
                                        </div>
                                    </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="reply-form">

                            <h4>Berikan Komentar</h4>
                            <p>Kesan dan pesan anda untuk berita ini sangat berarti</p>
                            <form action="/comment" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col form-group">
                                        <input type="hidden" name="program" value="{{ $berita->program->id }}">
                                        <textarea name="comment" class="input--style-5" style="width: 100%" placeholder="Tuliskan komentar anda di sini"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                            </form>
                        </div>
                    </div><!-- End blog comments -->
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-item categories">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h3 class="sidebar-title">Kategori Berita</h3>
                                </div>
                                @if (auth()->check())
                                    <div class="col-lg-2">
                                        @if (auth()->user()->id == $berita->user->id)
                                            <a href="/editblog/{{ $berita->slug }}" class="btn"
                                                style="background-color: #65dc20" title="Edit Berita"><i
                                                    class="bi bi-pencil-square fs-5"></i></a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            <ul class="mt-3">
                                <div class="row">
                                    @foreach ($kategori as $kat)
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <li><a href="#">{{ ucwords($kat->nama) }}</a></li>
                                                </div>
                                                <div class="col-lg-3">
                                                    <span style="color: gray">({{ $kat->berita->count() }})</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </ul>
                        </div><!-- End sidebar categories-->

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Berita Lainnya</h3>

                            <div class="mt-3">


                                @foreach ($artikel as $art)
                                    <div class="post-item mt-3">
                                        <img src="{{ asset('storage/' . $art->gambar) }}" style="height: 50px"
                                            alt="">
                                        <div>
                                            {{-- <h1>{{ $art->kategori->nama }}</h1> --}}
                                            <h4><a href="/detailberita/{{ $art->slug }}">{{ ucwords($art->judul) }}</a>
                                            </h4>
                                            <time
                                                datetime="2020-01-01">{{ \Carbon\Carbon::parse($art->created_at)->translatedFormat('l, d F Y') }}</time>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div><!-- End sidebar recent posts-->

                    </div>

                    <div class="portfolio-details mt-5">
                        <div class="portfolio-info">
                            <div class="col-lg-10">
                                <h3>Informasi Program</h3>
                            </div>
                            <ul>
                                <li>
                                    <h4><a
                                            href="/detailprogram/{{ $berita->program->slug }}">{{ ucwords($berita->program->nama) }}</a>
                                    </h4>
                                </li>
                                <li>
                                    <h2>Rp {{ number_format($berita->program->danaskrg, 2, ',', '.') }}</h2>
                                </li>
                                <li>
                                    <div class="progress" role="progressbar" aria-label="Example 100px high"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                            title="Rp{{ $berita->program->danaskrg }}"
                                            style="width: {{ ($berita->program->danaskrg / $berita->program->targetdana) * 100 }}%">
                                        </div>
                                    </div>
                                    <div class="count d-flex justify-content-between">
                                        <div class="col">
                                            <small>{{ $donatur->count() }} donatur</small>
                                        </div>
                                        <div class="col text-end">
                                            <small>{{ \Carbon\Carbon::parse($berita->program->deadline)->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </li>
                                <li><strong>Kategori Program</strong>
                                    <span>{{ $berita->program->kategori->nama }}</span>
                                </li>
                                <li><strong>Pembuat Donasi</strong> <span>{{ $berita->program->user->name }}</span>
                                </li>
                                <li><strong>Batas Akhir Donasi</strong>
                                    <span>{{ \Carbon\Carbon::parse($berita->program->deadline)->translatedFormat('l, d F Y') }}</span>
                                </li>
                                <li><strong>Target Donasi</strong>Rp
                                    {{ number_format($berita->program->targetdana, 2, ',', '.') }}
                                </li>

                                @if ($berita->program->status == 2)
                                    <li><a href="/donasi/{{ $berita->program->slug }}"
                                            class="btn btn-light btn-lg align-self-start"
                                            style="background-color: #008374; color: white; padding: 12px 31px 12px 31px; font-family: sans-serif; text-transform: none">Donasi
                                            Sekarang</a></li>
                                @else
                                    @if ($berita->program->status == 1)
                                        <li><span class="badge"
                                                style="background-color: #df840c; color: white; padding: 12px 31px 12px 31px; font-family: sans-serif; text-transform: none">Menunggu
                                                Verifikasi Admin</span></li>
                                    @elseif ($berita->program->status == 3)
                                        <li><span class="badge"
                                                style="background-color: #df840c; color: white; padding: 12px 31px 12px 31px; font-family: sans-serif; text-transform: none">Program
                                                di Non-Aktifkan</span></li>
                                    @elseif ($berita->program->status == 4)
                                        <li><span class="badge"
                                                style="background-color: #df840c; color: white; padding: 12px 31px 12px 31px; font-family: sans-serif; text-transform: none">Program
                                                di Batalkan</span></li>
                                    @else
                                        <li><span class="badge"
                                                style="background-color: #df840c; color: white; padding: 12px 31px 12px 31px; font-family: sans-serif; text-transform: none">Program
                                                Selesai</span></li>
                                    @endif
                                @endif

                                @if ($berita->program->status == 2 || $berita->program->status == 5)
                                    <li>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                                            class="btn btn-light btn-lg align-self-start"
                                            style="background-color: #008374; color: white; padding: 12px 51px 12px 51px; font-family: sans-serif"><i
                                                class="bi bi-share-fill"></i> Bagikan
                                        </button>
                                        <div class="modal fade" id="exampleModal1" tabindex="-1"
                                            aria-labelledby="exampleModalLabel">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content"
                                                    style="-moz-border-radius: 10px; border-radius: 10px; -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15); -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15); box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15); width: 1100px">
                                                    <div class="modal-header" style="background-color: black">
                                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                                                            Bagikan Program Donasi ini</h1>
                                                        <button type="button" class="btn-close"
                                                            style="background-color: white" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body d-flex align-items-center mb-3"
                                                        style="height: 130px; width: 475px">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <span style="font-weight: 800">Salin link URL dibawah
                                                                    ini!</span>
                                                            </div>
                                                            <div class="col-11">
                                                                <input type="text" style="width: 100%"
                                                                    class="input--style-5"
                                                                    value="http://127.0.0.1:8000/detailprogram/{{ $berita->program->slug }}"
                                                                    id="copyText" readonly>
                                                            </div>
                                                            <div class="col-1">
                                                                <button class="btn" id="copyBtn"><i
                                                                        class="bi bi-files fs-2"
                                                                        style="display: flex; align-items: center; justify-content: center; margin-left: -15px"></i></button>
                                                            </div>
                                                        </div>

                                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                                                        <script>
                                                            const copyBtn = document.getElementById('copyBtn')
                                                            const copyText = document.getElementById('copyText')

                                                            copyBtn.onclick = () => {
                                                                copyText.select(); // Selects the text inside the input
                                                                document.execCommand('copy'); // Simply copies the selected text to clipboard
                                                                Swal.fire({ //displays a pop up with sweetalert
                                                                    icon: 'success',
                                                                    title: 'Link URL berhasil disalin',
                                                                    showConfirmButton: false,
                                                                    timer: 1000
                                                                });
                                                            }
                                                        </script>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section><!-- End Blog Details Section -->
    </main>
@endsection
