<x-layouts.admin>
    <div class="p-6 h-[91vh] w-full overflow-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl p-4 shadow col-span-1 md:col-span-2 lg:col-span-4">
                <h2 class="text-xl font-bold">Selamat Datang di Dashboard <strong class="text-[#18a243]">Nusantara
                        Agro</strong>
                    <strong class="text-[#f08718]">Lestari</strong>
                </h2>
                <p class="text-sm mt-1">Anda dapat mengelola produk, pelatihan, artikel, dan pengguna di sini.</p>
            </div>

            <div class="bg-white rounded-xl shadow">
                <div class="flex items-center p-4 gap-4">
                    <div>
                        <x-solar-bag-4-bold class="text-[#18a243] w-15" />
                    </div>
                    <div>
                        <h2 class="text-lg">Total Produk</h2>
                        <p class="text-2xl font-semibold text-[#18a243]">{{ $produk }}</p>
                    </div>
                </div>
                <div class="flex justify-center border-t border-gray-200 p-2">
                    <a href="{{ route('ProdukAdmin') }}">Lihat Semua</a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow">
                <div class="flex items-center p-4 gap-4">
                    <div>
                        <x-heroicon-s-document-text class="text-[#18a243] w-15" />
                    </div>
                    <div>
                        <h2 class="text-lg">Total Artikel</h2>
                        <p class="text-2xl font-semibold text-[#18a243]">{{ $artikel }}</p>
                    </div>
                </div>
                <div class="flex justify-center border-t border-gray-200 p-2">
                    <a href="{{ route('ArtikelAdmin') }}">Lihat Semua</a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow">
                <div class="flex items-center p-4 gap-4">
                    <div>
                        <x-heroicon-s-user-group class="text-[#18a243] w-15" />
                    </div>
                    <div>
                        <h2 class="text-lg">Total Pelatihan</h2>
                        <p class="text-2xl font-semibold text-[#18a243]">{{ $pelatihan }}</p>
                    </div>
                </div>
                <div class="flex justify-center border-t border-gray-200 p-2">
                    <a href="{{ route('PelatihanAdmin') }}">Lihat Semua</a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow">
                <div class="flex items-center p-4 gap-4">
                    <div>
                        <x-fas-user-group class="text-[#18a243] w-15" />
                    </div>
                    <div>
                        <h2 class="text-lg">Total Pengguna</h2>
                        <p class="text-2xl font-semibold text-[#18a243]">{{ $user }}</p>
                    </div>
                </div>
                <div class="flex justify-center border-t border-gray-200 p-2">
                </div>
            </div>

            <div class="bg-white rounded-xl shadow col-span-1 md:col-span-2 lg:col-span-2">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-4">Statistik Artikel</h2>
                    <canvas id="userChart" width="400" height="200"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow col-span-1 md:col-span-2 lg:col-span-2">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-4">Statistik Ulasan</h2>
                    <canvas id="userChart" width="400" height="200"></canvas>
                </div>
            </div>

            <div class=" bg-white rounded-xl shadow col-span-1 md:col-span-2 lg:col-span-3">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-4">Statistik Pendaftar</h2>
                    <canvas id="userChart" width="400" height="200"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-4">Margin Ulasan</h2>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-4">Total Produk Setiap Kategori</h2>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow col-span-1 md:col-span-2 lg:col-span-3 flex">
                <div class="p-4 w-full">
                    <h2 class="text-lg font-semibold">Data Profile <br><strong class="text-[#18a243]">Nusantara
                            Agro</strong> <strong class="text-[#f08718]">Lestari</strong>
                    </h2>
                    <div class="flex space-x-6 mt-4 items-center relative w-full">
                        <div>
                            <img src="{{ $admin->avatar ? asset('storage/' . $admin->avatar) : asset('images/Avatar.webp') }}"
                                alt="Avatar" class="w-20 h-20 rounded-full object-cover">
                        </div>
                        <div class="space-y-2">
                            <p><span class="font-semibold">Nama :</span> {{ $admin->name }}</p>
                            <p><span class="font-semibold">Nomor :</span> {{ $admin->nomor }}</p>
                        </div>
                        <div class="space-y-2">
                            <p><span class="font-semibold">Email :</span> {{ $admin->email }}</p>
                            <p><span class="font-semibold">Alamat :</span> {{ $admin->alamat }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</x-layouts.admin>
