<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            // Ubah nama kolom dari 'description' ke 'deskripsi'
            $table->renameColumn('description', 'deskripsi');
            // Ubah nama kolom dari 'date' ke 'tanggal'
            $table->renameColumn('date', 'tanggal');
        });
    }

    public function down(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            // Kembalikan ke nama semula jika rollback
            $table->renameColumn('deskripsi', 'description');
            $table->renameColumn('tanggal', 'date');
        });
    }
};