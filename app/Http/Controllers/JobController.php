<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::where('is_active', true)
                   ->orderBy('created_at', 'desc')
                   ->get();

        return view('lowongan', compact('jobs'));
    }

    public function show($slug)
    {
        $job = Job::where('slug', $slug)->firstOrFail();
        return view('lowongan.show', compact('job'));
    }
}