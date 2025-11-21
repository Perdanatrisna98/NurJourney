<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jamaah;

class DataJamaahController extends Controller
{
    public function index()
    {
        $dataJamaah = Jamaah::all(); // ambil data dari jamaahs
        return view('admin.jamaah.index', compact('dataJamaah'));
    }
}