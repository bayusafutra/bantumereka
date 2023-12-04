@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Update Kategori Program Donasi</h1>
    </div>
    {{-- Start Form --}}
    @if (session()->has('success'))
        <div class="row justify-content-center">
            <div class="alert alert-success col-lg-6" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <p class="container">UPDATE UNSUCCESFULL</p>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Kategori Program Bantu Mereka</h4>

                    <form action="/dash-updatekategori" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $kategori[0]->id }}">
                            <label for="nama">Nama kategori program</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama kategori program" required value="{{ old('nama', $kategori[0]->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="hidden" name="oldslug" value="{{ $kategori[0]->slug }}">
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Slug" required value="{{ old('slug', $kategori[0]->slug) }}"/>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-light" style="margin-right: 5px; border-radius: 5px; background-color: rgb(50, 45, 134); color: white; padding: 12px 27px 12px 27px">Update</button>
                                <input type="reset" class="btn btn-light" style="border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px">
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a href="/dash-kategoriprogram" class="btn btn-light" style="margin-right: 5px; border-radius: 5px; background-color: rgb(196, 106, 16); color: white; padding: 12px 27px 12px 27px">Kembali</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        const nama = document.querySelector('#nama');
        const slug = document.querySelector('#slug');
        nama.addEventListener('change', function(){
            fetch('/createslugkategori?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
    </script>
@endsection
