<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('meta_title', 'Dashboard')</title>
    <meta content="@yield('meta_description', 'Dashboard')" name="description">
    <meta content="@yield('meta_keyword', 'Dashboard')" name="keywords">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $school->logo ? asset('storage/' . $school->logo) : asset('images/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $school->logo ? asset('storage/' . $school->logo) : asset('images/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $school->logo ? asset('storage/' . $school->logo) : asset('images/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel='stylesheet'>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body>
    <div>
        @include('partials.alerts')
        @yield('content')
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <!-- <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @yield('script')
</body>
</html>