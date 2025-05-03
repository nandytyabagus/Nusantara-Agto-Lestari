<x-layouts.guest>
    <div class="flex flex-col lg:flex-row h-screen w-screen">
        {{-- Left Image --}}
        <div class="hidden lg:block lg:w-1/2 relative overflow-hidden ">
            <img src="{{ asset('images/login.webp') }}" alt="" loading="lazy"
                class="absolute w-full h-full object-cover z-0">
            <div class="absolute top-10 left-10 z-10">
                <h1 class="text-white text-5xl font-bold leading-tight drop-shadow-md">
                    Nusantara<br>Agro Lestari
                </h1>
            </div>
        </div>

        {{-- Login Form --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-10 md:p-20 lg:p-[120px] ">
            <div class="w-full max-w-md">
                <div class="flex items-center space-x-2 mb-3">
                    <img src="{{ asset('images/logo_nusantara.webp') }}" alt="logo" loading="lazy"
                        class="w-10 h-10">
                    <h1 class="text-lg font-bold text-text">{{ config('app.name') }}</h1>
                </div>

                <h2 class="text-3xl font-bold text-text mb-2">Selamat Datang</h2>
                <p class="text-sm text-text mb-8">Masuk ke akun anda.</p>

                <form action="/login" method="post" class="space-y-4">
                    @csrf
                    <!-- Username Input -->
                    <div class="relative">
                        <input type="text" name="username" id="username" value="{{ old('username') }}"
                            class="w-full block bg-transparent border-2 rounded-xl px-3 py-4 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('username') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                            placeholder=" " />
                        <label for="username"
                            class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                            {{ $errors->has('username') ? 'text-red-500 peer-focus:text-red-500' : 'text-gray-300 peer-focus:text-logo' }}">
                            Nama pengguna</label>
                        @error('username')
                            <span class="text-xs text-red-500 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="relative" x-data="{ show: false }">
                        <input :type="show ? 'text' : 'password'" name="password" id="password"
                            class="w-full block bg-transparent border-2 rounded-xl px-4 py-4 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('password') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                            placeholder=" " />
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
                        <label for="password"
                            class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1 
                            {{ $errors->has('password') ? 'text-red-500 peer-focus:text-red-500' : 'text-gray-300 peer-focus:text-logo' }}">
                            Kata sandi</label>
                        @error('password')
                            <span class="text-xs text-red-500 block">{{ $message }}</span>
                        @enderror
                    </div>



                    <!-- Remember Me Checkbox -->
                    <div class="mb-3 flex items-center justify-between text-sm">
                        <div class="flex items-center">
                            <input id="link-checkbox" type="checkbox" name="remember"
                                class="w-4 h-4 text-logo bg-gray-100 border-logo rounded-sm focus:ring-logo focus:ring-2"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label for="link-checkbox" class="ms-2 text-sm text-text">Ingatkan saya</label>
                        </div>
                        <a href="{{ route('verify') }}" class="text-logo hover:underline">Lupa Password?</a>
                    </div>

                    <button type="submit"
                        class="bg-logo hover:bg-white text-white hover:text-logo border-2 hover:border-logo font-bold rounded-xl py-4 px-4 w-full transition">
                        Masuk
                    </button>
                </form>


                <div class="flex items-center my-3 text-gray-400 text-sm">
                    <div class="flex-grow h-px bg-gray-300"></div>
                    <span class="mx-4">or</span>
                    <div class="flex-grow h-px bg-gray-300"></div>
                </div>

                <form action="/auth-google-redirect" method="get">
                    <button
                        class="w-full border-2 text-logo hover:bg-logo hover:text-white font-bold rounded-xl py-4 px-4 bg-white transition">
                        Masuk dengan Google
                    </button>
                </form>

                <div class="text-center text-sm mt-3">
                    <p>Belum memiliki akun? <a href="{{ route('register') }}"
                            class="text-logo hover:underline">Daftar</a></p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
