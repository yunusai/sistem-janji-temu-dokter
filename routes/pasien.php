<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pasien\JanjiPeriksaController;
use App\Http\Controllers\Pasien\RiwayatPeriksaController;

Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function () {
    Route::get('/dashboard', function () {
        return view('pasien.dashboard');
    })->name('pasien.dashboard');

    Route::prefix('janji-periksa')->group(function () {
        Route::get('/', [JanjiPeriksaController::class, 'index'])->name('pasien.janji-periksa.index');
        Route::get('/create', [JanjiPeriksaController::class, 'create'])->name('pasien.janji-periksa.create');
        Route::post('/', [JanjiPeriksaController::class, 'store'])->name('pasien.janji-periksa.store');
        Route::get('/{id}/edit', [JanjiPeriksaController::class, 'edit'])->name('pasien.janji-periksa.edit');
        Route::patch('/{id}', [JanjiPeriksaController::class, 'update'])->name('pasien.janji-periksa.update');
        Route::delete('/{id}', [JanjiPeriksaController::class, 'destroy'])->name('pasien.janji-periksa.destroy');
    });
    Route::prefix('riwayat-periksa')->group(function () {
        Route::get('/', [RiwayatPeriksaController::class, 'index'])->name('pasien.riwayat-periksa.index');
        Route::get('/{id}/detail', [RiwayatPeriksaController::class, 'detail'])->name('pasien.riwayat-periksa.detail');
        Route::get('/{id}/riwayat', [RiwayatPeriksaController::class, 'riwayat'])->name('pasien.riwayat-periksa.riwayat');
    });
});
