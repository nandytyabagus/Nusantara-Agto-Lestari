<div class="p-10 space-y-10 bg-[#D9E0EC]/30">
    <div class="flex justify-between">
        <div class="space-y-2">
            <h2 class="font-semibold text-3xl text-[#508D4E]">Testimoni ulasan pelanggan kami</h2>
            <p class="text-[#636464]">Ulasan jujur dari pelanggan yang telah membeli produk kambing dan peternakan
                terbaik dari kami.</p>
        </div>
        <div>
            <button>
                tambahkan
            </button>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-10">
        @foreach ($ulasans as $ulasan)
            <x-card-ulasan :ulasan="$ulasan" />
        @endforeach
    </div>
</div>
