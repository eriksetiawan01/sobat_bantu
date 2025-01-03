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
        Schema::create('jenis_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyedia_jasa_id')->constrained('penyedia_jasa')->onDelete('cascade'); // Relasi ke penyedia jasa
            $table->string('jenis_pembayaran'); // Jenis pembayaran (misal: bank, e-wallet, dll)
            $table->string('nomor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pembayaran');
    }
};
