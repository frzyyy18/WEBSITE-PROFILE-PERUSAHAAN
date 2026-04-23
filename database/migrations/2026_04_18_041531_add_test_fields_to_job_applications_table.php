<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->string('test_file')->nullable();           // PDF Soal dari HRD
            $table->timestamp('test_started_at')->nullable();  // Waktu mulai test
            $table->integer('test_duration')->default(60);     // Durasi dalam menit (default 60)
            $table->string('answer_file')->nullable();         // Jawaban yang diupload pelamar
        });
    }

    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropColumn(['test_file', 'test_started_at', 'test_duration', 'answer_file']);
        });
    }
};