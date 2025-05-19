<x-layouts.guest>
    <div class="flex flex-col lg:flex-row h-screen w-screen">
        {{-- Left Image --}}
        <div class="hidden lg:block lg:w-1/2 relative overflow-hidden">
            <img src="{{ asset('images/bg_login.jpg') }}" alt="Background Login"
                class="absolute w-full h-full object-cover z-0">
            <div class="absolute top-10 left-10 z-10">
                <h1 class="text-white text-5xl font-bold leading-tight drop-shadow-md">
                    Nusantara<br>Agro Lestari
                </h1>
            </div>
        </div>

        {{-- Reset Password Form --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-10 md:p-20 lg:p-[120px]">
            <div class="w-full max-w-md">
                <div class="w-[60px] h-[60px] bg-bg_icons rounded-full flex items-center justify-center mb-[18px]">
                    <x-bx-lock class="text-logo w-[32px] h-[32px]" />
                </div>
                <h2 class="text-3xl font-bold text-text mb-2">Atur Kata Sandi Baru</h2>
                <p class="text-sm text-text mb-8">Masukkan kata sandi baru Anda untuk menyelesaikan proses reset.</p>

                <form action="{{ route('veriNewPassword') }}" method="post" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <input type="password" name="password" id="password" placeholder="Kata Sandi Baru"
                            class="w-full border-2 rounded-xl py-3 px-4 border-gray-300 focus:outline-none focus:border-logo {{ $errors->has('password') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}">
                        @error('password')
                            <span class="text-xs text-red-500 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Konfirmasi Kata Sandi Baru"
                            class="w-full border-2 rounded-xl py-3 px-4 border-gray-300 focus:outline-none focus:border-logo {{ $errors->has('password_confirmation') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}">
                        @error('password_confirmation')
                            <span class="text-xs text-red-500 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="bg-logo hover:bg-white text-white hover:text-logo border-2 hover:border-logo font-bold rounded-xl py-4 px-4 w-full transition">
                        Simpan Kata Sandi Baru
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.guest>
