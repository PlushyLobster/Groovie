<!DOCTYPE html>
<html lang="{{ env('APP_LOCALE', 'en') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concept Page</title>
    <link rel="icon" href="{{ asset('storage/images/LOGO.ico') }}" type="image/x-icon">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/css/reset.css', 'resources/css/root.css', 'resources/css/style.css'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<!-- Header -->
<x-header />

<!-- Page Content -->
@yield('content')

<!-- Footer -->
@include('include.footer')

<!-- Scripts -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

@vite(['resources/js/resetPassword.js', 'resources/js/navBar.js'])
@yield('scripts')
</body>
</html>
