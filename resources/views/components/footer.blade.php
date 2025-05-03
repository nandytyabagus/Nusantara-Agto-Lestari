@php
    $user = Auth::user();
@endphp

<footer class="bg-footer rounded-t-xl">
    <div class="px-[64px]">
        <div class="flex justify-between border-b-2 border-borderfooter">
            <div class="py-[24px] space-y-[24px]">
                <div class="flex items-center space-x-[8px]">
                    <img src="{{ asset('images/logo_nusantara.webp') }}" alt="logo" loading="lazy"
                        class="w-[40px] h-[40px]">
                    <h1 class="text-[16px] text-text font-semibold">{{ config('app.name') }}</h1>
                </div>
                <div class="flex space-x-[24px]">
                    <iframe loading="lazy"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.484787828207!2d113.72178107477004!3d-8.153812891876655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695faa7177f47%3A0x5e51525f588ea78d!2sNusantara%20Agro%20Lestari%20Kandang%201!5e0!3m2!1sid!2sid!4v1745001739003!5m2!1sid!2sid"
                        width="300" height="175" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="w-[300px] space-y-2">
                        <div>
                            <h3 class="font-semibold">Alamat :</h3>
                            <p class="text-sm">Jl. Tawang Mangu, Lingkungan Panji, Tegalgede, Kec. Sumbersari,
                                Kabupaten Jember,
                                Jawa Timur 68124</p>
                        </div>
                        <div>
                            <h3 class="font-semibold">HP / Whatsapp :</h3>
                            <p class="text-sx"> </p>
                        </div>
                        <div>
                            <h3 class="font-semibold">Email :</h3>
                            <p class="text-sm">Example@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col space-y-3 pt-[85px]">
                <h3 class="font-semibold">Fitur-Fitur</h3>
                <a href="/produk">Produk</a>
                <a href="/pelatihan">Pelatihan</a>
                <a href="/artikel">Artikel</a>
                <a href="/ulasan">Ulasan</a>
            </div>
            <div class="flex flex-col justify-center space-y-4 pr-[13px]">
                <h3 class="font-semibold">Pesan Sekarang</h3>
                <div class="flex">
                    <input type="text"
                        class="border-1 border-r-0 border-gray-300 rounded-l-md p-4 w-[250px] h-[50px] bg-white focus:outline-none"
                        placeholder="Lihat Produk">
                    <button class="rounded-r-md w-[50px] h-[50px] bg-logo flex justify-center items-center">
                        <x-fas-arrow-right class="w-[15px] h-[13px] text-white" />
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full py-6">
            <div class="px-[30px] flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-[24px] h-[24px] bg-white rounded-full"></div>
                    <div class="w-[24px] h-[24px] bg-white rounded-full"></div>
                    <div class="w-[24px] h-[24px] bg-white rounded-full"></div>
                </div>
                <div class="flex items-center gap-2">
                    <h2 class="text-base">Produk dari</h2>
                    <img src="{{ asset('images/logo_nusantara.webp') }}" alt="logo" loading="lazy"
                        class="w-[18px] h-[18px]">
                </div>
                <div class="text-sm text-center md:text-right">
                    &copy; 2025 Lift Media. All rights reserved.
                </div>

            </div>
        </div>

    </div>
</footer>
