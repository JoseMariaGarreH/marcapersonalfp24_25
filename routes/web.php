<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getHome']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

<<<<<<< HEAD
include __DIR__.'/docentes.php';
=======
>>>>>>> 3d5176acefd434a0e5fb4c8373ef3fc19b37cb10
include __DIR__.'/actividades.php';
include __DIR__.'/ciclos.php';
include __DIR__.'/curriculos.php';
include __DIR__.'/familias_profesionales.php';
include __DIR__.'/proyectos.php';
include __DIR__.'/reconocimientos.php';
include __DIR__.'/users.php';
<<<<<<< HEAD
=======

>>>>>>> 3d5176acefd434a0e5fb4c8373ef3fc19b37cb10
require __DIR__.'/auth.php';
