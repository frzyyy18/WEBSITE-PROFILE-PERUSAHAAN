@extends('layouts.app')

@section('title', 'Lowongan Kerja - CV. Sriwijaya Serangkai')

@section('content')

<!-- Hero Lowongan -->
<section class="bg-gradient-to-r from-blue-700 to-indigo-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Lowongan Kerja</h1>
        <p class="text-xl text-blue-100">Bergabunglah dengan Tim CV. Sriwijaya Serangkai</p>
    </div>
</section>

<div class="max-w-7xl mx-auto px-6 py-16">

    @if($jobs->isEmpty())
        <div class="text-center py-20">
            <p class="text-2xl text-gray-500">Maaf, saat ini belum ada lowongan kerja yang tersedia.</p>
            <p class="text-gray-400 mt-4">Silakan kunjungi halaman ini lagi nanti.</p>
        </div>
    @else
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($jobs as $job)
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $job->title }}</h3>
                    
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-6">
                        <div class="flex items-center gap-1">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $job->location }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-calendar"></i>
                            <span>Deadline: {{ $job->deadline->format('d M Y') }}</span>
                        </div>
                    </div>

                    <div class="text-gray-600 line-clamp-3 mb-8">
                        {!! Str::limit(nl2br(e($job->description)), 180) !!}
                    </div>

                    <a href="{{ route('lowongan.show', $job->slug) }}" 
                       class="block text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 rounded-2xl transition">
                        Lihat Detail & Lamar
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    @endif

</div>

@endsection