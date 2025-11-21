<?php

namespace App\Http\Controllers;

use App\Models\Jamaah;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class StaffJamaahController extends Controller
{
    public function index()
    {
        $jamaah = Jamaah::latest()->get();
        return view('staff.jamaah.index', compact('jamaah'));
    }

    public function create(Request $request)
{
    $konsultasi = null;

    if ($request->has('konsultasi_id')) {
        $konsultasi = \App\Models\Konsultasi::find($request->konsultasi_id);
    }

    return view('staff.jamaah.create', compact('konsultasi'));
}


    public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string',
        'nik' => 'required|string|unique:jamaahs,nik',
        'jenis_kelamin' => 'required',
        'tempat_lahir' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string',
        'wa' => 'required|string',
        'kelompok' => 'nullable|string',
    ]);

    // Simpan jamaah
    $jamaah = \App\Models\Jamaah::create($validated);

    // Hapus konsultasi jika dikirimkan
    if ($request->has('konsultasi_id')) {
    \App\Models\Konsultasi::where('id', $request->konsultasi_id)->delete();
    }

    return redirect()->route('staff.jamaah.index')->with('success', 'Data jamaah berhasil disimpan!');
}

public function edit(Jamaah $jamaah)
{
    return view('staff.jamaah.edit', compact('jamaah'));
}

public function update(Request $request, Jamaah $jamaah)
{
    $validated = $request->validate([
        'nama' => 'required|string',
        'nik' => 'required|string|unique:jamaahs,nik,' . $jamaah->id,
        'jenis_kelamin' => 'required',
        'tempat_lahir' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string',
        'wa' => 'required|string',
        'kelompok' => 'nullable|string',
    ]);

    $jamaah->update($validated);

    return redirect()->route('staff.jamaah.index')->with('success', 'Data jamaah berhasil diperbarui!');
}

public function destroy(Jamaah $jamaah)
{
    $jamaah->delete();

    return redirect()->route('staff.jamaah.index')->with('success', 'Data jamaah berhasil dihapus!');
}


}
