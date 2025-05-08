<x-layouts.customer>
    @if (isset($pelatihans))
        <div class=" px-6 lg:px-16 pt-8 pb-10 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
            @foreach ($pelatihans as $pelatihan)
                <x-card-pelatihan :pelatihan="$pelatihan"></x-card-pelatihan>
            @endforeach
        </div>
    @else
        <div class="p-10 h-screen items-center justify-center flex">
            <h2 class=" text-5xl">Pelatihan Kosong</h2>
        </div>
    @endif
</x-layouts.customer>
