<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dokter\ObatController;
use App\Http\Controllers\Dokter\JadwalPeriksaController;

Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dokter.dashboard');

    Route::prefix('obat')->group(function () {
        Route::get('/', [ObatController::class, 'index'])->name('dokter.obat.index');
        Route::get('/create', [ObatController::class, 'create'])->name('dokter.obat.create');
        Route::get('/restore', [ObatController::class, 'restore'])->name('dokter.obat.restore');
        Route::post('/undelete/{id}', [ObatController::class, 'undelete'])->name('dokter.obat.undelete');
        Route::post('/', [ObatController::class, 'store'])->name('dokter.obat.store');
        Route::get('/{id}/edit', [ObatController::class, 'edit'])->name('dokter.obat.edit');
        Route::patch('/{id}', [ObatController::class, 'update'])->name('dokter.obat.update');
        Route::delete('/{id}', [ObatController::class, 'destroy'])->name('dokter.obat.destroy');
    });

    Route::prefix('jadwal-periksa')->group(function () {
        Route::get('/', [JadwalPeriksaController::class, 'index'])->name('dokter.jadwal-periksa.index');
        Route::get('/create', [JadwalPeriksaController::class, 'create'])->name('dokter.jadwal-periksa.create');
        Route::post('/', [JadwalPeriksaController::class, 'store'])->name('dokter.jadwal-periksa.store');
        Route::get('/{id}/edit', [JadwalPeriksaController::class, 'edit'])->name('dokter.jadwal-periksa.edit');
        Route::patch('/{id}', [JadwalPeriksaController::class, 'update'])->name('dokter.jadwal-periksa.update');
        Route::delete('/{id}', [JadwalPeriksaController::class, 'destroy'])->name('dokter.jadwal-periksa.destroy');
    });

    Route::prefix('memeriksa')->group(function () {
        Route::get('/', [App\Http\Controllers\Dokter\PeriksaController::class, 'index'])->name('dokter.memeriksa.index');
        Route::get('/edit/{id}', [App\Http\Controllers\Dokter\PeriksaController::class, 'edit'])->name('dokter.memeriksa.edit');
        Route::get('/periksa/{id}', [App\Http\Controllers\Dokter\PeriksaController::class, 'periksa'])->name('dokter.memeriksa.periksa');
        Route::post('/', [App\Http\Controllers\Dokter\PeriksaController::class, 'store'])->name('dokter.memeriksa.store');
        Route::patch('/{id}', [App\Http\Controllers\Dokter\PeriksaController::class, 'update'])->name('dokter.memeriksa.update');
    });
});
