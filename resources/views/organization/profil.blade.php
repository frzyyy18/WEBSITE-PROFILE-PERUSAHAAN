@extends('layouts.app')

@section('title', 'Profil Perusahaan - CV. Sriwijaya Serangkai')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=DM+Sans:wght@300;400;500;600&display=swap');

    :root {
        --gold: #C9A84C;
        --gold-light: #E8C97A;
        --gold-pale: #FBF3E0;
        --navy: #0D1B2A;
        --cream: #FDFAF4;
    }

    .profil-page { font-family: 'DM Sans', sans-serif; background: var(--cream); }

    /* Hero */
    .profil-hero {
        background: var(--navy);
        padding: 80px 24px 100px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .profil-hero::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse at 30% 50%, rgba(201,168,76,0.12) 0%, transparent 60%),
                    radial-gradient(ellipse at 70% 50%, rgba(201,168,76,0.08) 0%, transparent 60%);
    }
    .profil-hero::after {
        content: ''; position: absolute; bottom: -1px; left: 0; right: 0;
        height: 60px; background: var(--cream);
        clip-path: ellipse(55% 100% at 50% 100%);
    }
    .hero-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        color: var(--gold); font-size: 0.75rem; font-weight: 600;
        letter-spacing: 4px; text-transform: uppercase; margin-bottom: 20px;
        position: relative; z-index: 1;
    }
    .hero-eyebrow::before, .hero-eyebrow::after {
        content: ''; width: 40px; height: 1px; background: var(--gold); opacity: 0.5;
    }
    .profil-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 700;
        color: white; line-height: 1.15; position: relative; z-index: 1; margin-bottom: 16px;
    }
    .profil-hero h1 span { color: var(--gold-light); font-style: italic; }
    .profil-hero p { color: rgba(255,255,255,0.5); font-size: 1rem; position: relative; z-index: 1; }

    /* Stats Bar */
    .stats-bar {
        background: white;
        border-bottom: 1px solid rgba(201,168,76,0.15);
        padding: 32px 24px;
    }
    .stats-grid { max-width: 800px; margin: 0 auto; display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
    .stat-item { text-align: center; }
    .stat-number {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem; font-weight: 900; color: var(--navy); line-height: 1;
    }
    .stat-number span { color: var(--gold); }
    .stat-label { font-size: 0.8rem; color: #888; margin-top: 6px; }

    /* Main Content */
    .profil-content { max-width: 900px; margin: 0 auto; padding: 60px 24px 80px; }

    /* Section */
    .profil-section { margin-bottom: 64px; }
    .section-eyebrow {
        font-size: 0.7rem; font-weight: 600; letter-spacing: 4px;
        text-transform: uppercase; color: var(--gold); margin-bottom: 10px;
    }
    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem; font-weight: 700; color: var(--navy); margin-bottom: 20px;
    }
    .section-divider {
        width: 48px; height: 3px;
        background: linear-gradient(to right, var(--gold), rgba(201,168,76,0.3));
        border-radius: 2px; margin-bottom: 24px;
    }

    /* Tentang */
    .tentang-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: start; }
    .tentang-text p { color: #555; line-height: 1.9; margin-bottom: 16px; font-size: 0.95rem; }
    .tentang-img {
        background: linear-gradient(135deg, var(--navy), var(--navy-mid, #1B2E45));
        border-radius: 20px; aspect-ratio: 4/3;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        color: rgba(255,255,255,0.3); font-size: 0.85rem; gap: 12px;
        border: 1px solid rgba(201,168,76,0.15);
        overflow: hidden; position: relative;
    }
    .tentang-img::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse at center, rgba(201,168,76,0.08) 0%, transparent 70%);
    }
    .tentang-img i { font-size: 2.5rem; color: rgba(201,168,76,0.4); position: relative; z-index: 1; }
    .tentang-img span { position: relative; z-index: 1; }

    /* Info Cards */
    .info-cards { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin-top: 24px; }
    .info-card {
        background: var(--gold-pale);
        border: 1px solid rgba(201,168,76,0.2);
        border-radius: 14px; padding: 18px 20px;
    }
    .info-card .label { font-size: 0.72rem; font-weight: 600; letter-spacing: 2px; text-transform: uppercase; color: #A07830; margin-bottom: 6px; }
    .info-card .value { font-size: 0.9rem; font-weight: 600; color: var(--navy); }

    /* Keunggulan */
    .keunggulan-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
    .keunggulan-card {
        background: white; border: 1px solid rgba(201,168,76,0.12);
        border-radius: 18px; padding: 28px 22px;
        transition: all 0.3s; text-align: center;
    }
    .keunggulan-card:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(201,168,76,0.12); border-color: rgba(201,168,76,0.35); }
    .keunggulan-icon {
        width: 56px; height: 56px; border-radius: 16px;
        background: var(--gold-pale); color: var(--gold);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.4rem; margin: 0 auto 16px;
    }
    .keunggulan-card h4 { font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 700; color: var(--navy); margin-bottom: 8px; }
    .keunggulan-card p { font-size: 0.82rem; color: #777; line-height: 1.7; }

    /* Responsive */
    @media (max-width: 640px) {
        .tentang-grid { grid-template-columns: 1fr; }
        .keunggulan-grid { grid-template-columns: 1fr; }
        .info-cards { grid-template-columns: 1fr; }
        .stats-grid { grid-template-columns: 1fr; gap: 16px; }
    }
</style>
@endpush

@section('content')
<div class="profil-page">

    {{-- Hero --}}
    <div class="profil-hero">
        <div class="hero-eyebrow"><span></span>Tentang Kami<span></span></div>
        <h1>Profil <span>Perusahaan</span></h1>
        <p>CV. Sriwijaya Serangkai — Distributor Resmi Unilever</p>
    </div>

    {{-- Stats Bar --}}
    <div class="stats-bar">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">20<span>+</span></div>
                <div class="stat-label">Tahun Berpengalaman</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">500<span>+</span></div>
                <div class="stat-label">Mitra Retail</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100<span>+</span></div>
                <div class="stat-label">Produk Unilever</div>
            </div>
        </div>
    </div>

    <div class="profil-content">

        {{-- Tentang Perusahaan --}}
        <div class="profil-section">
            <p class="section-eyebrow">Tentang Kami</p>
            <h2 class="section-title">CV. Sriwijaya Serangkai</h2>
            <div class="section-divider"></div>

            <div class="tentang-grid">
                <div class="tentang-text">
                    <p>
                        CV. Sriwijaya Serangkai adalah perusahaan distribusi yang telah berdiri 
                        dan berkembang di Palembang, Sumatera Selatan. Kami merupakan 
                        <strong>Distributor Resmi Unilever</strong> yang dipercaya untuk mendistribusikan 
                        produk-produk Unilever ke berbagai wilayah di Sumatera Selatan.
                    </p>
                    <p>
                        Dengan pengalaman lebih dari dua dekade, kami telah membangun jaringan 
                        distribusi yang kuat dan dipercaya oleh ribuan mitra retail di seluruh 
                        wilayah distribusi kami.
                    </p>
                    <p>
                        Kami berkomitmen untuk terus memberikan pelayanan terbaik, distribusi 
                        yang cepat dan tepat, serta menjaga kualitas produk Unilever sampai 
                        ke tangan konsumen akhir.
                    </p>

                    <div class="info-cards">
                        <div class="info-card">
                            <div class="label">Didirikan</div>
                            <div class="value">Tahun 2012</div>
                        </div>
                        <div class="info-card">
                            <div class="label">Lokasi</div>
                            <div class="value">Palembang, Sumsel</div>
                        </div>
                        <div class="info-card">
                            <div class="label">Bidang Usaha</div>
                            <div class="value">Distribusi FMCG</div>
                        </div>
                        <div class="info-card">
                            <div class="label">Mitra Utama</div>
                            <div class="value">PT. Unilever Indonesia</div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="tentang-img">
                        <img src="{{ asset('assets/images/gedung.jpeg') }}">
                        <span>Foto Kantor / Gedung</span>
                        <span style="font-size:0.75rem;opacity:0.6;"></span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Keunggulan --}}
        <div class="profil-section">
            <p class="section-eyebrow">Mengapa Kami</p>
            <h2 class="section-title">Keunggulan Kami</h2>
            <div class="section-divider"></div>

            <div class="keunggulan-grid">
                <div class="keunggulan-card">
                    <div class="keunggulan-icon"><i class="fas fa-certificate"></i></div>
                    <h4>Distributor Resmi</h4>
                    <p>Distributor resmi & terpercaya Unilever Indonesia untuk wilayah Sumatera Selatan</p>
                </div>
                <div class="keunggulan-card">
                    <div class="keunggulan-icon"><i class="fas fa-truck-fast"></i></div>
                    <h4>Distribusi Cepat</h4>
                    <p>Jaringan distribusi luas yang menjamin produk sampai tepat waktu ke seluruh mitra</p>
                </div>
                <div class="keunggulan-card">
                    <div class="keunggulan-icon"><i class="fas fa-handshake"></i></div>
                    <h4>Kemitraan Kuat</h4>
                    <p>Lebih dari 500 mitra retail aktif yang telah mempercayai layanan kami</p>
                </div>
                <div class="keunggulan-card">
                    <div class="keunggulan-icon"><i class="fas fa-boxes-stacked"></i></div>
                    <h4>Stok Lengkap</h4>
                    <p>Gudang modern dengan kapasitas besar memastikan ketersediaan stok selalu terjaga</p>
                </div>
                <div class="keunggulan-card">
                    <div class="keunggulan-icon"><i class="fas fa-shield-check"></i></div>
                    <h4>Kualitas Terjamin</h4>
                    <p>Standar pengelolaan produk ketat sesuai ketentuan Unilever Indonesia</p>
                </div>
                <div class="keunggulan-card">
                    <div class="keunggulan-icon"><i class="fas fa-headset"></i></div>
                    <h4>Layanan Prima</h4>
                    <p>Tim profesional siap membantu kebutuhan mitra bisnis kami setiap saat</p>
                </div>
            </div>
        </div>

        {{-- CTA --}}
        <div style="background: var(--navy); border-radius: 24px; padding: 48px; text-align: center; position: relative; overflow: hidden;">
            <div style="position:absolute;inset:0;background:radial-gradient(ellipse at center,rgba(201,168,76,0.1) 0%,transparent 70%);"></div>
            <p style="font-size:0.75rem;font-weight:600;letter-spacing:4px;text-transform:uppercase;color:var(--gold);margin-bottom:12px;position:relative;z-index:1;">Bergabung Bersama Kami</p>
            <h3 style="font-family:'Playfair Display',serif;font-size:1.8rem;font-weight:700;color:white;margin-bottom:12px;position:relative;z-index:1;">
                Lihat Lowongan <span style="color:var(--gold-light);font-style:italic;">Terbuka</span>
            </h3>
            <p style="color:rgba(255,255,255,0.5);margin-bottom:28px;position:relative;z-index:1;font-size:0.9rem;">
                Bergabunglah dengan tim kami dan berkembang bersama CV. Sriwijaya Serangkai
            </p>
            <a href="/lowongan" style="display:inline-flex;align-items:center;gap:8px;background:var(--gold);color:var(--navy);padding:14px 32px;border-radius:100px;font-weight:700;font-size:0.9rem;text-decoration:none;position:relative;z-index:1;transition:all 0.2s;" onmouseover="this.style.background='var(--gold-light)'" onmouseout="this.style.background='var(--gold)'">
                <i class="fas fa-briefcase"></i> Lihat Lowongan Kerja
            </a>
        </div>

    </div>
</div>
@endsection