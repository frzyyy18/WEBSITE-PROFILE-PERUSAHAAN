<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id', 
        'name', 
        'email', 
        'phone', 
        'education', 
        'experience', 
        'message', 
        'cv_path', 
        'status', 
        'test_file', 
        'test_started_at', 
        'test_duration', 
        'answer_file',
        'iq_test_file',        // untuk mendukung kondisi di view kamu
        'disc_test_file',       // untuk mendukung kondisi di view kamu
        'answer_iq_file',
        'answer_disc_file'
    ];

    protected $casts = [
        'test_started_at' => 'datetime',
        'test_duration'   => 'integer',
    ];

    // Relasi ke Job
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}