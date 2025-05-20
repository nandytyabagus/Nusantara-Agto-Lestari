<x-layouts.Applayout>
    <div class="w-full lg:flex h-screen justify-center items-center">
        <div class="lg:w-1/2 bg-[#E3F4E0] h-[70%] md:h-screen flex justify-center items-center">
            <a href="{{ route('Produk') }}"
                class="flex items-center gap-2 absolute top-4 left-5 md:top-7 md:left-6 lg:top-8 lg:left-7 text-text">
                <x-heroicon-o-arrow-long-left class="w-5 h-5" />Kembali ke halaman produk
            </a>
            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="gambar" loading="lazy"
                class=" w-sm md:w-xl lg:w-md xl:w-lg">
        </div>
        <div class="md:w-1/2 flex justify-center items-center p-10 md:px-20 lg:px-40">
            <div class="space-y-3">
                <div>
                    <h2 class="text-2xl font-bold">{{ $produk->nama }}</h2>
                    <h2 class="text-xl">Rp. {{ number_format($produk->harga, 2, ',', '.') }}</h2>
                </div>
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-logo">Kategori : {{ $produk->kategori->nama }}</h2>
                    <h2 class="text-lg font-semibold">Deskripsi :</h2>
                    <p>{{ $produk->deskripsi }}</p>
                </div>
                <div>
                    <a href="https://wa.me/6287845015648?text=Halo%20Admin,%20saya%20ingin%20melakukan%20pembayaran.%20Mohon%20lengkapi%20data%20di%20bawah:%0A-%20Nama:%20%0A-%20Nomor%20Rekening:%20%0A-%20Jumlah%20Transfer:%20"
                        class="bg-[#508D4E] px-6 py-4 rounded-lg text-white" target="_blank">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.Applayout>
