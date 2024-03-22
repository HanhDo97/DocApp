<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Page Title' }}</title>

    <link rel="stylesheet" href="/css/app.min.css">
    <link href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('bootstrap/css/bootstrap-grid.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('bootstrap/css/bootstrap-reboot.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('bootstrap/css/bootstrap-icons.min.css')}}" rel="stylesheet">
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

@include('html.nav')

<body style="font-family: Arial, Helvetica, sans-serif;">
    {{ $slot }}

    @livewireScripts

</body>

<script src="{{URL::asset('bootstrap/js/jquery-3.2.1.slim.min.js')}}"></script>
<script src="{{URL::asset('bootstrap/js/proper.min.js')}}"></script>
<script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>

</html>