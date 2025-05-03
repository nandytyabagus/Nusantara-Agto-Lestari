<x-layouts.guest>
    <div class="flex flex-col lg:flex-row h-screen w-screen">
        {{-- Left Image --}}
        <div class="hidden lg:block lg:w-1/2 relative overflow-hidden">
            <img src="{{ asset('images/bg_login.jpg') }}" alt="" loading="lazy"
                class="absolute w-full h-full object-cover z-0">
            <div class="absolute top-10 left-10 z-10">
                <h1 class="text-white text-5xl font-bold leading-tight drop-shadow-md">
                    Nusantara<br>Agro Lestari
                </h1>
            </div>
        </div>

        {{-- OTP Verification Form --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-10 md:p-20 lg:p-[120px]">
            <div class="w-full max-w-md">
                <div class="w-[60px] h-[60px] bg-bg_icons rounded-full flex items-center justify-center mb-[18px]">
                    <x-tabler-mail class="text-logo w-[32px] h-[32px]" />
                </div>
                <h2 class="text-3xl font-bold text-text mb-2">Verifikasi OTP</h2>
                <p class="text-sm text-text mb-8">Periksa email Anda untuk melihat kode verifikasi</p>
                <form action="/verify" method="post">
                    @csrf
                    <div class="mb-6 flex justify-between gap-2">
                        @for ($i = 0; $i < 6; $i++)
                            <input type="text" name="otp[]" maxlength="1" inputmode="numeric" pattern="[0-9]*"
                                class="w-14 h-14 text-center text-xl border-2 rounded-full border-brdotp focus:outline-none focus:border-logo"
                                required>
                        @endfor
                    </div>
                    <button type="submit"
                        class="bg-logo hover:bg-white text-white hover:text-logo border-2 hover:border-logo font-bold rounded-xl py-4 px-4 w-full transition">
                        Verifikasi
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('input[name="otp[]"]').forEach((input, index, inputs) => {
            input.addEventListener('input', () => {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === "Backspace" && input.value === "" && index > 0) {
                    inputs[index - 1].focus();
                } else if (e.key === "ArrowRight" && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                } else if (e.key === "ArrowLeft" && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    </script>
</x-layouts.guest>
