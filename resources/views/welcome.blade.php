@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-700 via-blue-800 to-indigo-900 text-white py-24 md:py-32">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
            Distributor Resmi<br>Produk Unilever
        </h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto mb-10 text-blue-100">
            Menyalurkan kualitas terbaik ke seluruh wilayah Palembang dan Sumatera Selatan
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/produk" class="btn btn-primary btn-lg text-lg px-10">Lihat Produk Kami</a>
            <a href="/lowongan" class="btn btn-outline btn-lg text-lg px-10 border-white text-white hover:bg-white hover:text-blue-700">Lowongan Kerja</a>
        </div>
    </div>
</section>

<!-- Tentang Kami -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-800 mb-6">Tentang Kami</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    CV. Sriwijaya Serangkai adalah distributor resmi produk Unilever di wilayah Sumatera Selatan. 
                    Kami berkomitmen menyediakan produk berkualitas tinggi dengan distribusi yang cepat dan terpercaya.
                </p>
                <a href="/visi-misi" class="text-blue-600 font-semibold flex items-center gap-2">
                    Baca Visi & Misi Kami <span class="text-xl">→</span>
                </a>
            </div>
          <div class="rounded-3xl overflow-hidden shadow-2xl h-80 md:h-96">
    <img src="{{ asset('assets/images/gedung.jpeg') }}" 
         alt="Gedung Kantor PT. Nama Perusahaan"
         class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
        </div>
    </div>
</div>
</section>

<!-- Lokasi -->
<section class="py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-4">Lokasi Kami</h2>
        <p class="text-gray-600 mb-10">Jl. Sapta Marga No.23, Bukit Sangkal, Kec. Kalidoni, Kota Palembang, Sumatera Selatan 30163</p>
        
        <div class="bg-white rounded-3xl overflow-hidden shadow-xl h-96">
            <!-- Google Maps Embed - ganti dengan link maps kamu nanti -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d474.4810845229236!2d104.78003540367759!3d-2.9403444947297532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b77007f4ad421%3A0x57dc54b72241975f!2sCV.%20Sriwijaya%20Serangkai!5e0!3m2!1sen!2sid!4v1776055546475!5m2!1sen!2sid" 
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>
@endsection