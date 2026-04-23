<?php

use Illuminate\Support\Facades\Route;

// Public Controllers
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ApplicantTestController;

// Admin Controllers
use App\Http\Controllers\Admin\JobAdminController;
use App\Http\Controllers\Admin\JobApplicationController as AdminJobApplicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==================== HALAMAN PUBLIK ====================

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/profil', function () {
    return view('organization.profil');
})->name('organization.profil');

Route::get('/struktur-organisasi', function () {
    return view('organization.index');
})->name('organization.index');

Route::get('/visi-misi', function () {
    return view('visi-misi');
})->name('visi-misi');

Route::get('/produk', function () {
    return view('produk');
})->name('produk');

Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');

// Lowongan Kerja Publik
Route::get('/lowongan', [JobController::class, 'index'])->name('lowongan.index');
Route::get('/lowongan/{slug}', [JobController::class, 'show'])->name('lowongan.show');

// Lamaran Kerja Publik
Route::post('/lamaran', [JobApplicationController::class, 'store'])->name('lamaran.store');

// ==================== TES ONLINE PELAMAR ====================

Route::get('/test/{application}', [ApplicantTestController::class, 'show'])
     ->name('applicant.test.show');

Route::post('/test/{application}/submit', [ApplicantTestController::class, 'submitAnswer'])
     ->name('applicant.submit');

Route::get('/test/submitted/{application}', [ApplicantTestController::class, 'submitted'])
     ->name('applicant.submitted');

// ==================== ADMIN ROUTES ====================

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // CRUD Lowongan Kerja
    Route::resource('jobs', JobAdminController::class);

    // Manajemen Pelamar
    Route::prefix('pelamar')->name('job-applications.')->group(function () {

        Route::get('/', [AdminJobApplicationController::class, 'index'])
             ->name('index');

        Route::get('/{application}', [AdminJobApplicationController::class, 'show'])
             ->name('show');

        // Download CV
        Route::get('/{application}/cv', [AdminJobApplicationController::class, 'downloadCv'])
             ->name('download-cv');

        // Ubah Status
        Route::post('/{application}/shortlist', [AdminJobApplicationController::class, 'shortlist'])
             ->name('shortlist');

        Route::post('/{application}/accept', [AdminJobApplicationController::class, 'accept'])
             ->name('accept');

        Route::post('/{application}/reject', [AdminJobApplicationController::class, 'reject'])
             ->name('reject');

        // Upload Soal IQ + DISC
        Route::post('/{application}/upload-tests', [AdminJobApplicationController::class, 'uploadTests'])
             ->name('upload-tests');

        // Kirim Link Tes via Email
        Route::post('/{application}/send-test-link', [AdminJobApplicationController::class, 'sendTestLink'])
             ->name('send-test-link');

        // Reset Tes Pelamar
        Route::post('/{application}/reset-test', [AdminJobApplicationController::class, 'resetTest'])
             ->name('reset-test');

        // Hapus Data Pelamar
        Route::delete('/{application}', [AdminJobApplicationController::class, 'destroy'])
             ->name('destroy');
    });
});

// Auth Routes
require __DIR__.'/auth.php';