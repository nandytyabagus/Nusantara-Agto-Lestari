<x-layouts.admin>
    <section class="p-6">
        <div class="bg-white items-center rounded-2xl h-max-[85vh] overflow-auto">
            <div class="p-6 border-b-2 border-dasar flex justify-between items-center">
                <h1 class="text-xl font-semibold">
                    @if ($detailPelatihan->isNotEmpty())
                        {{ $detailPelatihan->first()->pelatihan->judul_pelatihan }}
                    @else
                        Pelatihan Tidak Ditemukan atau Belum Ada Pendaftar
                    @endif
                </h1>
                <div class="">
                    <h1 class="text-xl font-semibold">
                        {{ $sisaKuota }} Kuota Tersisa
                    </h1>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <h2 class="text-lg font-semibold">Batas Pendaftaran</h2>
                    <p class="text-gray-600">
                        @if ($detailPelatihan->isNotEmpty())
                            {{ \Carbon\Carbon::parse($detailPelatihan->first()->pelatihan->batas_pendaftaran)->translatedFormat('d F Y | H:i') }}
                        @else
                            Tidak ada batas pendaftaran yang ditentukan.
                        @endif
                </div>
                <div class="h-[45vh] overflow-y-auto">
                    <table class="text-left w-full table-auto border-b-1">
                        <thead class="sticky top-0 z-10 bg-white border-b-1 ">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Nomor Telefon</th>
                                <th class="px-4 py-3">Waktu Pendaftaran</th>
                                <th class="px-4 py-3 text-center">Bukti Pembayaran</th>
                                <th class="px-4 py-3 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($detailPelatihan as $index => $detail)
                                <tr>
                                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3">{{ $detail->user->name }}</td>
                                    <td class="px-4 py-3">{{ $detail->user->email }}</td>
                                    <td class="px-4 py-3">{{ $detail->user->nomor }}</td>
                                    <td class="px-4 py-3">{{ $detail->created_at->format('d M Y H:i') }}</td>
                                    <td class="px-4 py-3 text-center">
                                        @if (!empty($detail->bukti_pembayaran))
                                            <div class="flex justify-center items-center">
                                                <img data-modal-target="modalDetail-{{ $detail->id }}"
                                                    data-modal-toggle="modalDetail-{{ $detail->id }}"
                                                    src="{{ asset('storage/' . $detail->bukti_pembayaran) }}"
                                                    alt="Bukti Pembayaran" class="w-20" loading="lazy">
                                            </div>
                                            <div id="modalDetail-{{ $detail->id }}" tabindex="-1" aria-hidden="true"
                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="bg-white rounded-xl shadow">
                                                    <div
                                                        class="flex p-6 text-white items-center border-b-1 border-dasar rounded-t-xl bg-[#508D4E]">
                                                        <h2 class="text-xl font-medium">Bukti Pembayaran</h2>
                                                    </div>
                                                    <div class="space-y-4 p-6">
                                                        <img src="{{ asset('storage/' . $detail->bukti_pembayaran) }}"
                                                            alt="Bukti Pembayaran" class="w-100" loading="lazy">
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-gray-400">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <form action="{{ route('editStatus', $detail->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" onchange="this.form.submit()"
                                                class="border-gray-300 rounded-md">
                                                <option value="pending"
                                                    {{ $detail->status == 'pending' ? 'selected' : '' }}>Pending
                                                </option>
                                                <option value="lunas"
                                                    {{ $detail->status == 'lunas' ? 'selected' : '' }}>
                                                    Lunas</option>
                                                <option value="rejected"
                                                    {{ $detail->status == 'rejected' ? 'selected' : '' }}>Rejected
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-gray-500">
                                        Belum ada pendaftar untuk pelatihan ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class=" flex p-6 border-t-1 border-dasar">
                <a href="{{ route('PelatihanAdmin') }}"
                    class="flex items-center gap-2 text-white font-medium bg-[#508D4E] px-4 py-3 rounded-lg">
                    <x-heroicon-s-arrow-small-left class="w-6 h-6" />Kembali
                </a>
            </div>
        </div>
    </section>
</x-layouts.admin>
