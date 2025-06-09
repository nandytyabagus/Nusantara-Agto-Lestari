<x-layouts.guest>
    <div class="flex flex-col lg:flex-row h-screen w-screen">
        {{-- Left image --}}
        <div class="hidden lg:block lg:w-1/2 relative overflow-hidden p-5 px-15">
            <img src="{{ asset('images/login.webp') }}" alt="" loading="lazy"
                class="absolute w-12/14 h-[94.5vh] object-cover z-0 rounded-[90px]">
            <div class="absolute">
            </div>
            <div class="absolute bottom-16 right-30 text-white flex items-center gap-2 text-right">
                <h1 class="text-white text-5xl font-bold leading-tight drop-shadow-md">
                    Nusantara<br>Agro Lestari
                </h1>
            </div>
        </div>

        {{-- Register Form --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-10 md:p-20 lg:p-[120px]">
            <div class="w-full max-w-md">
                <h1 class="text-4xl font-bold text-black">Daftar Akun</h1>
                <p class="text-sm text-gray-500 mb-5">Daftar untuk menikmati fitur</p>

                <form action="/register" method="POST" class="space-y-3">
                    @csrf

                    {{-- Nama Lengkap --}}
                    <div>
                        <label for="nama_lengkap" class="block text-sm ml-1 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}"
                            placeholder="Masukkan nama lengkap"
                            class="w-full border-2 rounded-xl py-3 px-4 focus:outline-none {{ $errors->has('nama_lengkap') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}">
                        @error('nama_lengkap')
                            <span class="text-xs text-red-500 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm ml-1 mb-1">Email</label>
                        <input type="text" name="email" id="email" value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            class="w-full border-2 rounded-xl py-3 px-4 focus:outline-none {{ $errors->has('email') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}">
                        @error('email')
                            <span class="text-xs text-red-500 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Username --}}
                    <div>
                        <label for="username" class="block text-sm ml-1 mb-1">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}"
                            placeholder="Masukkan username"
                            class="w-full border-2 rounded-xl py-3 px-4 focus:outline-none {{ $errors->has('username') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}">
                        @error('username')
                            <span class="text-xs text-red-500 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div x-data="{ show: false }">
                        <label for="password" class="block ml-1 mb-1 text-sm">Password</label>
                        <div class="relative">
                            <input :type="show ? 'text' : 'password'" name="password" id="password"
                                placeholder="Kata Sandi"
                                class="w-full border-2 rounded-xl py-3 px-4 pr-12 focus:outline-none {{ $errors->has('password') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}">
                            <button type="button"
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-logo"
                                @click="show = !show">
                                <template x-if="!show">
                                    <x-heroicon-s-eye class="w-5 h-5" />
                                </template>
                                <template x-if="show">
                                    <x-heroicon-s-eye-slash class="w-5 h-5" />
                                </template>
                            </button>
                        </div>
                        @error('password')
                            <span class="text-xs text-red-500 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm ml-1 mb-1">Konfirmasi Kata Sandi</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Konfirmasi Kata Sandi"
                            class="w-full border-2 rounded-xl py-3 px-4 focus:outline-none {{ $errors->has('password_confirmation') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}">
                        @error('password_confirmation')
                            <span class="text-xs text-red-500 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Syarat & Ketentuan --}}
                    <div class="flex items-center space-x-2 text-sm">
                        <input type="checkbox" id="terms" name="terms"
                            class="w-4 h-4 text-logo bg-gray-100 border-logo rounded-sm focus:ring-logo focus:ring-2"
                            {{ old('terms') ? 'checked' : '' }}>
                        <label for="terms">
                            Saya menyetujui <a href="#" class="text-logo hover:underline">Syarat & Ketentuan</a>
                        </label>
                    </div>
                    @error('terms')
                        <span class="text-xs text-red-500 block">{{ $message }}</span>
                    @enderror

                    {{-- Tombol Submit --}}
                    <button type="submit"
                        class="bg-logo hover:bg-white text-white hover:text-logo border-2 hover:border-logo font-bold rounded-xl py-4 px-4 w-full transition">
                        Daftar
                    </button>
                </form>

                {{-- Link login --}}
                <div class="text-center mt-3 text-sm">
                    <p>Sudah punya akun? <a href="{{ route('login') }}" class="text-logo hover:underline">Masuk</a></p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
