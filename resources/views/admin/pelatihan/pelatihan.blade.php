<x-layouts.admin>
    <section class="p-[24px]">
        <div class="bg-white flex items-center rounded-t-2xl p-[24px]">
            <div class="w-1/2">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <x-heroicon-o-magnifying-glass class="w-5 h-5" />
                    </span>
                    <form method="GET" action="{{ route('PelatihanAdmin') }}" class="w-full">
                        <input type="search" name="search" id="search"
                            placeholder="Cari berdasarkan nama produk dan kategori" autocomplete="off"
                            value="{{ request('search') }}"
                            class="w-full pl-10 pr-4 py-3 rounded-2xl border border-gray-300 placeholder:text-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    </form>
                </div>
            </div>
            <div class="w-1/2 flex justify-end gap-3">
                <a href="{{ route('viewTambahPelatihan') }}"
                    class="px-4 py-3 text-white rounded-2xl text-sm font-medium flex items-center bg-[#1474A7]"><x-solar-users-group-two-rounded-outline
                        class="w-5 h-5 mr-2" />Tambah Pelatihan</button>
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
                        <th class="px-4 py-3">Judul Pelatihan</th>
                        <th class="px-4 py-3">Deskripsi</th>
                        <th class="px-4 py-3">Tangal pelaksanaan</th>
                        <th class="px-4 py-3">Kuota</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelatihans as $pelatihan)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <input type="checkbox" />
                            </td>
                            <td class="px-4 py-3">{{ $pelatihan->judul_pelatihan }}</td>
                            <td class="px-4 py-3 text-justify whitespace-normal break-words max-w-md">
                                {{ Str::limit($pelatihan->deskripsi, 100) }}
                            </td>
                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($pelatihan->waktu_pelaksanaan)->translatedFormat('d F Y') }}
                            </td>
                            <td class="text-center px-3 py-3">{{ $pelatihan->kuota }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('detailPelatihan', $pelatihan->id) }}"
                                        class="text-[#76BF4C]"><x-heroicon-s-eye class="w-5 h-5" /></a>
                                    <span class="text-gray-300">|</span>
                                    <a href="{{ route('viewPendaftaran', $pelatihan->id) }}"
                                        class="text-gray-700"><x-heroicon-o-document-duplicate class="w-5 h-5" />
                                    </a>
                                    <span class="text-gray-300">|</span>
                                    <a href="{{ route('editPelatihan', $pelatihan->id) }}"
                                        class="text-blue-600 hover:text-blue-800">
                                        <x-far-edit class="w-5 h-5" />
                                    </a>
                                    <span class="text-gray-300">|</span>
                                    <form action="{{ route('hapusPelatihan', $pelatihan->id) }}" method="POST"
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
