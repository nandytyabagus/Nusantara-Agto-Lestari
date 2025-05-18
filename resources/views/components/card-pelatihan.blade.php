@props(['pelatihan'])

<a href="{{ route('detailPelatihanCustomer', $pelatihan->id) }}"
    class="shadow-card-artikel rounded-lg p-4 space-y-2 w-full">
    <div class="flex">
        <img src="" alt="gambar" class=" w-24 h-24">
        <div class="space-y-3 p-1">
            <h2 class="font-semibold">{{ $pelatihan->judul_pelatihan }}</h2>
            <div class="flex gap-3">
                <div class="rounded-md py-2 px-4 bg-[#E6EFFE]">
                    <p class="flex items-center gap-2 text-sm font-semibold">
                        <x-uiw-date
                            class="h-5 w-5" />{{ \Carbon\Carbon::parse($pelatihan->waktu_pelaksanaan)->format('d F Y') }}
                    </p>
                </div>
                <div class="rounded-md py-2 px-6 bg-[#E6EFFE]">
                    <p class="flex items-center gap-2 text-sm font-semibold">
                        <x-solar-users-group-two-rounded-outline class="w-5 h-5" />{{ $pelatihan->kuota }}
                        Kuota
                    </p>
                </div>
            </div>
        </div>
    </div>
    <p class=" text-sm">{{ Str::limit($pelatihan->deskripsi, 200) }}</p>
    <p class="text-sm flex items-center gap-2"><x-entypo-location class="w-5 h-5" />{{ $pelatihan->lokasi }}</p>
</a>
