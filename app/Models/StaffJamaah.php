<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffJamaah extends Model
{
    use HasFactory;

    protected $table = 'jamaahs'; // nama tabel sesuai database
    protected $fillable = [
        'nama',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'wa',
        'kelompok',
    ];
}
