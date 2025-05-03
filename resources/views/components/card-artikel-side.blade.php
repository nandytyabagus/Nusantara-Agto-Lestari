@props(['artikel'])
<div class="p-4 space-y-2 bg-white">
    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="gambar" class="w-full rounded-lg object-cover h-35">
    <h2 class="text-md font-medium">{{ Str::limit($artikel->judul, 50) }}</h2>
    <a href="{{ route('ShowArtikel', $artikel->slug) }}"
        class="inline-flex items-center px-4 py-1.5 text-sm bg-[#508D4E] text-white rounded-full hover:bg-[#3f6f3d] transition">
        Baca Selengkapnya
        <x-heroicon-o-chevron-double-right class="h-4 w-4 ml-2" />
    </a>
</div>
