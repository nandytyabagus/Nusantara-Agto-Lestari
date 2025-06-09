<x-layouts.guest>
    <div class="flex flex-col lg:flex-row h-screen w-screen">
        {{-- Left Image --}}
        <div class="hidden lg:block lg:w-1/2 relative overflow-hidden p-5 px-15">
            <img src="{{ asset('images/Home.webp') }}" alt="" loading="lazy"
                class="absolute w-12/14 h-[94.5vh] object-cover z-0 rounded-[90px]">
            <div class="absolute">
            </div>
            <div class="absolute bottom-16 right-30 text-white flex items-center gap-2 text-right">
                <h1 class="text-white text-5xl font-bold leading-tight drop-shadow-md">
                    Nusantara<br>Agro Lestari
                </h1>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-10 md:p-20 lg:p-[120px]">
            <div class="w-full max-w-md">
                <x-eva-checkmark-circle-2 class="text-[#17A31A] w-[60px] h-[60px] mb-4" />
                <h2 class="text-3xl font-bold text-text mb-2">Kata Sandi Berhasil Diubah</h2>
                <p class="text-sm text-text mb-8">Masuk ke akun Anda dengan kata sandi baru Anda</p>
                <button type="submit" onclick="window.location.href='{{ route('login') }}'"
                    class="bg-logo hover:bg-white text-white hover:text-logo border-2 hover:border-logo font-bold rounded-xl py-4 px-4 w-full transition">
                    Masuk
                </button>
            </div>
        </div>
    </div>
</x-layouts.guest>
