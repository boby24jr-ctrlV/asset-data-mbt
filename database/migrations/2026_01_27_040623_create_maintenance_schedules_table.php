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
 Schema::create('maintenance_schedules', function (Blueprint $table) {
    $table->id();

    // 🔑 OWNER DATA (WAJIB)
    $table->foreignId('user_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->foreignId('item_id')
          ->constrained('items')
          ->cascadeOnDelete();

    $table->string('jenis_maintenance');

$table->integer('interval_hari')->nullable();
$table->date('last_maintenance')->nullable();

$table->enum('status', ['dijadwalkan', 'proses', 'selesai'])
      ->default('dijadwalkan');


    $table->text('catatan')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_schedules');
    }
};
