<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - CoverSure</title>

    <link rel="shortcut icon" href="{{ asset('images/icon/favicon.ico') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('style')
</head>

<body>
    <div id="app">
        @include('layouts.partials.header')
        <div class="">
            @yield('content')
        </div>
        @include('layouts.partials.footer')
    </div>
    @yield('script')
</body>

</html>
