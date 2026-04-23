@extends('layouts.app')

@section('title', 'Detail Pelamar - ' . $application->name)

@push('styles')
<style>
    .progress-step { transition: all 0.3s ease; }
    .timeline-item:not(:last-child)::before {
        content: '';
        position: absolute;
        left: 19px;
        top: 40px;
        width: 2px;
        height: calc(100% - 8px);
        background: #e5e7eb;
    }
    .tab-content { display: none; }
    .tab-content.active { display: block; }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <a href="{{ route('admin.job-applications.index') }}"
               class="text-sm text-gray-500 hover:text-blue-600 flex items-center gap-1 mb-2">
                <i class="fas fa-arrow-left text-xs"></i> Kembali ke Daftar Pelamar
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Detail Pelamar</h1>
        </div>
        <div class="text-right text-sm text-gray-500">
            ID Lamaran: <span class="font-mono font-semibold text-gray-700">#{{ $application->id }}</span>
        </div>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3">
        <i class="fas fa-check-circle text-green-500"></i>
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl flex items-center gap-3">
        <i class="fas fa-exclamation-circle text-red-500"></i>
        {{ session('error') }}
    </div>
    @endif

    {{-- Progress Tracker --}}
    @php
        $steps = [
            ['key' => 'pending',   'label' => 'Lamaran Masuk', 'icon' => 'fa-file-alt'],
            ['key' => 'shortlist', 'label' => 'Shortlist',     'icon' => 'fa-star'],
            ['key' => 'test',      'label' => 'Tes Online',    'icon' => 'fa-laptop'],
            ['key' => 'accepted',  'label' => 'Diterima',      'icon' => 'fa-check-circle'],
        ];
        $currentStep = match($application->status) {
            'pending'              => 0,
            'reviewed','shortlist' => 1,
            'test'                 => 2,
            'accepted'             => 3,
            default                => 0,
        };
        if ($application->status === 'rejected') $currentStep = -1;
    @endphp

    @if($application->status !== 'rejected')
    <div class="bg-white rounded-3xl shadow p-6 mb-8">
        <p class="text-sm font-medium text-gray-500 mb-5">Progress Pelamar</p>
        <div class="flex items-center justify-between relative">
            <div class="absolute top-5 left-0 right-0 h-1 bg-gray-200 z-0 mx-16"></div>
            @php $pct = $currentStep > 0 ? min(100, ($currentStep / (count($steps)-1)) * 100) : 0; @endphp
            <div class="absolute top-5 left-0 h-1 bg-blue-500 z-0 mx-16 transition-all duration-700"
                 style="width: calc((100% - 8rem) * {{ $pct }} / 100)"></div>
            @foreach($steps as $i => $step)
            <div class="flex flex-col items-center relative z-10 progress-step">
                <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold border-2
                    {{ $i < $currentStep  ? 'bg-blue-600 border-blue-600 text-white' :
                       ($i === $currentStep ? 'bg-white border-blue-500 text-blue-600' :
                        'bg-white border-gray-300 text-gray-400') }}">
                    @if($i < $currentStep)
                        <i class="fas fa-check text-xs"></i>
                    @else
                        <i class="fas {{ $step['icon'] }} text-xs"></i>
                    @endif
                </div>
                <span class="text-xs mt-2 font-medium {{ $i <= $currentStep ? 'text-gray-700' : 'text-gray-400' }}">
                    {{ $step['label'] }}
                </span>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="bg-red-50 border border-red-200 rounded-3xl px-6 py-4 mb-8 flex items-center gap-3">
        <i class="fas fa-times-circle text-red-500 text-xl"></i>
        <span class="text-red-700 font-medium">Pelamar ini telah ditolak.</span>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- ===== KOLOM KIRI (2/3) ===== --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Info Dasar --}}
            <div class="bg-white rounded-3xl shadow p-8">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 text-2xl font-bold">
                            {{ strtoupper(substr($application->name, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-800">{{ $application->name }}</h2>
                            <p class="text-gray-500">{{ $application->email }}</p>
                        </div>
                    </div>
                    @php
                        $statusClass = match($application->status) {
                            'reviewed','shortlist' => 'bg-blue-100 text-blue-700',
                            'rejected'             => 'bg-red-100 text-red-700',
                            'accepted'             => 'bg-green-100 text-green-700',
                            'test'                 => 'bg-purple-100 text-purple-700',
                            default                => 'bg-yellow-100 text-yellow-700'
                        };
                        $statusLabel = match($application->status) {
                            'pending'   => 'Pending',
                            'reviewed'  => 'Reviewed',
                            'shortlist' => 'Shortlist',
                            'test'      => 'Tes Online',
                            'accepted'  => 'Diterima',
                            'rejected'  => 'Ditolak',
                            default     => ucfirst($application->status)
                        };
                    @endphp
                    <span class="{{ $statusClass }} px-4 py-1.5 rounded-full text-sm font-medium">
                        {{ $statusLabel }}
                    </span>
                </div>

                <div class="grid grid-cols-2 gap-6 text-sm">
                    <div class="bg-gray-50 rounded-2xl p-4">
                        <span class="text-gray-400 text-xs uppercase tracking-wide">Posisi Dilamar</span>
                        <p class="font-semibold text-gray-800 mt-1">{{ $application->job->title ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-4">
                        <span class="text-gray-400 text-xs uppercase tracking-wide">Telepon</span>
                        <p class="font-semibold text-gray-800 mt-1">{{ $application->phone }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-4">
                        <span class="text-gray-400 text-xs uppercase tracking-wide">Pendidikan</span>
                        <p class="font-semibold text-gray-800 mt-1">{{ $application->education }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-4">
                        <span class="text-gray-400 text-xs uppercase tracking-wide">Tanggal Lamaran</span>
                        <p class="font-semibold text-gray-800 mt-1">{{ $application->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>

                @if($application->experience)
                <div class="mt-6">
                    <span class="text-gray-400 text-xs uppercase tracking-wide">Pengalaman Kerja</span>
                    <div class="bg-gray-50 p-5 rounded-2xl mt-2 whitespace-pre-line text-sm text-gray-700">
                        {{ $application->experience }}
                    </div>
                </div>
                @endif

                @if($application->message)
                <div class="mt-4">
                    <span class="text-gray-400 text-xs uppercase tracking-wide">Pesan Tambahan</span>
                    <div class="bg-gray-50 p-5 rounded-2xl mt-2 whitespace-pre-line text-sm text-gray-700">
                        {{ $application->message }}
                    </div>
                </div>
                @endif
            </div>

            {{-- Tab CV / Jawaban --}}
            <div class="bg-white rounded-3xl shadow p-8">
                <div class="flex gap-4 border-b mb-6">
                    <button onclick="switchTab('cv')" id="tab-cv"
                            class="tab-btn pb-3 px-1 text-sm font-medium border-b-2 border-blue-600 text-blue-600">
                        <i class="fas fa-file-user mr-1"></i> Curriculum Vitae
                    </button>
                    <button onclick="switchTab('jawaban')" id="tab-jawaban"
                            class="tab-btn pb-3 px-1 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700">
                        <i class="fas fa-file-check mr-1"></i> Jawaban Tes
                        {{-- Badge muncul jika ada salah satu jawaban --}}
                        @if($application->answer_iq_file || $application->answer_disc_file)
                            <span class="ml-1 bg-green-100 text-green-700 text-xs px-2 py-0.5 rounded-full">Tersedia</span>
                        @else
                            <span class="ml-1 bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full">Belum</span>
                        @endif
                    </button>
                </div>

                {{-- ===== TAB CV ===== --}}
                <div id="content-cv" class="tab-content active">
                    @if($application->cv_path)
                        <div class="flex flex-col sm:flex-row gap-4 items-start">
                            <a href="{{ Storage::url($application->cv_path) }}" target="_blank"
                               class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-2xl hover:bg-blue-700 transition text-sm font-medium">
                                <i class="fas fa-download"></i> Download CV
                            </a>
                            <a href="{{ Storage::url($application->cv_path) }}" target="_blank"
                               class="inline-flex items-center gap-2 border border-gray-200 text-gray-600 px-6 py-3 rounded-2xl hover:bg-gray-50 transition text-sm font-medium">
                                <i class="fas fa-eye"></i> Preview CV
                            </a>
                        </div>
                        <div class="mt-6 rounded-2xl overflow-hidden border border-gray-200">
                            <iframe src="{{ Storage::url($application->cv_path) }}"
                                    class="w-full" height="500"
                                    title="Preview CV {{ $application->name }}">
                                <p>Browser tidak mendukung preview PDF.
                                   <a href="{{ Storage::url($application->cv_path) }}">Download di sini</a>.
                                </p>
                            </iframe>
                        </div>
                    @else
                        <div class="text-center py-12 text-gray-400">
                            <i class="fas fa-file-slash text-4xl mb-3"></i>
                            <p>CV tidak tersedia</p>
                        </div>
                    @endif
                </div>

                {{-- ===== TAB JAWABAN ===== --}}
                {{-- 
                    PERBAIKAN UTAMA:
                    Sebelumnya mengecek $application->answer_file (field lama yang tidak ada).
                    Sekarang mengecek answer_iq_file DAN answer_disc_file (field yang disimpan controller).
                --}}
                <div id="content-jawaban" class="tab-content">
                    @if($application->answer_iq_file || $application->answer_disc_file)

                        {{-- Notifikasi sudah dikirim --}}
                        <div class="bg-green-50 border border-green-200 rounded-2xl p-4 mb-6 flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500 text-xl"></i>
                            <div>
                                <p class="font-medium text-green-700">Jawaban sudah dikirim oleh pelamar</p>
                                <p class="text-xs text-green-600 mt-0.5">
                                    Dikirim pada:
                                    {{ $application->test_completed_at
                                        ? \Carbon\Carbon::parse($application->test_completed_at)->format('d M Y, H:i')
                                        : $application->updated_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                        </div>

                        {{-- Tombol download per file --}}
                        <div class="space-y-3">

                            {{-- Jawaban IQ --}}
                            @if($application->answer_iq_file)
                            <div class="border border-blue-100 rounded-2xl p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-xl">
                                            📘
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800 text-sm">Jawaban Soal IQ</p>
                                            <p class="text-xs text-gray-400 mt-0.5">
                                                {{ basename($application->answer_iq_file) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <a href="{{ Storage::url($application->answer_iq_file) }}"
                                           target="_blank"
                                           class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition text-xs font-medium">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                        <a href="{{ Storage::url($application->answer_iq_file) }}"
                                           download
                                           class="inline-flex items-center gap-2 border border-blue-200 text-blue-600 px-4 py-2 rounded-xl hover:bg-blue-50 transition text-xs font-medium">
                                            <i class="fas fa-download"></i> Unduh
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif

                            {{-- Jawaban DISC --}}
                            @if($application->answer_disc_file)
                            <div class="border border-purple-100 rounded-2xl p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-purple-50 rounded-xl flex items-center justify-center text-xl">
                                            📗
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800 text-sm">Jawaban Soal DISC</p>
                                            <p class="text-xs text-gray-400 mt-0.5">
                                                {{ basename($application->answer_disc_file) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <a href="{{ Storage::url($application->answer_disc_file) }}"
                                           target="_blank"
                                           class="inline-flex items-center gap-2 bg-purple-600 text-white px-4 py-2 rounded-xl hover:bg-purple-700 transition text-xs font-medium">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                        <a href="{{ Storage::url($application->answer_disc_file) }}"
                                           download
                                           class="inline-flex items-center gap-2 border border-purple-200 text-purple-600 px-4 py-2 rounded-xl hover:bg-purple-50 transition text-xs font-medium">
                                            <i class="fas fa-download"></i> Unduh
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>

                    @else
                        {{-- Belum ada jawaban --}}
                        <div class="text-center py-12 text-gray-400">
                            <i class="fas fa-hourglass-half text-4xl mb-3"></i>
                            <p class="font-medium text-gray-500">Pelamar belum mengirim jawaban</p>
                            <p class="text-xs mt-1">Jawaban akan muncul di sini setelah pelamar mengirimkan file</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Timeline Aktivitas --}}
            <div class="bg-white rounded-3xl shadow p-8">
                <h3 class="font-semibold text-gray-800 mb-6">
                    <i class="fas fa-history text-gray-400 mr-2"></i> Timeline Aktivitas
                </h3>
                <div class="space-y-4">

                    {{-- Lamaran Masuk --}}
                    <div class="relative flex gap-4 timeline-item">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 shrink-0 z-10">
                            <i class="fas fa-file-alt text-sm"></i>
                        </div>
                        <div class="pb-6">
                            <p class="font-medium text-gray-800 text-sm">Lamaran Masuk</p>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $application->created_at->format('d M Y, H:i') }}</p>
                            <p class="text-sm text-gray-600 mt-1">Melamar posisi <strong>{{ $application->job->title ?? '-' }}</strong></p>
                        </div>
                    </div>

                    {{-- Shortlist --}}
                    @if(in_array($application->status, ['shortlist','reviewed','test','accepted','rejected']))
                    <div class="relative flex gap-4 timeline-item">
                        <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 shrink-0 z-10">
                            <i class="fas fa-star text-sm"></i>
                        </div>
                        <div class="pb-6">
                            <p class="font-medium text-gray-800 text-sm">Masuk Shortlist</p>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $application->updated_at->format('d M Y, H:i') }}</p>
                            <p class="text-sm text-gray-600 mt-1">Pelamar berhasil masuk tahap seleksi awal</p>
                        </div>
                    </div>
                    @endif

                    {{-- Soal diupload --}}
                    @if($application->iq_test_file || $application->disc_test_file)
                    <div class="relative flex gap-4 timeline-item">
                        <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 shrink-0 z-10">
                            <i class="fas fa-upload text-sm"></i>
                        </div>
                        <div class="pb-6">
                            <p class="font-medium text-gray-800 text-sm">Soal Tes Diupload</p>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $application->updated_at->format('d M Y, H:i') }}</p>
                            <p class="text-sm text-gray-600 mt-1">
                                HRD mengupload soal:
                                @if($application->iq_test_file)
                                    <span class="bg-blue-100 text-blue-700 text-xs px-2 py-0.5 rounded-full ml-1">IQ</span>
                                @endif
                                @if($application->disc_test_file)
                                    <span class="bg-purple-100 text-purple-700 text-xs px-2 py-0.5 rounded-full ml-1">DISC</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    @endif

                    {{-- Tes dimulai --}}
                    @if($application->test_started_at)
                    <div class="relative flex gap-4 timeline-item">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 shrink-0 z-10">
                            <i class="fas fa-laptop text-sm"></i>
                        </div>
                        <div class="pb-6">
                            <p class="font-medium text-gray-800 text-sm">Tes Online Dimulai</p>
                            <p class="text-xs text-gray-500 mt-0.5">
                                {{ \Carbon\Carbon::parse($application->test_started_at)->format('d M Y, H:i') }}
                            </p>
                            <p class="text-sm text-gray-600 mt-1">Pelamar membuka halaman tes online</p>
                        </div>
                    </div>
                    @endif

                    {{-- Jawaban dikirim --}}
                    {{-- PERBAIKAN: cek answer_iq_file atau answer_disc_file --}}
                    @if($application->answer_iq_file || $application->answer_disc_file)
                    <div class="relative flex gap-4 timeline-item">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 shrink-0 z-10">
                            <i class="fas fa-check text-sm"></i>
                        </div>
                        <div class="pb-4">
                            <p class="font-medium text-gray-800 text-sm">Jawaban Dikirim</p>
                            <p class="text-xs text-gray-500 mt-0.5">
                                {{ $application->test_completed_at
                                    ? \Carbon\Carbon::parse($application->test_completed_at)->format('d M Y, H:i')
                                    : $application->updated_at->format('d M Y, H:i') }}
                            </p>
                            <p class="text-sm text-gray-600 mt-1">
                                Pelamar berhasil mengirim:
                                @if($application->answer_iq_file)
                                    <span class="bg-blue-100 text-blue-700 text-xs px-2 py-0.5 rounded-full ml-1">Jawaban IQ</span>
                                @endif
                                @if($application->answer_disc_file)
                                    <span class="bg-purple-100 text-purple-700 text-xs px-2 py-0.5 rounded-full ml-1">Jawaban DISC</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>

        {{-- ===== KOLOM KANAN (1/3) ===== --}}
        <div class="lg:col-span-1 space-y-6">

            {{-- Aksi Status HRD --}}
            <div class="bg-white rounded-3xl shadow p-6">
                <h3 class="font-semibold text-gray-800 mb-4">
                    <i class="fas fa-tasks text-gray-400 mr-2"></i> Aksi HRD
                </h3>
                <div class="space-y-3">
                    {{-- Shortlist --}}
                    @if($application->status === 'pending')
                    <form action="{{ route('admin.job-applications.shortlist', $application) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-2xl font-medium text-sm transition flex items-center justify-center gap-2">
                            <i class="fas fa-star"></i> Shortlist Pelamar
                        </button>
                    </form>
                    @endif

                    {{-- Terima --}}
                    @if(!in_array($application->status, ['accepted','rejected']))
                    <form action="{{ route('admin.job-applications.accept', $application) }}" method="POST">
                        @csrf
                        <button type="submit"
                                onclick="return confirm('Yakin menerima pelamar ini?')"
                                class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-2xl font-medium text-sm transition flex items-center justify-center gap-2">
                            <i class="fas fa-check-circle"></i> Terima Pelamar
                        </button>
                    </form>
                    @endif

                    {{-- Tolak --}}
                    @if($application->status !== 'rejected')
                    <form action="{{ route('admin.job-applications.reject', $application) }}" method="POST">
                        @csrf
                        <button type="submit"
                                onclick="return confirm('Yakin menolak pelamar ini?')"
                                class="w-full bg-red-50 hover:bg-red-100 text-red-600 py-3 rounded-2xl font-medium text-sm transition flex items-center justify-center gap-2 border border-red-200">
                            <i class="fas fa-times-circle"></i> Tolak Pelamar
                        </button>
                    </form>
                    @endif
                </div>
            </div>

            {{-- Kirim Link Tes --}}
            @if($application->iq_test_file || $application->disc_test_file)
            <div class="bg-white rounded-3xl shadow p-6">
                <h3 class="font-semibold text-gray-800 mb-1">
                    <i class="fas fa-paper-plane text-gray-400 mr-2"></i> Kirim Link Tes
                </h3>
                <p class="text-xs text-gray-500 mb-4">Link tes akan dikirim ke email pelamar</p>
                <div class="bg-gray-50 rounded-xl p-3 text-xs text-gray-600 font-mono break-all mb-4">
                    {{ url('/test/' . $application->id) }}
                </div>
                <form action="{{ route('admin.job-applications.send-test-link', $application) }}" method="POST">
                    @csrf
                    <button type="submit"
                            onclick="return confirm('Kirim link tes ke {{ $application->email }}?')"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-2xl font-medium text-sm transition flex items-center justify-center gap-2">
                        <i class="fas fa-envelope"></i> Kirim ke {{ $application->email }}
                    </button>
                </form>
            </div>
            @endif

            {{-- Upload Soal + Durasi --}}
            <div class="bg-white rounded-3xl shadow p-6">
                <h3 class="font-semibold text-gray-800 mb-4">
                    <i class="fas fa-upload text-gray-400 mr-2"></i> Upload Soal Tes
                </h3>
                <form action="{{ route('admin.job-applications.upload-tests', $application) }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Durasi --}}
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-clock text-gray-400 mr-1"></i> Durasi Tes (menit)
                        </label>
                        <input type="number" name="test_duration" min="10" max="180"
                               value="{{ $application->test_duration ?? 60 }}"
                               class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        <p class="text-xs text-gray-400 mt-1">Default: 60 menit</p>
                    </div>

                    {{-- Soal IQ --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Soal IQ (PDF)</label>
                        <input type="file" name="iq_test_file" accept=".pdf"
                               class="w-full text-sm border border-gray-200 rounded-xl p-3 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-600 file:text-xs">
                        @if($application->iq_test_file)
                        <div class="flex items-center justify-between mt-2">
                            <p class="text-green-600 text-xs flex items-center gap-1">
                                <i class="fas fa-check-circle"></i> Sudah diupload
                            </p>
                            <a href="{{ Storage::url($application->iq_test_file) }}" target="_blank"
                               class="text-xs text-blue-600 hover:underline">Lihat file</a>
                        </div>
                        @endif
                    </div>

                    {{-- Soal DISC --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Soal DISC (PDF)</label>
                        <input type="file" name="disc_test_file" accept=".pdf"
                               class="w-full text-sm border border-gray-200 rounded-xl p-3 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-600 file:text-xs">
                        @if($application->disc_test_file)
                        <div class="flex items-center justify-between mt-2">
                            <p class="text-green-600 text-xs flex items-center gap-1">
                                <i class="fas fa-check-circle"></i> Sudah diupload
                            </p>
                            <a href="{{ Storage::url($application->disc_test_file) }}" target="_blank"
                               class="text-xs text-purple-600 hover:underline">Lihat file</a>
                        </div>
                        @endif
                    </div>

                    <button type="submit"
                            class="w-full bg-gray-800 hover:bg-gray-900 text-white py-3 rounded-2xl font-medium text-sm transition flex items-center justify-center gap-2">
                        <i class="fas fa-save"></i> Simpan & Upload
                    </button>
                </form>
            </div>

            {{-- Reset Tes --}}
            @if($application->test_started_at)
            <div class="bg-white rounded-3xl shadow p-6">
                <h3 class="font-semibold text-gray-800 mb-1">
                    <i class="fas fa-redo text-gray-400 mr-2"></i> Reset Tes
                </h3>
                <p class="text-xs text-gray-500 mb-4">Reset timer dan jawaban pelamar jika perlu mengulang tes</p>
                <form action="{{ route('admin.job-applications.reset-test', $application) }}" method="POST">
                    @csrf
                    <button type="submit"
                            onclick="return confirm('Reset tes pelamar ini? Timer dan jawaban akan dihapus.')"
                            class="w-full bg-orange-50 hover:bg-orange-100 text-orange-600 py-3 rounded-2xl font-medium text-sm transition border border-orange-200">
                        <i class="fas fa-redo mr-1"></i> Reset Tes Pelamar
                    </button>
                </form>
            </div>
            @endif

            {{-- Hapus --}}
            <div class="bg-white rounded-3xl shadow p-6">
                <h3 class="font-semibold text-red-600 mb-1">
                    <i class="fas fa-trash text-red-400 mr-2"></i> Zona Berbahaya
                </h3>
                <p class="text-xs text-gray-500 mb-4">Tindakan ini tidak dapat dibatalkan</p>
                <form action="{{ route('admin.job-applications.destroy', $application) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Yakin ingin menghapus data pelamar {{ $application->name }}? Data tidak bisa dikembalikan.')"
                            class="w-full text-red-600 hover:bg-red-50 border border-red-200 py-3 rounded-2xl font-medium text-sm transition">
                        Hapus Permanen Data Pelamar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
    function switchTab(tab) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('border-blue-600', 'text-blue-600');
            btn.classList.add('border-transparent', 'text-gray-500');
        });
        document.getElementById('content-' + tab).classList.add('active');
        const activeBtn = document.getElementById('tab-' + tab);
        activeBtn.classList.add('border-blue-600', 'text-blue-600');
        activeBtn.classList.remove('border-transparent', 'text-gray-500');
    }
</script>
@endpush
@endsection