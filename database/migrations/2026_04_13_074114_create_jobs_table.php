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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');                    // Judul lowongan kerja
            $table->string('slug')->unique();           // Untuk URL (contoh: marketing-staff)
            $table->text('description');                // Deskripsi pekerjaan
            $table->text('requirements');               // Persyaratan kerja
            $table->string('location');                 // Lokasi kerja (Palembang, dll)
            $table->string('salary')->nullable();       // Gaji (bisa kosong)
            $table->date('deadline');                   // Tanggal penutupan lowongan
            $table->boolean('is_active')->default(true);// Status lowongan aktif/tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};