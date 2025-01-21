<!DOCTYPE html>
<html lang="{{ env('APP_LOCALE', 'en') }}">

<head>
    <!-- Inclure la balise CSRF ici -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Autres métadonnées ou styles -->
    @yield('head')
</head>

<body>
@include('include.header')

@yield('content')

@include('include.footer')

@yield('scripts')

@vite(['resources/js/ResetPassword.js'])
</body>

</html>
