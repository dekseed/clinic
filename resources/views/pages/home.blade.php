@extends('layouts.home')
@section('styles')

<link href="{{ asset('assets') }}/plugins/custom/leaflet/leaflet.bundle.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')


@endsection

@section('scripts')

<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('assets') }}/plugins/custom/leaflet/leaflet.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('assets') }}/js/custom/modals/select-location.js"></script>
<script src="{{ asset('assets') }}/js/custom/widgets.js"></script>
<script src="{{ asset('assets') }}/js/custom/apps/chat/chat.js"></script>
<script src="{{ asset('assets') }}/js/custom/modals/create-app.js"></script>
<script src="{{ asset('assets') }}/js/custom/modals/upgrade-plan.js"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->

@section
