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
        $pelatihans = Pelatihan::when($request->search, function ($query, $search) {
            $query->where('judul_pelatihan', 'like', '%' . $search . '%')
                  ->orWhere('lokasi', 'like', '%' . $search . '%');
        })
        ->latest()
        ->get();
    
        return view('admin.pelatihan.pelatihan', compact('pelatihans'));
    }

public function detailPelatihan($id)
{
    $pelatihans = Pelatihan::findOrFail($id);

    $jumlahPeserta = DetailPelatihan::where('pelatihan_id', $id)->count();

    $sisaKuota = $pelatihans->kuota - $jumlahPeserta;

    return view('admin.pelatihan.detail-pelatihan', compact('pelatihans', 'sisaKuota'));
}
    public function ShowViewTambahPelatihan()
    {
        return view('admin.pelatihan.tambah-pelatihan');
    }

    public function tambahPelatihan(Request $request)
    {
        
    }

    public function ShowViewEditPelatihan(Request $request,$id)
    {
        $pelatihan = Pelatihan::findOrFail($id);

        return view('admin.pelatihan.edit-pelatihan',compact('pelatihan'));
    }

    public function editPelatihan($id)
    {
        
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
        $detailPelatihan = DetailPelatihan::with(['user', 'pelatihan'])->where('pelatihan_id', $id)->get();
        
        return view('admin.pelatihan.detail-pendaftaran',compact('detailPelatihan'));
    }

    public function hapusPelatihan($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);

        if ($pelatihan->gambar && Storage::disk('public')->exists($pelatihan->gambar)) {
            Storage::disk('public')->delete($pelatihan->gambar);
        }

        $pelatihan->delete();

        toast('Pelatihan berhasil dihapus', 'success')->autoClose(5000)->position('top-end')->hideCloseButton();
        return redirect()->back();
    }

}