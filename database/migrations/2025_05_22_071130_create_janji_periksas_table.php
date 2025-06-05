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
        Schema::create('janji_periksas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pasien')->constrained('users')->onDelete('cascade');
            $table->integer('id_jadwal_periksa')->constrained('jadwal_periksas')->onDelete('cascade');
            $table->text('keluhan');
            $table->integer('no_antrian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('janji_periksas');
    }
};
