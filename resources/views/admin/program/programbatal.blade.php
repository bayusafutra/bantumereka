@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
          <h1 class="text-center" style="font-family:courier new; font-style: initial;">Reject Program Donasi Bantu Mereka</h1>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-12 grid-margin">
            @if (session()->has('success'))
                <div class="row justify-content-center">
                    <div class="alert alert-success col-lg-4" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <h4 class="card-title">Data reject program bantuan</h4>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <strong>Jumlah Program yang dibatalkan : {{ $program->count() }}</strong>
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
                                    <th> Target dana </th>
                                    <th> Status program </th>
                                    <th> Alasan pembatalan </th>
                                    <th> Dibatalkan pada </th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($program->count() == 0)

                            </tbody>
                        </table>
                                <div class="text-center mt-3">
                                    <strong style="color: #6C7293; font-family:courier new">Tidak ada daftar program pending saat ini!</strong>
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
                                        <td> Rp {{ number_format($prog->targetdana, 2, ',','.') }} </td>
                                        <td>
                                            <div class="badge badge-outline-danger" style="padding-left: 15px; padding-right: 15px">Batal</div>
                                        </td>
                                        <td> {{ $prog->pesanbatal }} </td>
                                        <td> {{ \Carbon\Carbon::parse($prog->updated_at)->translatedFormat('H:i l, d F Y') }} </td>
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
