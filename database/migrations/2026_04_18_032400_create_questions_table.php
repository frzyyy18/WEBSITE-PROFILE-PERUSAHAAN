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
    Schema::create('questions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('job_application_id')
              ->constrained('job_applications')
              ->onDelete('cascade');
              
        $table->text('question');                    // Pertanyaan
        $table->enum('type', ['essay', 'multiple_choice'])->default('essay');
        $table->json('options')->nullable();         // Untuk pilihan ganda nanti
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
