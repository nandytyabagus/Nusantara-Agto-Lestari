<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])
    @stack('styles')
    <title>{{ config('app.name') }}</title>
</head>

<body>
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
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
