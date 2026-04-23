@extends('layouts.app')

@section('title', 'Detail Pelamar - ' . $jobApplication->name)

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <a href="{{ route('admin.jobs.index') }}" class="text-blue-600 hover:underline mb-6 inline-block">← Kembali ke Daftar Pelamar</a>

    <div class="bg-white rounded-3xl shadow-xl p-10">

        <h1 class="text-3xl font-bold mb-6">Detail Pelamar</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Kolom Kiri - Info Pelamar -->
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-gray-50 rounded-3xl p-8">
                    <h2 class="text-2xl font-semibold mb-6">{{ $jobApplication->name }}</h2>
                    <div class="grid grid-cols-2 gap-6 text-sm">
                        <div>
                            <span class="text-gray-500">Email</span>
                            <p class="font-medium">{{ $jobApplication->email }}</p>
                        </div>
                        <div>
                            <span class="text-gray-500">Telepon</span>
                            <p class="font-medium">{{ $jobApplication->phone }}</p>
                        </div>
                        <div>
                            <span class="text-gray-500">Pendidikan</span>
                            <p class="font-medium">{{ $jobApplication->education }}</p>
                        </div>
                        <div>
                            <span class="text-gray-500">Status</span>
                            <span class="inline-block px-4 py-1 rounded-full text-xs font-semibold 
                                {{ $jobApplication->status == 'test' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                                {{ ucfirst($jobApplication->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- CV -->
                @if($jobApplication->cv_path)
                <div class="bg-white border border-gray-200 rounded-3xl p-8">
                    <h3 class="font-semibold mb-4">Curriculum Vitae</h3>
                    <a href="{{ Storage::url($jobApplication->cv_path) }}" target="_blank"
                       class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-2xl hover:bg-blue-700">
                        <i class="fas fa-download"></i> Download CV
                    </a>
                </div>
                @endif
            </div>

            <!-- Kolom Kanan - Aksi HRD -->
            <div class="space-y-6">

                <!-- Link Test Online -->
                <div class="bg-white border border-gray-200 rounded-3xl p-8">
                    <h3 class="font-semibold mb-4 flex items-center gap-2">
                        <i class="fas fa-link text-indigo-600"></i> Link Tes Online
                    </h3>
                    
                    @if($jobApplication->status == 'test')
                        <div class="bg-green-50 border border-green-200 rounded-2xl p-5 mb-6">
                            <p class="text-sm text-green-700 font-medium">Link Tes Sudah Aktif</p>
                            <div class="mt-3 p-3 bg-white rounded-xl border border-green-100 font-mono text-xs break-all">
                                {{ url('/test/' . $jobApplication->id) }}
                            </div>
                            <p class="text-xs text-gray-500 mt-3">Kirim link ini ke pelamar via WhatsApp atau Email</p>
                        </div>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Ubah status ke "Test" terlebih dahulu untuk mengaktifkan link tes.</p>
                    @endif

                    <a href="https://wa.me/6282281877406?text=<?= urlencode('Link tes online: ' . url('/test/' . $jobApplication->id)) ?>" 
                       target="_blank"
                       class="block w-full text-center bg-green-600 hover:bg-green-700 text-white py-4 rounded-2xl font-medium">
                        Kirim via WhatsApp
                    </a>
                </div>

                <!-- Input Soal -->
                <div class="bg-white border border-gray-200 rounded-3xl p-8">
                    <h3 class="font-semibold mb-4">Input Soal Tes</h3>
                    <form action="{{ route('admin.applications.test', $jobApplication) }}" method="POST">
                        @csrf
                        <textarea name="test_questions" class="w-full h-40 border border-gray-300 rounded-2xl p-4" placeholder="Masukkan soal tes di sini..."></textarea>
                        <button type="submit" class="mt-4 w-full bg-indigo-600 text-white py-4 rounded-2xl font-medium">
                            Simpan Soal Tes
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection