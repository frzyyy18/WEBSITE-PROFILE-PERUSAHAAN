@extends('layouts.app')

@section('title', $job->title . ' - CV. Sriwijaya Serangkai')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-12">

    <!-- Tombol Kembali -->
    <a href="{{ route('lowongan.index') }}" 
       class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 mb-8">
        ← Kembali ke Daftar Lowongan
    </a>

    <!-- Judul Lowongan -->
    <div class="bg-white rounded-3xl shadow-xl p-10 mb-10">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $job->title }}</h1>
        
        <div class="flex flex-wrap gap-4 text-sm text-gray-500">
            <div class="flex items-center gap-2">
                <i class="fas fa-map-marker-alt"></i>
                <span>{{ $job->location }}</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fas fa-clock"></i>
                <span>Deadline: {{ $job->deadline->format('d F Y') }}</span>
            </div>
            @if($job->salary)
            <div class="flex items-center gap-2">
                <i class="fas fa-money-bill-wave"></i>
                <span>{{ $job->salary }}</span>
            </div>
            @endif
        </div>
    </div>

    <!-- Deskripsi & Persyaratan -->
    <div class="grid md:grid-cols-5 gap-10">
        
        <!-- Kiri: Deskripsi -->
        <div class="md:col-span-3">
            <div class="bg-white rounded-3xl shadow p-10 mb-8">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800">Deskripsi Pekerjaan</h2>
                <div class="prose text-gray-700 leading-relaxed">
                    {!! nl2br(e($job->description)) !!}
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow p-10">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800">Persyaratan</h2>
                <div class="prose text-gray-700 leading-relaxed">
                    {!! nl2br(e($job->requirements)) !!}
                </div>
            </div>
        </div>

        <!-- Kanan: Form Lamaran -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-3xl shadow-xl p-8 sticky top-8">
                <h2 class="text-2xl font-bold mb-6 text-center">Lamar Pekerjaan Ini</h2>

                @if(session('success'))
                    <div class="alert alert-success mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('lamaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job->id }}">

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                            <input type="text" name="name" 
                                   class="input input-bordered w-full" 
                                   placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" name="email" 
                                   class="input input-bordered w-full" 
                                   placeholder="contoh@email.com" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon / WA *</label>
                            <input type="text" name="phone" 
                                   class="input input-bordered w-full" 
                                   placeholder="0812-3456-7890" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pendidikan Terakhir *</label>
                            <input type="text" name="education" 
                                   class="input input-bordered w-full" 
                                   placeholder="SMA / D3 / S1 - Jurusan ..." required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pengalaman Kerja (Opsional)</label>
                            <textarea name="experience" rows="3"
                                      class="textarea textarea-bordered w-full"
                                      placeholder="Contoh: 2 tahun sebagai sales di PT. XYZ"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pesan Tambahan (Opsional)</label>
                            <textarea name="message" rows="3"
                                      class="textarea textarea-bordered w-full"
                                      placeholder="Motivasi atau catatan tambahan..."></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Upload CV (PDF, max 10MB) *</label>
                            <input type="file" name="cv" 
                                   accept=".pdf,.doc,.docx" 
                                   class="file-input file-input-bordered w-full" required>
                            <p class="text-xs text-gray-500 mt-1">Hanya file PDF, DOC, atau DOCX</p>
                        </div>

                        <button type="submit" 
                                class="btn btn-primary btn-lg w-full text-lg font-semibold py-4">
                            Kirim Lamaran Saya
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection