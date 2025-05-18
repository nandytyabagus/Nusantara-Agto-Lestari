<x-layouts.customer>
    <div>
        <a href="{{ route('Artikel') }}" class="flex items-center gap-2 absolute top-24 left-8">
            <x-heroicon-o-arrow-long-left class="w-5 h-5" />Kembali ke halaman artikel
        </a>
        <img src="" alt="" class="w-full h-[420px]" loading="lazy">
    </div>
    <div class="flex p-14 gap-16">
        <div class="w-3/4">
            <div class=" space-y-8">
                <h1 class="text-5xl font-bold">{{ $artikel->judul }}</h1>
                <div class=" space-y-3">
                    <p class="">{{ $artikel->isi }}</p>
                    <p class="text-xs flex items-center font-semibold gap-1 text-[#508D4E]"><x-solar-pen-new-square-bold
                            class="w-4 h-4" />{{ $artikel->user->name }}
                    </p>
                </div>
            </div>
        </div>
        <div class="w-1/4 sticky top-5 max-h-[90vh] overflow-y-auto scrollbar-hidden space-y-3">
            <div class="sticky top-0 border-b-2 border-[#508D4E] pb-5 z-10 bg-white">
                <h2 class="text-2xl">Artikel Lainnya</h2>
            </div>
            @foreach ($artikelLainnya as $artikel)
                <div class="p-4 space-y-2 bg-white">
                    <img src="{{ $artikel->gambar ?? '' }}" alt="gambar" class="w-full rounded-lg object-cover h-30">
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
