<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::post('/{id}', [UserController::class, 'update'])->name('update');
Route::post('/', [UserController::class, 'store'])->name('store');
Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
