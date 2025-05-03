<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function ShowView()
    {
        return view('customer.ulasan.ulasan');
    }
}