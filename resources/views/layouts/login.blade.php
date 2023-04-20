<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head><base href="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'เข้าสู่ระบบ') }}</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/images/favicon.png">

    @yield('styles')

    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body class="h-100">

    <div class="authincation h-100">
        <div class="container h-100">
            @yield('content')
        </div>
    </div>


		<!--begin::Javascript-->
        <script src="{{ asset('assets') }}/vendor/global/global.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="{{ asset('assets') }}/js/custom.min.js"></script>
        <script src="{{ asset('assets') }}/js/deznav-init.js"></script>
		<!--end::Javascript-->
        <!-- Jquery Validation -->
        <script src="{{ asset('assets') }}/vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="{{ asset('assets') }}/js/plugins-init/jquery.validate-init.js"></script>
        @yield('scripts')
</body>
</html>
