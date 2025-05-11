<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPelatihan extends Model
{
    protected $fillable = [
        'user_id',
        'pelatihan_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class);
    }
}