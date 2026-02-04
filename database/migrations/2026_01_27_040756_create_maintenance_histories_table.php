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
    Schema::create('maintenance_histories', function (Blueprint $table) {
    $table->id();
    $table->foreignId('maintenance_schedule_id')->constrained()->onDelete('cascade');
    $table->foreignId('technician_id')->nullable()->constrained('users')->nullOnDelete();
    $table->date('tanggal_service');
    $table->integer('biaya')->nullable();
    $table->text('catatan')->nullable();
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_histories');
    }
};
