<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobAdminController extends Controller
{
    // Constructor tidak perlu middleware lagi karena sudah diproteksi di route
    public function index()
    {
        $jobs = Job::latest()->get();
        $applications = JobApplication::with('job')->latest()->get();

        return view('admin.jobs.index', compact('jobs', 'applications'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required',
            'requirements' => 'required',
            'location'     => 'required|string|max:255',
            'salary'       => 'nullable|string',
            'deadline'     => 'required|date',
        ]);

        Job::create([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title) . '-' . time(),
            'description'  => $request->description,
            'requirements' => $request->requirements,
            'location'     => $request->location,
            'salary'       => $request->salary,
            'deadline'     => $request->deadline,
            'is_active'    => true,
        ]);

        return redirect()->route('admin.jobs.index')
                         ->with('success', 'Lowongan berhasil ditambahkan!');
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required',
            'requirements' => 'required',
            'location'     => 'required|string|max:255',
            'salary'       => 'nullable|string',
            'deadline'     => 'required|date',
            'is_active'    => 'boolean',
        ]);

        $job->update([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title) . '-' . time(),
            'description'  => $request->description,
            'requirements' => $request->requirements,
            'location'     => $request->location,
            'salary'       => $request->salary,
            'deadline'     => $request->deadline,
            'is_active'    => $request->is_active,
        ]);

        return redirect()->route('admin.jobs.index')
                         ->with('success', 'Lowongan berhasil diperbarui!');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')
                         ->with('success', 'Lowongan berhasil dihapus!');
    }
}