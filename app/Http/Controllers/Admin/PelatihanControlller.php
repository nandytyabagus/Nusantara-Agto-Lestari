<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailPelatihan;
use Illuminate\Support\Facades\Storage;

class PelatihanControlller extends Controller
{
    public function ShowViewAdmin(Request $request)
    {
        $pelatihans = Pelatihan::where('status', 'aktif')
        ->when($request->search, function ($query, $search) {
            $query->where('judul_pelatihan', 'like', '%' . $search . '%')
                  ->orWhere('lokasi', 'like', '%' . $search . '%');
        })
        ->latest()
        ->get();
    
        return view('admin.pelatihan.pelatihan', compact('pelatihans'));
    }

    public function detailPelatihan($id)
    {
        $pelatihans = Pelatihan::withCount(['detailPelatihans as jumlahPeserta' => function ($query) {
                $query->where('status', 'lunas');
            }
        ])->findOrFail($id);

        $sisaKuota = $pelatihans->kuota - $pelatihans->jumlahPeserta;

        return view('admin.pelatihan.detail-pelatihan', compact('pelatihans', 'sisaKuota'));
    }

    public function ShowViewTambahPelatihan()
    {
        return view('admin.pelatihan.tambah-pelatihan');
    }

    public function tambahPelatihan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'waktupelaksanaan' => 'required|date',
            'bataspendaftaran' => 'required|date',
            'lokasi' => 'required|string',
            'kuota' => 'required|integer',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ],[
            'judul.required' => 'Judul pelatihan belum terisi',
            'deskripsi.required' => 'Deskripsi belum terisi',
            'waktupelaksanaan.required' => 'Waktu pelaksanaan belum terisi',
            'waktupelaksanaan.date' => 'Format waktu pelaksanaan tidak valid',
            'bataspendaftaran.required' => 'Batas pendaftaran belum terisi',
            'bataspendaftaran.date' => 'Format batas pendaftaran tidak valid',
            'lokasi.required' => 'Lokasi belum terisi',
            'kuota.required' => 'Kuota belum terisi',
            'gambar.required' => 'Gambar belum terisi',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Format gambar tidak valid, hanya jpg, jpeg, png, webp yang diperbolehkan',
            'gambar.max' => 'Ukuran gambar terlalu besar, maksimal 2MB',
        ]);

        $gambarPath = $request->file('gambar')->store('pelatihan', 'public');

        Pelatihan::create([
            'judul_pelatihan' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'waktu_pelaksanaan' => $request->waktupelaksanaan,
            'batas_pendaftaran' => $request->bataspendaftaran,
            'lokasi' => $request->lokasi,
            'kuota' => $request->kuota,
            'gambar' => $gambarPath,
        ]);
        
        toast('Pelatihan berhasil ditambahkan', 'success')->autoClose(5000)->position('top-end')->hideCloseButton();
        return redirect()->back();
    }

    public function ShowViewEditPelatihan(Request $request,$id)
    {
        $pelatihan = Pelatihan::findOrFail($id);

        return view('admin.pelatihan.edit-pelatihan',compact('pelatihan'));
    }

    public function editPelatihan(Request $request,$id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'waktupelaksanaan' => 'required|date',
            'bataspendaftaran' => 'required|date',
            'lokasi' => 'required|string',
            'kuota' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ],[
            'judul.required' => 'Judul pelatihan belum terisi',
            'deskripsi.required' => 'Deskripsi belum terisi',
            'waktupelaksanaan.required' => 'Waktu pelaksanaan belum terisi',
            'waktupelaksanaan.date' => 'Format waktu pelaksanaan tidak valid',
            'bataspendaftaran.required' => 'Batas pendaftaran belum terisi',
            'bataspendaftaran.date' => 'Format batas pendaftaran tidak valid',
            'lokasi.required' => 'Lokasi belum terisi',
            'kuota.required' => 'Kuota belum terisi',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Format gambar tidak valid, hanya jpg, jpeg, png, webp yang diperbolehkan',
            'gambar.max' => 'Ukuran gambar terlalu besar, maksimal 2MB',
        ]);

        $pelatihan = Pelatihan::findOrFail($id);
        
        if ($request->hasFile('gambar')) {
            if ($pelatihan->gambar && Storage::disk('public')->exists($pelatihan->gambar)) {
                Storage::disk('public')->delete($pelatihan->gambar);
            }
            $gambarPath = $request->file('gambar')->store('pelatihan', 'public');
        }

        $pelatihan->update([
            'judul_pelatihan' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'waktu_pelaksanaan' => $request->waktupelaksanaan,
            'batas_pendaftaran' => $request->bataspendaftaran,
            'lokasi' => $request->lokasi,
            'kuota' => $request->kuota,
            'gambar' => $gambarPath ?? $pelatihan->gambar,
        ]);
        
        toast('Pelatihan berhasil diperbarui', 'success')->autoClose(5000)->position('top-end')->hideCloseButton();
        return redirect()->route('PelatihanAdmin');
    }

    public function editStatus(Request $request,$id)
    {
        $request->validate([
            'status' => 'required|in:pending,lunas,rejected',
        ]);

        $detail = DetailPelatihan::findOrFail($id);
        $detail->status = $request->status;
        $detail->save();
        toast('Status berhasil diperbarui!', 'success')->autoClose(3000)->position('top-end');
        
        return back();
    }

    public function ShowViewPendaftaran($id)    
    {   
        $pelatihan = Pelatihan::withCount([
            'detailPelatihans as jumlahPeserta' => function ($query) {
                    $query->where('status', 'lunas');
                }
            ])->findOrFail($id);

        $sisaKuota = $pelatihan->kuota - $pelatihan->jumlahPeserta;

        $detailPelatihan = DetailPelatihan::with(['user', 'pelatihan'])
            ->where('pelatihan_id', $id)
            ->get();

        return view('admin.pelatihan.detail-pendaftaran', compact('detailPelatihan', 'sisaKuota'));
    }

    public function hapusPelatihan($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);

        $pelatihan->status = 'nonaktif';
        $pelatihan->save();

        toast('Pelatihan berhasil dihapus', 'success')->autoClose(5000)->position('top-end')->hideCloseButton();
        return redirect()->back();
    }
}