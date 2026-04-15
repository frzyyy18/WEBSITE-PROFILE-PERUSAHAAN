<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'requirements',
        'location',
        'salary',
        'deadline',
        'is_active',
    ];

    // Agar deadline otomatis jadi Carbon
    protected $casts = [
        'deadline' => 'date',
        'is_active' => 'boolean',
    ];
}