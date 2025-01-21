<!DOCTYPE html>
<html lang="{{env("APP_LOCALE","en")}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concept Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/reset.css', 'resources/css/root.css', 'resources/css/style.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
@include('include.header')

@yield('content')

@include('include.footer')

@yield('scripts')

@vite(['resources/js/ResetPassword.js'])
</body>

</html>
