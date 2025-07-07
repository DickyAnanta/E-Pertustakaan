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
            // Pastikan nama tabel di sini sesuai dengan yang Anda inginkan,
            // dalam kasus ini 'buku'
            Schema::create('buku', function (Blueprint $table) { // <-- Pastikan ini 'buku'
                $table->id(); // Kolom ID auto-increment primary key
                $table->string('judul');
                $table->string('pengarang');
                $table->integer('tahun_terbit');
                $table->integer('stok');
                $table->string('kategori');
                // Ini adalah cara yang benar untuk menambahkan created_at dan updated_at
                $table->timestamps(); // <-- Pastikan hanya ada satu baris ini untuk timestamps
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('buku'); // <-- Pastikan ini 'buku'
        }
    };
