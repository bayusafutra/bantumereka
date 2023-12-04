@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Berita Program Donasi Bantu Mereka
        </h1>
    </div>
    <div class="row ">
        <div class="col-12 grid-margin">
            @if (session()->has('success'))
                <div class="row justify-content-end" style="padding-right: 18px">
                    <div class="alert alert-success col-lg-5" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col" style="padding-left: 28px">
                            <h4 class="card-title">Data Master Berita</h4>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <strong>Jumlah Berita : {{ $berita->count() }}</strong>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th>
                                        <strong>No</strong>
                                    </th>
                                    <th> Judul </th>
                                    <th> Dibuat oleh </th>
                                    <th> Kategori Berita </th>
                                    <th> Nama Program </th>
                                    <th> Lihat Detail </th>
                                    <th> Dibuat Pada</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($berita == null)
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <strong style="color: #6C7293; font-family:courier new">Daftar berita tidak tersedia!</strong>
                        </div>
                    @else
                        @foreach ($berita as $kat)
                            <tr>
                                <td>
                                    <strong>{{ $berita->firstItem() + $loop->index }}</strong>
                                </td>
                                <td>
                                    <span class="pl-2">{{ $kat->judul }}</span>
                                </td>
                                <td> {{ $kat->user->name }} </td>
                                <td> {{ $kat->kategori->nama }} </td>
                                <td> {{ $kat->program->nama }} </td>
                                <td>
                                    <a href="" class="btn text-dark" style="background-color: #6C7293">Lihat</a>
                                </td>
                                <td> {{ \Carbon\Carbon::parse($kat->created_at)->translatedFormat('l, d F Y H:i') }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        @endif
                        <br>
                        <div class="erga d-flex justify-content-center">
                            {{ $berita->links() }}
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
