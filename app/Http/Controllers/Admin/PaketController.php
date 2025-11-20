<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Detail;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        return view('admin.paket.index', compact('paket'));
    }

    public function detailIndex()
    {
        $details = Detail::all();  
        $pakets = Paket::all();    

        return view('admin.detail.index', compact('details', 'pakets'));
    }


    public function show(Paket $paket)
    {
        return view('admin.paket.show', compact('paket'));
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
            'fasilitas' => 'nullable|string',  
            'jadwal' => 'nullable|string',     
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('image/paket'), $filename);

        Paket::create([
            'nama_paket' => $request->nama_paket,
            'kategori'   => $request->kategori,
            'harga'      => $request->harga,
            'deskripsi'  => $request->deskripsi,
            'fasilitas'  => $request->fasilitas,  
            'jadwal'     => $request->jadwal,     
            'gambar'     => 'image/paket/' . $filename,
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
            'kategori' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'fasilitas' => 'nullable|string',  
            'jadwal' => 'nullable|string',     
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {

            if ($paket->gambar && file_exists(public_path($paket->gambar))) {
                unlink(public_path($paket->gambar));
            }

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
        if ($paket->gambar && file_exists(public_path($paket->gambar))) {
            unlink(public_path($paket->gambar));
        }

        $paket->delete();

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil dihapus.');
    }

    // Detail

    public function detailCreate(Paket $paket)
    {
        return view('admin.detail.create', compact('paket'));
    }

    public function detailStore(Request $request, Paket $paket)
    {
        $request->validate([
            'deskripsi' => 'nullable|string',
            'fasilitas' => 'nullable|string',
            'jadwal' => 'nullable|string',
        ]);

        Detail::create([
            'paket_id'  => $paket->id,
            'deskripsi' => $request->deskripsi,
            'fasilitas' => $request->fasilitas,
            'jadwal'    => $request->jadwal,
        ]);

        return redirect()->route('admin.paket.index')->with('success', 'Detail paket ditambahkan!');
    }

    public function detailEdit(Detail $detail)
    {
        $pakets = Paket::all();
        return view('admin.detail.edit', compact('detail', 'pakets'));
    }

    public function detailUpdate(Request $request, Detail $detail)
    {
        $detail->update($request->only(['deskripsi', 'fasilitas', 'jadwal']));

        return back()->with('success', 'Detail paket diperbarui!');
    }

    public function detailDestroy(Detail $detail)
    {
        $detail->delete();
        return back()->with('success', 'Detail berhasil dihapus');
    }

}