<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function ShowView()
    {
        $artikels = Artikel::with('user')->orderBy('judul', 'asc')->get();
        $terbaru = Artikel::with('user')->latest()->take(3)->get();
    
        return view('customer.artikel.artikel', compact('artikels', 'terbaru'));
    }

    public function detailArtikel($slug)
    {
        $artikel = Artikel::with('user')->where('slug', $slug)->firstOrFail();
    
        return view('customer.artikel.detail-artikel', compact('artikel'));
    }
}