<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function tambahUlasanProduk(Request $request,$id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        Ulasan::create([
            'user_id' => $id,
            'tipe_ulasans_id' => 1,
            'comment' => $request->comment,
        ]);

        return redirect()->back();
    }

        public function tambahUlasanPelatihan(Request $request,$id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        Ulasan::create([
            'user_id' => $id,
            'tipe_ulasans_id' => 2,
            'comment' => $request->comment,
        ]);

        return redirect()->back();
    }
}