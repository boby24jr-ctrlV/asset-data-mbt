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
        Schema::create('laporans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
    // siswa yang melapor

    $table->foreignId('item_id')->constrained('items')->onDelete('cascade'); 
    // barang yang dilaporkan

    $table->text('deskripsi_laporan'); 
    // isi keluhan / masalah

    $table->enum('jenis_laporan', ['maintenance', 'perbaikan']); 
    // jenis laporan: butuh maintenance atau perbaikan

    $table->enum('status', ['menunggu', 'diproses', 'selesai'])->default('menunggu'); 
    // status laporan

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
