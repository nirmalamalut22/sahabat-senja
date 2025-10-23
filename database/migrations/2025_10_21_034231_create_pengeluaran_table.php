<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('keterangan');
            $table->decimal('jumlah', 15, 2); // untuk menyimpan nominal uang
            $table->timestamps(); // optional: created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengeluaran');
    }
};