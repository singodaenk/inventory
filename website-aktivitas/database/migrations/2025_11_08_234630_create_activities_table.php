<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aktivitas');
            $table->text('deskripsi'); // Diubah dari 'description'
            $table->date('tanggal');   // Diubah dari 'date'
            $table->string('no_hp');
            $table->enum('status', ['berjalan', 'selesai'])->default('berjalan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};