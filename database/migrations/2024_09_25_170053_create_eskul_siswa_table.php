<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('eskul_siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('eskul_id');
            $table->year('tahun_mulai');
            $table->timestamps();

            // Foreign keys
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('eskul_id')->references('id')->on('eskul')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('eskul_siswa');
    }
};
