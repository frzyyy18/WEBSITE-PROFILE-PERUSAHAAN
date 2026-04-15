<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\Admin\JobAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Publik
Route::get('/', function () {
    return view('home');           // Halaman Beranda
})->name('home');

Route::get('/visi-misi', function () {
    return view('visi-misi');
})->name('visi-misi');

Route::get('/produk', function () {
    return view('produk');
})->name('produk');

Route::get('/lowongan', [JobController::class, 'index'])->name('lowongan.index');
Route::get('/lowongan/{slug}', [JobController::class, 'show'])->name('lowongan.show');

// Form Lamaran Kerja
Route::post('/lamaran', [JobApplicationController::class, 'store'])->name('lamaran.store');

// Admin Routes (sementara pakai auth biasa)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('jobs', JobAdminController::class);
});

// Auth Routes (dari Breeze)
require __DIR__.'/auth.php';


Route::get('/kontak', [App\Http\Controllers\ContactController::class, 'index'])->name('kontak');
Route::post('/kontak', [App\Http\Controllers\ContactController::class, 'store'])->name('kontak.store');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('jobs', JobAdminController::class);
    
    // Route untuk hapus pelamar
    Route::delete('/job-applications/{job_application}', [JobApplicationController::class, 'destroy'])
         ->name('job-applications.destroy');
});