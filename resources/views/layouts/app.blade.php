<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>A p p e t</title>
    <link rel="stylesheet" href="{{asset('css/base.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('css/appet.css')}}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" integrity="sha384-AKT9MKPmIq4VMihDqOB6HeDHSsXGyf92WHPCSwHAZPIVJpD8Jv6dmfTLZeLDvV4O" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/croppie.css')}}">
    @stack('styles')
</head>
<body>
   <div class="d-flex flex-column flex-lg-row" id="app">
        @include('include.header')
        <main class="container">
            @yield('content')
        </main>
   </div>    
@include('include.footer')

@stack('script')
</body>
</html>
