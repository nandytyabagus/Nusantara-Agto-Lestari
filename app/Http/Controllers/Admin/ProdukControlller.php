<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProdukControlller extends Controller
{
    public function ShowViewAdmin(Request $request)
    {
        $produks = Produk::with('kategori')
        ->when($request->search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                      ->orWhereHas('kategori', function ($kategoriQuery) use ($search) {
                          $kategoriQuery->where('nama', 'like', '%' . $search . '%');
                      });
            });
        })
        ->latest()
        ->get();

        return view('admin.produk.produk', compact('produks'));
    }

    public function ShowDetail($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);

        return view('admin.produk.detail-produk', compact('produk')); 
    }

    public function ShowViewTambahProduk(Request $request)
    {
        $kategoris = Kategori::all();

        return view('admin.produk.tambah-produk',compact('kategoris'));
    }

    public function tambahProduk(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|exists:kategoris,id',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ],[
            'nama.required' => 'Nama produk belum terisi',
            'kategori.required' => 'Kategori belum terisi, wajib di isi!',
            'kategori.exists' => 'Kategori yang dipilih tidak tersedia',
            'deskripsi.required' => 'Deskripsi wajib terisi',
            'harga.required' => 'Harga belum terisi',
            'harga.numeric' => 'Inputan harga harus berupa angka',
            'gambar.required' => 'Gambar produk wajib diunggah',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        $gambarPath = $request->file('gambar')->store('produks', 'public');

        Produk::create([
            'nama' => $validate['nama'],
            'kategori_id' => $validate['kategori'],
            'deskripsi' => $validate['deskripsi'],
            'harga' => $validate['harga'],
            'gambar' => $gambarPath,
        ]);

        toast('Produk berhasil ditambahkan!', 'success')->autoClose(3000)->position('top-end');

        return redirect()->back();
    }

    public function ShowViewEditProduk($id)
    {
        $produk = Produk::findOrFail($id);
        $kategoris = Kategori::all();

        return view('admin.produk.edit-produk', compact('produk', 'kategoris'));
    }

    public function editProduk(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|exists:kategoris,id',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ],[
            'nama.required' => 'Nama produk belum terisi',
            'kategori.required' => 'Kategori belum terisi, wajib di isi!',
            'kategori.exists' => 'Kategori yang dipilih tidak tersedia',
            'deskripsi.required' => 'Deskripsi wajib terisi',
            'harga.required' => 'Harga belum terisi',
            'harga.numeric' => 'Inputan harga harus berupa angka',
            'gambar.required' => 'Gambar produk wajib diunggah',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        $produk = Produk::findOrFail($id);
        $imagePath = null;

        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::delete('public/' . $produk->gambar);
            }

            $imagePath = $request->file('gambar')->store('produks', 'public');
        }

        $produk->update([
            'nama' => $validate['nama'],
            'kategori_id' => $validate['kategori'],
            'harga' => $validate['harga'],
            'deskripsi' => $validate['deskripsi'],
            'gambar' => $imagePath ?? $produk->gambar,
        ]);

        toast('Produk berhasil diperbarui!', 'success')->autoClose(3000)->position('top-end');

        return redirect()->route('ProdukAdmin');
    }
    
    public function hapusProduk($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();
        
        toast('Produk telah berhasil dihapus', 'success')->autoClose(5000)->position('top-end')->hideCloseButton();
        return redirect()->back();
    }
}