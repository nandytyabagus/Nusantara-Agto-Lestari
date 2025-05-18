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
                @php
                    $nextSortOrder = request('sort') == 'asc' ? 'desc' : 'asc';
                @endphp

                <a href="{{ route('riwayatPelatihan', ['id' => $id, 'sort' => $nextSortOrder] + request()->except('sort')) }}"
                    class="px-12 py-4 bg-[#508D4E] text-white rounded-2xl flex items-center font-semibold gap-2">
                    @if (request('sort') == 'asc')
                        <x-phosphor-arrow-down-bold class="h-5" />Urutkan Terbaru
                    @else
                        <x-phosphor-arrow-up-bold class="h-5" />Urutkan Terlama
                    @endif
                </a>
            </div>
        </div>
        <div class="overflow-x-auto h-[72vh] scrollbar-hidden border-b-2 border-t-2 border-gray-300">
            <table class="w-full text-left border-collapse">
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
                        <tr data-modal-target="modalDetail-{{ $pelatihan?->id }}"
                            data-modal-toggle="modalDetail-{{ $pelatihan?->id }}"
                            class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-[#E3F4E0]' }} cursor-pointer">
                            <td class="px-4 py-4 w-10">{{ $index + 1 }}</td>
                            <td class="px-4 py-4">{{ $pelatihan->pelatihan->judul_pelatihan }}</td>
                            <td class="px-4 py-4">{{ $pelatihan->pelatihan->lokasi }}</td>
                            <td class="px-4 py-4">
                                {{ \Carbon\Carbon::parse($pelatihan->pelatihan->waktu_pelaksanaan)->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-4 py-4 text-center">
                                @switch($pelatihan->status)
                                    @case('lunas')
                                        <span class="text-green-500 font-semibold">Lunas</span>
                                    @break

                                    @case('pending')
                                        <span class="text-yellow-500 font-semibold">Pending</span>
                                    @break

                                    @case('rejected')
                                        <span class="text-red-500 font-semibold">Dibatalkan</span>
                                    @break

                                    @default
                                        <span class="text-gray-500">-</span>
                                @endswitch
                            </td>
                        </tr>

                        {{-- MODAL --}}
                        <div id="modalDetail-{{ $pelatihan?->id }}" data-modal-backdrop="static" tabindex="-1"
                            aria-hidden="true "
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full transition-opacity duration-300 ease-out">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <div class="relative bg-white rounded-3xl shadow-lg transform transition-all duration-300 ease-out scale-95 opacity-0"
                                    id="modalContent-{{ $pelatihan?->id }}">
                                    {{-- Tombol Close --}}
                                    <button type="button"
                                        class="absolute top-3 right-3 rounded-full inline-flex items-center cursor-pointer"
                                        data-modal-hide="modalDetail-{{ $pelatihan?->id }}">
                                        <x-ri-close-circle-fill class="w-8 h-8 hover:text-red-600 text-red-500" />
                                    </button>

                                    {{-- Header --}}
                                    <div class="px-8 py-4 border-b border-gray-300 flex items-center gap-2">
                                        <img src="{{ asset('images/logo_nusantara.webp') }}" alt="logo"
                                            loading="lazy" class="w-12 h-12">
                                        <h1 class="text-xl text-text font-bold">{{ config('app.name') }}</h1>
                                    </div>

                                    {{-- Body --}}
                                    <div class="px-8 py-4 space-y-4">
                                        <div>
                                            <h2 class="font-semibold text-xl text-center">Detail Riwayat Pelatihan</h2>
                                        </div>
                                        <div class="space-y-2">
                                            <p class="font-semibold">Judul Pelatihan :
                                                <span
                                                    class="text-text">{{ $pelatihan->pelatihan->judul_pelatihan }}</span>
                                            </p>
                                            <p class="font-semibold">Tanggal :
                                                <span
                                                    class="text-text">{{ \Carbon\Carbon::parse($pelatihan->pelatihan->waktu_pelaksanaan)->translatedFormat('d F Y') }}</span>
                                            </p>
                                            <p class="font-semibold">Waktu :
                                                <span
                                                    class="text-text">{{ \Carbon\Carbon::parse($pelatihan->pelatihan->waktu_pelaksanaan)->translatedFormat('H:i') }}
                                                    WIB</span>
                                            </p>
                                            <p class="font-semibold">Lokasi :
                                                <span class="text-text">{{ $pelatihan->pelatihan->lokasi }}</span>
                                            </p>
                                            <p class="font-semibold">Tanggal Mendaftar :
                                                <span
                                                    class="text-text">{{ \Carbon\Carbon::parse($pelatihan->pelatihan->created_at)->translatedFormat('d F Y | H:i') }}
                                                    WIB</span>
                                            </p>
                                        </div>

                                        {{-- Catatan --}}
                                        <div class="space-y-4">
                                            <p class="text-gray-700">
                                                Jika Anda mengalami permasalahan atau memiliki pertanyaan terkait
                                                pelatihan ini,
                                                silakan hubungi admin melalui tombol di bawah ini.
                                            </p>
                                            <div class="p-4 bg-yellow-100 text-yellow-800 rounded-lg">
                                                <p class="font-semibold">Catatan:</p>
                                                <ul class="list-disc ml-5 mt-2 text-sm">
                                                    <li>Pastikan Anda sudah membaca informasi detail mengenai pelatihan.
                                                    </li>
                                                    <li>Jika ada kesalahan data, segera hubungi admin.</li>
                                                    <li>Admin siap membantu Anda dalam proses pendaftaran atau
                                                        permasalahan teknis lainnya.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Footer --}}
                                    <div class="px-8 py-4 flex justify-center border-t border-gray-300">
                                        <a href="https://wa.me/6287845015648?text=Halo%20Admin,%20saya%20ingin%20melakukan%20pembayaran.%20Mohon%20lengkapi%20data%20di%20bawah:%0A-%20Nama:%20%0A-%20Nomor%20Rekening:%20%0A-%20Jumlah%20Transfer:%20"
                                            class="text-white bg-[#508D4E] rounded-lg px-5 py-3" target="_blank">
                                            Hubungi Admin
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        @push('scripts')
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    document.querySelectorAll('[data-modal-toggle]').forEach(button => {
                        button.addEventListener('click', () => {
                            const target = button.getAttribute('data-modal-target');
                            const modal = document.getElementById(target);
                            const modalContent = modal.querySelector('.transform');

                            modal.classList.remove('hidden');
                            setTimeout(() => {
                                modalContent.classList.remove('scale-95', 'opacity-0');
                                modalContent.classList.add('scale-100', 'opacity-100');
                            }, 10);
                        });
                    });

                    document.querySelectorAll('[data-modal-hide]').forEach(button => {
                        button.addEventListener('click', () => {
                            const target = button.getAttribute('data-modal-hide');
                            const modal = document.getElementById(target);
                            const modalContent = modal.querySelector('.transform');

                            modalContent.classList.add('scale-95', 'opacity-0');
                            modalContent.classList.remove('scale-100', 'opacity-100');

                            setTimeout(() => {
                                modal.classList.add('hidden');
                            }, 300);
                        });
                    });
                });
            </script>
        @endpush
</x-layouts.customer>
