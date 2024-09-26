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
    Schema::create('absensi', function (Blueprint $table) {
        $table->id();
        // $table->unsignedBigInteger('id_jadwal');
        $table->time('jam');
        $table->date('tanggal');
        $table->unsignedBigInteger('uid');
        $table->foreign('uid')->references('id')->on('mahasiswa');
        $table->string('status');
        $table->unsignedBigInteger('id_jadwal');
        $table->foreign('id_jadwal')->references('id')->on('jadwal');
        $table->timestamps();
    });
    // Schema::enableForeignKeyConstraints();
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
