<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin; // Gunakan model Admin
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /** Menampilkan halaman daftar admin */
    public function index()
    {
        $admins = Admin::latest()->get();
        return view('admin.admins.index', compact('admins'));
    }

    /** Menampilkan form untuk membuat admin baru */
    public function create()
    {
        return view('admin.admins.create');
    }

    /** Menyimpan admin baru ke database */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins', // Cek ke tabel admins
            'password' => 'required|string|min:8',
        ]);

        // Buat admin
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Password akan di-hash otomatis oleh Model
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin baru berhasil ditambahkan.');
    }
}
