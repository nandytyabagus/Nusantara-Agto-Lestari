<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Pelatihan;
use App\Models\User;
use App\View\Components\Layouts\admin;

class BerandaController extends Controller
{
    public function ShowViewAdmin()
    {
        $produk = Produk::count();
        $artikel = Artikel::count();
        $pelatihan = Pelatihan::count();
        $user = User::where('role', 'pelanggan')->count();
        $admin = User::where('role', 'admin')->first();
        
        return view('admin.beranda.beranda', compact('produk', 'artikel', 'pelatihan', 'user', 'admin'));
    }
}