<x-layouts.guest>
    <div class="flex flex-col lg:flex-row h-screen w-screen">
        {{-- Left Image --}}
        <div class="hidden lg:block lg:w-1/2 relative overflow-hidden p-5 px-15">
            <img src="{{ asset('images/login.webp') }}" alt="" loading="lazy"
                class="absolute w-12/14 h-[94.5vh] object-cover z-0 rounded-[90px]">
            <div class="absolute">
            </div>
            <div class="relative top-15 left-20 z-10">
                <h1 class="text-white text-5xl font-bold leading-tight drop-shadow-md">
                    Nusantara<br>Agro Lestari
                </h1>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-10 md:p-20 lg:p-[120px]">
            <div class="w-full max-w-md">
                <x-eva-checkmark-circle-2 class="text-[#17A31A] w-[60px] h-[60px] mb-4" />
                <h2 class="text-3xl font-bold text-text mb-2">Anda Berhasil Menambahkan Akun</h2>
                <p class="text-sm text-text mb-8">Mari kita mulai perjalanan Anda.</p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(() => {
            window.location.href = "{{ route('Beranda') }}";
        }, 5000);
    </script>
</x-layouts.guest>
