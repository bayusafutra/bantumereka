<!doctype html>
<html lang="en">
    <head>
        <title>{{ $title }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('img/logo.png') }}" rel="icon">

        <link href="{{ asset('https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap') }}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">


        <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
        <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">

    </head>
	<body class="img js-fullheight" style="background-image: url({{ asset('auth/imgauth.jpg') }});">
        <section class="ftco-section" style="height: inherit">
            <div class="container">
                @if (session()->has('success'))
                    <div class="row justify-content-center">
                        <div class="alert alert-success alert-dismissible fade show col-lg-6 text-center d-flex justify-content-center" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (session()->has('loginError'))
                    <div class="row justify-content-center">
                        <div class="alert alert-danger alert-dismissible fade show col-lg-6 text-center d-flex justify-content-center" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (session()->has('verifikasi'))
                <div class="row justify-content-center">
                    <div class="alert alert-danger alert-dismissible fade show col-lg-10 text-center d-flex justify-content-center" role="alert">
                        {{ session('verifikasi') }}
                        <a href="/verifikasi" style="color: black; text-decoration: #093199">&nbsp; Verifikasi sekarang</a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                @if (Session::has('message'))
                    <div class="row justify-content-center">
                        <div class="alert alert-success alert-dismissible fade show col-lg-6 text-center d-flex justify-content-center" role="alert">
                            {{ Session::get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

        {{-- Start Content --}}
        @yield('erga')
        {{-- End Content --}}

        <script src="{{ asset('auth/js/jquery.min.js') }}"></script>
        <script src="{{ asset('auth/js/popper.js') }}"></script>
        <script src="{{ asset('auth/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('auth/js/main.js') }}"></script>
        <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
