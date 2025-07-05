<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Admin\UserController; // Import controller user

// Halaman Pilihan Utama (Login Saja)
Route::get('/', function () {
    return view('admin.landing');
})->name('landing');


// --- GRUP AUTENTIKASI ---
// Rute untuk login & logout
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login'); // Ganti nama rute
Route::post('/login', [AdminLoginController::class, 'login']);

// Logout untuk user biasa
Route::post('/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Logout untuk admin
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


// --- GRUP RUTE TERPROTEKSI ---

// Rute untuk ADMIN
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // Rute untuk kelola user oleh admin (Create, Read)
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    // Anda bisa menambahkan rute edit & delete di sini jika perlu

    // == TAMBAHKAN RUTE INI ==
    // Rute untuk kelola admin oleh admin
    Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
    Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
    // ========================
});

// Rute untuk USER
Route::middleware('auth:web')->prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});