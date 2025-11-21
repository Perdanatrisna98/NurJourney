<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;

class UserKonsultasiController extends Controller
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

        $validated['status'] = 'belum';

        Konsultasi::create($validated);

        return redirect()->back()->with('success', 'Konsultasi berhasil dikirim!');
    }
}
