<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\StaffController as AdminStaffController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\StaffController;
use App\Models\Paket;
use App\Models\Detail;


use App\Http\Controllers\Staff\KonsultasiController;
use App\Http\Controllers\Staff\PendaftaranController;
use App\Http\Controllers\Staff\DataJamaahController;
use App\Http\Controllers\Staff\BuktiPembayaranController;


// Halaman utama
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


// Detail paket user
Route::get('/detail/{paket}', [PaketController::class, 'userShow'])
->name('detail.show');


// Crud buat detail
Route::prefix('detail')->name('detail.')->group(function () {

    Route::get('/', [PaketController::class, 'detailIndex'])
        ->name('index');

    Route::get('/create', [PaketController::class, 'detailCreate'])
        ->name('create');

    Route::post('/store', [PaketController::class, 'detailStore'])
        ->name('store');

    Route::get('/{detail}', [PaketController::class, 'detailShow'])
        ->name('show');

    Route::put('/{detail}', [PaketController::class, 'detailUpdate'])
        ->name('update');

    Route::delete('/{detail}', [PaketController::class, 'detailDestroy'])
        ->name('destroy');
});



// ==========================
// 🔐 Auth Protected Routes
// ==========================
Route::middleware(['auth', 'verified'])->group(function () {

    // Admin
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

            // Crud paket
            Route::prefix('detail')->name('detail.')->group(function () {

                Route::get('/create/{paket}', [PaketController::class, 'detailCreate'])
                    ->name('create');

                Route::post('/store/{paket}', [PaketController::class, 'detailStore'])
                    ->name('store');

                Route::get('/{detail}/edit', [PaketController::class, 'detailEdit'])
                    ->name('edit');

                Route::put('/{detail}', [PaketController::class, 'detailUpdate'])
                    ->name('update');

                Route::delete('/{detail}', [PaketController::class, 'detailDestroy'])
                    ->name('destroy');

            });
        });

    // Staff
    Route::middleware('role:staff')
        ->prefix('staff')
        ->name('staff.')
        ->group(function () {

            Route::get('/dashboard', [StaffController::class, 'index'])->name('dashboard');

            Route::get('/konsultasi', fn() => view('staff.konsultasi.index'))
                ->name('konsultasi.index');

            Route::get('/staff/pendaftaran', fn() => view('staff.pendaftaran.index'))
                ->name('pendaftaran.index');

            Route::get('/staff/data-jamaah', fn() => view('staff.data-jamaah.index'))
                ->name('data-jamaah.index');

            Route::get('/staff/bukti-pembayaran', fn() => view('staff.bukti-pembayaran.index'))
                ->name('bukti-pembayaran.index');
        });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Redirect dashboard
Route::get('/dashboard', function () {
    return redirect()->route(auth()->user()->role . '.dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


require __DIR__ . '/auth.php';
