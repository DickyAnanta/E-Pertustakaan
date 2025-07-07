<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;

// Halaman Pilihan Utama (Login Saja)
// Halaman utama mengarah ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// --- GRUP AUTENTIKASI ---
// Rute untuk login & logout
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login'); // Ganti nama rute
Route::post('/login', [AdminLoginController::class, 'login']);

// Logout untuk user biasa
Route::post('/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Logout untuk admin
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


// --- GRUP RUTE TERPROTEKSI ---

// Rute untuk ADMIN
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // Resource route untuk semua fungsi CRUD User & Admin
    Route::resource('users', UserController::class);
    Route::resource('admins', AdminController::class);
});

// Rute untuk USER
Route::middleware('auth:web')->prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});