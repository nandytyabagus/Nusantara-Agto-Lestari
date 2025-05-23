<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    @vite('resources/css/app.css')
    @stack('styles')
    <title>{{ config('app.name') }}</title>
</head>

<body>
    @php
        $user = Auth::user();
        $attribute = \App\Models\User::find(1);
    @endphp
    <x-navbar :user="$user"></x-navbar>
    <main>
        {{ $slot }}
    </main>
    <x-footer :user="$attribute"></x-footer>
    @include('sweetalert::alert')
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
</body>

</html>
