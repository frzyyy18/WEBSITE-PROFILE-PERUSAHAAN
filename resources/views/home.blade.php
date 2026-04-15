@extends('layouts.app')

@section('title', 'CV. Sriwijaya Serangkai - Distributor Resmi Unilever')

@section('content')

{{-- ===== HERO ===== --}}
<section class="relative min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center bg-fixed"
         style="background-image: url('{{ asset('assets/images/gedung.jpeg') }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-blue-950/80 via-black/60 to-blue-900/70"></div>

    <div class="absolute top-20 right-20 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-10 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6 text-center z-10 pt-24 pb-32">
        <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-5 py-2 rounded-full mb-8 text-sm font-medium text-white">
            <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
            Distributor Resmi Unilever
        </div>

        <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold leading-none mb-6 text-white tracking-tight">
            CV. Sriwijaya<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 to-amber-500">Serangkai</span>
        </h1>

        <p class="text-lg md:text-xl text-blue-100/90 max-w-2xl mx-auto mb-12 leading-relaxed">
            Menyalurkan kualitas terbaik Unilever sejak <strong class="text-white">14 Februari 2012</strong>
            untuk seluruh wilayah Palembang dan Sumatera Selatan.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/produk"
               class="group bg-white text-blue-900 hover:bg-amber-400 hover:text-white font-bold text-base px-10 py-4 rounded-2xl shadow-2xl transition-all duration-300 flex items-center justify-center gap-2">
                <span>Lihat Produk Kami</span>
                <span class="group-hover:translate-x-1 transition-transform">→</span>
            </a>
            <a href="/lowongan"
               class="border-2 border-white/70 text-white hover:bg-white hover:text-blue-900 font-bold text-base px-10 py-4 rounded-2xl transition-all duration-300 backdrop-blur-sm">
                Lowongan Kerja
            </a>
        </div>

        <div class="mt-20 grid grid-cols-3 gap-6 max-w-2xl mx-auto border border-white/10 bg-white/5 backdrop-blur-md rounded-3xl px-8 py-6">
            <div>
                <div class="text-3xl font-extrabold text-white">13+</div>
                <div class="text-xs text-blue-200 mt-1">Tahun Berpengalaman</div>
            </div>
            <div class="border-x border-white/10">
                <div class="text-3xl font-extrabold text-white">500+</div>
                <div class="text-xs text-blue-200 mt-1">Mitra Aktif</div>
            </div>
            <div>
                <div class="text-3xl font-extrabold text-white">3</div>
                <div class="text-xs text-blue-200 mt-1">Cabang Operasional</div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 text-white/50 flex flex-col items-center gap-2 animate-bounce">
        <span class="text-[10px] tracking-widest uppercase">Scroll</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</section>


{{-- ===== TENTANG KAMI ===== --}}
<section class="py-28 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-20 items-center">
            <div>
                <span class="inline-block bg-blue-50 text-blue-700 text-sm font-semibold px-5 py-2 rounded-full mb-6">
                    Sejak 2012
                </span>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                    Distributor Unilever<br>yang Terpercaya
                </h2>
                <p class="text-gray-500 text-base leading-relaxed mb-8">
                    CV. Sriwijaya Serangkai berdiri sejak <strong class="text-gray-700">14 Februari 2012</strong> sebagai
                    distributor resmi produk Unilever di wilayah Palembang dan Sumatera Selatan.
                    Kami berkomitmen memberikan pelayanan terbaik, distribusi cepat, dan produk berkualitas tinggi
                    kepada seluruh mitra bisnis kami.
                </p>

                <ul class="space-y-3 mb-10">
                    @foreach(['Distributor resmi & bersertifikat Unilever', 'Jangkauan distribusi seluruh Sumsel', 'Tim profesional berpengalaman', 'Armada pengiriman lengkap'] as $point)
                    <li class="flex items-center gap-3 text-gray-600">
                        <span class="w-5 h-5 bg-emerald-500 text-white rounded-full flex items-center justify-center flex-shrink-0 text-xs">✓</span>
                        {{ $point }}
                    </li>
                    @endforeach
                </ul>

                <a href="/visi-misi"
                   class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:gap-4 transition-all duration-300">
                    Baca Visi &amp; Misi Kami <span class="text-xl">→</span>
                </a>
            </div>

            <div class="relative">
                <div class="rounded-3xl overflow-hidden shadow-2xl">
                    {{-- PERBAIKAN: skeleton loading state untuk gambar --}}
                    <div class="img-wrapper relative w-full h-[480px] bg-gray-200 rounded-3xl overflow-hidden">
                        <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                        <img src="{{ asset('assets/images/produk1.jpg') }}"
                             alt="Gudang dan operasional CV. Sriwijaya Serangkai"
                             loading="lazy"
                             class="img-lazy w-full h-full object-cover opacity-0 transition-opacity duration-500">
                    </div>
                </div>
                <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl shadow-xl px-6 py-4 flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white text-xl">🏆</div>
                    <div>
                        <div class="font-bold text-gray-900 text-sm">Distributor Terpercaya</div>
                        <div class="text-xs text-gray-500">Unilever Indonesia</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ===== KEUNGGULAN ===== --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <span class="inline-block bg-amber-50 text-amber-700 text-sm font-semibold px-5 py-2 rounded-full mb-4">Keunggulan Kami</span>
            <h2 class="text-4xl font-extrabold text-gray-900">Mengapa Memilih Kami?</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @php
            $keunggulan = [
                ['icon' => '🚚', 'title' => 'Distribusi Cepat',        'desc' => 'Pengiriman tepat waktu dengan armada lengkap ke seluruh wilayah Palembang dan Sumatera Selatan.'],
                ['icon' => '🏷️', 'title' => 'Harga Distributor',       'desc' => 'Harga terbaik langsung dari distributor resmi Unilever dengan volume fleksibel.'],
                ['icon' => '✅', 'title' => 'Produk Terjamin',          'desc' => '100% original Unilever dengan sertifikat halal MUI dan garansi kualitas penuh.'],
                ['icon' => '🤝', 'title' => 'Kemitraan Jangka Panjang','desc' => 'Program loyalitas dan dukungan penuh untuk mitra bisnis kami berkembang bersama.'],
                ['icon' => '📦', 'title' => 'Stok Selalu Tersedia',     'desc' => 'Gudang kapasitas besar memastikan ketersediaan stok produk Unilever setiap saat.'],
                ['icon' => '📞', 'title' => 'Layanan Pelanggan',        'desc' => 'Tim customer service siap membantu kebutuhan Anda setiap hari kerja.'],
            ];
            @endphp

            @foreach($keunggulan as $item)
            <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 group border border-gray-100 hover:border-blue-100">
                <div class="text-5xl mb-5 group-hover:scale-110 transition-transform duration-300 inline-block">
                    {{ $item['icon'] }}
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $item['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ===== CABANG PERUSAHAAN ===== --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <span class="inline-block bg-blue-50 text-blue-700 text-sm font-semibold px-5 py-2 rounded-full mb-4">Lokasi Kami</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mb-3">Cabang Perusahaan</h2>
            <p class="text-gray-500 max-w-md mx-auto">Hadir di lokasi strategis untuk melayani Anda lebih cepat dan lebih baik.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            {{-- Palembang HQ --}}
            <div class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100">
                {{-- PERBAIKAN: skeleton loading untuk gambar cabang --}}
                <div class="img-wrapper relative h-56 overflow-hidden bg-gray-200">
                    <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                    <img src="{{ asset('assets/images/palembang.jpg') }}"
                         alt="Kantor cabang Sriwijaya Serangkai Prabumulih"
                         loading="lazy"
                         class="img-lazy w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-blue-900/20 group-hover:bg-blue-900/10 transition-all"></div>
                </div>
                <div class="p-7">
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <h3 class="font-bold text-xl text-gray-900 mb-1">Sriwijaya Serangkai Prabumulih</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">Jalan Bangau, Kelurahan Tugu Kecil, Kecamatan Prabumulih Timur, Kota Prabumulih.</p>
                        </div>
                        <span class="flex-shrink-0 text-xs bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full font-semibold">HQ</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-blue-600 font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        +62 811-777-9001
                    </div>
                </div>
            </div>

            {{-- Banyuasin Branch --}}
            <div class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100">
                {{-- PERBAIKAN: skeleton loading untuk gambar cabang --}}
                <div class="img-wrapper relative h-56 overflow-hidden bg-gray-200">
                    <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                    <img src="{{ asset('assets/images/jakarta.jpg') }}"
                         alt="Kantor cabang Sriwijaya Serangkai Banyuasin"
                         loading="lazy"
                         class="img-lazy w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-blue-900/20 group-hover:bg-blue-900/10 transition-all"></div>
                </div>
                <div class="p-7">
                    <div class="mb-4">
                        <h3 class="font-bold text-xl text-gray-900 mb-1">Sriwijaya Serangkai Banyuasin</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Gedung Sriwijaya, Jalan Palembang Betung, Sukaraja Baru, Kelurahan Sterio, Kecamatan Banyuasin III, Kabupaten Banyuasin, Sumatra Selatan.</p>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-blue-600 font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        +62 21 555-6789
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ===== KEGIATAN & AKTIVITAS ===== --}}
<section class="py-24 bg-gray-50" id="kegiatan">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <span class="inline-block bg-amber-50 text-amber-700 text-sm font-semibold px-5 py-2 rounded-full mb-4">
                Aktivitas Perusahaan
            </span>
            <h2 class="text-4xl font-extrabold text-gray-900 mb-3">Kegiatan &amp; Aktivitas</h2>
            <p class="text-gray-500 max-w-lg mx-auto">
                Berbagai kegiatan yang kami lakukan untuk mendukung pertumbuhan mitra dan masyarakat.
            </p>
        </div>

        {{-- Filter Tabs --}}
        <div class="flex flex-wrap justify-center gap-3 mb-12" id="filter-tabs">
            <button onclick="filterKegiatan('all')"
                    class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-blue-600 text-white"
                    data-filter="all">Semua</button>
            <button onclick="filterKegiatan('go-live')"
                    class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-white text-gray-600 border border-gray-200 hover:border-blue-300"
                    data-filter="go-live">GO Live</button>
            <button onclick="filterKegiatan('visit-ho')"
                    class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-white text-gray-600 border border-gray-200 hover:border-blue-300"
                    data-filter="visit-ho">Visit</button>
            <button onclick="filterKegiatan('sosial')"
                    class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-white text-gray-600 border border-gray-200 hover:border-blue-300"
                    data-filter="sosial">Sosial</button>
            <button onclick="filterKegiatan('kemitraan')"
                    class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-white text-gray-600 border border-gray-200 hover:border-blue-300"
                    data-filter="kemitraan">Kemitraan</button>
        </div>

        {{-- Grid Kegiatan --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="kegiatan-grid">

            {{-- ── Kegiatan 1 ── --}}
            <div class="kegiatan-card group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                 data-category="go-live">
                <div class="relative h-60 overflow-hidden bg-gray-200">
                    {{-- PERBAIKAN: skeleton + lazy load --}}
                    <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                    <img src="{{ asset('assets/images/kegiatan.jpeg') }}"
                         alt="GO Live Prabu Sriwijaya Serangkai General Trade"
                         loading="lazy"
                         class="img-lazy w-full h-full object-cover opacity-0 transition-all duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                    <span class="absolute top-4 left-4 bg-amber-400 text-white text-xs font-bold px-3 py-1 rounded-full">GO Live</span>
                </div>
                <div class="p-6">
                    <span class="text-xs text-gray-400 font-medium">MEI 2024</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-2 mb-3 leading-snug">
                        GO Live Prabu Sriwijaya Serangkai (General Trade)
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Peresmian pembukaan perusahaan Sriwijaya Serangkai Prabumulih yang dihadiri oleh jajaran direksi,
                        Asisten Manajer Unilever, tim sales, supervisor, dan SPG.
                    </p>
                </div>
            </div>

            {{-- ── Kegiatan 2 ── --}}
            <div class="kegiatan-card group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                 data-category="go-live">
                <div class="relative h-60 overflow-hidden bg-gray-200">
                    <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                    <img src="{{ asset('assets/images/kegiatan1.jpg') }}"
                         alt="GO Live Sriwijaya Serangkai Banyuasin General Trade"
                         loading="lazy"
                         class="img-lazy w-full h-full object-cover opacity-0 transition-all duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                    <span class="absolute top-4 left-4 bg-amber-400 text-white text-xs font-bold px-3 py-1 rounded-full">GO Live</span>
                </div>
                <div class="p-6">
                    <span class="text-xs text-gray-400 font-medium">MEI 2025</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-2 mb-3 leading-snug">
                        GO Live Sriwijaya Serangkai Banyuasin (General Trade)
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Peresmian pembukaan Sriwijaya Serangkai Banyuasin dihadiri direksi, wakil direksi,
                        Asisten Manajer Unilever, tim sales, supervisor, dan SPG.
                    </p>
                </div>
            </div>

            {{-- ── Kegiatan 3 — Visit HO Slider (8 foto) ── --}}
            <div class="kegiatan-card group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                 data-category="visit-ho">
                {{-- PERBAIKAN: data-slider + data-count untuk IntersectionObserver --}}
                <div class="relative h-60 overflow-hidden bg-gray-200"
                     id="slider-visitho"
                     data-slider="true"
                     data-count="8"
                     data-prefix="kegiatan3-"
                     data-ext=".jpeg"
                     data-alt="Visit HO Unilever">
                    <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                    {{-- Gambar pertama dimuat duluan (above the fold candidate) --}}
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-100">
                        <img src="{{ asset('assets/images/kegiatan3-1.jpeg') }}"
                             alt="Visit HO Unilever foto 1"
                             loading="lazy"
                             class="img-lazy w-full h-full object-cover opacity-0 transition-opacity duration-500">
                    </div>
                    {{-- Slide 2–8 dibuat kosong, diisi JS saat slider aktif --}}
                    @foreach(range(2, 8) as $i)
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-0" data-slide-index="{{ $i }}"></div>
                    @endforeach
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                    <span class="absolute top-4 left-4 bg-blue-400 text-white text-xs font-bold px-3 py-1 rounded-full">Visit HO</span>
                    <button onclick="prevGenericSlide('slider-visitho')" aria-label="Foto sebelumnya"
                            class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">←</button>
                    <button onclick="nextGenericSlide('slider-visitho')" aria-label="Foto berikutnya"
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">→</button>
                    {{-- Dot indicators --}}
                    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1 z-20 slider-dots"></div>
                </div>
                <div class="p-6">
                    <span class="text-xs text-gray-400 font-medium">MEI 2025</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-2 mb-3 leading-snug">
                        Visit HO UNILEVER — Galeri Foto
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Dokumentasi resmi kunjungan tim manajemen HO Unilever ke kantor Sriwijaya Serangkai.
                        Sebuah langkah besar dalam memperkuat kolaborasi dan ekspansi bisnis di Sumatera Selatan.
                    </p>
                </div>
            </div>

            {{-- ── Kegiatan 4 — GO Live Slider (4 foto) ── --}}
            <div class="kegiatan-card group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                 data-category="go-live">
                <div class="relative h-60 overflow-hidden bg-gray-200"
                     id="slider-golive4"
                     data-slider="true"
                     data-count="4"
                     data-prefix="kegiatan4-"
                     data-ext=".jpeg"
                     data-alt="GO Live Health and Beauty">
                    <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-100">
                        <img src="{{ asset('assets/images/kegiatan4-1.jpeg') }}"
                             alt="GO Live Health and Beauty foto 1"
                             loading="lazy"
                             class="img-lazy w-full h-full object-cover opacity-0 transition-opacity duration-500">
                    </div>
                    @foreach(range(2, 4) as $i)
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-0" data-slide-index="{{ $i }}"></div>
                    @endforeach
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                    <span class="absolute top-4 left-4 bg-amber-400 text-white text-xs font-bold px-3 py-1 rounded-full">GO Live</span>
                    <button onclick="prevGenericSlide('slider-golive4')" aria-label="Foto sebelumnya"
                            class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">←</button>
                    <button onclick="nextGenericSlide('slider-golive4')" aria-label="Foto berikutnya"
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">→</button>
                    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1 z-20 slider-dots"></div>
                </div>
                <div class="p-6">
                    <span class="text-xs text-gray-400 font-medium">MEI 2025</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-2 mb-3 leading-snug">
                        GO Live Health &amp; Beauty — Galeri Foto
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Dokumentasi pembukaan resmi cabang baru Sriwijaya Serangkai yang dihadiri oleh seluruh jajaran manajemen dan mitra Unilever.
                    </p>
                </div>
            </div>

            {{-- ── Kegiatan 5 — SSD Modern Trade ── --}}
            <div class="kegiatan-card group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                 data-category="go-live">
                <div class="relative h-60 overflow-hidden bg-gray-200">
                    <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                    <img src="{{ asset('assets/images/kegiatan5.jpeg') }}"
                         alt="GO Live PT SSD Modern Trade"
                         loading="lazy"
                         class="img-lazy w-full h-full object-cover opacity-0 transition-all duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                    <span class="absolute top-4 left-4 bg-amber-400 text-white text-xs font-bold px-3 py-1 rounded-full">GO Live</span>
                </div>
                <div class="p-6">
                    <span class="text-xs text-gray-400 font-medium">2025</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-2 mb-3 leading-snug">GO Live PT SSD Modern Trade</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Peresmian operasional PT SSD jalur Modern Trade yang memperluas jangkauan distribusi produk Unilever ke segmen ritel modern.
                    </p>
                </div>
            </div>

            {{-- ── Kegiatan 6 — Perpisahan ASM & Asmen (3 foto) ── --}}
            <div class="kegiatan-card group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                 data-category="kemitraan">
                <div class="relative h-60 overflow-hidden bg-gray-200"
                     id="slider-perpisahan"
                     data-slider="true"
                     data-count="3"
                     data-prefix="kegiatan6-"
                     data-ext=".jpeg"
                     data-alt="Perpisahan ASM dan Asmen">
                    <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-100">
                        <img src="{{ asset('assets/images/kegiatan6-1.jpeg') }}"
                             alt="Perpisahan ASM dan Asmen foto 1"
                             loading="lazy"
                             class="img-lazy w-full h-full object-cover opacity-0 transition-opacity duration-500">
                    </div>
                    @foreach(range(2, 3) as $i)
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-0" data-slide-index="{{ $i }}"></div>
                    @endforeach
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                    <span class="absolute top-4 left-4 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full">Perpisahan</span>
                    <button onclick="prevGenericSlide('slider-perpisahan')" aria-label="Foto sebelumnya"
                            class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">←</button>
                    <button onclick="nextGenericSlide('slider-perpisahan')" aria-label="Foto berikutnya"
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">→</button>
                    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1 z-20 slider-dots"></div>
                </div>
                <div class="p-6">
                    <span class="text-xs text-gray-400 font-medium">2025</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-2 mb-3 leading-snug">Perpisahan ASM &amp; Asmen</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Acara perpisahan yang hangat bersama ASM dan Asisten Manajer Unilever sebagai bentuk apresiasi atas kerja sama yang telah terjalin.
                    </p>
                </div>
            </div>

            {{-- ── Kegiatan 7 — Gathering Unilever (8 foto) ── --}}
            <div class="kegiatan-card group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                 data-category="kemitraan">
                <div class="relative h-60 overflow-hidden bg-gray-200"
                     id="slider-gathering"
                     data-slider="true"
                     data-count="8"
                     data-prefix="kegiatan7-"
                     data-ext=".jpeg"
                     data-alt="Gathering Unilever">
                    <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-100">
                        <img src="{{ asset('assets/images/kegiatan7-1.jpeg') }}"
                             alt="Gathering Unilever foto 1"
                             loading="lazy"
                             class="img-lazy w-full h-full object-cover opacity-0 transition-opacity duration-500">
                    </div>
                    @foreach(range(2, 8) as $i)
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-0" data-slide-index="{{ $i }}"></div>
                    @endforeach
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                    <span class="absolute top-4 left-4 bg-purple-500 text-white text-xs font-bold px-3 py-1 rounded-full">Gathering</span>
                    <button onclick="prevGenericSlide('slider-gathering')" aria-label="Foto sebelumnya"
                            class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">←</button>
                    <button onclick="nextGenericSlide('slider-gathering')" aria-label="Foto berikutnya"
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">→</button>
                    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1 z-20 slider-dots"></div>
                </div>
                <div class="p-6">
                    <span class="text-xs text-gray-400 font-medium">2025</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-2 mb-3">Gathering Unilever</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Kegiatan gathering bersama tim Unilever untuk mempererat hubungan dan menyelaraskan target distribusi tahun berjalan.
                    </p>
                </div>
            </div>

            {{-- ── Kegiatan 8 — Buka Bersama (8 foto) ── --}}
            <div class="kegiatan-card group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                 data-category="sosial">
                <div class="relative h-60 overflow-hidden bg-gray-200"
                     id="slider-bukber"
                     data-slider="true"
                     data-count="8"
                     data-prefix="kegiatan8-"
                     data-ext=".jpeg"
                     data-alt="Buka Bersama 2025">
                    <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-100">
                        <img src="{{ asset('assets/images/kegiatan8-1.jpeg') }}"
                             alt="Buka Bersama 2025 foto 1"
                             loading="lazy"
                             class="img-lazy w-full h-full object-cover opacity-0 transition-opacity duration-500">
                    </div>
                    @foreach(range(2, 8) as $i)
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-0" data-slide-index="{{ $i }}"></div>
                    @endforeach
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                    <span class="absolute top-4 left-4 bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full">Buka Bersama</span>
                    <button onclick="prevGenericSlide('slider-bukber')" aria-label="Foto sebelumnya"
                            class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">←</button>
                    <button onclick="nextGenericSlide('slider-bukber')" aria-label="Foto berikutnya"
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">→</button>
                    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1 z-20 slider-dots"></div>
                </div>
                <div class="p-6">
                    <span class="text-xs text-gray-400 font-medium">2025</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-2 mb-3">Buka Bersama 2025</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Momen kebersamaan seluruh tim Sriwijaya Serangkai dalam acara buka bersama yang penuh kehangatan dan kekeluargaan.
                    </p>
                </div>
            </div>

            {{-- ── Kegiatan 9 — SERKO (4 foto) ── --}}
            <div class="kegiatan-card group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                 data-category="kemitraan">
                <div class="relative h-60 overflow-hidden bg-gray-200"
                     id="slider-serko"
                     data-slider="true"
                     data-count="4"
                     data-prefix="kegiatan9-"
                     data-ext=".jpeg"
                     data-alt="SERKO Serbu Toko">
                    <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-100">
                        <img src="{{ asset('assets/images/kegiatan9-1.jpeg') }}"
                             alt="SERKO Serbu Toko foto 1"
                             loading="lazy"
                             class="img-lazy w-full h-full object-cover opacity-0 transition-opacity duration-500">
                    </div>
                    @foreach(range(2, 4) as $i)
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-0" data-slide-index="{{ $i }}"></div>
                    @endforeach
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                    <span class="absolute top-4 left-4 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">SERKO</span>
                    <button onclick="prevGenericSlide('slider-serko')" aria-label="Foto sebelumnya"
                            class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">←</button>
                    <button onclick="nextGenericSlide('slider-serko')" aria-label="Foto berikutnya"
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">→</button>
                    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1 z-20 slider-dots"></div>
                </div>
                <div class="p-6">
                    <span class="text-xs text-gray-400 font-medium">2025</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-2 mb-3">SERKO — Serbu Toko</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Kegiatan SERKO (Serbu Toko) bersama tim sales untuk meningkatkan penetrasi pasar dan memperluas jaringan outlet di wilayah distribusi.
                    </p>
                </div>
            </div>

            {{-- ── Kegiatan 10 — Outing (2 foto) ── --}}
            <div class="kegiatan-card group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                 data-category="sosial">
                <div class="relative h-60 overflow-hidden bg-gray-200"
                     id="slider-outing"
                     data-slider="true"
                     data-count="2"
                     data-prefix="kegiatan10-"
                     data-ext=".jpeg"
                     data-alt="Outing 2025">
                    <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-100">
                        <img src="{{ asset('assets/images/kegiatan10-1.jpeg') }}"
                             alt="Outing 2025 foto 1"
                             loading="lazy"
                             class="img-lazy w-full h-full object-cover opacity-0 transition-opacity duration-500">
                    </div>
                    @foreach(range(2, 2) as $i)
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-0" data-slide-index="{{ $i }}"></div>
                    @endforeach
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                    <span class="absolute top-4 left-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">Outing</span>
                    <button onclick="prevGenericSlide('slider-outing')" aria-label="Foto sebelumnya"
                            class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">←</button>
                    <button onclick="nextGenericSlide('slider-outing')" aria-label="Foto berikutnya"
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">→</button>
                    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1 z-20 slider-dots"></div>
                </div>
                <div class="p-6">
                    <span class="text-xs text-gray-400 font-medium">2025</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-2 mb-3">Outing 2025</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Kegiatan outing tim Sriwijaya Serangkai sebagai bentuk apresiasi dan penyegaran semangat kerja seluruh karyawan.
                    </p>
                </div>
            </div>

            {{-- ── Kegiatan 11 — Visit Distributor (9 foto) ── --}}
            <div class="kegiatan-card group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                 data-category="visit-ho">
                <div class="relative h-60 overflow-hidden bg-gray-200"
                     id="slider-visit"
                     data-slider="true"
                     data-count="9"
                     data-prefix="kegiatan11-"
                     data-ext=".jpeg"
                     data-alt="Visit Distributor">
                    <div class="img-skeleton absolute inset-0 animate-pulse bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 bg-[length:200%_100%]"></div>
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-100">
                        <img src="{{ asset('assets/images/kegiatan11-1.jpeg') }}"
                             alt="Visit Distributor foto 1"
                             loading="lazy"
                             class="img-lazy w-full h-full object-cover opacity-0 transition-opacity duration-500">
                    </div>
                    @foreach(range(2, 9) as $i)
                    <div class="slider-item absolute inset-0 transition-opacity duration-700 opacity-0" data-slide-index="{{ $i }}"></div>
                    @endforeach
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                    <span class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">Visit Distributor</span>
                    <button onclick="prevGenericSlide('slider-visit')" aria-label="Foto sebelumnya"
                            class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">←</button>
                    <button onclick="nextGenericSlide('slider-visit')" aria-label="Foto berikutnya"
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-8 h-8 rounded-full flex items-center justify-center z-30 transition-all text-sm">→</button>
                    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1 z-20 slider-dots"></div>
                </div>
                <div class="p-6">
                    <span class="text-xs text-gray-400 font-medium">2025</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-2 mb-3">Visit Distributor</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Kunjungan langsung ke jaringan distributor untuk memastikan kelancaran distribusi dan memperkuat hubungan kemitraan di seluruh wilayah.
                    </p>
                </div>
            </div>

        </div>{{-- end grid --}}

        {{-- PERBAIKAN: Hapus fake load more, ganti footer info --}}
        <div class="text-center mt-14">
            <p class="text-sm text-gray-400 font-medium">
                Menampilkan semua <span class="text-gray-600 font-semibold">11 kegiatan</span> terbaru
            </p>
        </div>

    </div>
</section>


{{-- ===== CTA — PERBAIKAN: tambah WhatsApp shortcut ===== --}}
<section class="relative bg-blue-900 text-white py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image: url('{{ asset('assets/images/pattern.svg') }}')"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-800 rounded-full blur-3xl opacity-50"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-800 rounded-full blur-3xl opacity-50"></div>

    <div class="relative max-w-4xl mx-auto px-6 text-center">
        <span class="inline-block bg-white/10 text-white/80 text-sm font-semibold px-5 py-2 rounded-full mb-6">
            Mulai Bermitra
        </span>
        <h2 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight">
            Siap Bekerja Sama<br>dengan Kami?
        </h2>
        <p class="text-blue-200 text-lg mb-4 max-w-xl mx-auto leading-relaxed">
            Hubungi kami untuk informasi harga distributor, katalog lengkap, dan program kemitraan eksklusif.
        </p>

        {{-- PERBAIKAN: Info kontak cepat sebelum tombol --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-6 mb-10 text-sm text-blue-200">
            <div class="flex items-center gap-2">
                {{-- WhatsApp icon --}}
                <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                <span>+62 811-777-9001</span>
            </div>
            <span class="hidden sm:block text-blue-700">|</span>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span>Hari kerja, 08.00 – 17.00 WIB</span>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            {{-- PERBAIKAN: Tombol WhatsApp langsung --}}
            <a href="https://wa.me/6281177790010?text=Halo%20CV.%20Sriwijaya%20Serangkai%2C%20saya%20ingin%20bertanya%20mengenai%20kemitraan%20distributor."
               target="_blank"
               rel="noopener noreferrer"
               class="group inline-flex items-center justify-center gap-3 bg-emerald-500 hover:bg-emerald-400 text-white font-bold text-base px-10 py-4 rounded-2xl transition-all duration-300 shadow-xl shadow-emerald-900/30">
                <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                Chat WhatsApp
            </a>
            <a href="/produk"
               class="border-2 border-white/50 text-white hover:bg-white/10 font-bold text-base px-10 py-4 rounded-2xl transition-all duration-300">
                Lihat Katalog
            </a>
        </div>
    </div>
</section>

@endsection


@push('scripts')
<script>
// ─── IMAGE LAZY LOAD + SKELETON DISMISS ──────────────────────────────────────
// Setiap img.img-lazy: saat gambar selesai load, fade in dan hide skeleton
document.querySelectorAll('img.img-lazy').forEach(function(img) {
    function onLoad() {
        img.classList.remove('opacity-0');
        img.classList.add('opacity-100');
        var skeleton = img.closest('.img-wrapper, .relative')
                          ? img.closest('.img-wrapper, .relative').querySelector('.img-skeleton')
                          : null;
        if (skeleton) {
            skeleton.style.opacity = '0';
            skeleton.style.transition = 'opacity 0.4s';
            setTimeout(function() { skeleton.style.display = 'none'; }, 400);
        }
    }
    if (img.complete && img.naturalWidth > 0) {
        onLoad();
    } else {
        img.addEventListener('load', onLoad);
        img.addEventListener('error', function() {
            // Jika gambar gagal dimuat, tetap hide skeleton
            var skeleton = img.closest('.img-wrapper, .relative')
                              ? img.closest('.img-wrapper, .relative').querySelector('.img-skeleton')
                              : null;
            if (skeleton) skeleton.style.display = 'none';
        });
    }
});

// ─── SLIDER STATE ────────────────────────────────────────────────────────────
// Menyimpan current index dan interval handle per slider id
var sliderState = {};

// ─── GENERIC SLIDER NAVIGATION ───────────────────────────────────────────────
function nextGenericSlide(id) {
    var slider = document.getElementById(id);
    if (!slider) return;
    var items = slider.querySelectorAll('.slider-item');
    if (!items.length) return;
    var state = sliderState[id] || { current: 0 };
    items[state.current].classList.replace('opacity-100', 'opacity-0');
    state.current = (state.current + 1) % items.length;
    items[state.current].classList.replace('opacity-0', 'opacity-100');
    sliderState[id] = state;
    updateDots(id);
    lazyLoadSlide(slider, state.current);
}

function prevGenericSlide(id) {
    var slider = document.getElementById(id);
    if (!slider) return;
    var items = slider.querySelectorAll('.slider-item');
    if (!items.length) return;
    var state = sliderState[id] || { current: 0 };
    items[state.current].classList.replace('opacity-100', 'opacity-0');
    state.current = (state.current - 1 + items.length) % items.length;
    items[state.current].classList.replace('opacity-0', 'opacity-100');
    sliderState[id] = state;
    updateDots(id);
    lazyLoadSlide(slider, state.current);
}

// ─── LAZY LOAD SLIDE ─────────────────────────────────────────────────────────
// Slide 2+ tidak punya <img> di HTML — dibuat saat pertama kali dibutuhkan
function lazyLoadSlide(slider, index) {
    if (index === 0) return; // slide pertama sudah ada di HTML
    var items = slider.querySelectorAll('.slider-item');
    var slide = items[index];
    if (!slide || slide.querySelector('img')) return; // sudah ada gambar

    var prefix  = slider.dataset.prefix  || '';
    var ext     = slider.dataset.ext     || '.jpeg';
    var altBase = slider.dataset.alt     || 'Foto';
    var num     = (slide.dataset.slideIndex || (index + 1));

    // Buat base path dari gambar pertama yang sudah ada
    var firstImg = slider.querySelector('.slider-item img');
    if (!firstImg) return;
    var baseSrc = firstImg.src.replace(/\d+\.\w+$/, '');
    // Hitung path: ganti nomor terakhir
    var imgSrc = baseSrc.slice(0, baseSrc.lastIndexOf(prefix) + prefix.length) + num + ext;

    var img = document.createElement('img');
    img.src = imgSrc;
    img.alt = altBase + ' foto ' + num;
    img.loading = 'lazy';
    img.className = 'img-lazy w-full h-full object-cover opacity-0 transition-opacity duration-500';
    img.addEventListener('load', function() {
        img.classList.remove('opacity-0');
        img.classList.add('opacity-100');
        var sk = slider.querySelector('.img-skeleton');
        if (sk) sk.style.display = 'none';
    });
    slide.appendChild(img);
}

// ─── DOT INDICATORS ──────────────────────────────────────────────────────────
function updateDots(id) {
    var slider = document.getElementById(id);
    if (!slider) return;
    var dotsContainer = slider.querySelector('.slider-dots');
    if (!dotsContainer) return;
    var state = sliderState[id] || { current: 0 };
    var dots = dotsContainer.querySelectorAll('span');
    dots.forEach(function(dot, i) {
        dot.style.opacity = i === state.current ? '1' : '0.4';
        dot.style.width   = i === state.current ? '16px' : '6px';
    });
}

function buildDots(id, count) {
    var slider = document.getElementById(id);
    if (!slider) return;
    var dotsContainer = slider.querySelector('.slider-dots');
    if (!dotsContainer) return;
    for (var i = 0; i < count; i++) {
        var dot = document.createElement('span');
        dot.style.cssText = 'display:inline-block;height:6px;border-radius:9999px;background:white;transition:all 0.3s;';
        dot.style.width   = i === 0 ? '16px' : '6px';
        dot.style.opacity = i === 0 ? '1' : '0.4';
        dotsContainer.appendChild(dot);
    }
}

// ─── INTERSECTION OBSERVER — auto-play hanya saat di viewport ────────────────
// PERBAIKAN UTAMA: slider hanya berputar saat kartu terlihat di layar
document.addEventListener('DOMContentLoaded', function() {
    var sliderIds = [
        'slider-visitho',
        'slider-golive4',
        'slider-perpisahan',
        'slider-gathering',
        'slider-bukber',
        'slider-serko',
        'slider-outing',
        'slider-visit',
    ];

    sliderIds.forEach(function(id) {
        var slider = document.getElementById(id);
        if (!slider) return;

        // Inisialisasi state
        var itemCount = slider.querySelectorAll('.slider-item').length;
        sliderState[id] = { current: 0, timer: null };

        // Buat dot indicators
        buildDots(id, itemCount);

        // IntersectionObserver: mulai/henti auto-play
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                var state = sliderState[id];
                if (entry.isIntersecting) {
                    // Slider masuk viewport — mulai auto-play
                    if (!state.timer) {
                        state.timer = setInterval(function() {
                            nextGenericSlide(id);
                        }, 4000);
                    }
                } else {
                    // Slider keluar viewport — hentikan auto-play
                    if (state.timer) {
                        clearInterval(state.timer);
                        state.timer = null;
                    }
                }
            });
        }, {
            threshold: 0.3 // minimal 30% kartu terlihat baru auto-play aktif
        });

        observer.observe(slider);
    });

    // ─── LAZY LOAD gambar biasa (non-slider) via IntersectionObserver ────────
    // Untuk browser yang tidak support loading="lazy" native
    if ('IntersectionObserver' in window) {
        var imgObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    imgObserver.unobserve(img);
                }
            });
        }, { rootMargin: '200px' });

        document.querySelectorAll('img[loading="lazy"]').forEach(function(img) {
            imgObserver.observe(img);
        });
    }
});

// ─── FILTER KEGIATAN ─────────────────────────────────────────────────────────
function filterKegiatan(category) {
    var cards   = document.querySelectorAll('.kegiatan-card');
    var buttons = document.querySelectorAll('.filter-btn');

    buttons.forEach(function(btn) {
        var isActive = btn.dataset.filter === category;
        btn.className = isActive
            ? 'filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-blue-600 text-white'
            : 'filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-white text-gray-600 border border-gray-200 hover:border-blue-300';
    });

    cards.forEach(function(card) {
        var match = category === 'all' || card.dataset.category === category;
        card.style.transition = 'opacity 0.3s, transform 0.3s';
        if (match) {
            card.style.opacity    = '1';
            card.style.transform  = 'scale(1)';
            card.style.display    = '';
        } else {
            card.style.opacity    = '0';
            card.style.transform  = 'scale(0.95)';
            setTimeout(function() {
                if (card.style.opacity === '0') card.style.display = 'none';
            }, 300);
        }
    });
}
</script>
@endpush