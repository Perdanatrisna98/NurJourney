<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'paket_id',
        'deskripsi',
        'fasilitas',
        'jadwal',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
