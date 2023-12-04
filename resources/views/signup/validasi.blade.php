@extends('layouts.auth')
@section('erga')


            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Validasi Akun</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">

                        <form action="/validasi" method="POST" class="signin-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Nama pengguna" required>
                                @error('username')
                                    <div class="invalid-feedback"></div>
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                @error('password')
                                    <div class="invalid-feedback"></div>
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-field2" type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                                <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Validasi Akun</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


