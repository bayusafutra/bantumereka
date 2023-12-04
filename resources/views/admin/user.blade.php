@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Daftar User Website Bantu Mereka</h1>
    </div>
    <div class="row ">
        <div class="col-12 grid-margin">
            @if (session()->has('success'))
                <div class="row justify-content-end" style="padding-right: 18px">
                    <div class="alert alert-success col-lg-4" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col" style="padding-left: 28px">
                            <h4 class="card-title">Data Master User</h4>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <strong>Jumlah pengguna website : {{ $user->count() }}</strong>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-center">

                            <thead>
                                <tr>
                                    <th>
                                        <strong>No</strong>
                                    </th>
                                    <th> Nama </th>
                                    <th> Username </th>
                                    <th> Email </th>
                                    <th> No Telepon </th>
                                    <th> Tanggal Lahir </th>
                                    <th> Jenis Kelamin </th>
                                    <th> Total Saldo Donasi </th>
                                    <th> Status User </th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($user == null)

                            </tbody>
                        </table>
                                    <div class="text-center mt-3">
                                        <strong style="color: #6C7293; font-family:courier new">Daftar user website tidak tersedia!</strong>
                                    </div>
                                @else

                                    @foreach ($user as $us)
                                        <tr>
                                            <td>
                                                <strong>{{ $loop->iteration }}</strong>
                                            </td>
                                            <td>
                                                <span class="pl-2">{{ $us->name }}</span>
                                            </td>
                                            <td> {{ $us->username }} </td>
                                            <td> {{ $us->email }} </td>
                                            <td>
                                                @if ($us->notelp)
                                                    {{ $us->notelp }}
                                                @else
                                                    <strong>-</strong>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($us->tgllahir)
                                                    {{ $us->tgllahir }}
                                                @else
                                                    <strong>-</strong>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($us->gender)
                                                    @if ($us->gender == 1)
                                                        Pria
                                                    @else
                                                        Wanita
                                                    @endif
                                                @else
                                                    <strong>-</strong>
                                                @endif
                                            </td>
                                            <td> {{ $us->totalsaldo }} </td>
                                            <td>
                                                @if ($us->roleid == 1)
                                                    <div class="badge badge-outline-info" style="padding-left: 24px; padding-right: 24px">Admin</div>
                                                @else
                                                    <button class="btn btn-outline-success" data-bs-toggle="modal"
                                                    data-bs-target="#{{ $us->id }}" style="padding-left: 24px; padding-right: 24px">User</button>

                                                    <div class="modal fade" id="{{ $us->id }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content"
                                                                style="background-color: #2A3038; color:white; border-radius: 1rem; width: 1150px;">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-1" id="exampleModalLabel">User:
                                                                        {{ $us->name }}</h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah anda yakin untuk menjandikan user ini menjadi admin?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light"
                                                                        data-bs-dismiss="modal"
                                                                        style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Tidak</button>
                                                                    <form action="/dash-isAdmin" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $us->id }}">
                                                                        <button type="submit" class="btn btn-light"
                                                                            style="margin-right: 5px; border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px">Iya</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                                @endif
                    <div>
                </div>
            </div>
        </div>
    </div>
@endsection
