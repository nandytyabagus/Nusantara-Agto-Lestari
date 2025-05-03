<x-layouts.customer>
    <section class="relative bg-cover bg-center h-screen flex items-center justify-center"
        style="background-image: url('{{ asset('images/section-product.webp') }}');">
        <div class="absolute bottom-0 left-0 right-0 h-[30%] bg-gradient-to-t from-white to-transparent"></div>
        <div class="relative z-10 text-center px-4 text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 drop-shadow-lg">Produk Kami</h1>
            <p class="text-lg md:text-xl drop-shadow-md max-w-2xl mx-auto">
                Produk kambing yang berkualitas baik & pakan terbaik
            </p>
        </div>
    </section>

    {{-- produk section --}}
    <section class="bg-transparant pt-32">
        <div class="w-full ">
            <nav
                class="flex justify-center space-x-10 py-[24px] text-base md:text-lg font-semibold border-b-2 text-logo border-logo">
                @foreach ($kategoris as $kategorisItem)
                    <a href="{{ route('Produk', ['kategori' => $kategorisItem->id]) }}"
                        class="{{ $kategoriId == $kategorisItem->id ? 'border-b-2 pb-3 border-logo font-bold' : '' }}">
                        {{ ucfirst($kategorisItem->nama) }}
                    </a>
                @endforeach

            </nav>
            {{-- card produk --}}
            <div class="flex flex-wrap justify-center gap-6 py-12 px-[50px]">
                @forelse ($produks as $produk)
                    <x-card-produk :produk="$produk" />
                @empty
                    <div class="h-dvh justify-center content-center">
                        <p class="text-logo text-center text-3xl font-bold">Produk Kosong.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <script>
        function showCustomAlert() {
            const alertEl = document.querySelector('.danger-alert');
            alertEl.classList.remove('hidden');

            setTimeout(() => {
                alertEl.classList.add('hidden');
            }, 2000);
        }

        document.querySelectorAll('.card-produk').forEach(card => {
            card.addEventListener('click', function(e) {
                e.preventDefault();
                showCustomAlert();
            });
        });
    </script>


</x-layouts.customer>
