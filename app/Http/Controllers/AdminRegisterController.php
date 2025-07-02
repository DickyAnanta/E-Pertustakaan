<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Penting untuk enkripsi password

class AdminRegisterController extends Controller
{
    /**
     * Menampilkan form pendaftaran admin.
     */
    public function create()
    {
        return view('admin.register');
    }

    /**
     * Menyimpan admin baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins', // 'unique:admins' memastikan email belum terdaftar di tabel admins
            'password' => 'required|string|min:8|confirmed', // 'confirmed' akan mencocokkan dengan input 'password_confirmation'
        ]);

        // 2. Buat Admin Baru
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Password akan di-hash otomatis oleh cast di Model
        ]);

        // 3. Redirect setelah berhasil
        // Anda bisa redirect ke halaman login admin atau dashboard
        return redirect('/')->with('success', 'Akun admin berhasil dibuat!');
    }
}