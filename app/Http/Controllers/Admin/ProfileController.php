<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\View\Components\Layouts\admin;

class ProfileController extends Controller
{
    public function ShowProfile($id)
    {
        $user = User::findOrFail($id);
    
        return view('admin.profile.profile', compact('user'));
    }
    

    public function ShowEditProfile($id)
    {
        $user = User::findOrFail($id);
    
        return view('admin.profile.edit-profile', compact('user'));
    }

    public function editProfile(Request $request, $id)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'nomor'    => 'nullable|string|max:20',
            'alamat'   => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        $user = User::findOrFail($id);

        $user->name = $validated['name'];
        $user->nomor = $validated['nomor'];
        $user->alamat = $validated['alamat'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('ShowProfile', ['id' => Auth::user()->id]);
    }
}