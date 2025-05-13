<x-layouts.admin>
    <section class="p-6">
        <div class="bg-white items-center rounded-2xl ">
            <div class="p-6 border-b-2 border-dasar">
                <h1 class="text-xl font-semibold">
                    @if ($detailPelatihan->isNotEmpty())
                        {{ $detailPelatihan->first()->pelatihan->judul_pelatihan }}
                    @else
                        Pelatihan Tidak Ditemukan atau Belum Ada Pendaftar
                    @endif
                </h1>
            </div>
            <div class="p-6 ">
                <table class="text-left w-full table-auto border-b-1">
                    <thead class="sticky top-0 z-10 bg-white border-b-1 ">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Nomor Telefon</th>
                            <th class="px-4 py-3">Waktu Pendaftaran</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($detailPelatihan as $index => $detail)
                            <tr>
                                <td class="px-4 py-3">{{ $index + 1 }}</td>
                                <td class="px-4 py-3">{{ $detail->user->name }}</td>
                                <td class="px-4 py-3">{{ $detail->user->email }}</td>
                                <td class="px-4 py-3">{{ $detail->user->nomor }}</td>
                                <td class="px-4 py-3">{{ $detail->created_at->format('d M Y H:i') }}</td>
                                <td class="px-4 py-3">{{ ucfirst($detail->status) }}</td>
                                <td class="px-4 py-3 text-center">
                                    <form action="" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" onchange="this.form.submit()"
                                            class="border-gray-300 rounded-md">
                                            <option value="pending"
                                                {{ $detail->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="lunas" {{ $detail->status == 'lunas' ? 'selected' : '' }}>
                                                Lunas</option>
                                            <option value="rejected"
                                                {{ $detail->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-gray-500">
                                    Belum ada pendaftar untuk pelatihan ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class=" flex p-6 border-t-1 border-dasar">
                <a href="{{ route('Pelatihan') }}"
                    class="flex items-center gap-2 text-white font-medium bg-[#508D4E] px-4 py-3 rounded-lg">
                    <x-heroicon-s-arrow-small-left class="w-6 h-6" />Kembali
                </a>
            </div>
        </div>
    </section>
</x-layouts.admin>
