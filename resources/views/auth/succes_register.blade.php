<x-layouts.guest>
    <div class="flex flex-col lg:flex-row h-screen w-screen">
        {{-- Left Image --}}
        <div class="hidden lg:block lg:w-1/2 relative overflow-hidden ">
            <img src="{{ asset('images/bg_login.jpg') }}" alt="" loading="lazy"
                class="absolute w-full h-full object-cover z-0">
            <div class="absolute top-10 left-10 z-10">
                <h1 class="text-white text-5xl font-bold leading-tight drop-shadow-md">
                    Nusantara<br>Agro Lestari
                </h1>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-10 md:p-20 lg:p-[120px]">
            <div class="w-full max-w-md">
                <x-eva-checkmark-circle-2 class="text-[#17A31A] w-[60px] h-[60px] mb-4" />
                <h2 class="text-3xl font-bold text-text mb-2">Your Account Successfully Created</h2>
                <p class="text-sm text-text mb-8">Mari kita mulai perjalanan Anda.</p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(() => {
            window.location.href = "{{ route('Beranda') }}";
        }, 2000);
    </script>
</x-layouts.guest>
