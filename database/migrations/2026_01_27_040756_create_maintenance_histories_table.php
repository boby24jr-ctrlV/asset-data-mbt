<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maintenance_histories', function (Blueprint $table) {
    $table->id();

    $table->foreignId('item_id')
          ->constrained('items')
          ->cascadeOnDelete();

    $table->string('jenis_maintenance');

    $table->foreignId('technician_id')
          ->nullable()
          ->constrained('users')
          ->nullOnDelete();

    $table->date('tanggal_service');
    $table->integer('biaya')->nullable();
    $table->text('catatan')->nullable();
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('maintenance_histories');
    }
};
