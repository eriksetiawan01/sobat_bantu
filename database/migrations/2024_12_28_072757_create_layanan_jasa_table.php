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
        Schema::create('layanan_jasa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyedia_jasa_id')
                ->constrained('penyedia_jasa') // Referensi ke tabel penyedia_jasa
                ->cascadeOnDelete(); // Hapus layanan jika penyedia dihapus
            $table->string('namaJasa');
            $table->text('deskripsi');
            $table->double('harga', 15, 2); // Pastikan format harga sesuai (opsional)
            $table->foreignId('kategori_id')
                ->constrained('kategori') // Referensi ke tabel kategori
                ->cascadeOnDelete(); // Hapus layanan jika kategori dihapus
            $table->string('gambar')->nullable(); // Gambar opsional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_jasa');
    }
};
