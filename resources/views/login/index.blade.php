@extends('layouts.auth')
@section('erga')
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Masuk</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">

                        <form action="/login" method="POST" class="signin-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Nama pengguna" required value="{{ old('username') }}">
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
                                <button type="submit" class="form-control btn submit px-3" style="background-color: #008374">Masuk</button>
                            </div>
                        </form>

                        <div class="form-group d-md-flex justify-content-end">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary"><a href="/register" style="color: #fff" title="Daftar sekarang!">Belum punya akun</a></label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="/lupapassword" style="color: #fff">Lupa Password</a>
                            </div>
                        </div>
                        <p class="w-100 text-center">&mdash; atau masuk dengan &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="auth/google" class="px-2 py-2 mr-md-1 rounded" style="background-color: white; font-family: 'Trebuchet MS'; font-weight: 600"><span class="bi bi-google" style="color: #DB4639">+</span> Daftar dengan Google</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
