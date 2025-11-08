<?php

use App\Http\Controllers\CatalegController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route:: get('/', HomeController::class);

Route::get('/catalog', [CatalegController::class,'index'])->name('catalog.index');

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::get('/logout', function () {
    return "Logout usuari";
});

Route::get('/catalog/index', [CatalegController::class, 'index'])->name('catalog.index');
Route::post('catalog/store',[CatalegController::class, 'store'])->name('catalog.store');
Route::get('/catalog/show/{id}', [CatalegController::class, 'show'])->name('catalog.show');
Route::get('/catalog/create', [CatalegController::class, 'create'])->name('catalog.create');
Route::get('/catalog/edit/{id}', [CatalegController::class,'edit'])->name('catalog.edit');
Route::put('/catalog/update/{id}', [CatalegController::class,'update'])->name('catalog.update');
Route::get('/catalog/destroy/{id}', [CatalegController::class, 'destroy'])->name('catalog.destroy');





