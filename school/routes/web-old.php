<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;


Route::get('/', [StudentController::class,'index'])->name('students.index');

Route::get('/students/show/{id}', [StudentController::class,'show'])->name('students.show');

Route::get('/students/create', [StudentController::class,'create'])->name('students.create');

Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');

Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');

Route::put('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');

Route::get('/students/destroy/{id}', [StudentController::class, 'destroy'])->name('students.destroy');