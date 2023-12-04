@extends('layouts.dashboard')
@section('erga')
    <main id="main">
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Mari Berdonasi untuk Mereka</h2>
                            <p>“Sedekah itu dapat menghapus dosa sebagaimana air itu memadamkan api.“ (HR. Tirmidzi)</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li><a href="/transaksisaya">Riwayat Donasi</a></li>
                        <li>Detail Transaksi</li>
                    </ol>
                </div>
            </nav>
        </div>

        <section class="sample-page">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-center">
                    <div class="col-6 grid-margin stretch-card">
                        @if (session()->has('success'))
                            <div class="row justify-content-center">
                                <div class="alert alert-success alert-dismissible text-center col-lg-11 fade show"
                                    role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="row justify-content-center">
                                <div class="alert alert-danger alert-dismissible text-center col-lg-11 fade show"
                                    role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif

                        <div class="card card-5">
                            <div class="card-heading">
                                <h2 class="title">Detail Transaksi</h2>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-6">
                                        <img class="img-fluid" src="{{ asset('storage/' . $program->gambar) }}"
                                            alt="">
                                    </div>
                                    <div class="col-6">
                                        <span>Anda berdonasi pada program</span>
                                        <strong>{{ ucwords($program->nama) }}</strong>
                                    </div>
                                </div>
                                <hr class="mb-3" style="border: 2px solid black;">

                                <div class="row d-flex justify-content-center mt-3">
                                    <div class="col-5">
                                        <strong>Nama Donatur</strong>
                                    </div>
                                    <div class="col-7">
                                        <span
                                            style="font-family:courier new; font-weight: 500">{{ $donasi->user->name }}</span>
                                    </div>

                                    <div class="col-5">
                                        <strong>Status Donatur</strong>
                                    </div>
                                    <div class="col-7">
                                        <span style="font-family:courier new; font-weight: 500">
                                            @if ($donasi->anonim)
                                                <span>Anonim <small
                                                        style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                                            font-style: italic">dengan
                                                        nama </small>{{ $donasi->anonim }}</span>
                                            @else
                                                Non Anonim
                                            @endif
                                        </span>
                                    </div>

                                    <div class="col-5">
                                        <strong>Username</strong>
                                    </div>
                                    <div class="col-7">
                                        <span
                                            style="font-family:courier new; font-weight: 500">{{ $donasi->user->username }}</span>
                                    </div>

                                    <div class="col-5">
                                        <strong>Email</strong>
                                    </div>
                                    <div class="col-7">
                                        <span
                                            style="font-family:courier new; font-weight: 500">{{ $donasi->user->email }}</span>
                                    </div>

                                    <div class="col-5">
                                        <strong>Jenis Kelamin</strong>
                                    </div>
                                    <div class="col-7">
                                        <span style="font-family:courier new; font-weight: 500">
                                            @if ($donasi->user->gender !== null)
                                                @if ($donasi->user->gender == true)
                                                    Laki-laki
                                                @else
                                                    Perempuan
                                                @endif
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>

                                    <div class="col-5">
                                        <strong>No Telepon</strong>
                                    </div>
                                    <div class="col-7">
                                        <span style="font-family:courier new; font-weight: 500">
                                            @if ($donasi->user->notelp)
                                                {{ $donasi->user->notelp }}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>

                                    <div class="col-5">
                                        <strong>Doa</strong>
                                    </div>
                                    <div class="col-7">
                                        <span style="font-family:courier new; font-weight: 500">
                                            <i class="bi bi-quote quote-icon-left" style="color: #008374"></i>
                                            {{ $donasi->doa }}
                                            <i class="bi bi-quote quote-icon-right" style="color: #008374"></i>
                                        </span>
                                    </div>

                                    <div class="col-5">
                                        <strong>Waktu Donasi</strong>
                                    </div>
                                    <div class="col-7">
                                        <span
                                            style="font-family:courier new; font-weight: 500">{{ \Carbon\Carbon::parse($donasi->created_at)->translatedFormat('l, d F Y H:i') }}</span>
                                    </div>

                                    <div class="col-5">
                                        <strong>Waktu Pembayaran</strong>
                                    </div>
                                    <div class="col-7">
                                        <span
                                            style="font-family:courier new; font-weight: 500">{{ \Carbon\Carbon::parse($donasi->paidTime)->translatedFormat('l, d F Y H:i') }}</span>
                                    </div>

                                    @if ($donasi->status == 3)
                                        <div class="col-5">
                                            <strong>Keterangan</strong>
                                        </div>
                                        @if ($donasi->pesanbatal)
                                            <div class="col-7">
                                                <span style="font-family:courier new; font-weight: 500">
                                                    <i class="bi bi-quote quote-icon-left" style="color: #008374"></i>
                                                    {{ $donasi->pesanbatal }}
                                                    <i class="bi bi-quote quote-icon-right" style="color: #008374"></i>
                                                </span>
                                            </div>
                                        @else
                                            <div class="col-7">
                                                <span style="font-family:courier new; font-weight: 500">Melebihi masa
                                                    tenggat pembayaran</span>
                                            </div>
                                        @endif
                                    @endif

                                </div>
                                <hr class="mb-3" style="border: 2px solid black;">
                                <div class="rincian">
                                    <span class="mb-" style="font-weight: 600">Rincian Pembayaran</span>
                                    <div class="card p-3"
                                        style="height: auto; border-width: 2px; border-color: rgb(130, 121, 121)">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-6">
                                                <span class="mb-3"
                                                    style="font-weight: 400; font-family: sans-serif">Donasi Anda</span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="mb-3" style="font-weight: 400; font-family: sans-serif"> Rp
                                                    {{ number_format($donasi->nominal, 2, ',', '.') }}</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="mb-3" style="font-weight: 400; font-family: sans-serif">Biaya
                                                    Operasional</span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="mb-3"
                                                    style="font-weight: 400; font-family: sans-serif">Rp1.000,00</span>
                                            </div>
                                            <hr class="my-3" style="border: 2px solid black; width: 95%">
                                            <div class="col-6">
                                                <strong>Total</strong>
                                            </div>
                                            <div class="col-6 text-end">
                                                <strong>Rp
                                                    {{ number_format($donasi->nominal + 1000, 2, ',', '.') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pembayaran my-3 d-flex justify-content-center">
                                    @if ($donasi->status == 3)
                                        <span class="badge"
                                            style="background-color: #5a0b0b; color: white; text-transform: none; font-family: sans-serif; border-radius: 10px; padding: 18px 30px 18px 30px; font-size: 20px">Transaksi
                                            Batal</span>
                                    @else
                                        <span class="badge"
                                            style="background-color: #3A9F94; color: white; text-transform: none; font-family: sans-serif; border-radius: 10px; padding: 18px 30px 18px 30px; font-size: 20px">Transaksi
                                            Berhasil</span>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
