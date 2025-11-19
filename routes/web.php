<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\StaffController as AdminStaffController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\StaffController;
use App\Models\Paket;

use App\Http\Controllers\Staff\KonsultasiController;
use App\Http\Controllers\Staff\PendaftaranController;
use App\Http\Controllers\Staff\DataJamaahController;
use App\Http\Controllers\Staff\BuktiPembayaranController;

// ==========================
// 🏠 Halaman Umum
// ==========================
Route::get('/', fn() => view('welcome'));

Route::get('/haji', function () {
    $paket = Paket::where('kategori', 'haji')->get();
    return view('haji.index', compact('paket'));
});

Route::get('/umroh', function () {
    $paket = Paket::where('kategori', 'umroh')->get();
    return view('umroh.index', compact('paket'));
});

Route::get('/wisataHalal', function () {
    $paket = Paket::where('kategori', 'wisata')->get();
    return view('wisataHalal.index', compact('paket'));
});

Route::get('/konsultasi', fn() => view('konsultasi.index'));

// Detail paket (dinamis)
Route::get('/admin/detail', [App\Http\Controllers\Admin\PaketController::class, 'show'])
    ->name('admin.detail.index');

Route::get('/detail/{paket}', [PaketController::class, 'show'])
    ->name('detail.show');


// ==========================
// 🔐 Auth Protected Routes
// ==========================
Route::middleware(['auth', 'verified'])->group(function () {

    // --------------------------
    // ADMIN
    // --------------------------
    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

            Route::resource('konsultasi', KonsultasiController::class);
            Route::resource('pendaftaran', PendaftaranController::class);
            Route::resource('data-jamaah', DataJamaahController::class);
            Route::resource('bukti-pembayaran', BuktiPembayaranController::class);

            Route::resource('staff', AdminStaffController::class);
            Route::resource('paket', PaketController::class);

             // Detail paket admin (show)
            Route::get('/paket/{paket}/detail', [PaketController::class, 'show'])
                ->name('paket.show');
        });

    // --------------------------
    // STAFF
    // --------------------------
    Route::middleware('role:staff')
        ->prefix('staff')
        ->name('staff.')
        ->group(function () {
            Route::get('/dashboard', [StaffController::class, 'index'])->name('dashboard');

            Route::get('/konsultasi', function () {
                return view('staff.konsultasi.index'); 
            })->name('konsultasi.index');

            Route::get('/staff/pendaftaran', function () {
                return view('staff.pendaftaran.index'); 
            })->name('pendaftaran.index');

            Route::get('/staff/data-jamaah', function () {
                return view('staff.data-jamaah.index'); 
            })->name('data-jamaah.index');

            Route::get('/staff/bukti-pembayaran', function () {
                return view('staff.bukti-pembayaran.index'); 
            })->name('bukti-pembayaran.index');
        });

    // --------------------------
    // PROFILE
    // --------------------------
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==========================
// 🔄 Fallback Dashboard
// ==========================
Route::get('/dashboard', function () {
    return redirect()->route(auth()->user()->role . '.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
