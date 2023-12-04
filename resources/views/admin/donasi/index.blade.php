@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Donasi Bantu Mereka</h1>
    </div>
    <div class="row ">
        <div class="col-12 grid-margin">
            @if (session()->has('success'))
                <div class="row justify-content-end">
                    <div class="alert alert-success col-lg-3" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <h4 class="card-title">Data donasi</h4>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <strong>Jumlah Donasi : {{ $donasi->count() }}</strong>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th>
                                        <strong>No</strong>
                                    </th>
                                    <th> Nama donatur </th>
                                    <th> Anonim </th>
                                    <th> Nama Program </th>
                                    <th> Doa </th>
                                    <th> Nominal </th>
                                    <th> Status donasi </th>
                                    <th> Waktu donasi</th>
                                    <th> Waktu pembayaran </th>
                                    <th> Pesan batal </th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($donasi->count() == 0)
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <strong style="color: #6C7293; font-family:courier new">Belum ada program di kategori
                                ini!</strong>
                        </div>
                    @else
                        @foreach ($donasi as $prog)
                            <tr>
                                <td>
                                    <strong>
                                        {{ $donasi->firstItem() + $loop->index }}
                                    </strong>
                                </td>
                                <td>
                                    <span class="pl-2">{{ $prog->user->name }}</span>
                                </td>
                                <td>
                                    @if ($prog->anonim)
                                        {{ $prog->anonim }}
                                    @else
                                        Tidak Anonim
                                    @endif
                                </td>
                                <td> {{ $prog->program->nama }} </td>
                                <td> {{ $prog->doa }} </td>
                                <td> Rp {{ number_format($prog->nominal, 2, ',', '.') }} </td>
                                <td>
                                    @if ($prog->status == 1)
                                        <div class="badge badge-outline-warning"
                                            style="padding-left: 15px; padding-right: 15px">Belum Bayar</div>
                                    @elseif ($prog->status == 3)
                                        <div class="badge badge-outline-danger"
                                            style="padding-left: 15px; padding-right: 15px">Batal</div>
                                    @else
                                        <div class="badge badge-outline-success"
                                            style="padding-left: 18px; padding-right: 18px">Berhasil</div>
                                    @endif
                                </td>
                                <td> {{ \Carbon\Carbon::parse($prog->created_at)->translatedFormat('l, d F Y') }} </td>
                                <td> {{ \Carbon\Carbon::parse($prog->paidTime)->translatedFormat('l, d F Y') }} </td>
                                <td>
                                    @if ($prog->pesanbatal)
                                        {{ $prog->pesanbatal }}
                                    @else
                                        Melebihi batas waktu pembayaran
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        @endif
                        <br>
                        <div class="erga d-flex justify-content-center">
                            {{ $donasi->links() }}
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
