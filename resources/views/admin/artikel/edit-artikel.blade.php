<x-layouts.admin>
    <section class="p-[24px] overflow-auto">
        <form id="form-artikel" action="/Artikel/edit-artikel/{{ $artikel->id }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="bg-white rounded-2xl w-full h-full p-[24px]">
                <div class="flex items-center justify-center w-full mb-[24px]">
                    <!-- Preview Gambar -->
                    <div id="image-preview" class="mb-3 hidden">
                        <img id="preview" src="#" alt="Preview Gambar"
                            class="w-40 h-40 object-cover rounded-lg mx-auto mb-2">
                        <p class="text-sm text-center text-gray-500">Preview Gambar</p>
                    </div>

                    <!-- Upload Button -->
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
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
                        </div>
                        <input id="dropzone-file" name="gambar" type="file" class="hidden" />
                    </label>
                </div>

                <div class="space-y-4">
                    <div class="w-full">
                        <div class="w-full">
                            <div class="relative">
                                <input type="text" name="judul" id="judul"
                                    value="{{ old('judul', $artikel->judul) }}"
                                    class="w-full block bg-transparent border-2 rounded-xl px-3 py-3 border-gray-300 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('judul') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}"
                                    placeholder=" " />
                                <label for="judul"
                                    class="absolute text-base duration-300 text-gray-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ml-1
                                    {{ $errors->has('judul') ? 'text-red-500 peer-focus:text-red-500' : 'text-gray-300 peer-focus:text-logo' }}">
                                    Judul Artikel</label>
                                @error('judul')
                                    <span class="text-xs text-red-500 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full space-y-2">
                        <label for="isi"
                            class="text-gray-500 {{ $errors->has('isi', $artikel->isi) ? 'text-red-500' : 'text-gray-500 ' }}">Isi
                            Artikel</label>
                        <textarea type="text" name="isi" id="isi"
                            class="w-full rounded-lg border-2 resize-none bg-transparent text-left align-top px-3 py-3 h-34 appearance-none focus:ring-0 focus:border-logo peer focus:outline-none {{ $errors->has('isi') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-logo' }}">{{ old('isi', $artikel->isi) }}</textarea>
                    </div>
                    <div class=" flex justify-between">
                        <a href="{{ route('ArtikelAdmin') }}"
                            class="flex items-center gap-2 text-white font-medium bg-[#508D4E] px-4 py-3 rounded-lg">
                            <x-heroicon-s-arrow-small-left class="w-6 h-6" />Kembali
                        </a>
                        <button type="submit"
                            class="flex items-center gap-2 text-white font-medium bg-[#1474A7] px-4 py-3 rounded-lg">
                            Simpan <x-heroicon-s-arrow-small-right class="w-6 h-6" />
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    @push('scripts')
        <script>
            const form = document.querySelector('#form-artikel');

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Yakin ingin Menambah Artikel?',
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
