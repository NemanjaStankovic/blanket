<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset("images/custom/favicon.ico") }}">
    <!-- Bootstrap css -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Plugins css -->
    <link href="{{ asset("libs/jquery-toast-plugin/jquery.toast.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("libs/select2/css/select2.min.css") }}" rel="stylesheet" type="text/css" />
    <!--link href="{{ asset("libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css") }}" rel="stylesheet" type="text/css" /-->
    @stack('plugin-css')
    <!-- Plugins css -->

    <!-- Theme Config Js -->
    <script src="{{ asset("js/head.js") }}"></script>
    <!-- App css -->
    <link href="{{ asset("css/app.min.css") }}" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="{{ asset("css/icons.min.css") }}" rel="stylesheet" type="text/css" />

    <!-- Custom css -->
    <link href="/css/custom.css" rel="stylesheet" type="text/css" />

    @stack('page-css')

</head>
<body>
    <!-- Page Content -->
    <main>
            @include('layouts.navigation')
                <!-- Page Heading -->
            <div class="content-page">
                <div class="container-fluid">
                    @isset($header)
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            {{$path}}
                                        </ol>
                                    </div>
                                    <h4 class="page-title">{{$header}}</h4>
                                </div>
                            </div>
                        </div>
                    @endisset
                    {{ $slot }}
                </div>
            </div>
    </main>


<!-- Vendor js -->
<script src="{{ asset("js/vendor.min.js") }}"></script>

<!-- App js -->
<script src="{{ asset("js/app.min.js") }}"></script>

<script src="{{ asset("libs/jquery-toast-plugin/jquery.toast.min.js") }}"></script>
<script src="{{ asset("libs/select2/js/select2.min.js") }}"></script>
<!--script src="{{ asset("libs/select2/js/select2.full.min.js") }}"></script-->
<script src="{{ asset("libs/select2/js/i18n/sr-Cyrl.js") }}"></script>

<script src="{{ asset("libs/jquery-mask-plugin/jquery.mask.min.js") }}"></script>
<script src="{{ asset("js/pages/form-masks.init.js") }}"></script>

<script src="{{ asset("js/pages/fontawesome.init.js") }}"></script>

@stack('plugin-js-script')

<!-- Datatables init -->

<script src="{{ asset("js/custom.js") }}"></script>


@yield('page-js-script')

</body>
</html>
