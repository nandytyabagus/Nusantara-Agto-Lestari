@props(['ulasan'])

<div class=" relative p-4 space-y-5">
    <div class="absolute top-3 right-3">
        <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            type="button">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 4 15">
                <path
                    d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdownDots"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-30 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                <li>
                    <a href="#" class="flex gap-2 font-medium px-4 py-2 hover:bg-gray-100"><x-far-edit
                            class="w-5 h-5 text-blue-600" />Edit</a>
                </li>
                <li>
                    <a href="#" class="flex gap-2 font-medium px-3.5 py-2 hover:bg-gray-100"><x-heroicon-o-trash
                            class="w-5 h-5 text-red-500" />Hapus</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="flex items-center w-full">
        <img src="" alt="" class=" w-10 h-10 rounded-full">
        <h1 class="ml-2">{{ $ulasan->user->name }}</h1>
        <p class="ml-3">{{ $ulasan->created_at->diffForHumans() }}</p>
    </div>
    <div>
        <p>
            {{ $ulasan->isi }}
        </p>
    </div>
</div>
