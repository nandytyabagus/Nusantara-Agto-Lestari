<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function ShowView()
    {
        return view('customer.pelatihan.pelatihan');
    }
}