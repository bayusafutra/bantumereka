@extends('layouts.auth')
@section('erga')
            <div class="row justify-content-center">
                <div class="alert alert-info alert-dismissible fade show col-lg-6 text-center" role="alert">
                    Masukkan alamat email anda untuk mereset password akun!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Lupa Password</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">

                        <form action="/lupapassword" method="POST" class="signin-form">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Alamat Email" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group d-md-flex justify-content-end">
                                <div class="w-100 text-end">
                                    <label class="checkbox-wrap checkbox-primary"><a href="/login" style="color: #fff" tittle="Masuk SekarangA">Kembali ke halaman login</a></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Kirim email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

