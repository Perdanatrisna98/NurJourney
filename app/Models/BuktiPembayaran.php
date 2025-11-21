<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    // Tambahkan fillable agar mass assignment diperbolehkan
    protected $fillable = [
        'jamaah_id',
        'file',
        'status'
    ];

    // Relasi ke jamaah
    public function jamaah()
    {
        return $this->belongsTo(Jamaah::class);
    }
}
