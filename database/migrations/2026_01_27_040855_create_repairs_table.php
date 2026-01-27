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
    Schema::create('repairs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
    $table->date('tanggal_rusak');
    $table->text('deskripsi_kerusakan');
    $table->string('teknisi');
    $table->integer('biaya');
    $table->enum('status', ['proses', 'selesai']);
    $table->date('tanggal_selesai')->nullable();
    $table->text('catatan')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};
