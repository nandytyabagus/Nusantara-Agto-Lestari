<x-layouts.customer>
    <div class="p-10 w-full pb-16">
        <div class="border-b-2 border-[#508D4E] pb-5">
            <h1 class="text-3xl font-bold">Riwayat Pelatihan</h1>
            <p class="text-gray-500">Berikut adalah riwayat pelatihan yang telah Anda ikuti.</p>
        </div>
        <div class="bg-white flex items-center rounded-t-2xl py-5">
            <div class="w-1/2">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <x-heroicon-o-magnifying-glass class="w-5 h-5" />
                    </span>
                    <form method="GET" action="" class="w-full">
                        <input type="search" name="search" id="search"
                            placeholder="Cari berdasarkan judul pelatihan" autocomplete="off"
                            value="{{ request('search') }}"
                            class="w-full pl-10 pr-4 py-4 rounded-2xl border border-gray-300 placeholder:text-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-[#508D4E] focus:border-transparent" />
                    </form>
                </div>
            </div>
            <div class="w-1/2 flex justify-end">
                <button
                    class="px-12 py-4 text-white rounded-2xl text-sm font-medium flex items-center bg-[#508D4E]"><x-heroicon-s-arrow-long-up
                        class="w-5 h-5 mr-2" />Urutkan
                </button>
            </div>
        </div>
        <div class="overflow-x-auto h-[72vh] scrollbar-hidden border-b-2 border-t-2 border-gray-300 ">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#508D4E] text-white stic">
                    <thead class="bg-white sticky top-0 z-10 border-b-2 border-gray-300">
                        <tr>
                            <th class="px-4 py-4 w-10">No</th>
                            <th class="px-4 py-4">Judul Pelatihan</th>
                            <th class="px-4 py-4">Lokasi</th>
                            <th class="px-4 py-4">Pelaksanaan</th>
                            <th class="px-4 py-4 text-center">Status</th>
                        </tr>
                    </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($pelatihans as $index => $pelatihan)
                        <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-[#E3F4E0]' }}">
                            <td class="px-4 py-4 w-10">{{ $index + 1 }}</td>
                            <td class="px-4 py-4">{{ $pelatihan->pelatihan->judul_pelatihan }}</td>
                            <td class="px-4 py-4">{{ $pelatihan->pelatihan->lokasi }}</td>
                            <td class="px-4 py-4">
                                {{ \Carbon\Carbon::parse($pelatihan->pelatihan->waktu_pelaksanaan)->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-4 py-4 text-center">
                                @if ($pelatihan->status == 'lunas')
                                    <span class="text-green-500 font-semibold">Lunas</span>
                                @elseif($pelatihan->status == 'pending')
                                    <span class="text-yellow-500 font-semibold">Pending</span>
                                @elseif($pelatihan->status == 'rejected')
                                    <span class="text-red-500 font-semibold">Dibatalkan</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.customer>
