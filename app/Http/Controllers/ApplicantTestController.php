<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicantTestController extends Controller
{
    /**
     * Tampilkan halaman tes pelamar
     * Route: GET /test/{application}
     */
    public function show(JobApplication $application)
    {
        $application->load('job');

        // Jika sudah pernah submit jawaban → halaman already submitted
        if ($application->answer_iq_file || $application->answer_disc_file) {
            return view('applicant.already_submitted', compact('application'));
        }

        // Jika soal belum diupload oleh HRD
        if (!$application->iq_test_file && !$application->disc_test_file) {
            abort(404, 'Soal tes belum tersedia. Silakan hubungi HRD.');
        }

        // Catat waktu mulai jika belum ada (timer berjalan dari sini)
        if (!$application->test_started_at) {
            $application->update(['test_started_at' => now()]);
        }

        // Hitung sisa waktu berdasarkan waktu server (anti-cheat)
        $durationInSeconds = ($application->test_duration ?? 60) * 60;
        $elapsed           = now()->diffInSeconds($application->test_started_at);
        $timeLeft          = max(0, $durationInSeconds - $elapsed);

        return view('applicant.test', compact('application', 'timeLeft'));
    }

    /**
     * Submit jawaban tes dari pelamar
     * Route: POST /test/{application}/submit
     */
    public function submitAnswer(Request $request, JobApplication $application)
    {
        // Tolak jika sudah pernah submit
        if ($application->answer_iq_file || $application->answer_disc_file) {
            return redirect()->route('applicant.submitted', $application->id)
                ->with('info', 'Jawaban sudah pernah dikirim sebelumnya.');
        }

        // Validasi batas waktu dari server (toleransi 60 detik)
        if ($application->test_started_at) {
            $durationInSeconds = ($application->test_duration ?? 60) * 60;
            $elapsed           = now()->diffInSeconds($application->test_started_at);

            if ($elapsed > $durationInSeconds + 60) {
                return redirect()->route('applicant.test.show', $application->id)
                    ->with('error', 'Waktu tes sudah habis. Jawaban tidak dapat dikirim.');
            }
        }

        // Validasi file
        $request->validate([
            'answer_iq_file'   => 'nullable|file|mimes:pdf,jpg,jpeg,png,zip|max:20480',
            'answer_disc_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,zip|max:20480',
        ]);

        // Minimal harus ada satu file
        if (!$request->hasFile('answer_iq_file') && !$request->hasFile('answer_disc_file')) {
            return redirect()->back()
                ->with('error', 'Upload minimal satu file jawaban sebelum mengirim.');
        }

        $updateData = [
            'test_completed_at' => now(),
        ];

        // Simpan jawaban IQ
        if ($request->hasFile('answer_iq_file')) {
            if ($application->answer_iq_file) {
                Storage::disk('public')->delete($application->answer_iq_file);
            }
            $updateData['answer_iq_file'] = $request->file('answer_iq_file')
                ->store('answers/iq', 'public');
        }

        // Simpan jawaban DISC
        if ($request->hasFile('answer_disc_file')) {
            if ($application->answer_disc_file) {
                Storage::disk('public')->delete($application->answer_disc_file);
            }
            $updateData['answer_disc_file'] = $request->file('answer_disc_file')
                ->store('answers/disc', 'public');
        }

        $application->update($updateData);

        // Redirect ke halaman sukses dengan ID application ← INI YANG DIPERBAIKI
        return redirect()->route('applicant.submitted', $application->id)
            ->with('success', 'Jawaban berhasil dikirim! Terima kasih.');
    }

    /**
     * Halaman Sukses setelah submit jawaban tes
     * Route: GET /test/submitted/{application}
     */
    public function submitted($applicationId)
    {
        $application = JobApplication::with('job')->findOrFail($applicationId);

        return view('applicant.submitted', compact('application'));
    }
}