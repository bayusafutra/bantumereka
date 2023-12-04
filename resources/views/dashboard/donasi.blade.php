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
                    <li><a href="/detailprogram/{{ $program->slug }}">{{ ucwords($program->nama) }}</a></li>
                    <li>Donasi</li>
                    </ol>
                </div>
            </nav>
        </div>
        <!-- End Breadcrumbs -->

        <section class="sample-page">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-center">
                    <div class="col-6 grid-margin stretch-card">
                        @if (session()->has('success'))
                            <div class="row justify-content-center">
                                <div class="alert alert-success alert-dismissible text-center col-lg-11 fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="row justify-content-center">
                                <div class="alert alert-danger alert-dismissible text-center col-lg-11 fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif

                        <div class="card card-5">
                            <div class="card-heading">
                                <h2 class="title">Mari Berdonasi</h2>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-6">
                                        <img class="img-fluid" src="{{ asset('storage/'.$program->gambar) }}" style="height: 100px; width: 250px" alt="">
                                    </div>
                                    <div class="col-6">
                                        <span>Kamu mendukung program</span>
                                        <strong>{{ ucwords($program->nama) }}</strong>
                                    </div>
                                </div>

                                <form method="POST" action="/donasi" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_program" value="{{ $program->id }}">
                                    <div class="anonim mt-3">
                                        <span class="mb-3" style="font-weight: 600">Status donatur<strong style="color:rgb(231, 40, 40)">*</strong></span>
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-6 mb-2">
                                                <input type="radio" class="btn-check" name="anonim2" id="NamaAsli" value="NamaAsli" autocomplete="off">
                                                <label class="btn btn-outline-success" style="border-color: #3A9F94; border-width: 3px; width: 100%" for="NamaAsli">
                                                    <span class="d-block fw-semibold text-start">
                                                        <span class="text-dark  d-block fs-8">Nama Asli</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <input type="radio" class="btn-check" name="anonim2" id="anonim" autocomplete="off" />
                                                <label class="btn btn-outline-success" for="anonim" style="border-color: #3A9F94; border-width: 3px; width: 100%"  data-bs-toggle="collapse" href="#collapseanonim" role="button" aria-expanded="false" aria-controls="collapseanonim">
                                                    <span class="d-block fw-semibold text-start">
                                                        <span class="text-dark  d-block fs-8">Anonim</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="collapse" id="collapseanonim">
                                            <span style="font-weight: 450">Masukkan nama anonim donasi anda</span>
                                            <input type="text" name="anonim" class="form-control" style="border-width: 3px; border-color: black" placeholder="Hamba Allah">
                                        </div>
                                    </div>
                                    <div class="nominal mt-4">
                                        <span style="font-weight: 600">Pilih nominal donasi<strong style="color:rgb(231, 40, 40)">*</strong></span>
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-6 mb-2">
                                                <input type="radio" class="btn-check" name="nominal2" id="pilihan1" autocomplete="off" value="10000">
                                                <label class="btn btn-outline-success" style="border-color: #3A9F94; border-width: 3px; width: 100%;" for="pilihan1">
                                                    <span class="d-block fw-semibold text-start">
                                                        <span class="text-dark  d-block fs-8">Rp10.000,00</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <input type="radio" class="btn-check" name="nominal2" id="pilihan2" autocomplete="off" value="25000">
                                                <label class="btn btn-outline-success" style="border-color: #3A9F94; border-width: 3px; width: 100%" for="pilihan2">
                                                    <span class="d-block fw-semibold text-start">
                                                        <span class="text-dark  d-block fs-8">Rp25.000,00</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <input type="radio" class="btn-check" name="nominal2" id="pilihan3" autocomplete="off" value="50000">
                                                <label class="btn btn-outline-success" style="border-color: #3A9F94; border-width: 3px; width: 100%" for="pilihan3">
                                                    <span class="d-block fw-semibold text-start">
                                                        <span class="text-dark  d-block fs-8">Rp50.000,00</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <input type="radio" class="btn-check" name="nominal2" id="lainnya" autocomplete="off" />
                                                <label class="btn btn-outline-success" for="lainnya" style="border-color: #3A9F94; border-width: 3px; width: 100%"  data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    <span class="d-block fw-semibold text-start">
                                                        <span class="text-dark  d-block fs-8">Lainnya</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="collapse" id="collapseExample">
                                            <span style="font-weight: 450">Masukkan nominal donasi</span>
                                            <input class="form-control @error('nominal') is-invalid @enderror" style="background-color: #F0EFEF" name="nominal" type="text" placeholder="Rp1.000.000,00" id="txtExampleBoxOne" onkeypress="return number(event )"
                                            onBlur="formatCurrency(this, 'Rp ', 'blur');" onkeyup="formatCurrency(this, 'Rp ');" data-inputmask="'alias': 'numeric', 'autoGroup' :true, 'digitsOptional':false, 'removeMaskOnSubmit' : true, 'autoUnmask' : true" value="{{ old('nominal') }}">
                                        </div>

                                        <hr class="mb-3" style="border: 2px solid black;">
                                    </div>
                                    <div class="doa">
                                        <span class="mb-3" style="font-weight: 600">Doa untuk donasi ini</span>
                                        <textarea class="form-control mb-4" name="doa" placeholder="Tulis doa disini agar doamu bisa diamini oleh orang lain" style="height: 150px; border-color: black; border-width: 3px;" name="" id="" cols="30" rows="10"></textarea>
                                        {{-- <hr class="mb-3" style="border: 2px solid black;"> --}}
                                    </div>
                                    {{-- <div class="rincian">
                                        <span class="mb-" style="font-weight: 600">Rincian Pembayaran</span>
                                        <div class="card p-3" style="height: auto; border-width: 2px; border-color: rgb(130, 121, 121)">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-6">
                                                    <span class="mb-3" style="font-weight: 400; font-family: sans-serif">Donasi anda</span>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <span class="mb-3" style="font-weight: 400; font-family: sans-serif">Rp20.000,00</span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="mb-3" style="font-weight: 400; font-family: sans-serif">Biaya Operasional</span>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <span class="mb-3" style="font-weight: 400; font-family: sans-serif">Rp1.000,00</span>
                                                </div>
                                                <hr class="my-3" style="border: 2px solid black; width: 95%">
                                                <div class="col-6">
                                                    <strong>Total</strong>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <strong>Rp21.000,00</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="button d-flex justify-content-center mt-4">
                                        <button type="submit" class="btn btn-lg" style="background-color: #3A9F94; color: white; text-transform: none; font-family: sans-serif; border-radius: 15px; padding: 12px 36px 12px 36px ">Donasi</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>
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

          function number(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if(charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
          }
        }
    </script>
