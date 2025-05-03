<?php

namespace App\Http\Controllers\Customer;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class ArtikelController extends Controller
{
    public function ShowView()
    {
        $artikels = Artikel::with('user')->orderBy('judul', 'asc')->get();
        $terbaru = Artikel::latest()->take(3)->get();
    
        return view('customer.artikel.artikel', compact('artikels', 'terbaru'));
    }

    public function detailArtikel($slug)
    {
        if (!Auth::check()) {
            Alert::warning('Peringatan', 'harap masuk terlebih dahulu!')->position('top')->autoClose(5000)->hideCloseButton();
    
            return back();
        }
        
        $artikel = Artikel::with('user')->where('slug', $slug)->firstOrFail();
    
        $artikelLainnya = Artikel::where('id', '!=', $artikel->id)
        ->inRandomOrder()
        ->take(3)
        ->get();

        return view('customer.artikel.detail-artikel', compact('artikel', 'artikelLainnya'));
    }
}