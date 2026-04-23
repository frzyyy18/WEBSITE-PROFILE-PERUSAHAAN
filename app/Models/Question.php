<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['job_application_id', 'question', 'type', 'options'];

    public function jobApplication()
    {
        return $this->belongsTo(JobApplication::class);
    }
}