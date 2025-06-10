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
                    $currentSort = request('sort', 'desc');
                    $nextSortOrder = $currentSort === 'asc' ? 'desc' : 'asc';
                    $queryParams = array_merge(request()->except('sort'), ['sort' => $nextSortOrder]);
                @endphp

                <div class="w-1/2 flex justify-end">
                    <a href="{{ route('riwayatPelatihan', ['id' => $id] + $queryParams) }}"
                        class="px-12 py-4 bg-[#508D4E] text-white rounded-2xl flex items-center font-semibold gap-2">
                        @if ($currentSort === 'asc')
                            <x-phosphor-arrow-down-bold class="h-5" />
                            Urutkan Terbaru
                        @else
                            <x-phosphor-arrow-up-bold class="h-5" />
                            Urutkan Terlama
                        @endif
                    </a>
                </div>
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
                                            <div>
                                                @if ($pelatihan->batas_pendaftaran > now())
                                                    <img src="{{ $pelatihan->bukti_pembayaran ? asset('storage/' . $pelatihan->bukti_pembayaran) : '#' }}"
                                                        alt="Preview Gambar"
                                                        class="w-full h-full object-contain rounded-lg mx-auto mb-2">
                                                @elseif ($pelatihan->status === 'lunas')
                                                    <img src="{{ $pelatihan->bukti_pembayaran ? asset('storage/' . $pelatihan->bukti_pembayaran) : '#' }}"
                                                        alt="Preview Gambar"
                                                        class="w-full h-full object-contain rounded-lg mx-auto mb-2">
                                                @else
                                                    <form id="form-pembayaran-{{ $pelatihan->id }}"
                                                        action="{{ route('uploadBuktiPembayaran', $pelatihan->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div id="image-preview-{{ $pelatihan->id }}"
                                                            class="mb-3 {{ $pelatihan->bukti_pembayaran ? '' : 'hidden' }} cursor-pointer relative w-full h-[50vh]">
                                                            <img id="preview-{{ $pelatihan->id }}"
                                                                src="{{ $pelatihan->bukti_pembayaran ? asset('storage/' . $pelatihan->bukti_pembayaran) : '#' }}"
                                                                alt="Preview Gambar"
                                                                class="w-full h-full object-contain rounded-lg mx-auto mb-2">
                                                            <p class="text-sm text-center text-black">Klik gambar untuk
                                                                mengganti</p>
                                                        </div>
                                                        <label id="upload-label-{{ $pelatihan->id }}"
                                                            for="dropzone-file-{{ $pelatihan->id }}"
                                                            class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 {{ $pelatihan->bukti_pembayaran ? 'hidden' : '' }}">
                                                            <div
                                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <div
                                                                    class="bg-[#ECECEE] w-[80px] h-[80px] flex items-center justify-center rounded-full mb-3">
                                                                    <svg class="w-8 h-8 text-gray-800"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="currentColor" viewBox="0 0 24 24">
                                                                        <path
                                                                            d="M4 5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-3.172l-1.414-1.414A2 2 0 0 0 13.172 3h-2.344a2 2 0 0 0-1.414.586L8 5H4z" />
                                                                        <circle cx="12" cy="12" r="3.2"
                                                                            fill="#ECECEE" />
                                                                    </svg>
                                                                </div>
                                                                <p class="mb-2 text-sm text-gray-500 font-semibold">
                                                                    Upload
                                                                    Foto
                                                                </p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                                    JPG,
                                                                    JPEG,
                                                                    PNG & WEBP (MAX 2 MB)</p>
                                                            </div>
                                                            <input id="dropzone-file-{{ $pelatihan->id }}"
                                                                name="gambar" type="file" class="hidden" />
                                                        </label>
                                                        <div class="mt-10 flex justify-center">
                                                            <button type="submit" title="Simpan"
                                                                class="text-white bg-[#508D4E] px-4 py-2 rounded-lg cursor-pointer">
                                                                <x-fas-save class="w-6" />
                                                            </button>
                                                        </div>
                                                    </form>
                                                @endif
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
                        {{-- END MODAL --}}
                    @endforeach
                </tbody>
            </table>
        </div>
        @push('scripts')
            <script>
                document.querySelectorAll('form[id^="form-pembayaran"]').forEach(form => {
                    const id = form.id.replace('form-pembayaran-', '');
                    const inputFile = document.getElementById(`dropzone-file-${id}`);
                    const previewContainer = document.getElementById(`image-preview-${id}`);
                    const previewImage = document.getElementById(`preview-${id}`);
                    const uploadLabel = document.getElementById(`upload-label-${id}`);

                    if (previewImage && previewImage.src && !previewImage.src.endsWith('#')) {
                        previewContainer.classList.remove("hidden");
                        uploadLabel.classList.add("hidden");
                    }

                    if (inputFile) {
                        inputFile.addEventListener("change", function() {
                            const file = this.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.addEventListener("load", function() {
                                    previewImage.setAttribute("src", this.result);
                                    previewContainer.classList.remove("hidden");
                                    uploadLabel.classList.add("hidden");
                                });
                                reader.readAsDataURL(file);
                            }
                        });
                    }

                    if (previewContainer) {
                        previewContainer.addEventListener("click", function() {
                            inputFile.click();
                        });
                    }
                });
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
