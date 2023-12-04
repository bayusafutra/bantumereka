@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
          <h1 class="text-center" style="font-family:courier new; font-style: initial;">Program Non Aktif Donasi Bantu Mereka</h1>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            @if (session()->has('success'))
                <div class="row justify-content-center">
                    <div class="alert alert-success col-lg-8" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <h4 class="card-title">Data program bantuan</h4>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <strong>Jumlah Program Non Aktif Donasi : {{ $program->count() }}</strong>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-center">

                            <thead>
                                <tr>
                                    <th>
                                        <strong>No</strong>
                                    </th>
                                    <th> Nama program </th>
                                    <th> Dibuat oleh </th>
                                    <th> Dana terkumpul </th>
                                    <th> Target dana </th>
                                    <th> Status program </th>
                                    <th> Tenggat program </th>
                                    <th> Pesan Non Aktif </th>
                                    <th> Dinonaktifkan pada</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($program->count() == 0)

                            </tbody>
                        </table>
                                <div class="text-center mt-3">
                                    <strong style="color: #6C7293; font-family:courier new">Belum ada program yang nonaktif!</strong>
                                </div>
                                @else

                                    @foreach ($program as $prog)
                                    <tr>
                                        <td>
                                            <strong>
                                                {{ $program->firstItem() + $loop->index  }}
                                            </strong>
                                        </td>
                                        <td>
                                            <span class="pl-2">{{ $prog->nama }}</span>
                                        </td>
                                        <td> {{ $prog->user->name }} </td>
                                        <td> Rp {{ number_format($prog->danaskrg, 2, ',','.') }} </td>
                                        <td> Rp {{ number_format($prog->targetdana, 2, ',','.') }} </td>
                                        <td>
                                            <button class="btn btn-outline-warning" type="button" data-bs-toggle="modal" data-bs-target="#{{ $prog->id }}" style="padding-left: 24px; padding-right: 24px" title="ubah status">Non Aktif</button>
                                        </td>
                                        <td> {{ \Carbon\Carbon::parse($prog->deadline)->translatedFormat('l, d F Y') }} </td>
                                        <td> {{ $prog->pesannonaktif }} </td>
                                        <td> {{ \Carbon\Carbon::parse($prog->updated_at)->translatedFormat('H:i l, d F Y') }} </td>

                                        {{-- Modal button reject --}}
                                        <div class="modal fade" id="{{ $prog->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content" style="background-color: #2A3038; color:white; border-radius: 1rem; width: 1150px;">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-1" id="exampleModalLabel">{{ $prog->nama }}</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda ingin mengaktifkan kembali program donasi ini?
                                                    </div>
                                                    <form action="/dash-aktifkanprogram" method="post" >
                                                        @csrf
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Kembali</button>
                                                            <input type="hidden" name="id" value="{{ $prog->id }}">
                                                            <button type="submit" class="btn btn-light" style="margin-right: 5px; border-radius: 5px; background-color: rgba(88, 13, 103, 0.361); color: white; padding: 12px 27px 12px 27px">Aktifkan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Modal --}}
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        @endif
                        <br>
                        <div class="erga d-flex justify-content-center">
                            {{ $program->links() }}
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </div>
@endsection
