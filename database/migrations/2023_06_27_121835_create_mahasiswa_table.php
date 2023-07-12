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
    Schema::create('mahasiswa', function (Blueprint $table) {
        $table->id();
        $table->string('nik', 255);
        $table->string('nama', 255);
        $table->string('ttl', 255);
        $table->string('jk', 255);
        $table->string('alamat', 255);
        $table->string('rtrw', 255);
        $table->string('kelurahan', 255);
        $table->string('kecamatan', 255);
        $table->string('agama', 255);
        $table->string('status', 255);
        $table->string('pekerjaan', 255);
        $table->string('kewarganegaraan', 255);
        $table->string('uid', 255)->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
