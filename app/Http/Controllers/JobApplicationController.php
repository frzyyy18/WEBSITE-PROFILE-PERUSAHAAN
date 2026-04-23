<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    /**
     * Simpan lamaran dari pelamar (Publik)
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_id'     => 'required|exists:jobs,id',
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:20',
            'education'  => 'required|string|max:255',
            'experience' => 'nullable|string',
            'message'    => 'nullable|string',
            'cv'         => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $cvPath = $request->file('cv')->store('cv', 'public');

        JobApplication::create([
            'job_id'     => $request->job_id,
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'education'  => $request->education,
            'experience' => $request->experience,
            'message'    => $request->message,
            'cv_path'    => $cvPath,
            'status'     => 'pending',
        ]);

        return redirect()->back()->with('success', 'Lamaran Anda berhasil dikirim! Terima kasih.');
    }
}