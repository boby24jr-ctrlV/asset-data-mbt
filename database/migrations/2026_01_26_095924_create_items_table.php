<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->string('kategori');
            $table->string('merk')->nullable();
            $table->year('tahun_pengadaan')->nullable();
            $table->integer('harga_barang')->nullable();
            $table->string('lokasi');
            $table->enum('kondisi', ['baik', 'rusak', 'maintenance'])->default('baik');
            $table->enum('status_pemakaian', ['aktif','nonaktif'])->default('aktif');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
