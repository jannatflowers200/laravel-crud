<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[TaskController::class,'frontend'])->name('home');
Route::get('/tasks',[TaskController::class,'index'])->name('tasks.index');

Route::get('/tasks/create',[TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks/store',[TaskController::class, 'store'])->name('tasks.store');

Route::delete('/tasks/delete/{task}',[TaskController::class, 'destroy'])->name('tasks.delete');
Route::get('/tasks/edit/{task}',[TaskController::class, 'edit'])->name('tasks.edit');
// Route::put('/tasks/update/{task}',[TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}',[TaskController::class, 'update'])->name('tasks.update');


