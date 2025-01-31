<!DOCTYPE html>
<html lang="{{env('APP_LOCALE','en')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concept Page</title>
    <link rel="icon" href="{{ asset('storage/images/LOGO.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css','resources/css/reset.css', 'resources/css/root.css', 'resources/css/style.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
{{--// include du header en mode components pour pouvoir accéder au initials dans bulle du profil --}}
<x-header />

@yield('content')

@include('include.footer')

@yield('scripts')

@vite(['resources/js/ResetPassword.js', 'resources/js/NavBar.js'])
</body>

</html>
