<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function ShowView()
    {
        $ulasans = Ulasan::with('user')->get()->all();

        return view('customer.beranda.beranda', compact('ulasans'));
    }
}