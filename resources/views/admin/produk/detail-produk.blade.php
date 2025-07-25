<x-layouts.Applayout>
    <div class="w-full lg:flex h-screen justify-center items-center">
        <div class="lg:w-1/2 bg-[#E3F4E0] h-[70%] md:h-screen flex justify-center items-center">
            <a href="{{ route('ProdukAdmin') }}"
                class="flex items-center gap-2 py-2 px-5 bg-white rounded-full absolute top-4 left-5 md:top-7 md:left-6 lg:top-8 lg:left-7 text-text">
                <x-heroicon-o-arrow-long-left class="w-5 h-5" />Kembali ke halaman produk
            </a>
            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="gambar" loading="lazy"
                class=" w-sm md:w-xl lg:w-md xl:w-lg">
        </div>
        <div class="lg:w-1/2 flex justify-center items-center p-10 md:px-20 lg:px-40">
            <div class="space-y-3">
                <div>
                    <h2 class="text-2xl font-bold">{{ $produk->nama }}</h2>
                    <h2 class="text-xl">Rp. {{ number_format($produk->harga, 2, ',', '.') }}</h2>
                </div>
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-logo">Kategori : {{ $produk->kategori->nama }}</h2>
                    <h2 class="text-lg font-semibold">Deskripsi :</h2>
                    <div>
                        {!! nl2br(e($produk->deskripsi)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.Applayout>
