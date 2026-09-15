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
        <div style="background:#78350f;color:#fef3c7;padding:8px 16px;text-align:center;font-size:13px;">
            <strong>Portfolio demo</strong> — Independent showcase for hiring. Not affiliated with any client or live product. Fictional data only.
            <a href="https://azharulislamsohan.com/legal" style="color:#fde68a;text-decoration:underline;margin-left:6px;" target="_blank" rel="noreferrer">Legal notice</a>
        </div>
        @include('layouts.partials.header')
        <div class="">
            @yield('content')
        </div>
        @include('layouts.partials.footer')
    </div>
    @yield('script')
</body>

</html>
