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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('layanan_jasa_id')->constrained('layanan_jasa')->onDelete('cascade');
            $table->foreignId('penyedia_jasa_id')->nullable()->constrained('penyedia_jasa')->onDelete('set null'); // Penyedia Jasa (nullable)
            $table->string('nama_lengkap'); // Nama lengkap pengguna
            $table->string('alamat'); // Alamat pengguna
            $table->string('no_telepon'); // No telepon pengguna
            $table->date('waktu_pemesanan'); // Waktu pemesanan (tanggal)
            $table->time('jam_pemesanan'); // Waktu pemesanan (jam)
            $table->text('detail_pekerjaan'); // Detail pekerjaan
            $table->double('harga'); // Harga layanan
            $table->enum('status_pembayaran', ['Belum dibayar', 'Sudah dibayar'])->default('Belum dibayar');
            $table->enum('status_pesanan', ['Belum diproses', 'Sedang diproses', 'Selesai'])->default('Belum diproses');
            $table->text('ulasan')->nullable(); // Ulasan pesanan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
