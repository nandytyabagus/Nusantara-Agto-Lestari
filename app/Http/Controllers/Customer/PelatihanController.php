<?php

namespace App\Http\Controllers\Customer;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        
        $pelatihans = Pelatihan::findOrFail($id);

        return view('customer.pelatihan.detail-pelatihan', compact('pelatihans'));
    }

    public function daftarPelatihan($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);

        $user = Auth::user();
        return back();
    }
}