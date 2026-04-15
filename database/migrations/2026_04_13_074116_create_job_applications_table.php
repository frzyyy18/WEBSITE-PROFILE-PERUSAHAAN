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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('job_id')
                  ->constrained('jobs')
                  ->onDelete('cascade');           // Jika lowongan dihapus, lamaran juga ikut terhapus

            $table->string('name');                 // Nama pelamar
            $table->string('email');                // Email
            $table->string('phone');                // Nomor telepon / WA
            $table->string('education');            // Pendidikan terakhir
            $table->text('experience')->nullable(); // Pengalaman kerja (boleh kosong)
            $table->text('message')->nullable();    // Pesan tambahan
            $table->string('cv_path');              // Path file CV yang diupload
            $table->enum('status', ['pending', 'reviewed', 'accepted', 'rejected'])
                  ->default('pending');             // Status lamaran

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};