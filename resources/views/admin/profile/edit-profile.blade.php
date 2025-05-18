<x-layouts.Applayout>
    <section class="bg-dasar py-8 px-16 h-[100vh]">
        <div class="space-y-6">
            {{-- Header Profil --}}
            <div class="w-full">
                <div class="w-full h-24 bg-gray-200 rounded-t-xl overflow-hidden">
                    <img src="{{ asset('images/profileWall.jpg') }}" alt="Banner"
                        class="w-full h-full object-cover object-center rounded-t-xl">
                </div>
                <div class="relative px-8 py-4 bg-white flex rounded-b-xl items-center justify-between">
                    <div class=" relative flex items-center gap-4">
                        <div class="absolute -top-15">
                            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/Avatar.webp') }}"
                                alt="Avatar" loading="lazy"
                                class="w-24 h-24 rounded-full object-cover object-center bg-white">
                            <button id="dropdownButton" data-dropdown-toggle="dropdown"
                                class="p-2 bg-black text-white rounded-full absolute right-0 bottom-0"><x-fluentui-edit-24-o
                                    class="w-4 h-4" /></button>
                            <div id="dropdown"
                                class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-40">
                                <ul class="py-4 text-sm text-gray-700" aria-labelledby="dropdownButton">
                                    <li>
                                        <form action="{{ route('updateAvatar', $user->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <label
                                                class="block px-4 py-2 text-center font-semibold hover:text-black w-full cursor-pointer">
                                                Pilih Foto
                                                <input type="file" name="avatar" class="hidden"
                                                    onchange="this.form.submit()">
                                            </label>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ route('deleteAvatar', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="block px-4 py-2 font-semibold hover:text-gray-900 w-full">Hapus</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ml-30">
                            <h2 class="font-semibold text-xl text-gray-800">{{ $user->name }}</h2>
                            <p class="text-sm font-light text-text">{{ $user->role }}</p>
                        </div>
                    </div>
                    <a href="{{ route('ShowProfile', $user->id) }}"
                        class="bg-logo flex text-white pl-7 pr-9 py-3 rounded-lg ml-auto">
                        <x-tabler-caret-left-f class="w-6 h-6" /> Kembali
                    </a>
                </div>
            </div>

            {{-- Form --}}
            <div class="bg-white rounded-xl p-8 space-y-6">
                <form action="{{ route('editProfile', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class=" space-y-6 w-[88%]">
                        <button disabled class="text-black border-b-logo font-semibold border-b-2 pb-3.5 px-3.5">
                            Detail Akun
                        </button>
                        <div class=" space-y-6">

                            {{-- Input baris pertama --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 ">
                                {{-- Input 1 --}}
                                <div class="relative">
                                    <input type="text" name="username" id="username"
                                        value="{{ old('username', $user->username) }}" disabled
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
                                    <input type="text" name="name" id="name"
                                        value="{{ old('name', $user->name) }}"
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
                                    <input type="text" name="nomor" id="nomor"
                                        value="{{ old('nomor', $user->nomor) }}"
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
                                    <input type="text" name="alamat" id="alamat"
                                        value="{{ old('alamat', $user->alamat) }}"
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

                            {{-- Input baris ketiga --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative">
                                    <input type="text" name="email" id="email"
                                        value="{{ old('email', $user->email) }}"
                                        class="w-full block bg-transparent border-2 rounded-xl p-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('email') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                        placeholder=" " />
                                    <label for="email"
                                        class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                                        {{ $errors->has('email') ? 'text-red-500 peer-focus:text-red-500' : 'text-gray-300 peer-focus:text-logo' }}">
                                        Email</label>
                                    @error('email')
                                        <span class="text-xs text-red-500 block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Input baris keempat --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Input 1 --}}
                                <div class="relative">
                                    <input type="password" name="password" id="password"
                                        value="{{ old('password') }}"
                                        class="w-full block bg-transparent border-2 rounded-xl p-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('password') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                        placeholder=" " />
                                    <label for="password"
                                        class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                                        {{ $errors->has('password') ? 'text-red-500 peer-focus:text-red-500' : 'text-gray-300 peer-focus:text-logo' }}">
                                        Kata Sandi</label>
                                    @error('password')
                                        <span class="text-xs text-red-500 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Input 2 --}}
                                <div class="relative">
                                    <input type="password" name="confirm_password" id="confirm_password"
                                        value="{{ old('confirm_password') }}"
                                        class="w-full block bg-transparent border-2 rounded-xl p-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('confirm_password') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                        placeholder=" " />
                                    <label for="confirm_password"
                                        class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                                        {{ $errors->has('confirm_password') ? 'text-red-500 peer-focus:text-red-500' : 'text-gray-300 peer-focus:text-logo' }}">
                                        Konfirmasi Kata Sandi</label>
                                    @error('confirm_password')
                                        <span class="text-xs text-red-500 block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- Button Simpan --}}
                        <div>
                            <button class=" bg-logo text-white px-6 py-3 rounded-lg cursor-pointer">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layouts.Applayout>
