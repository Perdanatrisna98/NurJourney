<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;

class KonsultasiController extends Controller
{
    public function create()
    {
        return view('konsultasi.index'); // resources/views/konsultasi/index.blade.php
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'panggilan' => 'required|string',
            'nama' => 'required|string',
            'wa' => 'required|string',
            'pesan' => 'nullable|string',
        ]);

        // Konsultasi baru akan otomatis status 'belum'
        Konsultasi::create($validated);

        return redirect()->back()->with('success', 'Konsultasi berhasil dikirim!');
    }

}
