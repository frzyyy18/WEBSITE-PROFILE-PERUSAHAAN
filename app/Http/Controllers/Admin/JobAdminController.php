<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Storage;

class JobAdminController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->get();
        $applications = \App\Models\JobApplication::with('job')->latest()->get();

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

        // Buat slug yang unik
        $baseSlug = Str::slug($request->title);
        $slug = $baseSlug;
        $counter = 1;

        while (Job::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        Job::create([
            'title'        => $request->title,
            'slug'         => $slug,
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

        // Buat slug unik saat update
        $baseSlug = Str::slug($request->title);
        $slug = $baseSlug;
        $counter = 1;

        while (Job::where('slug', $slug)->where('id', '!=', $job->id)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $job->update([
            'title'        => $request->title,
            'slug'         => $slug,
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

  /**
 * Upload PDF Soal oleh HRD
 */
public function uploadTest(Request $request, JobApplication $application)
{
    $request->validate([
        'test_file' => 'required|file|mimes:pdf|max:20480',
    ]);

    // Hapus file lama jika ada
    if ($application->test_file) {
        Storage::disk('public_direct')->delete($application->test_file);
    }

    $path = $request->file('test_file')->store('test_soal', 'public_direct');

    $application->update([
        'test_file' => $path,
        'test_duration' => $request->test_duration ?? 60,
    ]);

    return redirect()->route('admin.job-applications.show', $application)
                     ->with('success', 'File soal PDF berhasil diupload!');
}

/**
 * Pelamar mulai mengerjakan test
 */
public function startTest(JobApplication $application)
{
    if (!$application->test_file) {
        return redirect()->back()->with('error', 'Soal belum diupload oleh HRD.');
    }

    $application->update([
        'test_started_at' => now(),
    ]);

    return redirect()->route('applicant.test', $application->id);
}
}