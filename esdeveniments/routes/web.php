<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EsdevenimentController;
use App\Http\Middleware\Admin;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     Route::get('/esdeveniments', [EsdevenimentController::class, 'index'])->name('esdeveniments.index');
    Route::get('/esdeveniments/{id}', [EsdevenimentController::class, 'show'])->name('esdeveniments.show');
    Route::get('/esdeveniments/{id}/reservar', [EsdevenimentController::class, 'reservar'])->name('esdeveniments.reservar');
    Route::post('/esdeveniments/{id}/cancelar', [EsdevenimentController::class, 'cancelarReserva'])->name('esdeveniments.cancelar');    
});




Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/categories/create', [CategoriaController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoriaController::class, 'store'])->name('categories.store');
    Route::put('/categories/{id}', [CategoriaController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoriaController::class, 'destroy'])->name('categories.destroy');
    Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

require __DIR__.'/auth.php';
