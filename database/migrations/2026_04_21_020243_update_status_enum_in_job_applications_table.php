<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            // 1. Ubah kolom status menjadi lebih lengkap
            $table->enum('status', [
                'pending',
                'reviewed',
                'shortlist',
                'test',
                'interview',
                'accepted',
                'rejected'
            ])->default('pending')->change();

            // 2. Tambah kolom untuk jawaban tes terpisah (IQ & DISC)
            if (!Schema::hasColumn('job_applications', 'answer_iq_file')) {
                $table->string('answer_iq_file')->nullable()->after('answer_file');
            }
            if (!Schema::hasColumn('job_applications', 'answer_disc_file')) {
                $table->string('answer_disc_file')->nullable()->after('answer_iq_file');
            }

            // 3. Kolom pendukung untuk tes online
            if (!Schema::hasColumn('job_applications', 'test_questions')) {
                $table->json('test_questions')->nullable()->after('test_duration');
            }
            if (!Schema::hasColumn('job_applications', 'test_answers')) {
                $table->json('test_answers')->nullable()->after('test_questions');
            }
            if (!Schema::hasColumn('job_applications', 'test_started_at')) {
                $table->timestamp('test_started_at')->nullable()->after('test_answers');
            }
            if (!Schema::hasColumn('job_applications', 'test_completed_at')) {
                $table->timestamp('test_completed_at')->nullable()->after('test_started_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->enum('status', ['pending', 'reviewed', 'rejected'])
                  ->default('pending')
                  ->change();

            $table->dropColumn([
                'answer_iq_file',
                'answer_disc_file',
                'test_questions',
                'test_answers',
                'test_started_at',
                'test_completed_at'
            ]);
        });
    }
};