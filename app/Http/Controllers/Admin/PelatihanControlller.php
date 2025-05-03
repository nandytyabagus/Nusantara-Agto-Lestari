<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        return view('admin.pelatihan.detail-pelatihan',compact('pelatihans'));
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