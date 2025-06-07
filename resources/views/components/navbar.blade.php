@props(['user'])

<header class="select-none w-full flex justify-between items-center py-[16px] px-[98px] shadow-sm bg-white">
    <div class="flex items-center space-x-[8px]">
        <img src="{{ asset('images/logo_nusantara.webp') }}" alt="logo" loading="lazy" class="w-[40px] h-[40px]">
        <h1 class="text-[16px] text-text font-bold">{{ config('app.name') }}</h1>
    </div>
    <nav>
        <div class=" flex space-x-8">
            <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>
            <x-nav-link href="/produk" :active="request()->is('produk*')">Produk</x-nav-link>
            <x-nav-link href="/artikel" :active="request()->is('artikel*')">Artikel</x-nav-link>
            <x-nav-link href="/pelatihan" :active="request()->is('pelatihan*')">Pelatihan</x-nav-link>
        </div>
    </nav>
    <div class="flex">
        @guest
            <button type='button' onclick="window.location.href='{{ route('login') }}'"
                class="text-logo border-2 border-logo rounded-full py-[6px] px-[20px] hover:bg-logo hover:text-white">Login</button>
        @else
            <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                class="flex  items-center text-sm pe-1 font-medium text-gray-900 rounded-full hover:text-[#508D4E] md:me-0 focus:ring-4 focus:ring-gray-100 dark:text-white"
                type="button">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 me-2 rounded-full"
                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/Avatar.webp') }}"
                    alt="user photo" loading="lazy">
                {{ $user->name }}
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownAvatarName" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                    <div class="truncate font-medium ">{{ $user->name }}</div>
                    <div class="truncate">{{ $user->email }}</div>
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                    <li>
                        <a href="{{ route('Profile', $user->id) }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profil</a>
                    </li>
                    <li>
                        <a href="{{ route('riwayatPelatihan', $user->id) }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Riwayat
                            pelatihan</a>
                    </li>
                </ul>
                <div class="py-2">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            class="text-left w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</button>
                    </form>
                </div>
            </div>

        @endguest
    </div>
</header>
