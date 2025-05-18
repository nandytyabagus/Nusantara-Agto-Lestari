<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

        toast('Perbaikan Berhasil Disimpan', 'success')->autoClose(5000)->position('top-end')->hideCloseButton();
        return redirect()->route('ShowProfile', ['id' => $id]);
    }

    public function updateAvatar(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);

        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        if ($request->hasFile('avatar')) {
            $imagePath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $imagePath;
            $user->save();
        }
        toast('Foto Profile Berhasil Diperbarui', 'success')->autoClose(5000)->position('top-end')->hideCloseButton();
        return back();
    }

    public function deleteAvatar($id)
    {
        $user = User::findOrFail($id);

        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
            $user->avatar = null;
            $user->save();
        }
        toast('Foto Profile Berhasil Dihapus', 'success')->autoClose(5000)->position('top-end')->hideCloseButton();
        return back();
    }
}