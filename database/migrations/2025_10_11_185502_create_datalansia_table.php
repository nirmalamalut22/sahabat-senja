<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        // Kalau tabel belum ada, buat baru:
        Schema::create('datalansia', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lansia', 100);
            $table->integer('umur_lansia')->check('umur_lansia >= 40 AND umur_lansia <= 160');
            $table->string('riwayat_penyakit_lansia', 255)->nullable();
            $table->string('nama_anak', 100);
            $table->string('alamat_lengkap', 255);
            $table->string('no_hp_anak', 15);
            $table->string('email_anak', 100);
            $table->timestamps();
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('datalansia');
    }
};
