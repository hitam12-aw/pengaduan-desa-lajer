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
        Schema::create('pengaduan', function (Blueprint $table) {
       $table->id();
        $table->string('nomor_tiket')->unique();
        $table->string('nama');
        $table->string('no_hp');
        $table->string('kategori');
        $table->string('judul');
        $table->text('deskripsi');
        $table->string('foto')->nullable();
        $table->enum('status', ['masuk', 'diproses', 'selesai'])->default('masuk');
        $table->text('balasan')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
