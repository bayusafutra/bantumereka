@extends('layouts.dashboard')

@section('erga')
    <main id="main">
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Sakit Mereka Adalah Sakit Kita Juga</h2>
                            <p>“Sedekah itu dapat menghapus dosa sebagaimana air itu memadamkan api.“ (HR. Tirmidzi)</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li><a href="/detailprogram/{{ $program->slug }}">{{ ucwords($program->nama) }}</a></li>
                        <li>Buat Berita Program Bantuan</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <section class="sample-page">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-center">
                    <div class="col-9 grid-margin stretch-card">
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

                        <div class="card card-5">
                            <div class="card-heading">
                                <h2 class="title">Buat Berita Donasi</h2>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/createblog" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-row">
                                        <div class="name">Kategori</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input type="hidden" name="kategori" value="{{ $program->kategori->id }}">
                                                <input class="input--style-5" name="id_program" type="text"
                                                    placeholder="Judul Berita" readonly value="{{ $program->kategori->nama }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="name">Program</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{ $program->id }}">
                                                <input class="input--style-5" name="id_program" type="text"
                                                    placeholder="Judul Berita" readonly value="{{ $program->nama }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="name">Judul Berita</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5 @error('judul') is-invalid @enderror"
                                                    id="judul" name="judul" type="text" placeholder="Judul Berita"
                                                    required value="{{ old('judul') }}" autofocus>
                                            </div>
                                            @error('judul')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="name">Isi Berita</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <textarea name="kontent" id="editor"></textarea>
                                            </div>
                                            @error('kontent')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="name">Gambar</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-4 @error('gambar') is-invalid @enderror"
                                                    type="file" id="gambar" name="gambar" value="{{ old('gambar') }}"
                                                    onchange="previewImage()">
                                            </div>
                                            @error('gambar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-group d-flex justify-content-center">
                                        <button class="btn btn--radius-2"
                                            style="background-color: #008374; color: white; padding: 12px 20px 12px 20px; font-family: sans-serif">Tambahkan
                                            Berita</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('berita') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {

            });
    </script>
@endsection


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script>
    $(document).ready(function() {
        $('.simple-select2').select2({
            theme: 'bootstrap4',
            placeholder: "Select an option",
            allowClear: true
        });

        $('.simple-select2-sm').select2({
            theme: 'bootstrap4',
            containerCssClass: ':all:',
            placeholder: "Select an option",
            allowClear: true
        });
    });
</script>
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
<script>
    function previewImage() {
        const gambar = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }
</script>
