<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><base href="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Yamin - Clinic') }}</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/images/favicon.png">
	<link href="{{ asset('assets') }}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    @yield('styles')
    <link href="{{ asset('assets') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
     <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        @include('_includes.header.nav_header')

        @include('_includes.header.header_home_patient')

        @include('_includes.menu.sidebar_patient')

        @yield('content')

        @include('_includes.menu.footer_home')

    </div>


    @yield('modals')

	<!-- Required vendors -->
    <script src="{{ asset('assets') }}/vendor/global/global.min.js"></script>
	<script src="{{ asset('assets') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="{{ asset('assets') }}/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/js/custom.min.js"></script>
	<script src="{{ asset('assets') }}/js/deznav-init.js"></script>
	<script src="{{ asset('assets') }}/vendor/owl-carousel/owl.carousel.js"></script>

    @yield('scripts')

</body>
</html>
