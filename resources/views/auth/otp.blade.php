<x-layouts.guest>
    <div class="flex flex-col lg:flex-row h-screen w-screen">
        {{-- Left Image --}}
        <div class="hidden lg:block lg:w-1/2 relative overflow-hidden">
            <img src="{{ asset('images/bg_login.jpg') }}" alt="Login Background" loading="lazy"
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
                <div class="w-[60px] h-[60px] bg-bg_icons rounded-full flex items-center justify-center mb-5">
                    <x-tabler-mail class="text-logo w-8 h-8" />
                </div>
                <h2 class="text-3xl font-bold text-text mb-2">Verifikasi OTP</h2>
                <p class="text-sm text-text mb-8">Periksa email Anda untuk melihat kode verifikasi.</p>

                <form action="{{ route('veriOtp') }}" method="POST" id="otpForm">
                    @csrf
                    <div class="mb-6 flex justify-between gap-2">
                        @for ($i = 0; $i < 6; $i++)
                            <input type="text" name="otp_digit[]" maxlength="1" inputmode="numeric" pattern="[0-9]*"
                                class="otp-input w-14 h-14 text-center text-xl border-2 rounded-full border-brdotp focus:outline-none focus:border-logo"
                                autocomplete="one-time-code">
                        @endfor
                    </div>
                    @error('otp')
                        <div class="text-red-500 text-sm mb-4">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                    @enderror
                    @if (session('error'))
                        <div class="text-red-500 text-sm mb-4">
                            <p>
                                {{ session('error') }}
                            </p>
                        </div>
                    @endif
                    <input type="hidden" name="otp" id="otp">
                    <button type="submit"
                        class="bg-logo hover:bg-white text-white hover:text-logo border-2 hover:border-logo font-bold rounded-xl py-4 w-full transition">
                        Verifikasi
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const otpInputs = document.querySelectorAll('.otp-input');
        const otpHiddenInput = document.getElementById('otp');

        otpInputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                input.value = input.value.replace(/\D/, '');
                if (input.value && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
                collectOtp();
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === "Backspace" && !input.value && index > 0) {
                    otpInputs[index - 1].focus();
                }
                if (e.key === "ArrowRight" && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
                if (e.key === "ArrowLeft" && index > 0) {
                    otpInputs[index - 1].focus();
                }
            });
        });

        function collectOtp() {
            otpHiddenInput.value = Array.from(otpInputs).map(i => i.value).join('');
        }
    </script>
</x-layouts.guest>
