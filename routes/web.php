<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::resource('users', UserController::class);


Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('index');
Route::get('/add', [App\Http\Controllers\UserController::class, 'add'])->name('add');
Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('store');
Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');