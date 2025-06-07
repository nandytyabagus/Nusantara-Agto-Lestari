@props(['user'])

<header class="bg-white text-logo py-[17px] px-[24px] flex justify-between items-center">
    <div class="flex items-center space-x-4">
        <h2 class="text-xl font-semibold">Dashboard</h2>
    </div>

    <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
        class="flex items-center text-sm pe-1 font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white"
        type="button">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 me-2 rounded-full"
            src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/Avatar.webp') }}" alt="user photo"
            loading="lazy">
        {{ $user->name }}
        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
        </svg>
    </button>

    <!-- Dropdown menu -->
    <div id="dropdownAvatarName"
        class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
            <div class="font-medium ">{{ $user->name }}</div>
            <div class="truncate">{{ $user->email }}</div>
        </div>
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
            <li>
                <a href="{{ route('ShowProfile', $user->id) }}"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profil</a>
            </li>
        </ul>
        <div class="py-2">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    class="text-left w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                    out</button>
            </form>
        </div>
    </div>
</header>
