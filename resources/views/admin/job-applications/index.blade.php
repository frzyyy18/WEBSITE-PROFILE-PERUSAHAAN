@extends('layouts.app')

@section('title', 'Daftar Pelamar')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Daftar Pelamar</h1>
            <p class="text-gray-500 mt-1">Total {{ $applications->count() }} pelamar masuk</p>
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

    {{-- Filter Status --}}
    <div class="flex flex-wrap gap-2 mb-6">
        <button onclick="filterStatus('all')" id="btn-all"
                class="filter-btn px-4 py-2 rounded-full text-sm font-medium bg-gray-800 text-white">
            Semua ({{ $applications->count() }})
        </button>
        @foreach(['pending' => 'Pending', 'shortlist' => 'Shortlist', 'test' => 'Tes Online', 'accepted' => 'Diterima', 'rejected' => 'Ditolak'] as $key => $label)
        <button onclick="filterStatus('{{ $key }}')" id="btn-{{ $key }}"
                class="filter-btn px-4 py-2 rounded-full text-sm font-medium bg-gray-100 text-gray-600 hover:bg-gray-200">
            {{ $label }} ({{ $applications->where('status', $key)->count() }})
        </button>
        @endforeach
    </div>

    {{-- Tabel Pelamar --}}
    <div class="bg-white rounded-3xl shadow overflow-hidden">
        @if($applications->isEmpty())
            <div class="text-center py-20 text-gray-400">
                <i class="fas fa-users text-5xl mb-4"></i>
                <p class="text-lg">Belum ada pelamar masuk</p>
            </div>
        @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="text-left px-6 py-4 font-semibold text-gray-600">#</th>
                        <th class="text-left px-6 py-4 font-semibold text-gray-600">Nama Pelamar</th>
                        <th class="text-left px-6 py-4 font-semibold text-gray-600">Posisi</th>
                        <th class="text-left px-6 py-4 font-semibold text-gray-600">Pendidikan</th>
                        <th class="text-left px-6 py-4 font-semibold text-gray-600">Tanggal</th>
                        <th class="text-left px-6 py-4 font-semibold text-gray-600">Status</th>
                        <th class="text-left px-6 py-4 font-semibold text-gray-600">Jawaban</th>
                        <th class="text-left px-6 py-4 font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50" id="applicantTable">
                    @foreach($applications as $i => $app)
                    <tr class="hover:bg-gray-50 transition applicant-row" data-status="{{ $app->status }}">
                        <td class="px-6 py-4 text-gray-400">{{ $i + 1 }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-sm shrink-0">
                                    {{ strtoupper(substr($app->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $app->name }}</p>
                                    <p class="text-gray-400 text-xs">{{ $app->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-700">{{ $app->job->title ?? '-' }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $app->education }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $app->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            @php
                                $statusClass = match($app->status) {
                                    'shortlist', 'reviewed' => 'bg-blue-100 text-blue-700',
                                    'rejected'              => 'bg-red-100 text-red-700',
                                    'accepted'              => 'bg-green-100 text-green-700',
                                    'test'                  => 'bg-purple-100 text-purple-700',
                                    default                 => 'bg-yellow-100 text-yellow-700'
                                };
                                $statusLabel = match($app->status) {
                                    'pending'   => 'Pending',
                                    'reviewed'  => 'Reviewed',
                                    'shortlist' => 'Shortlist',
                                    'test'      => 'Tes Online',
                                    'accepted'  => 'Diterima',
                                    'rejected'  => 'Ditolak',
                                    default     => ucfirst($app->status)
                                };
                            @endphp
                            <span class="{{ $statusClass }} px-3 py-1 rounded-full text-xs font-medium">
                                {{ $statusLabel }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($app->answer_file)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">
                                    <i class="fas fa-check mr-1"></i> Sudah
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-xs font-medium">
                                    Belum
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.job-applications.show', $app) }}"
                               class="inline-flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-xs font-medium transition">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

</div>

@push('scripts')
<script>
    function filterStatus(status) {
        // Update tombol aktif
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('bg-gray-800', 'text-white');
            btn.classList.add('bg-gray-100', 'text-gray-600');
        });
        document.getElementById('btn-' + status).classList.add('bg-gray-800', 'text-white');
        document.getElementById('btn-' + status).classList.remove('bg-gray-100', 'text-gray-600');

        // Filter baris tabel
        document.querySelectorAll('.applicant-row').forEach(row => {
            if (status === 'all' || row.dataset.status === status) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
@endpush

@endsection