<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\subirController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/subir', [subirController::class, 'guardar'])->name('subir');

Route::get('/subir', function () {
    return view('subir'); // Vista para subir imágenes
})->name('subir.imagenes');

Route::post('/guardar', [SubirController::class, 'guardar'])->name('guardar.imagenes');
Route::get('/mostrar', [SubirController::class, 'mostrar'])->name('mostrar.imagenes');
Route::get('/carrusel', [SubirController::class, 'carrusel'])->name('carrusel');
Route::get('/flores', [SubirController::class, 'flores'])->name('flores');

require __DIR__.'/auth.php';
