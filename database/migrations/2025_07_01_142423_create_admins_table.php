<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // Kolom ID (Primary Key, Auto-Increment)
            $table->string('name'); // Kolom untuk nama admin
            $table->string('email')->unique(); // Kolom email, harus unik
            $table->timestamp('email_verified_at')->nullable(); // Untuk verifikasi email (opsional)
            $table->string('password'); // Kolom untuk menyimpan password (terenkripsi)
            $table->rememberToken(); // Kolom "remember me" untuk login
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};