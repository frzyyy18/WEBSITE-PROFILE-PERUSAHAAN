@extends('layouts.app')

@section('title', 'Visi & Misi - CV. Sriwijaya Serangkai')

@section('content')

<!-- Hero -->
<section class="bg-gradient-to-br from-blue-800 to-indigo-900 text-white py-24">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <div class="inline-flex items-center gap-3 bg-white/10 backdrop-blur-md px-6 py-2 rounded-full mb-6">
            <span class="text-amber-300">★</span>
            <span class="text-sm font-semibold tracking-widest">VISI & MISI</span>
        </div>
        <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
            Visi & Misi Kami
        </h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">
            Fondasi nilai yang menjadi pedoman setiap langkah CV. Sriwijaya Serangkai
        </p>
    </div>
</section>

<div class="max-w-6xl mx-auto px-6 py-20">

    <!-- Sejarah Singkat -->
    <div class="max-w-3xl mx-auto text-center mb-20">
        <p class="text-lg text-gray-700 leading-relaxed">
            CV. Sriwijaya Serangkai berdiri sejak <strong>14 Februari 2012</strong>. 
            Sejak hari pertama, kami selalu menjunjung tinggi profesionalisme, tanggung jawab, 
            dan komitmen untuk memberikan pelayanan terbaik kepada mitra dan konsumen.
        </p>
    </div>

    <!-- Visi -->
    <div class="mb-24">
        <div class="flex justify-center mb-10">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-10 py-3 rounded-2xl font-semibold text-lg shadow-md">
                VISI KAMI
            </div>
        </div>
        
        <div class="bg-white rounded-3xl shadow-2xl p-12 md:p-16">
            <ul class="space-y-8 text-lg text-gray-700">
                <li class="flex gap-5">
                    <span class="text-3xl text-blue-600 mt-1">01</span>
                    <div>
                        Menjadi perusahaan distribusi FMCG terbesar, terpercaya, dan paling kompetitif di wilayah Sumatera Selatan.
                    </div>
                </li>
                <li class="flex gap-5">
                    <span class="text-3xl text-blue-600 mt-1">02</span>
                    <div>
                        Menjadi perusahaan yang unggul dalam efisiensi rantai pasok dan kualitas layanan pelanggan.
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Misi -->
    <div>
        <div class="flex justify-center mb-10">
            <div class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-10 py-3 rounded-2xl font-semibold text-lg shadow-md">
                MISI KAMI
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white rounded-3xl shadow-xl p-10 hover:shadow-2xl transition-all">
                <div class="flex items-start gap-5">
                    <div class="w-10 h-10 flex-shrink-0 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center text-2xl font-bold">1</div>
                    <div>
                        <h3 class="font-semibold text-xl mb-3">Distribusi Efisien</h3>
                        <p class="text-gray-600">Menerapkan sistem distribusi yang efektif dan efisien untuk memastikan ketersediaan produk di seluruh jaringan pasar.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-xl p-10 hover:shadow-2xl transition-all">
                <div class="flex items-start gap-5">
                    <div class="w-10 h-10 flex-shrink-0 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center text-2xl font-bold">2</div>
                    <div>
                        <h3 class="font-semibold text-xl mb-3">Pelayanan Optimal</h3>
                        <p class="text-gray-600">Memberikan pelayanan yang profesional dan optimal kepada seluruh pelanggan dan mitra bisnis demi kepuasan maksimal.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-xl p-10 hover:shadow-2xl transition-all">
                <div class="flex items-start gap-5">
                    <div class="w-10 h-10 flex-shrink-0 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center text-2xl font-bold">3</div>
                    <div>
                        <h3 class="font-semibold text-xl mb-3">Kualitas Terjamin</h3>
                        <p class="text-gray-600">Menjamin produk yang didistribusikan selalu aman, berkualitas, dan sampai ke konsumen dalam kondisi terbaik.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-xl p-10 hover:shadow-2xl transition-all">
                <div class="flex items-start gap-5">
                    <div class="w-10 h-10 flex-shrink-0 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center text-2xl font-bold">4</div>
                    <div>
                        <h3 class="font-semibold text-xl mb-3">Pengembangan SDM</h3>
                        <p class="text-gray-600">Mengembangkan sumber daya manusia yang kompeten, berintegritas, dan inovatif sebagai aset utama perusahaan.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-xl p-10 hover:shadow-2xl transition-all md:col-span-2">
                <div class="flex items-start gap-5">
                    <div class="w-10 h-10 flex-shrink-0 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center text-2xl font-bold">5</div>
                    <div>
                        <h3 class="font-semibold text-xl mb-3">Etika Bisnis</h3>
                        <p class="text-gray-600">Menjunjung tinggi kaidah dan etika bisnis dalam setiap aspek operasional perusahaan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Penutup Inspiratif -->
    <div class="mt-24 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-12 md:p-16 text-center">
        <p class="text-xl text-gray-700 italic max-w-3xl mx-auto leading-relaxed">
            Dengan keyakinan bahwa bisnis harus menjadi katalis perubahan positif, 
            kami terus berupaya memberikan kontribusi terbaik bagi mitra, konsumen, 
            dan masyarakat Sumatera Selatan.
        </p>
        <div class="mt-10 text-blue-600 font-medium">— Manajemen CV. Sriwijaya Serangkai —</div>
    </div>

</div>

@endsection