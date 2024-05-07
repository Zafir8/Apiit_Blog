<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon"/>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Styles -->
    @livewireStyles

    <style>
        #preloader {
            transition: opacity 1s ease-out; /* Adjust the duration as needed */
        }
    </style>
</head>

<body class="font-sans antialiased">
<div id="preloader" class="fixed inset-0 bg-white flex justify-center items-center z-50">
    <img src="{{ asset('images/logo.png') }}" alt="Loading..." class="w-50">
</div>
<x-banner />

@include('layouts.partials.header')

@yield('hero')
@yield('about')
@yield('blogger')



<main class="container mx-auto px-5 flex flex-grow">
    {{ $slot }}
</main>

@include('layouts.partials.footer')

@stack('modals')
@livewireScripts

<script>
    window.addEventListener('load', function() {
        var preloader = document.getElementById('preloader');
        preloader.style.opacity = '0';
        preloader.addEventListener('transitionend', function() {
            preloader.remove();
        });
    });

</script>
</body>

</html>

