@extends('layouts.admin')
@section('erga')
    {{-- Title --}}
    <div class="title mb-4">
        {{-- <h1 class="text-center" style="font-family:courier new; font-style: initial;">Sayang Erga</h1> --}}
    </div>
    {{-- End Tittle --}}

    {{-- data program --}}
    <div class="row">
        <div class="col-sm-4 grid-margin">
            <a href="/dash-allprogram">
                <div class="card">
                    <div class="card-body">
                        <h5>Program Bantu Mereka</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $all->count() }} Program</h2>
                                    {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi mdi-home text-primary ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 grid-margin">
            <a href="/dash-programaktif">
                <div class="card">
                    <div class="card-body">
                        <h5>Progam Aktif</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $aktif->count() }} Program</h2>
                                    {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-calendar-multiple-check text-info ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 grid-margin">
            <a href="/dash-programnonaktif">
                <div class="card">
                    <div class="card-body">
                        <h5>Progam Non Aktif</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $non->count() }} Program</h2>
                                    {{-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-calendar-remove text-warning ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 grid-margin">
            <a href="/dash-programpending">
                <div class="card">
                    <div class="card-body">
                        <h5>Progam Pending</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $pending->count() }} Program</h2>
                                    {{-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-timer-sand text-light ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 grid-margin">
            <a href="/dash-programbatal">
                <div class="card">
                    <div class="card-body">
                        <h5>Progam Batal</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $batal->count() }} Program</h2>
                                    {{-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-block-helper text-danger ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 grid-margin">
            <a href="/dash-programselesai">
                <div class="card">
                    <div class="card-body">
                        <h5>Progam Selesai</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $selesai->count() }} Program</h2>
                                    {{-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi mdi-briefcase-check text-success ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    {{-- end data program --}}
@endsection
