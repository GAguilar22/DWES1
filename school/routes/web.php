<?php

use App\Http\Controllers\CicleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});
    //Grup de rutes que volia utilitzar amb l'admin, pero no sabia com fer la verificació de l'admin amb el middleware
Route::middleware(['auth', 'verified'])->group(function () {
    //He trobat per internet que utilitzant el Route::resource 
    //busca totes les vistes que té per defecte el controler, en aquest cas CicleController
    //Tot i aixi he hagut de crear una ruta nova per a borrar cicles ja que sino no funcionaba correctament
    Route::resource('admin', CicleController::class);
    Route::delete('/admin/destroy/{id}', [CicleController::class, 'destroy'])->name('admin.destroy');
});


Route::middleware('auth', 'verified')->group(function(){
    Route::get('/', [StudentController::class,'index'])->name('students.index');
    Route::get('/students/show/{id}', [StudentController::class,'show'])->name('students.show');
    Route::get('/students/create', [StudentController::class,'create'])->name('students.create');  
    Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::get('/students/destroy/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/selecCicle', [CicleController::class, 'selectCicle'])->name('cicle.select');
    Route::post('/guardarCicle', [StudentController::class, 'storeCicle'])->name('students.storeCicle');
});


require __DIR__.'/auth.php';
