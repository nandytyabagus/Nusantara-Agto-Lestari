<x-layouts.Applayout>
    <section class="bg-dasar py-20 px-16 h-[100vh]">
        <div class="space-y-6">
            {{-- Header Profil --}}
            <div>
                <div class="w-full h-24 bg-gray-200 rounded-t-xl overflow-hidden">
                    <img src="/path/to/banner.jpg" alt="Banner" class="w-full h-full object-cover">
                </div>
                <div class=" px-8 py-4 bg-white flex rounded-b-xl justify-between items-center">
                    <div>
                        <h2 class="font-semibold text-xl text-gray-800">{{ $user->name }}</h2>
                        <p class="text-sm font-light text-text">{{ $user->role }}</p>
                    </div>
                    <img src="/path/to/avatar.jpg" alt="Avatar" class="w-16 h-16 rounded-full object-cover">
                    <a href="{{ route('ShowEditProfile', $user->id) }}" class="bg-logo text-white px-5 py-3 rounded-lg">
                        Ubah Profil
                    </a>
                </div>
            </div>

            {{-- Form --}}
            <div class="bg-white rounded-xl p-8 space-y-6">
                <div class=" space-y-6 w-[88%]">
                    <button disabled class="text-black border-b-logo font-semibold border-b-2 pb-3.5 px-3.5">
                        Detail Akun
                    </button>
                    <div class=" space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 ">
                            {{-- Input 1 --}}
                            <div class="relative">
                                <input type="text" name="username" id="username" value="{{ $user->username }}"
                                    readonly
                                    class="w-full block bg-transparent border-2 rounded-xl p-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('username') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                    placeholder=" " />
                                <label for="username"
                                    class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                                    {{ $errors->has('username') ? 'text-red-500 peer-focus:text-red-500' : 'text-gray-300 peer-focus:text-logo' }}">
                                    Nama Pengguna</label>
                                @error('username')
                                    <span class="text-xs text-red-500 block">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Input 2 --}}
                            <div class="relative">
                                <input type="text" name="name" id="name" value="{{ $user->name }}" readonly
                                    class="w-full block bg-transparent border-2 rounded-xl p-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('name') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                    placeholder=" " />
                                <label for="name"
                                    class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                                    {{ $errors->has('name') ? 'text-red-500 peer-focus:text-red-500' : 'text-gray-300 peer-focus:text-logo' }}">
                                    Nama Lengkap</label>
                                @error('name')
                                    <span class="text-xs text-red-500 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Input baris kedua --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Input 1 --}}
                            <div class="relative">
                                <input type="text" name="nomor" id="nomor" value="{{ $user->nomor }}"
                                    readonly
                                    class="w-full block bg-transparent border-2 rounded-xl p-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('nomor') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                    placeholder=" " />
                                <label for="nomor"
                                    class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                                    {{ $errors->has('nomor') ? 'text-red-500 peer-focus:text-red-500' : 'text-gray-300 peer-focus:text-logo' }}">
                                    No. Telepon</label>
                                @error('nomor')
                                    <span class="text-xs text-red-500 block">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Input 2 --}}
                            <div class="relative">
                                <input type="text" name="alamat" id="alamat" value="{{ $user->alamat }}"
                                    readonly
                                    class="w-full block bg-transparent border-2 rounded-xl p-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('alamat') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                    placeholder=" " />
                                <label for="alamat"
                                    class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                                    {{ $errors->has('alamat') ? 'text-red-500 peer-focus:text-red-500' : 'text-gray-300 peer-focus:text-logo' }}">
                                    Alamat</label>
                                @error('alamat')
                                    <span class="text-xs text-red-500 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Input 1 --}}
                            <div class="relative">
                                <input type="text" name="password" id="password" value="{{ $user->email }}"
                                    readonly
                                    class="w-full block bg-transparent border-2 rounded-xl p-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('password') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                    placeholder=" " />
                                <label for="password"
                                    class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                                    {{ $errors->has('password') ? 'text-red-500 peer-focus:text-red-500' : 'text-gray-300 peer-focus:text-logo' }}">
                                    Email</label>
                                @error('password')
                                    <span class="text-xs text-red-500 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.Applayout>
