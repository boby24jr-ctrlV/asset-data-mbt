<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repairs', function (Blueprint $table) {
    $table->id();

    $table->foreignId('maintenance_schedule_id')
          ->constrained('maintenance_schedules')
          ->cascadeOnDelete();

    $table->foreignId('user_id')
          ->constrained('users')
          ->cascadeOnDelete();

    $table->foreignId('tempat_services_id')
          ->nullable()
          ->constrained('tempat_services')
          ->nullOnDelete();

    $table->date('tanggal_rusak');
    $table->text('deskripsi_kerusakan');
    $table->integer('biaya')->nullable();

    $table->enum('status', ['dilaporkan','proses','selesai'])
          ->default('dilaporkan');

    $table->date('tanggal_selesai')->nullable();
    $table->text('catatan')->nullable();

    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};
