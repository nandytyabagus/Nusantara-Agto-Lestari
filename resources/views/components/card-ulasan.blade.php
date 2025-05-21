@props(['ulasan'])

<div class=" relative p-4 space-y-5 rounded-lg bg-white shadow-ulasan">
    @php
        $bisaEdit = now()->lessThan($ulasan->created_at->addMinutes(5));
    @endphp

    @if (Auth::id() === $ulasan->user_id)
        <div class="absolute top-3 right-3">
            <button id="dropdownMenuIconButton-{{ $ulasan->id }}"
                data-dropdown-toggle="dropdownDots-{{ $ulasan->id }}"
                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                type="button">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 16 3">
                    <path
                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownDots-{{ $ulasan->id }}"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-30">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconButton-{{ $ulasan->id }}">
                    @if ($bisaEdit)
                        <li>
                            <button data-modal-target="modal-{{ $ulasan->id }}"
                                data-modal-toggle="modal-{{ $ulasan->id }}"
                                class="flex w-full gap-2 font-medium px-4 py-2 hover:bg-gray-100"><x-far-edit
                                    class="w-5 h-5 text-blue-600" />Edit</button>
                        </li>
                    @endif
                    <li>
                        <form action="{{ route('ulasan.destroy', $ulasan->id) }}" method="POST" class="form-hapus">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex w-full gap-2 font-medium px-3.5 py-2 hover:bg-gray-100"><x-heroicon-o-trash
                                    class="w-5 h-5 text-red-500" />Hapus</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    @endif

    <div class="flex items-center w-full">
        <img src="{{ $ulasan->user->avatar ? asset('storage/' . $ulasan->user->avatar) : asset('images/Avatar.webp') }}"
            alt="" class=" w-10 h-10 rounded-full">
        <h1 class="ml-2">{{ $ulasan->user->name }}</h1>
        <p class="ml-3">{{ $ulasan->created_at->diffForHumans() }}</p>
    </div>
    <div class="w-full pr-10">
        <p>
            {{ $ulasan->isi }}
        </p>
    </div>
    <div id="modal-{{ $ulasan->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-6xl max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm ">
                <button type="button"
                    class="absolute top-4 right-3 rounded-full inline-flex items-center cursor-pointer"
                    data-modal-hide="modal-{{ $ulasan->id }}">
                    <x-ri-close-circle-fill class="w-8 h-8 hover:text-red-600 text-red-500" />
                </button>
                <div class="py-4 text-center border-b border-gray-200 font-semibold text-xl">
                    <h1>Edit Ulasan</h1>
                </div>
                <div class="p-4 space-y-6">
                    <form action="{{ route('ulasan.update', $ulasan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div
                            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" name="comment"
                                class="px-0 resize-none h-30 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                placeholder="Tuliskan Ulasan anda...">{{ $ulasan->isi }}</textarea>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center py-3 px-6 text-sm font-medium text-center text-white bg-[#508D4E] rounded-lg hover:bg-[#5ea55b] cursor-pointer">
                            Edit Ulasan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.querySelectorAll('.form-hapus').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Ulasan tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
