<?php

namespace App\Http\Controllers;

use App\Models\Buku; // Pastikan namespace dan nama class model sudah benar
use Illuminate\Http\Request; // Gunakan Request standar jika belum membuat Form Request khusus

class BukuController extends Controller
{
    /**
     * Menampilkan daftar semua buku. (Read)
     */
    public function index()
    {
        // Mengambil semua data buku, diurutkan dari yang terbaru, dan dibagi per halaman (10 item per halaman)
        $buku = Buku::latest()->paginate(10);
        // Mengirim data ke view 'buku.index'
        return view('buku.index', compact('buku'));
    }

    /**
     * Menampilkan form untuk membuat buku baru. (Create)
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Menyimpan data buku baru ke database. (Create)
     */
    public function store(Request $request) // Menggunakan Illuminate\Http\Request
    {
        // Validasi input dari form
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1900|max:'.(date('Y')),
            'stok' => 'required|integer|min:0',
            'kategori' => 'required|string|max:100',
        ]);

        // Membuat record baru di tabel 'buku'
        Buku::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('buku.index')
                         ->with('success', 'Buku baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu buku. (Read)
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Menampilkan form untuk mengedit data buku. (Update)
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Memperbarui data buku di database. (Update)
     */
    public function update(Request $request, Buku $buku) // Menggunakan Illuminate\Http\Request
    {
        // Validasi input dari form
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1900|max:'.(date('Y')),
            'stok' => 'required|integer|min:0',
            'kategori' => 'required|string|max:100',
        ]);

        // Memperbarui record buku yang ada
        $buku->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('buku.index')
                         ->with('success', 'Data buku berhasil diperbarui.');
    }

    /**
     * Menghapus data buku dari database. (Delete)
     */
    public function destroy(Buku $buku)
    {
        // Menghapus record buku
        $buku->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('buku.index')
                         ->with('success', 'Buku berhasil dihapus.');
    }
}