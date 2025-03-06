<?php

use App\Http\Controllers\DiscoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::resource('discos', DiscoController::class)
    ->middleware('auth');

Route::get("lang/{language}", LanguageController::class)->name('language');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/novedades', [DiscoController::class, 'novedades'])->name('novedades');
Route::put('/discos/{disco}', [DiscoController::class, 'update'])->name('discos.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
