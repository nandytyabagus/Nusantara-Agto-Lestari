<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $fillable = [
        'judul_pelatihan',
        'deskripsi',
        'waktu_pelaksanaan',
        'lokasi',
        'kuota',
        'kontak',
        'gambar',
    ];

    public function detailPelatihans()
    {
        return $this->hasMany(DetailPelatihan::class);
    }

}