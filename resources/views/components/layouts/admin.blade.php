<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" sizes="32x32">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @stack('styles')
    <title>{{ config('app.name') }}</title>
</head>

<body class="font-dmsans">
    <div class="flex h-screen">
        @php
            $user = Auth::user();
        @endphp
        <x-sidebar></x-sidebar>

        <div class="flex-1 bg-dasar overflow-hidden">
            <x-headers :user="$user"></x-headers>
            {{ $slot }}
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
