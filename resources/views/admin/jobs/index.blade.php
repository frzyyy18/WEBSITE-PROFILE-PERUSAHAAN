@extends('layouts.app')

@section('title', 'Admin - Daftar Lowongan & Pelamar')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <h1 class="text-3xl font-bold mb-8">Admin Panel - Lowongan Kerja</h1>

    <!-- Daftar Lowongan -->
    <div class="mb-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Daftar Lowongan</h2>
            <a href="{{ route('admin.jobs.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-xl hover:bg-blue-700">
                + Tambah Lowongan Baru
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left">Judul Lowongan</th>
                        <th class="px-6 py-4 text-left">Lokasi</th>
                        <th class="px-6 py-4 text-left">Deadline</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobs as $job)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-6 py-5 font-medium">{{ $job->title }}</td>
                        <td class="px-6 py-5 text-gray-600">{{ $job->location }}</td>
                        <td class="px-6 py-5 text-gray-600">{{ $job->deadline->format('d M Y') }}</td>
                        <td class="px-6 py-5 text-center">
                            @if($job->is_active)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Aktif</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-6 py-5 text-center">
                            <a href="{{ route('admin.jobs.edit', $job) }}" class="text-blue-600 hover:text-blue-800 mr-4">Edit</a>
                            <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus lowongan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">Belum ada lowongan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Daftar Pelamar -->
    <div>
        <h2 class="text-2xl font-semibold mb-6">Daftar Pelamar</h2>

        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left">Nama Pelamar</th>
                        <th class="px-6 py-4 text-left">Lowongan</th>
                        <th class="px-6 py-4 text-left">Email</th>
                        <th class="px-6 py-4 text-left">Tanggal Lamaran</th>
                        <th class="px-6 py-4 text-center">CV</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $app)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-6 py-5 font-medium">{{ $app->name }}</td>
                        <td class="px-6 py-5">{{ $app->job->title ?? '-' }}</td>
                        <td class="px-6 py-5 text-gray-600">{{ $app->email }}</td>
                        <td class="px-6 py-5 text-gray-600">{{ $app->created_at->format('d M Y H:i') }}</td>
                        <td class="px-6 py-5 text-center">
                            @if($app->cv_path)
                                <a href="{{ Storage::url($app->cv_path) }}" target="_blank" 
                                   class="text-blue-600 hover:underline">Download CV</a>
                            @else
                                <span class="text-gray-400">Tidak ada CV</span>
                            @endif
                        </td>
                        <td class="px-6 py-5 text-center">
                            <!-- Tombol Delete Pelamar -->
                            <form action="{{ route('admin.job-applications.destroy', $app) }}" method="POST" 
                                  onsubmit="return confirm('Yakin ingin menghapus data pelamar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">Belum ada pelamar</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection