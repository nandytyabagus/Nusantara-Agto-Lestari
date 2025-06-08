<x-layouts.Applayout>
    <section class="bg-dasar py-20 px-16 h-[100vh]">
        <div class="space-y-6">
            {{-- Header Profil --}}
            <div class="w-full">
                <div class="w-full h-24 bg-gray-200 rounded-t-xl overflow-hidden">
                    <img src="{{ asset('images/profileWall.jpg') }}" alt="Banner" class="w-full h-full object-cover">
                </div>
                <div class="relative px-8 py-4 bg-white flex rounded-b-xl items-center justify-between">
                    <div class=" relative flex items-center gap-4">
                        <div class="absolute -top-15">
                            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/Avatar.webp') }}"
                                alt="Avatar" class="w-26 h-26 rounded-full object-cover">
                        </div>
                        <div class="ml-30">
                            <h2 class="font-semibold text-xl text-gray-800">{{ $user->name }}</h2>
                            <p class="text-sm font-light text-text">{{ $user->role }}</p>
                        </div>
                    </div>
                    <a href="{{ route('ShowEditProfile', $user->id) }}"
                        class="bg-logo text-white px-5 py-3 rounded-lg ml-auto">
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
                                    class="w-full block bg-transparent border-2 rounded-xl p-3 border-gray-300 appearance-none focus:ring-0 peer focus:outline-none"
                                    placeholder=" " />
                                <label for="username"
                                    class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1">
                                    Nama Pengguna</label>
                            </div>

                            {{-- Input 2 --}}
                            <div class="relative">
                                <input type="text" name="name" id="name" value="{{ $user->name }}" readonly
                                    class="w-full block bg-transparent border-2 rounded-xl p-3 border-gray-300 appearance-none focus:ring-0 peer focus:outline-none"
                                    placeholder=" " />
                                <label for="name"
                                    class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1">
                                    Nama Lengkap</label>
                            </div>
                        </div>

                        {{-- Input baris kedua --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Input 1 --}}
                            <div class="relative">
                                <input type="text" name="nomor" id="nomor" value="{{ $user->nomor }}" readonly
                                    class="w-full block bg-transparent border-2 rounded-xl p-3 border-gray-300 appearance-none focus:ring-0 peer focus:outline-none"
                                    placeholder=" " />
                                <label for="nomor"
                                    class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1">
                                    No. Telepon</label>
                            </div>

                            {{-- Input 2 --}}
                            <div class="relative">
                                <input type="text" name="alamat" id="alamat" value="{{ $user->alamat }}" readonly
                                    class="w-full block bg-transparent border-2 rounded-xl p-3 border-gray-300 appearance-none focus:ring-0 peer focus:outline-none"
                                    placeholder=" " />
                                <label for="alamat"
                                    class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1">
                                    Alamat</label>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Input 1 --}}
                            <div class="relative">
                                <input type="text" name="password" id="password" value="{{ $user->email }}"
                                    readonly
                                    class="w-full block bg-transparent border-2 rounded-xl p-3 border-gray-300 appearance-none focus:ring-0 peer focus:outline-none"
                                    placeholder=" " />
                                <label for="password"
                                    class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1">
                                    Email</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('Beranda') }}"
                            class="inline-flex items-center bg-logo text-white px-8 py-3 rounded-lg cursor-pointer pr-9">
                            <x-tabler-caret-left-f class="w-6 h-6" />
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.Applayout>
