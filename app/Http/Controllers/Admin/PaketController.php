<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        return view('admin.paket.index', compact('paket'));
    }

public function show(Paket $paket)
{
    return view('admin.detail.show', compact('paket'));
}

public function userShow(Paket $paket)
{
    return view('detail', compact('paket'));
}   

    public function create()
    {
        return view('admin.paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string',
            'kategori' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload file
        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('image/paket'), $filename);

        // Simpan ke database
        Paket::create([
            'nama_paket' => $request->nama_paket,
            'kategori'   => $request->kategori,
            'harga'      => $request->harga,
            'deskripsi'  => $request->deskripsi,
            'gambar'     => 'image/paket/' . $filename, // pastikan ini ada
        ]);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit(Paket $paket)
    {
        return view('admin.paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $data = $request->validate([
            'nama_paket' => 'required|string',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload file jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image/paket'), $filename);

            $data['gambar'] = 'image/paket/' . $filename;
        }

        $paket->update($data);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui!');
    }

    public function destroy(Paket $paket)
    {
        // Hapus gambar lama jika ada
        if ($paket->gambar && file_exists(public_path($paket->gambar))) {
            unlink(public_path($paket->gambar));
        }

        $paket->delete();
        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil dihapus.');
    }
}
