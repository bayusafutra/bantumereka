<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            background-color: #b2bbba
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Lupa Password Bantu Mereka</h1><br>
    <div class="container">
        <strong>Hai {{ $user->name }},</strong>
        <br>
        <div style="font-family:courier;">Klik link dibawah ini untuk melakukan reset password:</div>
        <br>
        <div class="erga">
            <a class="btn btn-danger" style="font-style: italic" href="{{ route('reset.password.get', $token) }}">http://127.0.0.1:8000/resetpassword/{{ $token }}</a>
        </div>
        <br>
        <p style="font-family:courier;">Terima kasih atas partisipasi anda dalam website ini</p>
        <footer>
            {{-- <span style="font-style: italic">Website Bantu Mereka, 2023</span> --}}
            <span class="text-gray-800 fw-semibold me-1">2023&copy;</span>
            <span class="text-gray-800">Gebang Software House,</span>
            <a href="/" target="_blank" class="text-gray-800 text-hover-primary" style="text-decoration: none; color:black"><b>Website Bantu Mereka</b></a>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
