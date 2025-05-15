<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $fillable = [
        'judul_pelatihan',
        'deskripsi',
        'waktu_pelaksanaan',
        'batas_pendaftaran',
        'lokasi',
        'kuota',
        'kontak',
        'gambar',
    ];

    public function detailPelatihans()
    {
        return $this->hasMany(DetailPelatihan::class,'pelatihan_id');
    }

}