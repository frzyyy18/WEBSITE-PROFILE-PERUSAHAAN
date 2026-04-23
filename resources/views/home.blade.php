@extends('layouts.app')
 
@section('title', 'CV. Sriwijaya Serangkai - Distributor Resmi Unilever')
 
@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap');
 
    :root {
        --gold: #C9A84C;
        --gold-light: #E8C97A;
        --gold-pale: #FBF3E0;
        --navy: #0D1B2A;
        --navy-mid: #1B2E45;
        --cream: #FDFAF4;
    }
 
    body { font-family: 'DM Sans', sans-serif; }
 
    /* ===== HERO ===== */
    .home-hero {
        position: relative; min-height: 100vh;
        display: flex; align-items: center; overflow: hidden;
    }
    .hero-bg {
        position: absolute; inset: 0;
        background-size: cover; background-position: center; background-attachment: fixed;
    }
    .hero-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(13,27,42,0.88) 0%, rgba(13,27,42,0.65) 50%, rgba(27,46,69,0.80) 100%);
    }
    .hero-glow-1 { position: absolute; top: 15%; right: 10%; width: 400px; height: 400px; background: rgba(201,168,76,0.06); border-radius: 50%; filter: blur(80px); }
    .hero-glow-2 { position: absolute; bottom: 15%; left: 5%; width: 500px; height: 500px; background: rgba(201,168,76,0.04); border-radius: 50%; filter: blur(100px); }
 
    .hero-inner {
        position: relative; z-index: 10;
        max-width: 900px; margin: 0 auto;
        padding: 120px 24px 80px; text-align: center;
    }
 
    .hero-pill {
        display: inline-flex; align-items: center; gap: 8px;
        background: rgba(201,168,76,0.12); border: 1px solid rgba(201,168,76,0.35);
        color: var(--gold-light); border-radius: 100px;
        padding: 7px 20px; font-size: 0.78rem; font-weight: 500;
        letter-spacing: 0.05em; margin-bottom: 28px;
    }
    .hero-pill span { width: 7px; height: 7px; background: #4ade80; border-radius: 50%; animation: pulse 2s infinite; }
    @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.6;transform:scale(1.3)} }
 
    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.8rem, 8vw, 6rem);
        font-weight: 900; color: white;
        line-height: 1.05; margin-bottom: 20px;
        letter-spacing: -0.02em;
    }
    .hero-title span { color: var(--gold-light); font-style: italic; }
 
    .hero-desc {
        color: rgba(255,255,255,0.6); font-size: 1rem;
        max-width: 560px; margin: 0 auto 40px; line-height: 1.8;
    }
    .hero-desc strong { color: rgba(255,255,255,0.9); font-weight: 600; }
 
    .hero-btns { display: flex; flex-wrap: wrap; gap: 14px; justify-content: center; margin-bottom: 56px; }
 
    .btn-primary {
        display: inline-flex; align-items: center; gap: 8px;
        background: var(--gold); color: var(--navy);
        font-weight: 700; font-size: 0.9rem;
        padding: 14px 32px; border-radius: 100px;
        text-decoration: none; transition: all 0.25s;
        box-shadow: 0 4px 24px rgba(201,168,76,0.35);
    }
    .btn-primary:hover { background: var(--gold-light); transform: translateY(-2px); box-shadow: 0 8px 32px rgba(201,168,76,0.45); }
 
    .btn-outline {
        display: inline-flex; align-items: center; gap: 8px;
        border: 1.5px solid rgba(255,255,255,0.35); color: white;
        font-weight: 600; font-size: 0.9rem;
        padding: 14px 32px; border-radius: 100px;
        text-decoration: none; transition: all 0.25s;
        backdrop-filter: blur(8px);
    }
    .btn-outline:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.6); }
 
    .hero-stats {
        display: grid; grid-template-columns: repeat(3, 1fr);
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.08);
        backdrop-filter: blur(12px);
        border-radius: 20px; padding: 24px 32px;
        max-width: 520px; margin: 0 auto;
    }
    .hero-stat { text-align: center; }
    .hero-stat + .hero-stat { border-left: 1px solid rgba(255,255,255,0.08); }
    .hero-stat-num { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 900; color: white; line-height: 1; }
    .hero-stat-num span { color: var(--gold); }
    .hero-stat-lbl { font-size: 0.7rem; color: rgba(255,255,255,0.45); margin-top: 4px; }
 
    .hero-scroll {
        position: absolute; bottom: 32px; left: 50%; transform: translateX(-50%);
        display: flex; flex-direction: column; align-items: center; gap: 6px;
        color: rgba(255,255,255,0.35); font-size: 0.65rem; letter-spacing: 3px;
        text-transform: uppercase; animation: bounce 2s infinite;
    }
    @keyframes bounce { 0%,100%{transform:translateX(-50%) translateY(0)} 50%{transform:translateX(-50%) translateY(6px)} }
 
    /* ===== TENTANG ===== */
    .tentang-section { background: white; padding: 96px 24px; }
    .tentang-inner { max-width: 1000px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center; }
 
    .section-eyebrow { font-size: 0.7rem; font-weight: 600; letter-spacing: 4px; text-transform: uppercase; color: var(--gold); margin-bottom: 12px; }
    .section-title { font-family: 'Playfair Display', serif; font-size: clamp(1.8rem, 3vw, 2.4rem); font-weight: 900; color: var(--navy); line-height: 1.2; margin-bottom: 16px; }
    .section-divider { width: 48px; height: 3px; background: linear-gradient(to right, var(--gold), rgba(201,168,76,0.3)); border-radius: 2px; margin-bottom: 20px; }
    .section-desc { color: #666; line-height: 1.85; font-size: 0.95rem; margin-bottom: 24px; }
 
    .check-list { list-style: none; padding: 0; margin: 0 0 28px; }
    .check-list li { display: flex; align-items: center; gap: 12px; color: #555; font-size: 0.9rem; padding: 6px 0; }
    .check-icon { width: 22px; height: 22px; border-radius: 50%; background: var(--gold); color: white; display: flex; align-items: center; justify-content: center; font-size: 0.6rem; flex-shrink: 0; }
 
    .link-more { display: inline-flex; align-items: center; gap: 8px; color: var(--gold); font-weight: 600; font-size: 0.9rem; text-decoration: none; transition: gap 0.2s; }
    .link-more:hover { gap: 14px; }
 
    .tentang-img-wrap { position: relative; }
    .tentang-img {
        border-radius: 24px; overflow: hidden;
        height: 460px; background: #f0ece4; position: relative;
    }
    .tentang-img img { width: 100%; height: 100%; object-fit: cover; opacity: 0; transition: opacity 0.5s; }
    .tentang-img img.loaded { opacity: 1; }
    .tentang-badge {
        position: absolute; bottom: -20px; left: -20px;
        background: white; border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.12);
        padding: 16px 20px; display: flex; align-items: center; gap: 14px;
    }
    .tentang-badge-icon { width: 44px; height: 44px; background: var(--gold-pale); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--gold); font-size: 1.2rem; }
    .tentang-badge-title { font-size: 0.8rem; font-weight: 700; color: var(--navy); }
    .tentang-badge-sub { font-size: 0.7rem; color: #888; }
 
    /* ===== KEUNGGULAN ===== */
    .unggulan-section { background: var(--cream); padding: 80px 24px; }
    .unggulan-inner { max-width: 1000px; margin: 0 auto; }
    .unggulan-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 40px; }
    .unggulan-card {
        background: white; border-radius: 20px;
        border: 1.5px solid rgba(201,168,76,0.1);
        padding: 28px 22px; transition: all 0.25s;
        box-shadow: 0 3px 16px rgba(0,0,0,0.05);
    }
    .unggulan-card:hover { transform: translateY(-4px); border-color: rgba(201,168,76,0.4); box-shadow: 0 12px 36px rgba(201,168,76,0.12); }
    .unggulan-icon { width: 52px; height: 52px; border-radius: 14px; background: var(--gold-pale); color: var(--gold); display: flex; align-items: center; justify-content: center; font-size: 1.3rem; margin-bottom: 16px; }
    .unggulan-title { font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 700; color: var(--navy); margin-bottom: 8px; }
    .unggulan-desc { font-size: 0.82rem; color: #777; line-height: 1.7; }
 
    /* ===== CABANG ===== */
    .cabang-section { background: white; padding: 80px 24px; }
    .cabang-inner { max-width: 900px; margin: 0 auto; }
    .cabang-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; margin-top: 40px; }
    .cabang-card {
        background: white; border-radius: 20px; overflow: hidden;
        border: 1.5px solid rgba(201,168,76,0.12);
        box-shadow: 0 3px 20px rgba(0,0,0,0.06);
        transition: all 0.25s;
    }
    .cabang-card:hover { transform: translateY(-4px); box-shadow: 0 14px 40px rgba(201,168,76,0.15); border-color: rgba(201,168,76,0.35); }
    .cabang-img { position: relative; height: 200px; overflow: hidden; background: #f0ece4; }
    .cabang-img img { width: 100%; height: 100%; object-fit: cover; opacity: 0; transition: all 0.5s; }
    .cabang-img img.loaded { opacity: 1; }
    .cabang-card:hover .cabang-img img { transform: scale(1.05); }
    .cabang-img-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(13,27,42,0.4), transparent); }
    .cabang-hq { position: absolute; top: 12px; right: 12px; background: var(--gold); color: white; font-size: 0.65rem; font-weight: 700; padding: 3px 10px; border-radius: 100px; }
    .cabang-body { padding: 22px; }
    .cabang-name { font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 700; color: var(--navy); margin-bottom: 6px; }
    .cabang-addr { font-size: 0.8rem; color: #777; line-height: 1.65; margin-bottom: 12px; }
    .cabang-phone { display: flex; align-items: center; gap: 6px; font-size: 0.8rem; color: var(--gold); font-weight: 600; }
 
    /* ===== KEGIATAN ===== */
    .kegiatan-section { background: var(--cream); padding: 80px 24px; }
    .kegiatan-inner { max-width: 1100px; margin: 0 auto; }
 
    /* Filter tabs style konsisten */
    .kegiatan-filter { display: flex; flex-wrap: wrap; justify-content: center; gap: 8px; margin: 32px 0; }
    .kfbtn {
        padding: 7px 18px; border-radius: 100px; font-size: 0.8rem; font-weight: 500;
        border: 1.5px solid rgba(201,168,76,0.2); background: white; color: #555;
        cursor: pointer; transition: all 0.2s;
    }
    .kfbtn:hover { border-color: var(--gold); color: var(--navy); }
    .kfbtn.active { background: var(--navy); color: white; border-color: var(--navy); }
 
    /* Card kegiatan */
    .kegiatan-card {
        background: white; border-radius: 20px; overflow: hidden;
        border: 1.5px solid rgba(201,168,76,0.1);
        box-shadow: 0 3px 16px rgba(0,0,0,0.05);
        transition: all 0.25s;
    }
    .kegiatan-card:hover { transform: translateY(-4px); box-shadow: 0 14px 40px rgba(201,168,76,0.14); border-color: rgba(201,168,76,0.3); }
 
    .kegiatan-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
 
    /* ===== CTA ===== */
    .cta-section {
        background: var(--navy); padding: 80px 24px;
        text-align: center; position: relative; overflow: hidden;
    }
    .cta-section::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse at center, rgba(201,168,76,0.08) 0%, transparent 65%); }
    .cta-inner { max-width: 600px; margin: 0 auto; position: relative; z-index: 1; }
    .cta-eyebrow { font-size: 0.7rem; font-weight: 600; letter-spacing: 4px; text-transform: uppercase; color: var(--gold); margin-bottom: 12px; }
    .cta-title { font-family: 'Playfair Display', serif; font-size: clamp(1.8rem, 4vw, 2.6rem); font-weight: 900; color: white; margin-bottom: 12px; line-height: 1.2; }
    .cta-title span { color: var(--gold-light); font-style: italic; }
    .cta-desc { color: rgba(255,255,255,0.5); font-size: 0.9rem; margin-bottom: 12px; line-height: 1.7; }
    .cta-contacts { display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; margin-bottom: 32px; font-size: 0.82rem; color: rgba(255,255,255,0.5); }
    .cta-contact-item { display: flex; align-items: center; gap: 6px; }
    .cta-contact-item i { color: var(--gold); }
    .cta-btns { display: flex; flex-wrap: wrap; gap: 12px; justify-content: center; }
    .btn-wa { display: inline-flex; align-items: center; gap: 8px; background: #22c55e; color: white; font-weight: 700; font-size: 0.9rem; padding: 14px 30px; border-radius: 100px; text-decoration: none; transition: all 0.2s; box-shadow: 0 4px 20px rgba(34,197,94,0.3); }
    .btn-wa:hover { background: #16a34a; transform: translateY(-2px); }
    .btn-catalog { display: inline-flex; align-items: center; gap: 8px; border: 1.5px solid rgba(255,255,255,0.25); color: white; font-weight: 600; font-size: 0.9rem; padding: 14px 30px; border-radius: 100px; text-decoration: none; transition: all 0.2s; }
    .btn-catalog:hover { background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.5); }
 
    @media (max-width: 768px) {
        .tentang-inner { grid-template-columns: 1fr; }
        .unggulan-grid { grid-template-columns: 1fr; }
        .cabang-grid { grid-template-columns: 1fr; }
        .kegiatan-grid { grid-template-columns: 1fr; }
        .hero-stats { grid-template-columns: 1fr; gap: 16px; }
        .hero-stat + .hero-stat { border-left: none; border-top: 1px solid rgba(255,255,255,0.08); padding-top: 16px; }
    }
    @media (max-width: 1024px) {
        .kegiatan-grid { grid-template-columns: repeat(2, 1fr); }
        .unggulan-grid { grid-template-columns: repeat(2, 1fr); }
    }
</style>
@endpush
 
@section('content')
 
{{-- ===== HERO ===== --}}
<section class="home-hero">
    <div class="hero-bg" style="background-image: url('{{ asset('assets/images/gedung.jpeg') }}');"></div>
    <div class="hero-overlay"></div>
    <div class="hero-glow-1"></div>
    <div class="hero-glow-2"></div>
 
    <div class="hero-inner">
        <div class="hero-pill">
            <span></span> Distributor Resmi Unilever
        </div>
 
        <h1 class="hero-title">
            CV. Sriwijaya<br><span>Serangkai</span>
        </h1>
 
        <p class="hero-desc">
            Menyalurkan kualitas terbaik Unilever sejak
            <strong>14 Februari 2012</strong> untuk seluruh wilayah Palembang dan Sumatera Selatan.
        </p>
 
        <div class="hero-btns">
            <a href="/produk" class="btn-primary">
                <i class="fas fa-box-open"></i> Lihat Produk Kami
            </a>
            <a href="/lowongan" class="btn-outline">
                <i class="fas fa-briefcase"></i> Lowongan Kerja
            </a>
        </div>
 
        <div class="hero-stats">
            <div class="hero-stat">
                <div class="hero-stat-num">20<span>+</span></div>
                <div class="hero-stat-lbl">Tahun Berpengalaman</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-num">500<span>+</span></div>
                <div class="hero-stat-lbl">Mitra Aktif</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-num">7<span>+</span></div>
                <div class="hero-stat-lbl">Cabang Operasional</div>
            </div>
        </div>
    </div>
 
    <div class="hero-scroll">
        <span>Scroll</span>
        <i class="fas fa-chevron-down" style="font-size:0.7rem;"></i>
    </div>
</section>


{{-- ===== TENTANG KAMI ===== --}}
<section class="tentang-section">
    <div class="tentang-inner">
        <div>
            <p class="section-eyebrow">Sejak 2012</p>
            <h2 class="section-title">Distributor Unilever yang Terpercaya</h2>
            <div class="section-divider"></div>
            <p class="section-desc">
                CV. Sriwijaya Serangkai berdiri sejak <strong style="color:var(--navy);">14 Februari 2012</strong> sebagai
                distributor resmi produk Unilever di wilayah Palembang dan Sumatera Selatan.
                Kami berkomitmen memberikan pelayanan terbaik, distribusi cepat, dan produk berkualitas tinggi
                kepada seluruh mitra bisnis kami.
            </p>
            <ul class="check-list">
                @foreach(['Distributor resmi & bersertifikat Unilever', 'Jangkauan distribusi seluruh Sumsel', 'Tim profesional berpengalaman', 'Armada pengiriman lengkap'] as $point)
                <li>
                    <div class="check-icon"><i class="fas fa-check" style="font-size:0.55rem;"></i></div>
                    {{ $point }}
                </li>
                @endforeach
            </ul>
            <a href="/visi-misi" class="link-more">
                Baca Visi & Misi Kami <i class="fas fa-arrow-right" style="font-size:0.75rem;"></i>
            </a>
        </div>
 
        <div class="tentang-img-wrap">
            <div class="tentang-img">
                <img src="{{ asset('assets/images/produk1.jpg') }}"
                     alt="Operasional CV. Sriwijaya Serangkai"
                     loading="lazy"
                     onload="this.classList.add('loaded')">
            </div>
            <div class="tentang-badge">
                <div class="tentang-badge-icon"><i class="fas fa-award"></i></div>
                <div>
                    <div class="tentang-badge-title">Distributor Terpercaya</div>
                    <div class="tentang-badge-sub">Unilever Indonesia</div>
                </div>
            </div>
        </div>
    </div>
</section>
 
{{-- ===== KEUNGGULAN ===== --}}
<section class="unggulan-section">
    <div class="unggulan-inner">
        <div style="text-align:center;">
            <p class="section-eyebrow">Mengapa Kami</p>
            <h2 class="section-title">Keunggulan CV. Sriwijaya Serangkai</h2>
            <div class="section-divider" style="margin:12px auto 0;"></div>
        </div>
 
        @php
        $keunggulan = [
            ['icon' => 'fa-truck-fast',    'title' => 'Distribusi Cepat',         'desc' => 'Pengiriman tepat waktu dengan armada lengkap ke seluruh wilayah Palembang dan Sumatera Selatan.'],
            ['icon' => 'fa-tags',          'title' => 'Harga Distributor',         'desc' => 'Harga terbaik langsung dari distributor resmi Unilever dengan volume fleksibel sesuai kebutuhan.'],
            ['icon' => 'fa-certificate',   'title' => 'Produk Original',           'desc' => '100% asli Unilever dengan sertifikat halal MUI dan garansi kualitas terjamin.'],
            ['icon' => 'fa-handshake',     'title' => 'Kemitraan Jangka Panjang',  'desc' => 'Program loyalitas dan dukungan penuh untuk mitra bisnis kami berkembang bersama.'],
            ['icon' => 'fa-boxes-stacked', 'title' => 'Stok Selalu Tersedia',      'desc' => 'Gudang kapasitas besar memastikan ketersediaan stok produk Unilever setiap saat.'],
            ['icon' => 'fa-headset',       'title' => 'Layanan Pelanggan',         'desc' => 'Tim customer service siap membantu kebutuhan Anda setiap hari kerja.'],
        ];
        @endphp
 
        <div class="unggulan-grid">
            @foreach($keunggulan as $item)
            <div class="unggulan-card">
                <div class="unggulan-icon"><i class="fas {{ $item['icon'] }}"></i></div>
                <div class="unggulan-title">{{ $item['title'] }}</div>
                <p class="unggulan-desc">{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
 
{{-- ===== CABANG ===== --}}
<section class="cabang-section">
    <div class="cabang-inner">
        <div style="text-align:center;">
            <p class="section-eyebrow">Lokasi Kami</p>
            <h2 class="section-title">Cabang Perusahaan</h2>
            <div class="section-divider" style="margin:12px auto 0;"></div>
            <p style="color:#888;font-size:0.875rem;margin-top:12px;">Hadir di lokasi strategis untuk melayani Anda lebih cepat.</p>
        </div>
 
        <div class="cabang-grid">
            <div class="cabang-card">
                <div class="cabang-img">
                    <img src="{{ asset('assets/images/prabumulih.jpeg') }}"
                         alt="Kantor Prabumulih" loading="lazy"
                         onload="this.classList.add('loaded')">
                    <div class="cabang-img-overlay"></div>
                    <div class="cabang-hq">HQ</div>
                </div>
                <div class="cabang-body">
                    <div class="cabang-name">Sriwijaya Serangkai Prabumulih</div>
                    <p class="cabang-addr">Jalan Bangau No.229, RT04/RW.02, Kelurahan Tugu Kecil, Kec. Prabumulih Timur, Kota Prabumulih.</p>
                    <div class="cabang-phone"><i class="fas fa-phone"></i> 0711-820700</div>
                </div>
            </div>
            <div class="cabang-card">
                <div class="cabang-img">
                    <img src="{{ asset('assets/images/banyuasin.jpg') }}"
                         alt="Kantor Banyuasin" loading="lazy"
                         onload="this.classList.add('loaded')">
                    <div class="cabang-img-overlay"></div>
                </div>
                <div class="cabang-body">
                    <div class="cabang-name">Sriwijaya Serangkai Banyuasin</div>
                    <p class="cabang-addr">Jalan Palembang Betung, Sukaraja Baru, Kel. Sterio, Kec. Banyuasin III, Kab. Banyuasin, Sumsel.</p>
                    <div class="cabang-phone"><i class="fas fa-phone"></i> 0711-820700</div>
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


{{-- ===== CTA ===== --}}
<section class="cta-section">
    <div class="cta-inner">
        <p class="cta-eyebrow">Mulai Bermitra</p>
        <h2 class="cta-title">Siap Bekerja Sama <span>dengan Kami?</span></h2>
        <p class="cta-desc">Hubungi kami untuk informasi harga distributor, katalog lengkap, dan program kemitraan eksklusif.</p>
        <div class="cta-contacts">
            <div class="cta-contact-item"><i class="fab fa-whatsapp"></i> +62 811-777-9001</div>
            <div class="cta-contact-item"><i class="fas fa-clock"></i> Senin–Jumat, 08.00–17.00 WIB</div>
        </div>
        <div class="cta-btns">
            <a href="https://wa.me/6281177790010?text=Halo%20CV.%20Sriwijaya%20Serangkai%2C%20saya%20ingin%20bertanya%20mengenai%20kemitraan."
               target="_blank" class="btn-wa">
                <i class="fab fa-whatsapp text-lg"></i> Chat WhatsApp
            </a>
            <a href="/produk" class="btn-catalog">
                <i class="fas fa-box-open"></i> Lihat Katalog
            </a>
        </div>
    </div>
</section>
 
@endsection
 
@push('scripts')
<script>
function filterKegiatan(category) {
    document.querySelectorAll('.kfbtn').forEach(function(btn) {
        btn.classList.toggle('active', btn.dataset.filter === category);
    });
    document.querySelectorAll('.kegiatan-card').forEach(function(card) {
        var match = category === 'all' || card.dataset.category === category;
        card.style.transition = 'opacity 0.25s, transform 0.25s';
        if (match) {
            card.style.opacity = '1'; card.style.transform = 'scale(1)'; card.style.display = '';
        } else {
            card.style.opacity = '0'; card.style.transform = 'scale(0.95)';
            setTimeout(function() { if (card.style.opacity === '0') card.style.display = 'none'; }, 250);
        }
    });
}
</script>
@endpush


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