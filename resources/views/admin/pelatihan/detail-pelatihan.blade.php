<x-layouts.Applayout>
    <div>
        <div class=" absolute z-50 top-8 left-8">
            <a href="{{ route('PelatihanAdmin') }}"
                class="text-gray-500 gap-2 flex items-center"><x-heroicon-o-arrow-long-left class="w-5 h-5" />Kembali</a>
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
                                    class="block font-semibold text-lg">{{ \Carbon\Carbon::parse($pelatihans->batas_pendaftaran)->translatedFormat('d F Y') }}</span>
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
                                <button type="submit"
                                    class="w-full bg-white text-[#508D4E] font-semibold text-xl py-3 rounded-xl"
                                    disabled>
                                    Daftar Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.Applayout>
