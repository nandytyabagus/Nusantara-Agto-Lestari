<x-layouts.customer>
    <div class="px-6 lg:px-16 pt-8 pb-10 space-y-6">
        <div class="border-b-2 border-[#508D4E] pb-5">
            <h2 class="text-2xl">Pelatihan</h2>
        </div>
        @if (isset($pelatihans))
            <div class=" grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                @foreach ($pelatihans as $pelatihan)
                    <x-card-pelatihan :pelatihan="$pelatihan"></x-card-pelatihan>
                @endforeach
            </div>
        @else
            <div class=" h-screen items-center justify-center flex">
                <h2 class=" text-5xl font-bold text-logo">Pelatihan Kosong</h2>
            </div>
        @endif
    </div>
</x-layouts.customer>
