<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi lewat mass assignment
    protected $fillable = [
        'panggilan',
        'nama',
        'wa',
        'pesan',
        'status',
    ];
}
