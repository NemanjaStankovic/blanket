<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset("images/custom/favicon.ico") }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Theme Config Js -->
    <script src="{{ asset("js/head.js") }}"></script>


    <!-- Bootstrap css -->
    <link href="{{ asset("css/bootstrap.css") }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- App css -->
    <link href="{{ asset("css/app.css") }}" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="{{ asset("css/icons.css") }}" rel="stylesheet" type="text/css" />

</head>
<body class="authentication-bg authentication-bg-pattern">
<div class="account-pages mt-5 mb-5">
    <div class="container">
        {{ $slot }}
    </div>
</div>
@yield('page-js-script')
</body>

</html>
