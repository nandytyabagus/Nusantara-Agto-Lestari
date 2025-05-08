<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function ShowView()
    {
        $pelatihans = Pelatihan::all();

        return view('customer.pelatihan.pelatihan', compact('pelatihans'));
    }

    public function detailPelatihan($id)
    {
        $pelatihans = Pelatihan::findOrFail($id);
        // dd($pelatihans);
        return view('customer.pelatihan.detail-pelatihan', compact('pelatihans'));
    }
}