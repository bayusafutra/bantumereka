@extends('layouts.dashboard')
@section('erga')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Detail Program</h2>
                            <p>Memberi adalah sebuah kebahagiaan. Memberi adalah cara terbaik untuk menciptakan hubungan
                                yang berarti. Berbagi itu seperti membuka jendela dunia baru yang penuh dengan kebaikan dan
                                keindahan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li><a href="/programdonasi">Program Donasi Bantu Mereka</a></li>
                        <li>Detail Program</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container" data-aos="fade-up">

                <div class="position-relative h-100">
                    <div class="slides-1 portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $program->gambar) }}" alt="">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    {{-- <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div> --}}

                </div>

                <div class="row justify-content-between gy-4 mt-4">

                    <div class="col-lg-8">
                        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                            data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

                            <div>
                                <ul class="portfolio-flters">
                                    <li data-filter=".filter-app" class="filter-active">Informasi Donasi</li>
                                    <li data-filter=".filter-product" style="padding-left: 100px">Rincian Donasi</li>
                                </ul>
                            </div>

                            <div class="row gy-4 portfolio-container">

                                <div class="portfolio-description portfolio-item filter-app">
                                    <h2>{{ ucwords($program->nama) }}</h2>

                                    <div class="testimonial-item">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            {{ $program->deskripsi }}
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <div>
                                            @if ($program->user->gambar)
                                                <img src="{{ asset('storage/' . $program->user->gambar) }}"
                                                    class="testimonial-img" alt="">
                                            @else
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAb1BMVEX///8AAACKiorm5uZ/f3/s7OzZ2dlhYWGEhISHh4fh4eHy8vKCgoLHx8f19fV5eXlcXFygoKBISEi+vr6wsLATExMmJiaTk5MbGxtDQ0M0NDRTU1Nzc3PS0tKtra2bm5stLS0iIiJOTk66urpra2u9lQk+AAAFVklEQVR4nO2di1riQAxGGRBQKoiKykXw+v7PuLbdroUWWmj+/Gk35wWc81HnkkkyvR6J7c16OWD9cTyTl/fww4Q9DhDR4jMkfLJHgmH6HTIe2WMBMOmHHOzRiBMtNnm/sGYPSJjt61PYZ84ekiTR/XMo8MwelRy5yWWPjiyHf5e+MsbssUkwnR/Ti3llD68ps93HKb8fllP2GJswuanQS1jt2vrfePrz3OPzbcse7fnsjs4uR5i36qcc9KuNSni6+hqyh16LydVFfimbhXnJ4V0Dv4S56RPHrLFfwv2MLXKMLxG/mC+2SinD+utDNRuDU+tW0C/G3G5nJywYwhtbaZ83ccEQ+mypPC8AwRBu2Vq/LCCCP8sGWyxjChI0E2+MljDDJxubuCNRGBFMBDpw32iMhe/03KPgeRgIOcptRstZsAV7K7DhA1twBBYMYUQ2vCxicQ7szdsn3HDDFYzggiFEVEPsYpjCPSnKHwuL7KiGmGPTPi9UwybB0brcuaEbuqEbuqEbumG4ckM3bMStG7qhG7ohnOvOG/pvKAH3KtgN3dAN/w/Dazd0Qzc8Sa2KAzd0w84b3rihG7qhG3bcEJlbmvFNNVQQDE9MwXsNQ2JCzXCsIhjCmJTurZHTlsHJbdP5RFM4lRcaK0UGZ/etkdOWwclt6/5XKl1xeApOxf5M0ZBUGbxWE2S1I3pVM2Q1QUEUjpbDShPWm2pYyewDNUNa7brWVLOmNVmQ7DFwCl7fM619G6/0SaNiJoZXNTNRMiQW6B02CgTBE4QXkKasiIb4+soYZsAUXeacwix21plqqJXAKoZMQZVdDbcQGNW3JQ+354BGJINb6axw+cS9eur1HuGG7O4mM1z7nZQlvQGfTCPB4/A78aJPUPzOdOjZlDyTxpT0Ihfkg63XQ5dccIstUrDbGm5TjBTs+YLdYSgBasiWS0C2GaL3wUpARk25nVsykP+IRl4TeoAJ2vhIkfeIVjrt4j5TIx8p7rqbffj9ZQgyNNTUG/Mj2vkJUffdhn5CTAaYmU7QKfKhYXJHyALyk42NNtA5pMOK7CBiCbJJ3xafnZPtt2vi5HuAbGK7gRBbgUg0bcGioexsam4m7Unva8ycKnLIhvf5wfwisnFTC3HSQ2RP+lZO93lks4fYndjLkD0j8q8Ni8gGhi2+2S17y2bhVu0QUUEjFxb7dN5QOlRjKkiTIF1eYu99WelUU3uPPEq/A2Fv2yZ9AWXl2ukf8olDxk4XXY8Iox59MhOOGqIKS4w8DoisljVywuh+pkL3s02QlaTvbLkYbF6bhc8UW7Nu4TPt/Cud6OIu/meK7uHC37uhy0iZBaQJ+L4K7HAGviSfO5tOsRNpyjvvpLjdKPjFbDhhqZFWV4yYuf5RcaDR9TLPt+6MM9R4yeqQK73zcKTTaKBIXylDQ689VBGNq2GNF4BPgY4Uf2Fr8erwjIz3P+r0Mqlihcpb3Nrwi1khtgAjrQ1MPTbSW4CJXgfBurxKno2H6JL0y7iT2gLMWAt8NX2JdgQz5gJfzVtjx3t0V4imLJsFchb8Bb6a58sb2Ew/2IOvycdlUYAprjRUnofzHbeaJ3gJ5udtcwZabwJIMq4fBRjYXOCruavnGGm8pYbiukYUQLNbPoKqALJmr3wUp7YAC+sbmHosj20BHvW6yKNZl0UBpnZO8BKsCluAti3w1RzUaLZxha9inBfUfIxDj/w+zvYp91LyAXK7cYom9N2w9bhh+3HD9uOG7ccN248bth83bD9u2H7csP24YfvJG+JfGmGQD+2jmshy2UuZ0nleTJeDPNTRuBs3axnLcZa8+AfDFYLTKKR4FgAAAABJRU5ErkJggg=="
                                                    class="testimonial-img" alt="">
                                            @endif
                                            <h3>{{ $program->user->name }}</h3>
                                            <h4>{{ $program->user->username }}</h4>
                                        </div>
                                    </div>

                                    <div class="portfolio-wrap container my-5">
                                        <h1 class="mt-3"
                                            style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                                            Berita terkait</h1>
                                        <div class="portfolio-info">

                                            @if ($berita->count() == 0)
                                                <h4>Belum ada berita pada program ini!</h4>
                                            @else
                                                <div class="blog">
                                                    <h3>{{ $berita[0]->judul }}</h3>
                                                    <div class="blog-details">
                                                        <div class="content">
                                                            {!! $berita[0]->kontent !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                @foreach ($berita->skip(1) as $ber)
                                                    <div class="card container py-3 mb-3"
                                                        style="border-radius: 5px; background-color: #F1F1F1">
                                                        <div class="row">
                                                            <div class="col-lg-2 d-flex align-items-center">
                                                                <a href="/detailberita/{{ $ber->slug }}">
                                                                    <img class=""
                                                                        src="{{ asset('storage/' . $ber->gambar) }}"
                                                                        style="width: 120px; height: 80px" alt="donatur">
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <a href="/detailberita/{{ $ber->slug }}"
                                                                    style="color: black">
                                                                    <h4>
                                                                        {{ $ber->judul }}
                                                                    </h4>
                                                                </a>
                                                                <p>
                                                                    <i class="bi bi-quote quote-icon-left"
                                                                        style="color: #008374"></i>
                                                                    {!! $ber->excerpt !!}
                                                                    <i class="bi bi-quote quote-icon-right"
                                                                        style="color: #008374"></i>
                                                                </p>
                                                                <small>
                                                                    {{ \Carbon\Carbon::parse($ber->created_at)->diffForHumans() }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>

                                    <div class="portfolio-wrap container my-3">
                                        <h1 class="mt-3"
                                            style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                                            Kiriman Doa</h1>
                                        <div class="portfolio-info">
                                            @if ($donatur2->count() == 0)
                                                <h4>Belum ada donatur pada program ini</h4>
                                            @else
                                                @foreach ($donatur2 as $don)
                                                    <div class="card container py-3 mb-3"
                                                        style="border-radius: 5px; background-color: #F1F1F1">
                                                        <div class="row">
                                                            <div class="col-lg-2">
                                                                @if ($don->anonim)
                                                                    <img class="rounded-circle"
                                                                        src="https://img.uxwing.com/wp-content/themes/uxwing/download/peoples-avatars-thoughts/no-profile-picture-icon.png"
                                                                        style="width: 80px; height: 80px" alt="donatur">
                                                                @else
                                                                    @if ($don->user->gambar)
                                                                        <img class="rounded-circle"
                                                                            src="{{ asset('storage/' . $don->user->gambar) }}"
                                                                            style="width: 80px; height: 80px"
                                                                            alt="donatur">
                                                                    @else
                                                                        <img class="rounded-circle"
                                                                            src="https://cdn-icons-png.flaticon.com/512/21/21104.png"
                                                                            style="width: 80px; height: 80px"
                                                                            alt="donatur">
                                                                    @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <h4>
                                                                    {{ $don->user->name }}
                                                                </h4>
                                                                <p>
                                                                    <i class="bi bi-quote quote-icon-left"
                                                                        style="color: #008374"></i>
                                                                    {{ $don->doa }}
                                                                    <i class="bi bi-quote quote-icon-right"
                                                                        style="color: #008374"></i>
                                                                </p>
                                                                <small>
                                                                    {{ \Carbon\Carbon::parse($don->paidTime)->diffForHumans() }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="portfolio-description portfolio-item filter-product">
                                    <h2>{{ ucwords($program->nama) }}</h2>

                                    <div class="testimonial-item">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            {{ $program->deskripsi }}
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <div>
                                            @if ($program->user->gambar)
                                                <img src="{{ asset('storage/' . $program->user->gambar) }}"
                                                    class="testimonial-img" alt="">
                                            @else
                                                <img src="data:image/png;base64,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"
                                                    class="testimonial-img" alt="">
                                            @endif
                                            <h3>{{ $program->user->name }}</h3>
                                            <h4>{{ $program->user->username }}</h4>
                                        </div>
                                    </div>

                                    <div class="portfolio-wrap container my-5">
                                        <h1 class="mt-3"
                                            style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                                            Donatur</h1>
                                        <div class="portfolio-info">
                                            @if ($donatur2->count() == 0)
                                                <h4>Belum ada donatur pada program ini</h4>
                                            @else
                                                @foreach ($donatur as $don)
                                                    <div class="card container py-3 mb-3"
                                                        style="border-radius: 5px; background-color: #F1F1F1">
                                                        <div class="row">
                                                            <div class="col-lg-2">
                                                                @if ($don->anonim)
                                                                    <img class="rounded-circle"
                                                                        src="https://img.uxwing.com/wp-content/themes/uxwing/download/peoples-avatars-thoughts/no-profile-picture-icon.png"
                                                                        style="width: 80px; height: 80px" alt="donatur">
                                                                @else
                                                                    @if ($don->user->gambar)
                                                                        <img class="rounded-circle"
                                                                            src="{{ asset('storage/' . $don->user->gambar) }}"
                                                                            style="width: 80px; height: 80px"
                                                                            alt="donatur">
                                                                    @else
                                                                        <img class="rounded-circle"
                                                                            src="https://cdn-icons-png.flaticon.com/512/21/21104.png"
                                                                            style="width: 80px; height: 80px"
                                                                            alt="donatur">
                                                                    @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <h4>
                                                                    {{ $don->user->name }}
                                                                </h4>
                                                                <span class="mb-3"
                                                                    style="font-weight: 400; font-family: sans-serif">
                                                                    Rp
                                                                    {{ number_format($don->nominal, 2, ',', '.') }}
                                                                </span>
                                                                <br>
                                                                <small>
                                                                    {{ \Carbon\Carbon::parse($don->paidTime)->diffForHumans() }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3">
                        @if (session()->has('update'))
                            <div class="row justify-content-center">
                                <div class="alert alert-success alert-dismissible text-center col-lg-11 fade show"
                                    role="alert">
                                    {{ session('update') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        <div class="portfolio-info">
                            <div class="row">
                                @if ($program->status != 1)
                                    <div class="col-lg-10">
                                    @else
                                        <div class="col-lg-9">
                                @endif
                                <h3>Informasi Program</h3>
                            </div>
                            @if (auth()->check())
                                <div class="col-lg-2">
                                    @if (auth()->user()->id == $program->user->id && $program->status != 4)
                                        <a type="button" href="/createblog/{{ $program->slug }}" class="btn"
                                            style="background-color: #61d43a" title="Buat Berita Program"><i
                                                class="bi bi-file-richtext"></i></a>
                                    @endif
                                </div>
                                <div class="col-lg-1">
                                    @if (auth()->user()->id == $program->user->id && $program->status == 1)
                                        <button type="button" class="btn" style="background-color: #e69d30"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal" title="Edit Program"><i
                                                class="bi bi-pencil-square"></i></button>
                                    @endif
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content"
                                                style="-moz-border-radius: 10px; border-radius: 10px; -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15); -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15); box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);">
                                                <div class="modal-header" style="background-color: black">
                                                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                                                        Update Data Program Donasi</h1>
                                                    <button type="button" class="btn-close" style="background-color: white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body d-flex align-items-center"
                                                    style="height: max-content;">
                                                    <form action="/updateprogram" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <span>Masukkan field yang ingin diupdate!</span>
                                                        <input type="hidden" name="id" value="{{ $program->id }}">

                                                        <div class="form-row mt-4">
                                                            <div class="name">Nama Program</div>
                                                            <div class="value">
                                                                <div class="input-group">
                                                                    <input
                                                                        class="input--style-5 @error('nama') is-invalid @enderror"
                                                                        id="nama" name="nama" type="text"
                                                                        placeholder="ex: Tanah hongsor" required
                                                                        value="{{ old('nama', $program->nama) }}">
                                                                </div>
                                                                @error('nama')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="name">Target Dana Donasi</div>
                                                            <div class="value">
                                                                <div class="input-group">
                                                                    <input
                                                                        class="input--style-5 @error('targetdana') is-invalid @enderror"
                                                                        name="targetdana" type="text"
                                                                        placeholder="ex: Rp1.000.000,00" id="txtExampleBoxOne"
                                                                        onkeypress="return number(event )"
                                                                        onBlur="formatCurrency(this, 'Rp ', 'blur');"
                                                                        onkeyup="formatCurrency(this, 'Rp ');"
                                                                        data-inputmask="'alias': 'numeric', 'autoGroup' :true, 'digitsOptional':false, 'removeMaskOnSubmit' : true, 'autoUnmask' : true"
                                                                        required
                                                                        value="{{ old('targetdana', number_format($program->targetdana, 2, ',', '.')) }}">
                                                                </div>
                                                                @error('targetdana')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="name">Tenggat Donasi</div>
                                                            <div class="value">
                                                                <div class="input-group">
                                                                    <input
                                                                        class="form-control @error('deadline') is-invalid @enderror"
                                                                        name="deadline" style="background-color: #E5E5E5"
                                                                        type="date" min="{{ date('Y-m-d') }}" required
                                                                        value="{{ old('deadline', $program->deadline) }}">
                                                                </div>
                                                                @error('deadline')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="name">Deskripsi Program</div>
                                                            <div class="value">
                                                                <div class="input-group">
                                                                    <input
                                                                        class="input--style-5 @error('deskripsi') is-invalid @enderror"
                                                                        type="text" name="deskripsi" id="deskripsi"
                                                                        placeholder="ex: Lorem ipsum dolor sit amet." required
                                                                        value="{{ old('deskripsi', $program->deskripsi) }}">
                                                                </div>
                                                                @error('deskripsi')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="name" style="padding-bottom: 55px">Gambar</div>
                                                            <div class="value">
                                                                <div class="input-group">
                                                                    <input type="hidden" name="oldImage"
                                                                        value="{{ $program->gambar }}">
                                                                    <input
                                                                        class="input--style-4 @error('gambar') is-invalid @enderror"
                                                                        type="file" name="gambar">
                                                                </div>
                                                                @error('gambar')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                                <small style="color: red">* bersifat optional bila ingin
                                                                    mengubah gambar program</small>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-lg text-white"
                                                        style="background-color: #62270a; padding: 4px 10px 4px 10px; border-radius: 5px"
                                                        data-bs-dismiss="modal">Kembali</button>
                                                    <button type="submit" class="btn text-white"
                                                        style="background-color: #07164e; padding: 7px 10px 7px 10px;">Edit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <ul>
                            <li>
                                <h2>Rp {{ number_format($program->danaskrg, 2, ',', '.') }}</h2>
                            </li>
                            <li>
                                <div class="progress" role="progressbar" aria-label="Example 100px high"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                        title="Rp{{ $program->danaskrg }}"
                                        style="width: {{ ($program->danaskrg / $program->targetdana) * 100 }}%"></div>
                                </div>
                                <div class="count d-flex justify-content-between">
                                    <div class="col">
                                        <small>{{ $donatur->count() }} donatur</small>
                                    </div>
                                    <div class="col text-end">
                                        <small>{{ \Carbon\Carbon::parse($program->deadline)->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </li>
                            <li><strong>Kategori Program</strong> <span>{{ $program->kategori->nama }}</span></li>
                            <li><strong>Pembuat Donasi</strong> <span>{{ $program->user->name }}</span></li>
                            <li><strong>Batas Akhir Donasi</strong>
                                <span>{{ \Carbon\Carbon::parse($program->deadline)->translatedFormat('l, d F Y') }}</span>
                            </li>
                            <li><strong>Target Donasi</strong>Rp {{ number_format($program->targetdana, 2, ',', '.') }}
                            </li>

                            @if ($program->status == 2)
                                <li><a href="/donasi/{{ $program->slug }}" class="btn btn-light btn-lg align-self-start"
                                        style="background-color: #008374; color: white; padding: 12px 31px 12px 31px; font-family: sans-serif; text-transform: none">Donasi
                                        Sekarang</a></li>
                            @else
                                @if ($program->status == 1)
                                    <li><span class="badge"
                                            style="background-color: #df840c; color: white; padding: 12px 31px 12px 31px; font-family: sans-serif; text-transform: none">Menunggu
                                            Verifikasi Admin</span></li>
                                @elseif ($program->status == 3)
                                    <li><span class="badge"
                                            style="background-color: #df840c; color: white; padding: 12px 31px 12px 31px; font-family: sans-serif; text-transform: none">Program
                                            di Non-Aktifkan</span></li>
                                @elseif ($program->status == 4)
                                    <li><span class="badge"
                                            style="background-color: #df840c; color: white; padding: 12px 31px 12px 31px; font-family: sans-serif; text-transform: none">Program
                                            di Batalkan</span></li>
                                @else
                                    <li><span class="badge"
                                            style="background-color: #df840c; color: white; padding: 12px 31px 12px 31px; font-family: sans-serif; text-transform: none">Program
                                            Selesai</span></li>
                                @endif
                            @endif

                            @if ($program->status == 2 || $program->status == 5)
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
                                                                value="http://127.0.0.1:8000/detailprogram/{{ $program->slug }}"
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

                            <li class="mt-4">
                                <h2 style="font-weight: 700">5 Donatur Terbesar</h2>
                            </li>

                            @if ($donatur->count() == 0)
                                <li>
                                    <span style="font-size: 14px; font-weight: 600">
                                        <i class="bi bi-quote quote-icon-left" style="color: #008374"></i>
                                        Belum ada donatur pada program ini
                                        <i class="bi bi-quote quote-icon-right" style="color: #008374"></i>
                                    </span>
                                </li>
                            @else
                                @foreach ($donatur as $don)
                                    <li>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                @if ($don->anonim)
                                                    <img class="rounded-circle"
                                                        src="https://img.uxwing.com/wp-content/themes/uxwing/download/peoples-avatars-thoughts/no-profile-picture-icon.png"
                                                        style="width: 40px; height: 40px" alt="donatur">
                                                @else
                                                    @if ($don->user->gambar)
                                                        <img class="rounded-circle"
                                                            src="{{ asset('storage/' . $don->user->gambar) }}"
                                                            style="width: 40px; height: 40px" alt="donatur">
                                                    @else
                                                        <img class="rounded-circle"
                                                            src="https://cdn-icons-png.flaticon.com/512/21/21104.png"
                                                            style="width: 40px; height: 40px" alt="donatur">
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="col-9">
                                                <h5>
                                                    @if ($don->anonim)
                                                        {{ $don->anonim }}
                                                    @else
                                                        {{ $don->user->name }}
                                                    @endif
                                                </h5>
                                                <small style="font-weight: 700">Rp
                                                    {{ number_format($don->nominal, 2, ',', '.') }}</small>
                                                <small
                                                    class="ms-4">{{ \Carbon\Carbon::parse($don->paidTime)->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                        <hr style="border: 2px solid black;">
                                    </li>
                                @endforeach
                            @endif

                        </ul>
                    </div>
                </div>

            </div>

            </div>
        </section>
        <!-- End Portfolio Details Section -->

    </main>
    <!-- End #main -->
@endsection
@section('script')
    <script>
        function formatNumber(n) {
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function formatCurrency(input, currency, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.
            // get input value
            var input_val = input.value;
            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.selectionStart;

            // check for decimal
            if (input_val.indexOf(",") >= 0) {
                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(",");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = currency + left_side + "," + right_side;
            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = currency + input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ",00";
                }
            }

            // send updated string to input
            input.value = input_val;

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input.setSelectionRange(caret_pos, caret_pos);

            function number(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }
        }
    </script>
@endsection
