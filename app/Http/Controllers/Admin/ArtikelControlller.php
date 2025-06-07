<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelControlller extends Controller
{
    public function ShowViewAdmin(Request $request)
    {
        $artikels = Artikel::when($request->search, function ($query, $search) {
            $query->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%');
        })
        ->latest()
        ->get();
    
        return view('admin.artikel.artikel', compact('artikels'));
    }

    public function detailArtikel($id)
    {
        $artikel = Artikel::findOrFail($id);

        return view('admin.artikel.detail-artikel', compact('artikel'));
    }

    public function ShowViewTambahArtikel(Request $request)
    {
        return view('admin.artikel.tambah-artikel');
    }

    public function tambahArtikel(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ],[
            'judul.required' => 'Judul belum terisi, wajib terisi!',
            'isi.required' => 'Isi artikel belum terisi, wajib terisi!',
            'gambar.required' => 'Gambar produk wajib diunggah',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        $pathGambar = $request->file('gambar')->store('artikel', 'public');

        Artikel::create([
            'judul' => $validate['judul'],
            'slug' => Str::slug($validate['judul']),
            'isi' => $validate['isi'],
            'gambar' => $pathGambar,
            'user_id' => Auth::id(),
        ]);

        toast('Artikel berhasil ditambahkan!', 'success')->autoClose(3000)->position('top-end');

        return redirect()->back();
    }

    public function ShowViewEditArtikel($id)
    {
        $artikel = Artikel::findOrFail($id);
        
        return view('admin.artikel.edit-artikel', compact('artikel'));
    }

    public function editArtikel(Request $request, $id)
    {
        $validate = $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ],[
            'judul.required' => 'Judul belum terisi, wajib terisi!',
            'isi.required' => 'Isi artikel belum terisi, wajib terisi!',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        $artikel = Artikel::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
                Storage::delete('public/' . $artikel->gambar);
            }

            $imagePath = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update([
            'judul' => $validate['judul'],
            'isi' => $validate['isi'],
            'gambar' => $imagePath ?? $artikel->gambar,
            'slug' => Str::slug($validate['judul']),
        ]);

        toast('Artikel berhasil diperbarui!', 'success')->autoClose(3000)->position('top-end');

        return redirect()->route('ArtikelAdmin');
    }

    public function hapusArtikel($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();
        
        toast('Artikel telah berhasil dihapus', 'success')->autoClose(5000)->position('top-end')->hideCloseButton();
        return redirect()->back();
    }

    
}