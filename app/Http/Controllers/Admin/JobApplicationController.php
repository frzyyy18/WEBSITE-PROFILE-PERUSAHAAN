<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    /**
     * Daftar semua pelamar
     */
    public function index()
    {
        $applications = JobApplication::with('job')->latest()->get();
        return view('admin.job-applications.index', compact('applications'));
    }

    /**
     * Detail pelamar
     */
    public function show(JobApplication $application)
    {
        $application->load('job');
        return view('admin.job-applications.show', compact('application'));
    }

    /**
     * Shortlist pelamar
     */
    public function shortlist(JobApplication $application)
    {
        $application->update(['status' => 'shortlist']);
        return redirect()->route('admin.job-applications.show', $application)
            ->with('success', 'Pelamar berhasil di-shortlist!');
    }

    /**
     * Terima pelamar
     */
    public function accept(JobApplication $application)
    {
        $application->update(['status' => 'accepted']);
        return redirect()->route('admin.job-applications.show', $application)
            ->with('success', 'Pelamar berhasil diterima!');
    }

    /**
     * Tolak pelamar
     */
    public function reject(JobApplication $application)
    {
        $application->update(['status' => 'rejected']);
        return redirect()->route('admin.job-applications.show', $application)
            ->with('success', 'Pelamar berhasil ditolak.');
    }

    /**
     * Upload soal IQ dan DISC + set durasi
     * Route name: admin.job-applications.upload-tests
     */
    public function uploadTests(Request $request, JobApplication $application)
    {
        $request->validate([
            'iq_test_file'  => 'nullable|file|mimes:pdf|max:20480',
            'disc_test_file'=> 'nullable|file|mimes:pdf|max:20480',
            'test_duration' => 'required|integer|min:10|max:180',
        ]);

        $updateData = [
            'test_duration' => $request->test_duration,
            'status'        => 'test', // update status jadi "Tes Online"
        ];

        // Upload soal IQ
        if ($request->hasFile('iq_test_file')) {
            // Hapus file lama jika ada
            if ($application->iq_test_file) {
                Storage::disk('public')->delete($application->iq_test_file);
            }
            $updateData['iq_test_file'] = $request->file('iq_test_file')
                ->store('soal/iq', 'public');
        }

        // Upload soal DISC
        if ($request->hasFile('disc_test_file')) {
            // Hapus file lama jika ada
            if ($application->disc_test_file) {
                Storage::disk('public')->delete($application->disc_test_file);
            }
            $updateData['disc_test_file'] = $request->file('disc_test_file')
                ->store('soal/disc', 'public');
        }

        // Minimal harus ada salah satu soal
        if (!$request->hasFile('iq_test_file') && !$request->hasFile('disc_test_file')) {
            // Kalau tidak ada file baru tapi sudah ada file lama, tetap update durasi saja
            if (!$application->iq_test_file && !$application->disc_test_file) {
                return redirect()->back()
                    ->with('error', 'Pilih minimal satu file soal (IQ atau DISC).');
            }
            // Hanya update durasi
            unset($updateData['status']);
        }

        $application->update($updateData);

        return redirect()->route('admin.job-applications.show', $application)
            ->with('success', 'Soal tes berhasil diupload! Link tes sudah bisa dikirim ke pelamar.');
    }

    /**
     * Kirim link tes ke email pelamar
     * Route name: admin.job-applications.send-test-link
     */
    public function sendTestLink(JobApplication $application)
    {
        // Pastikan soal sudah diupload
        if (!$application->iq_test_file && !$application->disc_test_file) {
            return redirect()->route('admin.job-applications.show', $application)
                ->with('error', 'Upload soal terlebih dahulu sebelum mengirim link tes.');
        }

        $testUrl  = url('/test/' . $application->id);
        $name     = $application->name;
        $email    = $application->email;
        $position = $application->job->title ?? 'posisi yang dilamar';
        $duration = $application->test_duration ?? 60;

        // Kirim email
        Mail::html("
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 30px;'>
                <h2 style='color: #1e40af;'>Undangan Tes Online</h2>
                <p>Yth. <strong>{$name}</strong>,</p>
                <p>
                    Selamat! Anda telah lulus tahap seleksi awal untuk posisi
                    <strong>{$position}</strong> dan kami mengundang Anda untuk mengikuti
                    tes online.
                </p>

                <div style='background:#f0f4ff; border-left:4px solid #3b82f6; padding:20px; border-radius:8px; margin:24px 0;'>
                    <p style='margin:0 0 8px; font-size:14px; color:#6b7280;'>Link Tes Online Anda:</p>
                    <a href='{$testUrl}'
                       style='color:#1d4ed8; font-size:16px; font-weight:bold; word-break:break-all;'>
                        {$testUrl}
                    </a>
                </div>

                <div style='background:#fefce8; border:1px solid #fbbf24; padding:16px; border-radius:8px; margin-bottom:24px;'>
                    <p style='margin:0; font-size:14px; color:#92400e;'>
                        ⏱️ <strong>Durasi tes: {$duration} menit</strong><br>
                        Timer akan otomatis berjalan saat Anda membuka link di atas.
                        Pastikan koneksi internet stabil sebelum memulai.
                    </p>
                </div>

                <p style='font-size:14px; color:#374151;'>
                    <strong>Petunjuk:</strong><br>
                    1. Klik link di atas untuk membuka halaman tes<br>
                    2. Download soal yang tersedia (IQ dan/atau DISC)<br>
                    3. Kerjakan soal sesuai waktu yang diberikan<br>
                    4. Upload file jawaban Anda sebelum waktu habis<br>
                    5. Klik tombol <em>Kirim Semua Jawaban</em>
                </p>

                <hr style='border:none; border-top:1px solid #e5e7eb; margin:24px 0;'>
                <p style='font-size:12px; color:#9ca3af;'>
                    Email ini dikirim otomatis oleh sistem rekrutmen.
                    Jika ada pertanyaan, hubungi tim HRD kami.
                </p>
            </div>
        ", function ($message) use ($email, $name, $position) {
            $message->to($email, $name)
                    ->subject("Undangan Tes Online - {$position}");
        });

        return redirect()->route('admin.job-applications.show', $application)
            ->with('success', "Link tes berhasil dikirim ke email {$email}!");
    }

    /**
     * Reset tes pelamar (hapus timer + jawaban)
     * Route name: admin.job-applications.reset-test
     */
    public function resetTest(JobApplication $application)
    {
        // Hapus file jawaban lama dari storage
        if ($application->answer_iq_file) {
            Storage::disk('public')->delete($application->answer_iq_file);
        }
        if ($application->answer_disc_file) {
            Storage::disk('public')->delete($application->answer_disc_file);
        }

        $application->update([
            'test_started_at'   => null,
            'test_completed_at' => null,
            'answer_iq_file'    => null,
            'answer_disc_file'  => null,
        ]);

        return redirect()->route('admin.job-applications.show', $application)
            ->with('success', 'Tes pelamar berhasil direset. Timer dan jawaban dihapus.');
    }

    /**
     * Hapus data pelamar
     */
    public function destroy(JobApplication $application)
    {
        // Hapus semua file terkait
        foreach (['cv_path','iq_test_file','disc_test_file','answer_iq_file','answer_disc_file'] as $field) {
            if ($application->$field) {
                Storage::disk('public')->delete($application->$field);
            }
        }

        $application->delete();

        return redirect()->route('admin.job-applications.index')
            ->with('success', 'Data pelamar berhasil dihapus.');
    }
}