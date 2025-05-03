<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function ShowProfile($id)
    {
        $user = User::findOrFail($id);
    
        return view('customer.profile.profile', compact('user'));
    }
}