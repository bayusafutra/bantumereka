@extends('layouts.auth')
@section('erga')
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Verifikasi Email</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">

                        <form action="/verifikasi" method="POST" class="signin-form">
                            @csrf
                            <div class="form-group">
                                <input type="number" class="form-control @error('otp') is-invalid @enderror" name="otp" placeholder="Kode OTP" required autofocus>
                                @error('otp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Kirim Kode OTP</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

