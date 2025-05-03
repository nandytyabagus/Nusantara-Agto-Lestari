<x-layouts.customer>
    <div class="flex px-16 py-10 gap-16">
        <div class="w-3/4 space-y-5">
            <div class=" border-b-2 border-[#508D4E] pb-5">
                <h2 class="text-2xl">Artikel</h2>
            </div>
            @foreach ($artikels as $artikel)
                <div class="border border-t-2 border-[#B0B0B0] border-t-[#508D4E] p-5 space-y-3 bg-white">
                    <img src="{{ $artikel->gambar ?? '' }}" alt="gambar" class="w-full rounded-xl object-cover h-64">
                    <div>
                        <h2 class="font-semibold text-3xl">{{ $artikel->judul }}</h2>
                        <p class="text-xs text-gray-500">{{ $artikel->user->name }}</p>
                    </div>
                    <p class="text-sm text-gray-700">{{ Str::limit($artikel->isi, 300) }}</p>
                    <a href="{{ route('ShowArtikel', $artikel->slug) }}"
                        class="inline-flex items-center px-5 py-2.5 text-sm bg-[#508D4E] text-white rounded-3xl hover:bg-[#3f6f3d] transition">
                        Baca Selengkapnya
                        <x-heroicon-o-chevron-double-right class="h-4 w-4 ml-2" />
                    </a>
                </div>
            @endforeach
        </div>

        <div class="w-1/4 sticky top-10 max-h-[90vh] overflow-y-auto scrollbar-hidden space-y-3">
            <div class="sticky top-0 border-b-2 border-[#508D4E] pb-5 bg-white z-10">
                <h2 class="text-2xl">Artikel Lainnya</h2>
            </div>
            @foreach ($terbaru as $artikel)
                <div class="p-4 space-y-2 bg-white">
                    <img src="{{ $artikel->gambar ?? '' }}" alt="gambar" class="w-full rounded-lg object-cover h-40">
                    <h2 class="text-md font-medium">{{ Str::limit($artikel->judul, 50) }}</h2>
                    <a href="{{ route('ShowArtikel', $artikel->slug) }}"
                        class="inline-flex items-center px-4 py-1.5 text-sm bg-[#508D4E] text-white rounded-full hover:bg-[#3f6f3d] transition">
                        Baca Selengkapnya
                        <x-heroicon-o-chevron-double-right class="h-4 w-4 ml-2" />
                    </a>
                </div>
                <div class="border-[#B0B0B0] border-b">

                </div>
            @endforeach
        </div>
    </div>
</x-layouts.customer>
