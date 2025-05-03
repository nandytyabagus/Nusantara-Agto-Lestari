<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UlasanControlller extends Controller
{
    public function ShowViewAdmin(Request $request)
    {
        $ulasans = Ulasan::with('user')
        ->when($request->search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('isi_ulasan', 'like', '%' . $search . '%')
                      ->orWhereHas('user', function ($userQuery) use ($search) {
                          $userQuery->where('name', 'like', '%' . $search . '%');
                      });
            });
        })
        ->latest()
        ->get();

    return view('admin.ulasan.ulasan', compact('ulasans'));
    }
    
    public function hapusUlasan($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        toast('Ulasan berhasil dihapus', 'success')->autoClose(5000)->position('top-end')->hideCloseButton();
        return redirect()->back();
    }
}