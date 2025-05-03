<x-layouts.customer>
    <div class="flex px-16 py-10 gap-16">
        <!-- Artikel Section -->
        <div class="w-3/4 space-y-5">
            <div class="border-b-2 border-[#508D4E] pb-5">
                <h2 class="text-2xl">Artikel</h2>
            </div>
            @foreach ($artikels as $artikel)
                <x-card-artikel :artikel="$artikel"></x-card-artikel>
            @endforeach
        </div>

        <!-- Artikel Lainnya Section -->
        <div class="w-1/4 sticky top-5 max-h-[90vh] overflow-y-auto scrollbar-hidden space-y-3">
            <div class="sticky top-0 border-b-2 border-[#508D4E] pb-5 z-10 bg-white">
                <h2 class="text-2xl">Artikel Lainnya</h2>
            </div>
            @foreach ($terbaru as $artikel)
                <x-card-artikel-side :artikel="$artikel"></x-card-artikel-side>
                <div class="border-[#B0B0B0] border-b"></div>
            @endforeach
        </div>
    </div>
</x-layouts.customer>
