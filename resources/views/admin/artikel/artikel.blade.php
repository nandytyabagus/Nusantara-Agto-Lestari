<x-layouts.admin>
    <section class="p-[24px]">
        <div class="bg-white flex items-center rounded-t-2xl p-[24px]">
            <div class="w-1/2">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <x-heroicon-o-magnifying-glass class="w-5 h-5" />
                    </span>
                    <form method="GET" action="{{ route('ArtikelAdmin') }}" class="w-full">
                        <input type="search" name="search" id="search" placeholder="Cari berdasarkan judul artikel"
                            autocomplete="off" value="{{ request('search') }}"
                            class="w-full pl-10 pr-4 py-3 rounded-2xl border border-gray-300 placeholder:text-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    </form>
                </div>
            </div>
            <div class="w-1/2 flex justify-end">
                <a href="{{ route('viewTambahArtikel') }}"
                    class="px-4 py-3 text-white rounded-2xl text-sm font-medium flex items-center bg-[#1474A7]"><x-heroicon-o-document-plus
                        class="w-5 h-5 mr-2" />Tambah Artikel</button>
                </a>
            </div>
        </div>
        <div class="px-2 rounded-b-2xl bg-white h-[72vh] overflow-y-auto">
            <table class="text-left w-full table-auto">
                <thead class="sticky top-0 z-10 bg-white">
                    <tr>
                        <th class="px-4 py-3">
                            <input type="checkbox" />
                        </th>
                        <th class="px-4 py-3">Gambar</th>
                        <th class="px-4 py-3">Judul Artikel</th>
                        <th class="px-4 py-3">Isi Artikel</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artikels as $artikel)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <input type="checkbox" />
                            </td>
                            <td class="px-4 py-3">
                                <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="gambar" class=" w-20"
                                    loading="lazy">
                            </td>
                            <td class="px-4 py-3">{{ $artikel->judul }}</td>
                            <td class="px-4 py-3 text-justify whitespace-normal break-words max-w-md">
                                {!! Str::limit($artikel->isi, 100) !!}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('detailArtikel', $artikel->id) }}" class="text-[#76BF4C]">
                                        <x-heroicon-s-eye class="w-5 h-5" />
                                    </a>
                                    <span class="text-gray-300">|</span>
                                    <a href="{{ route('ShowViewEditArtikel', $artikel->id) }}"
                                        class="text-blue-600 hover:text-blue-800">
                                        <x-far-edit class="w-5 h-5" />
                                    </a>
                                    <span class="text-gray-300">|</span>
                                    <form action="{{ route('hapusArtikel', $artikel->id) }}" method="POST"
                                        class="form-hapus">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center">
                                            <span class="text-red-700 cursor-pointer">
                                                <x-heroicon-o-trash class="w-5 h-5" />
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
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
                        cancelButtonText: 'Tidak'
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
