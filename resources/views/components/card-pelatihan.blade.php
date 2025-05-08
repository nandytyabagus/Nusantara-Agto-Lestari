@props(['pelatihan'])

<a href="{{ route('detailPelatihanCustomer', $pelatihan->id) }}"
    class="shadow-card-artikel rounded-lg p-4 space-y-2 w-full">
    <div class="flex">
        <img src="" alt="gambar" class=" w-24 h-24">
        <div class="space-y-3 p-1">
            <h2 class="font-semibold">{{ $pelatihan->judul_pelatihan }}</h2>
            <div class="flex gap-3">
                <div class="rounded-md py-2 px-2 bg-[#E6EFFE]">
                    <p class="text-sm">{{ $pelatihan->lokasi }}</p>
                </div>
                <div class="rounded-md py-2 px-2 bg-[#E6EFFE]">
                    <p class="text-sm">
                        {{ \Carbon\Carbon::parse($pelatihan->waktu_pelaksanaan)->format('F d, Y') }}
                    </p>
                </div>
                <div class="rounded-md py-2 px-4 bg-[#E6EFFE]">
                    <p class="text-sm">
                        {{ $pelatihan->kuota }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <p class=" text-sm">{{ Str::limit($pelatihan->deskripsi, 200) }}</p>
        <div class="flex gap-2 font-thin text-sm">
            <p>alamat lengkap</p>
            <p>kuota tersisa</p>
        </div>
    </div>
</a>
