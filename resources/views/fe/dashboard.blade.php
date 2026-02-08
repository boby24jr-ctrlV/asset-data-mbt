<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title', 'Business')</title>

    <!-- CSS -->
    <link rel="shortcut icon" href="{{ asset('fe-asset/images/favicon.svg') }}">

    <link rel="stylesheet" href="{{ asset('fe-asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fe-asset/css/lineicons.css') }}">
    <link rel="stylesheet" href="{{ asset('fe-asset/css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('fe-asset/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fe-asset/style.css') }}">
</head>

<body>

    {{-- NAVBAR --}}
    @include('fe.navbar')

    {{-- HOme --}}
    @include('fe.home')

    {{-- PAGE CONTENT --}}
    @yield('content')

    {{-- FOOTER --}}
    {{-- @include('fe.footer') --}}

    <!-- JS -->
    <script src="{{ asset('fe-asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('fe-asset/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('fe-asset/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('fe-asset/js/main.js') }}"></script>

</body>
</html>
