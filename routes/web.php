<?php

use App\Http\Controllers\Admin\BerandaController as AdminBerandaController;
use App\Http\Controllers\Admin\ProdukControlller as AdminProdukController;
use App\Http\Controllers\Admin\ArtikelControlller as AdminArtikelController;
use App\Http\Controllers\Admin\PelatihanControlller as AdminPelatihanController;
use App\Http\Controllers\Admin\UlasanControlller as AdminUlasanController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Customer\BerandaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\ArtikelController;
use App\Http\Controllers\Customer\PelatihanController;
use App\Http\Controllers\Customer\ProdukController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\UlasanController;

Route::middleware(['Customer'])->group(function(){
    Route::get('/', [BerandaController::class, 'ShowView'])->name('Beranda');
    
    Route::get('/produk', [ProdukController::class, 'ShowProduk'])->name('Produk');
    Route::get('/produk/detail/{id}', [ProdukController::class,'ShowDetail'])->name('produk.detail');
    
    Route::get('/artikel', [ArtikelController::class, 'ShowView'])->name('Artikel');
    Route::get('/artikel/{slug}', [ArtikelController::class, 'detailArtikel'])->name('ShowArtikel');
    
    Route::get('/pelatihan', [PelatihanController::class, 'ShowView'])->name('Pelatihan');
    Route::get('/pelatihan/{id}', [PelatihanController::class, 'detailPelatihan'])->name('detailPelatihanCustomer');
    Route::post('/pelatihan/daftar{id}', [PelatihanController::class, 'daftarPelatihan'])->name('daftarPelatihanCustomer');
    Route::get('/pelatihan/riwayat/{id}', [PelatihanController::class, 'ShowViewRiwayatPelatihan'])->name('riwayatPelatihan');
    Route::post('/pelatihan/cek-user', [PelatihanController::class, 'cekUser'])->name('pelatihan.cekUser');
    Route::put('/pelatihan/bukti-pembayaran/{id}', [PelatihanController::class, 'UploadBuktiPembayaran'])->name('uploadBuktiPembayaran');

    Route::post('/ulasan/create{id}', [UlasanController::class, 'tambahUlasan'])->name('tambahUlasan');
    Route::resource('ulasan', UlasanController::class)->only(['update', 'destroy',]);

    Route::get('/profile/{id}', [ProfileController::class, 'ShowProfile'])->name('Profile');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'ShowEditProfile'])->name('EditProfileCustomer');
    Route::put('/profile/edit/{id}', [ProfileController::class, 'EditProfile'])->name('editProfileCustomer');
    Route::put('/profile/{id}/avatar', [ProfileController::class, 'updateAvatar'])->name('updateAvatarCustomer');
    Route::delete('/profile/{id}/avatar', [ProfileController::class, 'deleteAvatar'])->name('deleteAvatarCustomer');

});

Route::middleware(['admin'])->group(function(){
    Route::get('/Beranda',[AdminBerandaController::class, 'ShowViewAdmin'])->name('BerandaAdmin');
    
    Route::get('/Produk',[AdminProdukController::class, 'ShowViewAdmin'])->name('ProdukAdmin');
    Route::get('/Produk/detail/{id}',[AdminProdukController::class, 'ShowDetail'])->name('DetailProduk');
    Route::get('/Produk/Tambah-produk', [AdminProdukController::class, 'ShowViewTambahProduk'])->name('Tambah');
    Route::post('/Produk/Tambah-produk', [AdminProdukController::class, 'tambahProduk'])->name('createProduk');
    Route::get('/Produk/edit/{id}', [AdminProdukController::class, 'ShowViewEditProduk'])->name('Edit');
    Route::put('/Produk/edit/{id}', [AdminProdukController::class, 'editProduk'])->name('editProduk');
    Route::delete('/Produk/delete/{id}', [AdminProdukController::class, 'hapusProduk'])->name('hapusProduk');

    Route::get('/Artikel',[AdminArtikelController::class, 'ShowViewAdmin'])->name('ArtikelAdmin');
    Route::get('/Artikel/tambah-artikel',[AdminArtikelController::class, 'ShowViewTambahArtikel'])->name('viewTambahArtikel');
    Route::post('/Artikel/tambah-artikel',[AdminArtikelController::class, 'tambahArtikel'])->name('tambahArtikel');
    Route::get('/Artikel/detail/{id}',[AdminArtikelController::class, 'detailArtikel'])->name('detailArtikel');
    Route::get('/Artikel/edit-artikel/{id}',[AdminArtikelController::class, 'ShowViewEditArtikel'])->name('ShowViewEditArtikel');
    Route::put('/Artikel/edit-artikel/{id}',[AdminArtikelController::class, 'editArtikel'])->name('editArtikel');
    Route::delete('/Artikel/delete/{id}', [AdminArtikelController::class, 'hapusArtikel'])->name('hapusArtikel');
    
    Route::get('/Pelatihan',[AdminPelatihanController::class, 'ShowViewAdmin'])->name('PelatihanAdmin');
    Route::get('/Pelatihan/Detail/{id}',[AdminPelatihanController::class, 'detailPelatihan'])->name('detailPelatihan');
    Route::get('/Pelatihan/tambah-pelatihan',[AdminPelatihanController::class, 'ShowViewTambahPelatihan'])->name('viewTambahPelatihan');
    Route::post('/Pelatihan/tambah-pelatihan',[AdminPelatihanController::class, 'tambahPelatihan'])->name('tambahPelatihan');
    Route::get('/Pelatihan/edit-pelatihan{id}',[AdminPelatihanController::class, 'ShowViewEditPelatihan'])->name('viewEditPelatihan');
    Route::put('/Pelatihan/edit-pelatihan{id}',[AdminPelatihanController::class, 'editPelatihan'])->name('editPelatihan');
    Route::put('/Pelatihan/{id}',[AdminPelatihanController::class, 'hapusPelatihan'])->name('hapusPelatihan');
    Route::get('/Pelatihan/daftarPelatihan/{id}',[AdminPelatihanController::class, 'ShowViewPendaftaran'])->name('viewPendaftaran');
    Route::put('/Pelatihan/daftarPelatihan/{id}',[AdminPelatihanController::class, 'editStatus'])->name('editStatus');

    Route::get('/Ulasan',[AdminUlasanController::class, 'ShowViewAdmin'])->name('UlasanAdmin');
    Route::delete('/Ulasan/delete/{id}',[AdminUlasanController::class, 'hapusUlasan'])->name('hapusUlasan');

    Route::get('/Profile/{id}',[AdminProfileController::class, 'ShowProfile'])->name('ShowProfile');
    Route::get('/Profile/edit/{id}',[AdminProfileController::class, 'ShowEditProfile'])->name('ShowEditProfile');
    Route::put('/Profile/edit/{id}',[AdminProfileController::class, 'editProfile'])->name('editProfile');
    Route::put('/Profile/{id}/avatar', [AdminProfileController::class, 'updateAvatar'])->name('updateAvatar');
    Route::delete('/Profile/{id}/avatar', [AdminProfileController::class, 'deleteAvatar'])->name('deleteAvatar');
});

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [AuthController::class, 'ShowLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/verify', [AuthController::class, 'ShowVerEmail'])->name('verify');
    Route::post('/verify', [AuthController::class, 'verifyEmail'])->name('verifyEmail');
    
    Route::get('/verify/otp', [AuthController::class, 'ShowOtp'])->name('OTP');
    Route::post('/verify/otp', [AuthController::class, 'cekOtp'])->name('veriOtp');
    
    Route::get('/verify/otp/create-password', [AuthController::class, 'ShowCreatePass'])->name('NewPassword');
    Route::put('/verify/otp/create-password', [AuthController::class, 'veriNewPassword'])->name('veriNewPassword');
    
    Route::get('/verify/otp/create-password/succes', [AuthController::class, 'showSuccess'])->name('suksesNewPassword');
});

Route::get('/register/succes', fn () => view('auth.succes_register'))->name('sukses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth-google-redirect', [AuthController::class, 'google_redirect']);
Route::get('/auth-google-callback', [AuthController::class, 'google_callback']);