<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Doc App</title>
    <link href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('bootstrap/css/bootstrap-grid.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('bootstrap/css/bootstrap-reboot.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('bootstrap/js/bootstrap.bundle.min.js')}}" rel="stylesheet">
    <link href="{{URL::asset('bootstrap/js/bootstrap.min.js')}}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    @livewire('login.login-page')

    @livewireScripts
</body>

</html>