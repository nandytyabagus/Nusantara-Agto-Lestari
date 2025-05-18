<x-layouts.customer>
    <div>
        <div class=" absolute z-50 top-24 left-8">
            <a href="{{ route('Pelatihan') }}" class="text-gray-500 gap-2 flex items-center"><x-heroicon-o-arrow-long-left
                    class="w-5 h-5" />Kembali</a>
        </div>
        <!-- Gambar Utama Full Width -->
        <div class="relative">
            <img src="" alt="Gambar Pelatihan" class="w-full h-[400px] object-cover rounded-lg" loading="lazy">
        </div>

        <div class="relative z-50 -top-22 bg-white px-16 ">
            <div class="rounded-2xl p-9 space-y-8">
                <div>
                    <h1 class=" font-bold text-4xl">{{ $pelatihans->judul_pelatihan }}</h1>
                </div>
                <div class="grid grid-cols-3 gap-9">
                    <div class="col-span-2 space-y-2">
                        <h1 class=" text-lg">Deskripsi</h1>
                        <p>{{ $pelatihans->deskripsi }}</p>
                    </div>
                    <div class=" rounded-[20px] bg-[#508D4E]">
                        <div class=" p-5 border-b-1 border-white">
                            <h3 class="text-xl font-bold text-white">Informasi Pelatihan</h3>
                        </div>

                        <div class="space-y-4 text-white p-5">
                            <div>
                                <span class="block">Batas Pendaftaran:</span>
                                <span
                                    class="block text-lg font-semibold">{{ \Carbon\Carbon::parse($pelatihans->batas_pendaftaran)->translatedFormat('d F Y') }}</span>
                            </div>

                            <div>
                                <span class="block">Alamat:</span>
                                <span class="block text-lg font-semibold">{{ $pelatihans->lokasi }}</span>
                            </div>

                            <div>
                                <span class="block">Waktu Pelaksanaan:</span>
                                <span
                                    class="block text-lg font-semibold">{{ \Carbon\Carbon::parse($pelatihans->waktu_pelaksanaan)->translatedFormat('d F Y | H:i') }}</span>
                            </div>

                            <div>
                                <span class="block">Sisa Kuota:</span>
                                <span class="block text-lg font-semibold">{{ $sisaKuota }}</span>
                            </div>

                            <div>
                                @if ($exists)
                                    <button class="w-full bg-white text-[#508D4E] font-semibold text-xl py-3 rounded-xl"
                                        disabled>Sudah Terdaftar</button>
                                @else
                                    <button id="btnDaftar" type="button"
                                        class="w-full bg-white text-[#508D4E] font-semibold text-xl py-3 rounded-xl cursor-pointer">
                                        Daftar Sekarang
                                    </button>
                                    </form>

                                    <!-- Modal Konfirmasi Flowbite -->
                                    <div id="modalKonfirmasi" tabindex="-1" aria-hidden="true"
                                        class="hidden flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 inset-0 h-modal h-full justify-center items-center bg-black/20 bg-opacity-50">
                                        <div class="relative p-4 max-w-3xl h-full md:h-auto">
                                            <div class="relative bg-white rounded-3xl shadow transition-all duration-300 scale-95 opacity-0"
                                                id="modalContentKonfirmasi">
                                                <button type="button" id="batalModal"
                                                    class="absolute top-3 right-3 text-gray-400 bg-transparent hover:text-black rounded-full inline-flex items-center"
                                                    data-modal-hide="modalKonfirmasi">
                                                    <x-ri-close-circle-fill
                                                        class="w-8 h-8 hover:text-red-600 text-red-500" />
                                                </button>
                                                <div
                                                    class="px-8 py-4 border-b-1 border-gray-300 flex items-center gap-2">
                                                    <img src="{{ asset('images/logo_nusantara.webp') }}" alt="logo"
                                                        loading="lazy" class="w-12 h-12">
                                                    <h1 class="text-xl text-text font-bold">{{ config('app.name') }}
                                                    </h1>
                                                </div>
                                                <div class="px-8 py-4 space-y-4">
                                                    <div class="">
                                                        <h3 class="text-lg font-semibold text-black">
                                                            Apakah Anda yakin ingin mendaftar pelatihan ini?</h3>
                                                        <p class="text-sm text-black dark:text-gray-400">
                                                            Untuk Data peserta otomatis akan diambil dari Data Profile
                                                            Akun.
                                                        </p>
                                                        <p class="text-sm text-black dark:text-gray-400">
                                                            Pastikan Data Profile anda benar.
                                                        </p>
                                                    </div>
                                                    <div class="px-4 py-3 bg-gray-100 rounded-lg mb-4">
                                                        <p class="text-black flex items-center gap-2">
                                                            <x-forkawesome-user class=" h-5 w-5" />Nama : <span
                                                                class="text-gray-600 dark:text-gray-400">{{ $user->name }}</span>
                                                        </p>
                                                        <p class="text-black flex items-center gap-2"> <x-entypo-mail
                                                                class="h-5 w-5" />Email : <span
                                                                class="text-gray-600 dark:text-gray-400">
                                                                {{ $user->email }}</span></p>
                                                        <p class="text-black flex items-center gap-2">
                                                            <x-heroicon-s-phone class="h-5 w-5" />Nomor : <span
                                                                class="text-gray-600 dark:text-gray-400">
                                                                {{ $user->nomor }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="p-4 bg-yellow-100 text-yellow-800 rounded-lg space-y-4">
                                                        <div>
                                                            <p class="font-semibold">📌 Catatan Penting:</p>
                                                            <ul class="list-disc text-sm ml-5">
                                                                <li>Pembayaran pelatihan dilakukan di luar sistem
                                                                    website.
                                                                </li>
                                                                <li>Hubungi Admin setelah melakukan pendaftaran untuk
                                                                    melakukan pembayaran.
                                                                </li>
                                                                <li>Pastikan Anda mengirim bukti pembayaran kepada Admin
                                                                </li>
                                                                <li>Jika ada pertanyaan terkait materi, jadwal, atau
                                                                    kebutuhan lainnya, jangan ragu untuk bertanya
                                                                    langsung
                                                                    kepada Admin.</li>
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <p class="font-semibold">📞 Kontak Admin:</p>
                                                            <ul class="list-disc text-sm ml-5">
                                                                <li>
                                                                    <p class="font-semibold">Nomor Telepon :
                                                                        <span
                                                                            class="font-normal">{{ $admin->nomor }}</span>
                                                                    </p>
                                                                </li>
                                                                <li>
                                                                    <p class="font-semibold">Email :
                                                                        <span
                                                                            class="font-normal">{{ $admin->email }}</span>
                                                                    </p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="absolute right-12 bottom-32">
                                                        <a href="https://wa.me/6287845015648?text=Halo%20Admin,%20saya%20ingin%20melakukan%20pembayaran.%20Mohon%20lengkapi%20data%20di%20bawah:%0A-%20Nama:%20%0A-%20Nomor%20Rekening:%20%0A-%20Jumlah%20Transfer:%20"
                                                            class="p-4 bg-[#25D366] rounded-full transition duration-300 inline-flex items-center justify-center hover:bg-[#20c056]"
                                                            target="_blank">
                                                            <x-bi-whatsapp class="text-white w-6 h-6" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="px-8 py-4 flex justify-center border-t-1 border-gray-300">
                                                    <form id="daftarForm"
                                                        action="{{ route('daftarPelatihanCustomer', $pelatihans->id) }}"
                                                        method="POST" class="space-x-2">
                                                        @csrf
                                                        <button id="konfirmasiModal" type="submit"
                                                            class="text-white bg-[#508D4E] rounded-lg px-5 py-3">
                                                            Daftar Sekarang
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var btnDaftar = document.getElementById('btnDaftar');
                var modalKonfirmasi = document.getElementById('modalKonfirmasi');
                var modalContentKonfirmasi = document.getElementById('modalContentKonfirmasi');
                var batalModal = document.getElementById('batalModal');
                var batalModal2 = document.getElementById('batalModal2');

                // Show modal with animation
                if (btnDaftar) {
                    btnDaftar.addEventListener('click', function(e) {
                        e.preventDefault();
                        fetch("{{ route('pelatihan.cekUser') }}", {
                                method: "POST",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    "Content-Type": "application/json"
                                }
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.status === 'error') {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Data Tidak Lengkap',
                                        text: data.message
                                    });
                                } else {
                                    if (modalKonfirmasi && modalContentKonfirmasi) {
                                        modalKonfirmasi.classList.remove('hidden');
                                        setTimeout(function() {
                                            modalContentKonfirmasi.classList.remove('scale-95',
                                                'opacity-0');
                                            modalContentKonfirmasi.classList.add('scale-100',
                                                'opacity-100');
                                        }, 10);
                                    }
                                }
                            });
                    });
                }

                // Hide modal with animation
                function hideModal() {
                    if (modalKonfirmasi && modalContentKonfirmasi) {
                        modalContentKonfirmasi.classList.remove('scale-100', 'opacity-100');
                        modalContentKonfirmasi.classList.add('scale-95', 'opacity-0');
                        setTimeout(function() {
                            modalKonfirmasi.classList.add('hidden');
                        }, 300);
                    }
                }

                if (batalModal) {
                    batalModal.onclick = hideModal;
                }
            });
        </script>
    @endpush
</x-layouts.customer>
