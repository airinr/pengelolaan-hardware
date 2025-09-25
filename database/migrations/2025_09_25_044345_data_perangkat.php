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
         Schema::create('data_perangkat', function (Blueprint $table) {
            $table->id('id_perangkat');
            $table->string('nama_perangkat');
            $table->integer('jumlah');
            $table->string('id_lab');
            $table->timestamp('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('data_perangkat');
    }
};
