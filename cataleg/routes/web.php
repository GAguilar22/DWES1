<?php

use App\Http\Controllers\CatalegController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CatalegMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route:: get('/', HomeController::class);

//Route::get('/catalog', [CatalegController::class,'index'])->name('catalog.index');

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::get('/logout', function () {
    return "Logout usuari";
});

/*
Route::get('/catalog/index', [CatalegController::class, 'index'])->name('catalog.index');
Route::post('catalog/store',[CatalegController::class, 'store'])->name('catalog.store');
Route::get('/catalog/show/{id}', [CatalegController::class, 'show'])->name('catalog.show');
Route::get('/catalog/create', [CatalegController::class, 'create'])->name('catalog.create');
Route::get('/catalog/edit/{id}', [CatalegController::class,'edit'])->name('catalog.edit');
Route::put('/catalog/update/{id}', [CatalegController::class,'update'])->name('catalog.update');
Route::get('/catalog/destroy/{id}', [CatalegController::class, 'destroy'])->name('catalog.destroy');
*/



Route::get('/dashboard', function () {
    return redirect()->route('catalog.index');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('catalog')->middleware(['auth', 'verified'])->group(function () {
    Route::get('index', [CatalegController::class,'index'])->name('catalog.index');
    Route::post('store',[CatalegController::class, 'store'])->name('catalog.store');
    Route::get('show/{id}', [CatalegController::class, 'show'])->name('catalog.show');
    Route::get('create', [CatalegController::class, 'create'])->name('catalog.create');
    Route::get('edit/{id}', [CatalegController::class,'edit'])->name('catalog.edit');
    Route::put('update/{id}', [CatalegController::class,'update'])->name('catalog.update');
    Route::get('destroy/{id}', [CatalegController::class, 'destroy'])->name('catalog.destroy');
});
/* Necessitem sempre tenir el require  per a poder tenir rutes que
    s'utilitzen per si l'usuari perd la contrasenya o coses aixi
*/

require __DIR__.'/auth.php';
