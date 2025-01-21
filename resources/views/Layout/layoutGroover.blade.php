<!DOCTYPE html>
<html lang="{{env("APP_LOCALE","en")}}">

@yield('head')

@include('include.header')

@yield('content')

@include('include.footer')

@yield('scripts')

</html>
