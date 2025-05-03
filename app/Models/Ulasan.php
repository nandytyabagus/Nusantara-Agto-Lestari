<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $fillable = [
        'isi',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}