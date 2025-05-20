<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeUlasan extends Model
{
    protected $fillable = [
        'tipe_ulasans',
    ];

        public function ulasans()
    {
        return $this->hasMany(Ulasan::class);
    }
}