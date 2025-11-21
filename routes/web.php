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
use App\Http\Controllers\Staff\StaffKonsultasiController;
use App\Http\Controllers\Staff\PendaftaranController;
use App\Http\Controllers\Staff\DataJamaahController;
use App\Http\Controllers\Staff\BuktiPembayaranController;
use App\Http\Controllers\UserKonsultasiController;
use App\Http\Controllers\StaffJamaahController;

Route::get('/konsultasi', [UserKonsultasiController::class, 'create'])
    ->name('konsultasi.index');

Route::post('/konsultasi', [UserKonsultasiController::class, 'store'])
    ->name('konsultasi.store');

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
            Route::resource('data-jamaah', \App\Http\Controllers\Admin\DataJamaahController::class);
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

                Route::get('/data-jamaah', [\App\Http\Controllers\Admin\DataJamaahController::class, 'index'])
                    ->name('data-jamaah.index');

                Route::get('bukti-pembayaran', [BuktiPembayaranController::class, 'index'])
                    ->name('bukti-pembayaran.index');
            });
        });

    // Staff
    Route::middleware('role:staff')
    ->prefix('staff')
    ->name('staff.') // semua route di bawah akan otomatis diawali 'staff.'
    ->group(function () {

        Route::get('/dashboard', [StaffController::class, 'index'])
            ->name('dashboard');

        // route konsultasi
        Route::get('/konsultasi', [StaffKonsultasiController::class, 'index'])
            ->name('konsultasi.index'); // jadinya 'staff.konsultasi.index'

        Route::put('/konsultasi/{konsultasi}/status', [StaffKonsultasiController::class, 'updateStatus'])
            ->name('konsultasi.status');

        // form jamaah
        Route::get('/jamaah', [App\Http\Controllers\StaffJamaahController::class, 'index'])
        ->name('jamaah.index');

        Route::get('/jamaah/create', [App\Http\Controllers\StaffJamaahController::class, 'create'])
            ->name('jamaah.create');

        Route::post('/jamaah/store', [App\Http\Controllers\StaffJamaahController::class, 'store'])
            ->name('jamaah.store');

        // halaman data-jamaah, bukti pembayaran
        // Data Jamaah
        Route::get('/data-jamaah', [StaffJamaahController::class, 'index'])
            ->name('data-jamaah.index');
        
        Route::get('/staff/jamaah/{jamaah}/edit', [StaffJamaahController::class, 'edit'])
            ->name('jamaah.edit');

        Route::put('/staff/jamaah/{jamaah}', [StaffJamaahController::class, 'update'])
            ->name('jamaah.update');

        Route::delete('/staff/jamaah/{jamaah}', [StaffJamaahController::class, 'destroy'])
            ->name('jamaah.destroy');

        // Bukti Pembayaran
        Route::get('bukti-pembayaran', [BuktiPembayaranController::class, 'index'])
            ->name('bukti-pembayaran.index');

        Route::get('bukti-pembayaran/create', [BuktiPembayaranController::class, 'create'])
            ->name('bukti-pembayaran.create');

        Route::post('bukti-pembayaran', [BuktiPembayaranController::class, 'store'])
            ->name('bukti-pembayaran.store');

        Route::get('bukti-pembayaran/{bukti}/edit', [BuktiPembayaranController::class, 'edit'])
            ->name('bukti-pembayaran.edit');

        Route::put('bukti-pembayaran/{bukti}', [BuktiPembayaranController::class, 'update'])
            ->name('bukti-pembayaran.update');

        Route::delete('bukti-pembayaran/{bukti}', [BuktiPembayaranController::class, 'destroy'])
            ->name('bukti-pembayaran.destroy');
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
