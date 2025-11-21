<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BuktiPembayaran;
use App\Models\Jamaah;

class BuktiPembayaranController extends Controller
{
    public function index()
    {
        $bukti = BuktiPembayaran::with('jamaah')->latest()->get();
        return view('staff.bukti-pembayaran.index', compact('bukti'));
    }

    public function create()
    {
        $jamaah = Jamaah::all();
        return view('staff.bukti-pembayaran.create', compact('jamaah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jamaah_id' => 'required|exists:jamaahs,id',
            'file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fileName = time().'_'.$request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('image/bukti'), $fileName);

        BuktiPembayaran::create([
            'jamaah_id' => $request->jamaah_id,
            'file' => $fileName,
            'status' => 'pending'
        ]);

        return redirect()->route('staff.bukti-pembayaran.index')->with('success', 'Bukti pembayaran berhasil disimpan!');
    }

public function edit(BuktiPembayaran $bukti)
{
    $jamaah = Jamaah::all(); // kalau mau pilih jamaah
    return view('staff.bukti-pembayaran.edit', compact('bukti','jamaah'));
}


public function update(Request $request, BuktiPembayaran $bukti)
{
    $request->validate([
        'jamaah_id' => 'required|exists:jamaahs,id',
        'file' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'status' => 'required|in:pending,valid'
    ]);

    if($request->hasFile('file')){
        $fileName = time().'_'.$request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('image/bukti'), $fileName);
        $bukti->file = $fileName;
    }

    $bukti->jamaah_id = $request->jamaah_id;
    $bukti->status = $request->status;
    $bukti->save();

    return redirect()->route('staff.bukti-pembayaran.index')->with('success', 'Bukti pembayaran berhasil diupdate!');
}

public function destroy(BuktiPembayaran $bukti)
{
    $file_path = public_path('image/bukti/' . $bukti->file);

    if(file_exists($file_path) && is_file($file_path)) {
        unlink($file_path);
    }

    $bukti->delete();

    return redirect()->route('staff.bukti-pembayaran.index')->with('success', 'Bukti pembayaran berhasil dihapus.');
}


}
