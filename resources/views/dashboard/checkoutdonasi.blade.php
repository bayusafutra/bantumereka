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
                        <li>Detail Donasi</li>
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
                                <h2 class="title">Detail Donasi</h2>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-6">
                                        <img class="img-fluid" src="{{ asset('storage/' . $program->gambar) }}"
                                            alt="">
                                    </div>
                                    <div class="col-6">
                                        <span>Kamu berdonasi pada program</span>
                                        <strong>{{ ucwords($program->nama) }}</strong>
                                    </div>
                                </div>
                                <hr class="mb-3" style="border: 2px solid black;">

                                <div class="row d-flex justify-content-center mt-3">
                                    <div class="col-4">
                                        <strong>Nama Donatur</strong>
                                    </div>
                                    <div class="col-8">
                                        <span
                                            style="font-family:courier new; font-weight: 500">{{ $donasi->user->name }}</span>
                                    </div>

                                    <div class="col-4">
                                        <strong>Status Donatur</strong>
                                    </div>
                                    <div class="col-8">
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

                                    <div class="col-4">
                                        <strong>Username</strong>
                                    </div>
                                    <div class="col-8">
                                        <span
                                            style="font-family:courier new; font-weight: 500">{{ $donasi->user->username }}</span>
                                    </div>

                                    <div class="col-4">
                                        <strong>Email</strong>
                                    </div>
                                    <div class="col-8">
                                        <span
                                            style="font-family:courier new; font-weight: 500">{{ $donasi->user->email }}</span>
                                    </div>

                                    <div class="col-4">
                                        <strong>Jenis Kelamin</strong>
                                    </div>
                                    <div class="col-8">
                                        <span style="font-family:courier new; font-weight: 500">
                                            @if ($donasi->user->gender != null)
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

                                    <div class="col-4">
                                        <strong>No Telepon</strong>
                                    </div>
                                    <div class="col-8">
                                        <span style="font-family:courier new; font-weight: 500">
                                            @if ($donasi->user->notelp)
                                                {{ $donasi->user->notelp }}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>

                                    <div class="col-4">
                                        <strong>Doa</strong>
                                    </div>
                                    <div class="col-8">
                                        <span style="font-family:courier new; font-weight: 500">
                                            <i class="bi bi-quote quote-icon-left" style="color: #008374"></i>
                                            {{ $donasi->doa }}
                                            <i class="bi bi-quote quote-icon-right" style="color: #008374"></i>
                                        </span>
                                    </div>

                                    <div class="col-4">
                                        <strong>Waktu Donasi</strong>
                                    </div>
                                    <div class="col-8">
                                        <span
                                            style="font-family:courier new; font-weight: 500">{{ \Carbon\Carbon::parse($donasi->created_at)->translatedFormat('l, d F Y H:i') }}</span>
                                    </div>

                                    <div class="col-4">
                                        <strong>Tenggat Pembayaran</strong>
                                    </div>
                                    <div class="col-8">
                                        <span
                                            style="font-family:courier new; font-weight: 500">{{ \Carbon\Carbon::parse($donasi->deadlinePaid)->translatedFormat('l, d F Y H:i') }}</span>
                                    </div>

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
                                                <strong>Rp {{ number_format($donasi->nominal + 1000, 2, ',', '.') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pembayaran my-3 d-flex justify-content-center">
                                    <button class="btn btn-lg" id="pay-button"
                                        style="background-color: #3A9F94; color: white; text-transform: none; font-family: sans-serif; border-radius: 15px; padding: 12px 28px 12px 28px">Bayar
                                        Sekarang</button>
                                    <button class="btn btn-lg ms-4" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        style="background-color: #5a0b0b; color: white; text-transform: none; font-family: sans-serif; border-radius: 15px; padding: 12px 20px 12px 20px">Batalkan
                                        Transaksi
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content"
                                                style="-moz-border-radius: 10px; border-radius: 10px; -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15); -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15); box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);">
                                                <div class="modal-header" style="background-color: black">
                                                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                                                        Pembatalan Transaksi Donasi</h1>
                                                    <button type="button" class="btn-close" style="background-color: white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body d-flex align-items-center" style="height: 130px;">
                                                    <form action="/batalkandonasi" method="POST">
                                                        @csrf
                                                        <span>Masukkan alasan anda membatalkan transaksi ini!</span>
                                                        <input type="hidden" name="id" value="{{ $donasi->id }}">
                                                        <input type="text" style="width: 100%" name="pesanbatal"
                                                            class="input--style-5" required>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-lg text-white"
                                                        style="background-color: #62270a; padding: 4px 10px 4px 10px; border-radius: 5px"
                                                        data-bs-dismiss="modal">Kembali</button>
                                                    <button type="submit" class="btn text-white"
                                                        style="background-color: #07164e; padding: 7px 10px 7px 10px;">Batalkan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
{{-- @dd($snapToken) --}}
@section('payment')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}">
    </script>
@endsection
@section('script')
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    window.location.href = '/detailtransaksi/{{ $donasi->slug }}'
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endsection
