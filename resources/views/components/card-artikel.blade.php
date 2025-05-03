@props(['artikel'])
<div class="border border-t-2 border-[#B0B0B0] border-t-[#508D4E] p-5 space-y-3 bg-white">
    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="gambar" class="w-full rounded-xl object-cover h-64">
    <div>
        <h2 class="font-semibold text-3xl">{{ $artikel->judul }}</h2>
        <p class="text-xs text-gray-500 mt-1">
            {{ $artikel->user->name }} | <span>{{ $artikel->created_at->format('H:i - d M Y') }}</span>
        </p>
    </div>
    <p class="text-sm text-gray-700">{{ Str::limit($artikel->isi, 300) }}</p>
    <a href="{{ route('ShowArtikel', $artikel->slug) }}"
        class="inline-flex items-center px-5 py-2.5 text-sm bg-[#508D4E] text-white rounded-3xl hover:bg-[#3f6f3d] transition">
        Baca Selengkapnya
        <x-heroicon-o-chevron-double-right class="h-4 w-4 ml-2" />
    </a>
</div>
