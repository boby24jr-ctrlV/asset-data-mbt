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
       Schema::create('notifikasis', function (Blueprint $table) {
    $table->id();

    // user yang menerima notifikasi
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

    $table->string('title'); // judul notifikasi
    $table->text('message'); // isi pesan notifikasi

    // jenis notifikasi
    $table->enum('type', ['maintenance', 'repair']);

    // status dibaca atau belum
    $table->boolean('is_read')->default(false); // 0 = belum dibaca, 1 = sudah dibaca

    $table->timestamps(); // created_at & updated_at
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasis');
    }
};
