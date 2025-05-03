@props(['produk'])
<a href="{{ route('produk.detail', $produk->id) }}"
    class="bg-white rounded-2xl p-4 shadow-card hover:shadow-lg transition duration-300 w-[260px] cursor-pointer">
    <img class="w-full h-[233px] object-cover rounded-xl mb-3" src="{{ asset('storage/' . $produk->gambar) }}"
        alt="{{ $produk->nama }}" loading="lazy">
    <h2 class="text-xl font-bold text-gray-800">{{ $produk->nama }}</h2>
    <p class="text-gray-900 font-semibold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
</a>
