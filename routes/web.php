<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [BukuController::class, 'index'])->name('home');
Route::resource('buku', BukuController::class);