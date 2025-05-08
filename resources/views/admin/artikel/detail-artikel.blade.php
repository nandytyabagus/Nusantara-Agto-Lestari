<x-layouts.Applayout>
    <div>
        <a href="{{ route('Artikel') }}" class="flex items-center gap-2 absolute top-8 left-8">
            <x-heroicon-o-arrow-long-left class="w-5 h-5" />Kembali ke halaman artikel
        </a>
        <img src="" alt="" class="w-full h-[420px]">
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
        </div>
    </div>
</x-layouts.Applayout>
