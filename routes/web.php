<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('alat', AlatController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('peminjaman', PeminjamanController::class);
});

Route::middleware(['auth'])->group(function () {
    // User routes
    Route::prefix('user')->name('user.')->middleware('role:user')->group(function () {
        Route::get('/dashboard', fn() => view('user.dashboard'))->name('dashboard');
        Route::get('/alats', [\App\Http\Controllers\UserPeminjamanController::class, 'alats'])->name('alats');
        Route::resource('peminjaman', \App\Http\Controllers\UserPeminjamanController::class)->only(['index','create','store']);
        Route::post('peminjaman/{peminjaman}/return', [\App\Http\Controllers\UserPeminjamanController::class, 'return'])->name('peminjaman.return');
    });

    // Petugas routes
    Route::prefix('petugas')->name('petugas.')->middleware('role:petugas')->group(function () {
        Route::get('/dashboard', fn() => view('petugas.dashboard'))->name('dashboard');
        Route::get('/peminjaman', [\App\Http\Controllers\PetugasPeminjamanController::class, 'index'])->name('peminjaman.index');
        Route::post('/peminjaman/{peminjaman}/approve', [\App\Http\Controllers\PetugasPeminjamanController::class, 'approve'])->name('peminjaman.approve');
        Route::post('/peminjaman/{peminjaman}/return', [\App\Http\Controllers\PetugasPeminjamanController::class, 'markReturned'])->name('peminjaman.return');
        Route::get('/peminjaman/report', [\App\Http\Controllers\PetugasPeminjamanController::class, 'report'])->name('peminjaman.report');
    });
});

Route::get('/', fn() => view('welcome'));

Route::get('/dashboard', function () {
    $user = auth()->user();
    
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'petugas') {
        return redirect()->route('petugas.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__.'/auth.php';
