<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konsultasi;

class StaffKonsultasiController extends Controller
{
    public function index()
    {
        $konsultasis = Konsultasi::latest()->get();
        return view('staff.konsultasi.index', compact('konsultasis'));
    }

    public function updateStatus(Request $request, Konsultasi $konsultasi)
{
    $request->validate([
        'status' => 'required|in:belum,sudah,order',
    ]);

    $konsultasi->status = $request->status;
    $konsultasi->save();

    // Jika status = order → redirect ke form jamaah
    if ($request->status == 'order') {
        return redirect()->route('staff.jamaah.create', [
            'konsultasi_id' => $konsultasi->id
        ]);
    }

    return back()->with('success', 'Status konsultasi diperbarui!');
}

}
