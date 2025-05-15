<?php

namespace App\Http\Controllers\Customer;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailPelatihan;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PelatihanController extends Controller
{
    public function ShowView()
    {
        $pelatihans = Pelatihan::all();

        return view('customer.pelatihan.pelatihan', compact('pelatihans'));
    }

    public function detailPelatihan($id)
    {
        if (!Auth::check()) {
            Alert::warning('Peringatan', 'harap masuk terlebih dahulu!')->position('top')->autoClose(5000)->hideCloseButton();
    
            return back();
        }
        
        $user = Auth::user();
        
        $exists = DetailPelatihan::where('user_id', $user->id)->where('pelatihan_id', $id)->exists();
        
        $pelatihans = Pelatihan::findOrFail($id);

        return view('customer.pelatihan.detail-pelatihan', compact('pelatihans','exists'));
    }

    public function daftarPelatihan($id)
    {
        $user = Auth::user();
        DetailPelatihan::create([
            'user_id' => $user->id,
            'pelatihan_id' => $id
        ]);
        
        return back();
    }

    public function ShowViewRiwayatPelatihan($id)
    {
        $pelatihans = DetailPelatihan::where('user_id', $id)->with('pelatihan')->get();

        return view('customer.pelatihan.riwayat-pelatihan', compact('pelatihans'));
    }
}