<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('job_applications', function (Blueprint $table) {
        $table->string('iq_test_file')->nullable()->after('test_duration');
        $table->string('disc_test_file')->nullable()->after('iq_test_file');
    });
}

public function down(): void
{
    Schema::table('job_applications', function (Blueprint $table) {
        $table->dropColumn(['iq_test_file', 'disc_test_file']);
    });
}
};