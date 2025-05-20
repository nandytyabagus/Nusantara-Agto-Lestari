<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $fillable = [
        'isi',
        'user_id',
        'tipe_ulasan_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function tipe_ulasan()
    {
        return $this->belongsTo(TipeUlasan::class);
    }
}