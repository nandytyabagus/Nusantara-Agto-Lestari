<x-layouts.customer>
    <div class="px-10 py-8">
        <a href="{{ route('daftarPelatihanCustomer') }}">cfgghvjbj,</a>

        <button data-modal-target="modalDetail" data-modal-toggle="modalDetail"
            class="text-white px-6 py-6 cursor-pointer rounded-full bg-[#1474A7] "><x-sui-document-stack
                class="w-8 h-8" /></button>

        <div id="modalDetail" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-3/4 max-h-full">
                <div class="bg-white rounded-4xl shadow relative px-8 py-8 space-y-10">
                    <button data-modal-hide="modalDetail"
                        class="absolute top-3 right-3 text-gray-400 bg-transparent hover:text-black rounded-full inline-flex items-center">
                        <x-ri-close-circle-fill class="w-8 h-8 hover:text-red-600 text-red-500" />
                    </button>
                    <div class="pt-8 py-5 px-6 w-full">
                        <table class="w-full">
                            <thead class="border-b-1">
                                <tr>
                                    <th class=" py-3 px-4 w-16">No</th>
                                    <th class=" py-3 px-4">Nama</th>
                                    <th class=" py-3 px-4">Nomor Telepon</th>
                                    <th class=" py-3 px-4">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class=" py-3 px-4"></td>
                                    <td class=" py-3 px-4"></td>
                                    <td class=" py-3 px-4"></td>
                                    <td class=" py-3 px-4"></td>
                                    <td class=" py-3 px-4"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.customer>
