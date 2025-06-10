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
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->id();
            $table->string('judul_pelatihan');
            $table->text('deskripsi');
            $table->dateTime('waktu_pelaksanaan');
            $table->dateTime('batas_pendaftaran');
            $table->string('lokasi');
            $table->integer('kuota');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihans');
    }
};