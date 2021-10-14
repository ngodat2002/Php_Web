<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{asset('/')}}">
    <meta charset="utf-8">
        <title>Staff | FoodMate</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="front/img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="front/lib/animate/animate.min.css" rel="stylesheet">
    <link href="front/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="front/lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="front/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="front/css/style.css" rel="stylesheet">
    <link href="front/css/login.css" rel="stylesheet">


</head>

<body>

<div class="nav-right-2" style="z-index: 99">
    <div class="nav-login">
        @if(Route::has('login'))
            @auth
                <x-app-layout>
                    <a href="{{url('/dashboard')}}"></a>
                </x-app-layout>
            @else
                <a href="{{route('login')}}" class="login-panel">
                    <i class="far fa-user"></i> <span>Login</span>
                </a>
                @if(Route::has('register'))
                    <a href="{{route('register')}}"><span>Register</span></a>
                @endif
            @endauth
        @endif
    </div>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="front/lib/easing/easing.min.js"></script>
<script src="front/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="front/lib/tempusdominus/js/moment.min.js"></script>
<script src="front/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="front/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Contact Javascript File -->
<script src="front/mail/jqBootstrapValidation.min.js"></script>
<script src="front/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="front/js/main.js"></script>
</body>
</html>
