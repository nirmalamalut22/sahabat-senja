<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kondisi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lansia')
                  ->constrained('datalansia')
                  ->onDelete('cascade');
            $table->date('tanggal')->default(now());
            $table->string('tekanan_darah', 20);
            $table->unsignedSmallInteger('nadi');
            $table->enum('nafsu_makan', ['Sangat Baik', 'Baik', 'Normal', 'Kurang', 'Sangat Kurang']);
            $table->enum('status_obat', ['Sudah', 'Belum', 'Sebagian']);
            $table->text('catatan')->nullable();
            $table->enum('status', ['Stabil', 'Perlu Perhatian']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kondisi');
    }
};
