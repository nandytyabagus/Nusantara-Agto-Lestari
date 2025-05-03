<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function ShowViewAdmin()
    {
        return view('admin.beranda.beranda');
    }
}