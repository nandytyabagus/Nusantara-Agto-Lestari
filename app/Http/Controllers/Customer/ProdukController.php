<?php

namespace App\Http\Controllers\Customer;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ulasan;
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

        // Eager load produk beserta kategori untuk mencegah N+1
        $produks = Produk::with('kategori')
            ->where('kategori_id', $kategoriId)
            ->get();

        $kategori = $kategoris->where('id', $kategoriId)->first();

        $ulasans = Ulasan::with('user')->where('tipe_ulasan_id', 1)->orderBy('created_at', 'desc')->get();

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