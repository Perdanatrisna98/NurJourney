<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Paket;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function edit($id)
    {
        $detail = Detail::findOrFail($id);
        $paket = Paket::all();
        return view('admin.detail.edit', compact('detail', 'pakets'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'paket_id' => 'required',
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
    ]);

    $detail = Detail::findOrFail($id);

    $detail->update([
        'paket_id' => $request->paket_id,
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('admin.detail.index')
        ->with('success', 'Detail berhasil diperbarui');
}

}
