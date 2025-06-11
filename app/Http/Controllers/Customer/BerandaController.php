<?php

namespace App\Http\Controllers\Customer;

use App\Models\Ulasan;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Artikel;

class BerandaController extends Controller
{
    public function ShowView()
    {
        $pelatihans = Pelatihan::orderBy('created_at', 'desc')->take(3)->get();
        $artikels = Artikel::orderBy('created_at', 'desc')->take(3)->get();
        $ulasans = Ulasan::orderBy('created_at', 'desc')->take(4)->get();
        return view('customer.beranda.beranda', compact('pelatihans', 'ulasans', 'artikels'));
    }
}