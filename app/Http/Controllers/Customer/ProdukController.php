<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Ulasan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{

    public function ShowProduk(Request $request)
    {
        $kategoris = Kategori::all();

        $kategoriId = $request->query('kategori');

        if (!$kategoriId && $kategoris->count()) {
            $kategoriId = $kategoris->first()->id;
        }

        $produks = Produk::with('kategori')
            ->where('kategori_id', $kategoriId)
            ->get();

        $kategori = $kategoris->where('id', $kategoriId)->first();

        $semuaulasans = Ulasan::with('user')->where('tipe_ulasan_id', 1)->orderBy('created_at', 'desc')->get();

        $user = Auth::user();
        $waktuBatas = Carbon::now()->subMinutes(5);

        if ($user) {
            $ulasanBaruUser = $semuaulasans->filter(function ($ulasan) use ($user, $waktuBatas) {
                return $ulasan->user_id === $user->id && $ulasan->created_at >= $waktuBatas;
            });

            $ulasanLain = $semuaulasans->filter(function ($ulasan) use ($ulasanBaruUser) {
                return !$ulasanBaruUser->contains($ulasan);
            });

            $ulasans = $ulasanBaruUser->concat($ulasanLain);
        } else {
            $ulasans = $semuaulasans;
        }


        return view('customer.produk.produk', compact('produks', 'kategoris', 'kategoriId', 'kategori', 'ulasans'));
    }

    public function ShowDetail($id)
    {
        if (!Auth::check()) {
            Alert::warning('Peringatan', 'harap masuk terlebih dahulu!')->position('top')->autoClose(5000)->hideCloseButton();
    
            return back();
        }

        $produk = Produk::with('kategori')->findOrFail($id);

        return view('customer.produk.detail-produk', compact('produk')); 
    }
}