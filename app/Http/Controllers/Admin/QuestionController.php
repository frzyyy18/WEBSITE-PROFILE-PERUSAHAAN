<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Simpan soal baru untuk pelamar
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_application_id' => 'required|exists:job_applications,id',
            'question'           => 'required|string|min:10',
            'type'               => 'required|in:essay,multiple_choice',
        ]);

        Question::create([
            'job_application_id' => $request->job_application_id,
            'question'           => $request->question,
            'type'               => $request->type,
            'options'            => $request->type === 'multiple_choice' ? json_encode($request->options ?? []) : null,
        ]);

        return redirect()->route('admin.job-applications.show', $request->job_application_id)
                         ->with('success', 'Soal berhasil ditambahkan!');
    }

    /**
     * Hapus soal
     */
    public function destroy(Question $question)
    {
        $applicationId = $question->job_application_id;
        $question->delete();

        return redirect()->route('admin.job-applications.show', $applicationId)
                         ->with('success', 'Soal berhasil dihapus.');
    }
}