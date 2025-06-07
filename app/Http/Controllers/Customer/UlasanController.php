<?php

namespace App\Http\Controllers\Customer;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function tambahUlasan(Request $request,$id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $user = Auth::user();

        Ulasan::create([
            'user_id' => $user->id,
            'tipe_ulasan_id' => $id,
            'isi' => $request->comment,
        ]);

        toast('Ulasan telah berhasil ditambahkan', 'success')->autoClose(5000)->position('top-end')->hideCloseButton();
        return redirect()->back();
    }

    public function update(Request $request, Ulasan $ulasan)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $ulasan->update([
            'isi' => $request->comment,
        ]);

        toast('Perubahan berhasil disimpan', 'success')->autoClose(5000)->position('top-end')->hideCloseButton();
        return back();
    }

    public function destroy(Ulasan $ulasan)
    {
        $ulasan->delete();

        toast('Ulasan telah berhasil dihapus', 'success')->autoClose(5000)->position('top-end')->hideCloseButton();
        return back();
    }
}