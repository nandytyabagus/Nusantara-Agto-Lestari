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
                            <td class="px-4 py-3">{{ $ulasan->user->name }}</td>
                            <td class="px-4 py-3 text-justify whitespace-normal break-words max-w-md">
                                {{ $ulasan->isi }}</td>
                            <td class="px-4 py-3">
                                {{ $ulasan->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center items-center gap-3">
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
</x-layouts.admin>
