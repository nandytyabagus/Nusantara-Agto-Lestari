<x-layouts.admin>
    <section class="p-[24px]">
        <div class="bg-white flex items-center rounded-t-2xl p-[24px]">
            <div class="w-1/2">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <x-heroicon-o-magnifying-glass class="w-5 h-5" />
                    </span>
                    <input type="search" name="search" id="search"
                        placeholder="Cari berdasarkan nama customer dan ulasan" autocomplete="off"
                        class="w-full pl-10 pr-4 py-3 rounded-2xl border border-gray-300 placeholder:text-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>
            </div>
        </div>
        <div class="px-2 rounded-b-2xl bg-white h-[72vh] overflow-y-auto">
            <table class="text-left w-full table-auto">
                <thead class="sticky top-0 z-10 bg-white">
                    <tr>
                        <th class="px-4 py-3">
                            <input type="checkbox" />
                        </th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Nama Customer</th>
                        <th class="px-4 py-3">Ulasan</th>
                        <th class="px-4 py-3">Tanggal Unggahan</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ulasans as $ulasan)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <input type="checkbox" />
                            </td>
                            <td class="px-4 py-3">Kategori</td>
                            <td class="px-4 py-3">{{ $ulasan->user->name }}</td>
                            <td class="px-4 py-3 text-justify whitespace-normal break-words max-w-md">
                                {{ Str::limit($ulasan->isi, 100) }}</td>
                            <td class="px-4 py-3">
                                {{ $ulasan->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center items-center gap-3">
                                    <button data-modal-target="modalDetail-{{ $ulasan->id }}"
                                        data-modal-toggle="modalDetail-{{ $ulasan->id }}" class="text-[#76BF4C]">
                                        <x-heroicon-s-eye class="w-5 h-5" />
                                    </button>
                                    <span class="text-gray-300">|</span>
                                    <form action="{{ route('hapusUlasan', $ulasan->id) }}" method="POST"
                                        class="form-hapus">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center">
                                            <span class="text-red-700 ">
                                                <x-heroicon-o-trash class="w-5 h-5" />
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <div id="modalDetail-{{ $ulasan->id }}" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-3xl max-h-full">
                                <div class="bg-white rounded-4xl shadow relative px-8 py-8 space-y-10">
                                    <button data-modal-hide="modalDetail-{{ $ulasan->id }}"
                                        class="absolute top-3 right-3 text-gray-400 bg-transparent hover:text-black rounded-full inline-flex items-center">
                                        <x-ri-close-circle-fill class="w-8 h-8 hover:text-red-600 text-red-500" />
                                    </button>
                                    <div class="mt-5">
                                        <p class=" italic">"{{ $ulasan->isi }}"</p>
                                    </div>
                                    <div class="flex gap-3 items-center">
                                        <img src="{{ $ulasan->user->avatar ? asset('storage/' . $ulasan->user->avatar) : asset('images/Avatar.webp') }}"
                                            alt="gambar" class=" w-24 h-24 rounded-full" loading="lazy">
                                        <div class="space-y-2">
                                            <h2 class="text-lg text-[#508D4E]">{{ $ulasan->user->name }}</h2>
                                            <p class="text-[#718096]">{{ $ulasan->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    @push('scripts')
        <script>
            document.querySelectorAll('.form-hapus').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Iya',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    @endpush
</x-layouts.admin>
