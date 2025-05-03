<?php

namespace App\Http\Controllers\Customer;

use App\Models\Produk;
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

        $kategori = Kategori::findOrFail($kategoriId);

        $produks = Produk::with('kategori')->where('kategori_id', $kategori->id)->get();

        return view('customer.produk.produk', compact('produks', 'kategoris', 'kategoriId', 'kategori'));
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