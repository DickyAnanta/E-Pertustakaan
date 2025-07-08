<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model // Nama class diubah menjadi "Buku"
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model.
     * Sesuaikan jika nama tabel Anda bukan 'bukus'.
     * Jika tabel Anda bernama 'buku' (sesuai create_buku_table.php), baris ini bisa dihapus
     * atau diubah menjadi: protected $table = 'buku';
     */
    protected $table = 'buku'; // Diubah sesuai file migrasi Anda

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     * Ini penting untuk keamanan dan fungsi create/update.
     */
    protected $fillable = [
        'judul',
        'pengarang',
        'tahun_terbit',
        'stok',
        'kategori',
    ];
}