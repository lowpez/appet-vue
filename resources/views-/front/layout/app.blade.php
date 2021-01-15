<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A p p e t</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/base.css')}}">
    <link rel="stylesheet" href="{{asset('css/appet.css')}}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" integrity="sha384-AKT9MKPmIq4VMihDqOB6HeDHSsXGyf92WHPCSwHAZPIVJpD8Jv6dmfTLZeLDvV4O" crossorigin="anonymous">
    @stack('styles')
</head>
<body>
@include('front.include.header')
<div class="container-fluid py-5 px-lg-5">
@yield('content')
</div>
@include('front.include.footer')
</body>
</html>
