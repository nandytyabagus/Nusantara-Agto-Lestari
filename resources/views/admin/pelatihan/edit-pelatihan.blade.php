<x-layouts.admin>
    <section class="p-[24px] overflow-auto">
        <form id="form-produk" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white rounded-2xl w-full h-full p-[24px] space-y-5">
                <div class="flex items-center justify-center w-full mb-[24px]">
                    <!-- Preview Gambar -->
                    <div id="image-preview" class="mb-3 hidden">
                        <img id="preview" src="#" alt="Preview Gambar"
                            class="w-40 h-40 object-cover rounded-lg mx-auto mb-2">
                        <p class="text-sm text-center text-gray-500">Preview Gambar</p>
                    </div>

                    <!-- Upload Button -->
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-48 border-2  border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 {{ $errors->has('gambar') ? ' border-red-700 ' : ' border-gray-300' }} ">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <div
                                class="bg-[#ECECEE] w-[80px] h-[80px] flex items-center justify-center rounded-full mb-3">
                                <svg class="w-8 h-8 text-gray-800" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M4 5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-3.172l-1.414-1.414A2 2 0 0 0 13.172 3h-2.344a2 2 0 0 0-1.414.586L8 5H4z" />
                                    <circle cx="12" cy="12" r="3.2" fill="#ECECEE" />
                                </svg>
                            </div>
                            <p class="mb-2 text-sm text-gray-500 font-semibold">Upload Foto</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">JPG, JPEG, PNG & WEBP (MAX 2 MB)</p>
                        </div>
                        <input id="dropzone-file" name="gambar" type="file" accept="image/*" class="hidden" />
                    </label>
                </div>

                {{-- inputan --}}
                <div class="overflow-y-scroll h-[40vh] scrollbar-hidden">
                    <div class=" grid grid-cols-2 gap-5 ">
                        <div class="relative">
                            <input type="text" name="judul" id="judul"
                                value="{{ old('judul', $pelatihan->judul_pelatihan) }}"
                                class="w-full block bg-transparent border-2 rounded-xl px-3 py-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('judul') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                placeholder=" " />
                            <label for="judul"
                                class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                                    {{ $errors->has('judul') ? 'text-red-500 peer-focus:text-red-500 ' : 'text-gray-300 peer-focus:text-logo' }}">
                                Judul pelatihan</label>
                            @error('judul')
                                <span class="text-xs text-red-500 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative">
                            <input type="datetime-local" name="waktupelaksanaan" id="waktupelaksanaan"
                                value="{{ old('kuota', $pelatihan->waktu_pelaksanaan) }}"
                                class="w-full block bg-transparent border-2 rounded-xl px-3 py-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('waktupelaksanaan') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                placeholder="" />
                            <label for="waktupelaksanaan"
                                class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                {{ $errors->has('waktupelaksanaan') ? 'text-red-500 peer-focus:text-red-500 ' : 'text-gray-300 peer-focus:text-logo' }}">
                                Waktu pelaksanaan
                            </label>
                            @error('waktupelaksanaan')
                                <span class="text-xs text-red-500 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative">
                            <input type="text" name="lokasi" id="lokasi"
                                value="{{ old('lokasi', $pelatihan->lokasi) }}"
                                class="w-full block bg-transparent border-2 rounded-xl px-3 py-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('lokasi') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                placeholder=" " />
                            <label for="lokasi"
                                class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                                    {{ $errors->has('lokasi') ? 'text-red-500 peer-focus:text-red-500 ' : 'text-gray-300 peer-focus:text-logo' }}">
                                Lokasi</label>
                            @error('lokasi')
                                <span class="text-xs text-red-500 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative">
                            <input type="datetime-local" name="bataspendaftaran" id="bataspendaftaran"
                                value="{{ old('bataspendaftaran', $pelatihan->batas_pendaftaran) }}"
                                class="w-full block bg-transparent border-2 rounded-xl px-3 py-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('bataspendaftaran') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                placeholder=" " />
                            <label for="bataspendaftaran"
                                class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                {{ $errors->has('bataspendaftaran') ? 'text-red-500 peer-focus:text-red-500 ' : 'text-gray-300 peer-focus:text-logo' }}">
                                Batas pendaftaran
                            </label>
                            @error('bataspendaftaran')
                                <span class="text-xs text-red-500 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative">
                            <input type="text" name="kuota" id="kuota"
                                value="{{ old('kuota', $pelatihan->kuota) }}"
                                class="w-full block bg-transparent border-2 rounded-xl px-3 py-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('kuota') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                placeholder=" " />
                            <label for="kuota"
                                class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                                    {{ $errors->has('kuota') ? 'text-red-500 peer-focus:text-red-500 ' : 'text-gray-300 peer-focus:text-logo' }}">
                                Kuota</label>
                            @error('kuota')
                                <span class="text-xs text-red-500 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-span-2">
                            <label for="deskripsi"
                                class="text-gray-300 {{ $errors->has('deskripsi') ? 'text-red-500' : 'text-gray-300' }}">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi pelatihan"
                                class="w-full rounded-lg border-2 resize-none bg-transparent text-left align-top px-3 py-3 h-40 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('deskripsi') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}">{{ old('deskripsi', $pelatihan->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <span class="text-xs text-red-500 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class=" flex justify-between col-span-2">
                    <a href="{{ route('PelatihanAdmin') }}"
                        class="flex items-center gap-2 text-white font-medium bg-[#508D4E] px-4 py-3 rounded-lg">
                        <x-heroicon-s-arrow-small-left class="w-6 h-6" />Kembali
                    </a>
                    <button type="submit"
                        class="flex items-center gap-2 text-white font-medium bg-[#1474A7] px-4 py-3 rounded-lg">
                        Simpan <x-heroicon-s-arrow-small-right class="w-6 h-6" />
                    </button>
                </div>
            </div>
        </form>
    </section>
    @push('scripts')
        <script>
            const form = document.querySelector('#form-produk');

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Yakin ingin Menambah Data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            const inputFile = document.getElementById("dropzone-file");
            const previewContainer = document.getElementById("image-preview");
            const previewImage = document.getElementById("preview");

            inputFile.addEventListener("change", function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.addEventListener("load", function() {
                        previewImage.setAttribute("src", this.result);
                        previewContainer.classList.remove("hidden");
                    });

                    reader.readAsDataURL(file);
                }
            });
        </script>
    @endpush
</x-layouts.admin>
