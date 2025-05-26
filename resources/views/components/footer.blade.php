@props(['user'])

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
                    <iframe class="rounded-lg shadow-ulasan"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.484787828207!2d113.72178107477004!3d-8.153812891876655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695faa7177f47%3A0x5e51525f588ea78d!2sNusantara%20Agro%20Lestari%20Kandang%201!5e0!3m2!1sid!2sid!4v1745001739003!5m2!1sid!2sid"
                        width="300" height="190" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="w-[300px] space-y-2">
                        <div>
                            <h3 class="font-semibold">Alamat :</h3>
                            <p class="text-sm">{{ $user->alamat }}</p>
                        </div>
                        <div>
                            <h3 class="font-semibold">HP / Whatsapp :</h3>
                            <p class="text-sx">{{ trim(chunk_split($user->nomor, 4, '-'), '-') }}</p>
                        </div>
                        <div>
                            <h3 class="font-semibold">Email :</h3>
                            <p class="text-sm">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col space-y-3 pt-[85px]">
                <h3 class="font-semibold">Fitur-Fitur</h3>
                <a href="/produk">Produk</a>
                <a href="/pelatihan">Pelatihan</a>
                <a href="/artikel">Artikel</a>
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
                    <a href="https://www.google.com/search?q=nusantara+agro+lestari&sca_esv=c040be438cc12ffb&sxsrf=AHTn8zrPA9EYklkhPNFSnL1EH-E0b_YDzw%3A1747850628968&ei=hBUuaLjuOsaY4-EP7ueVmQo&ved=0ahUKEwi4wPD-krWNAxVGzDgGHe5zJaMQ4dUDCBA&uact=5&oq=nusantara+agro+lestari&gs_lp=Egxnd3Mtd2l6LXNlcnAiFm51c2FudGFyYSBhZ3JvIGxlc3RhcmkyCBAAGIAEGLADMgkQABiwAxgIGB4yCRAAGLADGAgYHjIJEAAYsAMYCBgeMggQABiwAxjvBTILEAAYgAQYsAMYogQyCxAAGIAEGLADGKIEMgsQABiABBiwAxiiBDILEAAYgAQYsAMYogRImwFQAFgAcAF4AJABAJgBWKABWKoBATG4AQPIAQCYAgGgAgyYAwCIBgGQBgmSBwExoAfLBbIHALgHAA&sclient=gws-wiz-serp"
                        target="_blank"
                        class="w-9 h-9 flex items-center shadow-ulasan justify-center rounded-xl bg-white">
                        <svg class="h-5 w-5" viewBox="0 0 24 24">
                            <defs>
                                <linearGradient id="google-gradient" x1="0%" y1="0%" x2="100%"
                                    y2="100%">
                                    <stop offset="0%" stop-color="#4285F4" />
                                    <stop offset="25%" stop-color="#34A853" />
                                    <stop offset="50%" stop-color="#FBBC05" />
                                    <stop offset="100%" stop-color="#EA4335" />
                                </linearGradient>
                            </defs>
                            <path
                                d="M21.805 10.023h-9.765v3.977h5.617c-.242 1.242-1.484 3.648-5.617 3.648-3.383 0-6.148-2.797-6.148-6.25s2.765-6.25 6.148-6.25c1.93 0 3.227.82 3.969 1.523l2.711-2.633c-1.711-1.594-3.922-2.57-6.68-2.57-5.523 0-10 4.477-10 10s4.477 10 10 10c5.742 0 9.547-4.023 9.547-9.695 0-.652-.07-1.148-.156-1.648z"
                                fill="url(#google-gradient)" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/nusantaraagrolestari/" target="_blank"
                        class="w-9 h-9 text-white shadow-ulasan flex items-center justify-center rounded-xl"
                        style="background: linear-gradient(45deg, #f58529 0%, #dd2a7b 50%, #8134af 100%);">
                        <x-bi-instagram class="h-5 w-5" />
                    </a>
                    <a href="https://www.facebook.com/p/Nusantara-Agro-Lestari-100070135759938/?locale=id_ID"
                        target="_blank"
                        class="w-9 h-9 shadow-ulasan text-white flex items-center justify-center rounded-xl"
                        style="background: linear-gradient(135deg, #1877f3 0%, #3b5998 100%);">
                        <x-css-facebook class="h-5 w-5" />
                    </a>
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
