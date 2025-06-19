<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';
require __DIR__ . '/pasien.php';
require __DIR__ . '/dokter.php';

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/poli', [ProfileController::class, 'update_poli'])->name('profile.update_poli');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
