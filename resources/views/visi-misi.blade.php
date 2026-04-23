@extends('layouts.app')

@section('title', 'Visi & Misi - CV. Sriwijaya Serangkai')

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

    .vm-page { font-family: 'DM Sans', sans-serif; background: var(--cream); min-height: 100vh; }

    /* ===== HERO ===== */
    .vm-hero {
        background: var(--navy); padding: 80px 24px 100px;
        text-align: center; position: relative; overflow: hidden;
    }
    .vm-hero::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(ellipse at 20% 50%, rgba(201,168,76,0.12) 0%, transparent 55%),
                    radial-gradient(ellipse at 80% 30%, rgba(201,168,76,0.08) 0%, transparent 55%);
    }
    .vm-hero::after {
        content: ''; position: absolute; bottom: -1px; left: 0; right: 0;
        height: 60px; background: var(--cream);
        clip-path: ellipse(55% 100% at 50% 100%);
    }
    .hero-eyebrow {
        display: inline-flex; align-items: center; gap: 10px;
        color: var(--gold); font-size: 0.72rem; font-weight: 600;
        letter-spacing: 4px; text-transform: uppercase;
        margin-bottom: 18px; position: relative; z-index: 1;
    }
    .hero-eyebrow::before, .hero-eyebrow::after { content: ''; width: 36px; height: 1px; background: var(--gold); opacity: 0.5; }
    .vm-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2rem, 5vw, 3.2rem); font-weight: 900;
        color: white; line-height: 1.15;
        position: relative; z-index: 1; margin-bottom: 14px;
    }
    .vm-hero h1 span { color: var(--gold-light); font-style: italic; }
    .vm-hero p { color: rgba(255,255,255,0.5); font-size: 0.95rem; position: relative; z-index: 1; }

    /* ===== CONTENT ===== */
    .vm-content { max-width: 960px; margin: 0 auto; padding: 56px 24px 80px; }

    /* ===== SEJARAH ===== */
    .sejarah-box {
        background: white; border-radius: 20px;
        border: 1.5px solid rgba(201,168,76,0.15);
        padding: 32px 40px; text-align: center;
        box-shadow: 0 3px 20px rgba(0,0,0,0.05);
        margin-bottom: 56px;
    }
    .sejarah-box p { color: #555; line-height: 1.85; font-size: 0.95rem; }
    .sejarah-box strong { color: var(--navy); font-weight: 700; }

    /* ===== SECTION LABEL ===== */
    .section-label { margin-bottom: 28px; }
    .section-label .eyebrow {
        font-size: 0.7rem; font-weight: 600; letter-spacing: 4px;
        text-transform: uppercase; color: var(--gold); margin-bottom: 8px;
    }
    .section-label h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem; font-weight: 700; color: var(--navy);
    }
    .section-divider {
        width: 48px; height: 3px; margin-top: 12px;
        background: linear-gradient(to right, var(--gold), rgba(201,168,76,0.3));
        border-radius: 2px;
    }

    /* ===== VISI ===== */
    .visi-section { margin-bottom: 56px; }
    .visi-card {
        background: var(--navy); border-radius: 22px;
        padding: 40px; overflow: hidden; position: relative;
        box-shadow: 0 8px 32px rgba(13,27,42,0.18);
    }
    .visi-card::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(ellipse at 80% 20%, rgba(201,168,76,0.12) 0%, transparent 60%);
    }
    .visi-card::after {
        content: '"'; position: absolute; top: -20px; right: 32px;
        font-family: 'Playfair Display', serif; font-size: 14rem;
        color: rgba(201,168,76,0.06); line-height: 1; pointer-events: none;
    }
    .visi-item {
        display: flex; align-items: flex-start; gap: 20px;
        position: relative; z-index: 1;
        padding: 20px 0;
    }
    .visi-item + .visi-item {
        border-top: 1px solid rgba(255,255,255,0.06);
    }
    .visi-num {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem; font-weight: 900;
        color: rgba(201,168,76,0.3); line-height: 1;
        flex-shrink: 0; width: 52px;
    }
    .visi-text { color: rgba(255,255,255,0.82); line-height: 1.8; font-size: 0.97rem; padding-top: 6px; }

    /* ===== MISI ===== */
    .misi-section { margin-bottom: 56px; }
    .misi-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 18px; }

    .misi-card {
        background: white; border-radius: 18px;
        border: 1.5px solid rgba(201,168,76,0.12);
        padding: 28px 24px;
        box-shadow: 0 3px 16px rgba(0,0,0,0.05);
        transition: all 0.25s ease;
        display: flex; gap: 18px; align-items: flex-start;
    }
    .misi-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 36px rgba(201,168,76,0.14);
        border-color: rgba(201,168,76,0.35);
    }
    .misi-card.full { grid-column: span 2; }

    .misi-num-wrap {
        width: 44px; height: 44px; border-radius: 13px; flex-shrink: 0;
        background: var(--gold-pale); border: 1.5px solid rgba(201,168,76,0.25);
        display: flex; align-items: center; justify-content: center;
    }
    .misi-num {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem; font-weight: 900; color: var(--gold);
    }
    .misi-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.05rem; font-weight: 700;
        color: var(--navy); margin-bottom: 8px;
    }
    .misi-desc { font-size: 0.875rem; color: #666; line-height: 1.75; }

    /* ===== NILAI ===== */
    .nilai-section { margin-bottom: 56px; }
    .nilai-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
    .nilai-card {
        background: white; border-radius: 18px;
        border: 1.5px solid rgba(201,168,76,0.1);
        padding: 24px 20px; text-align: center;
        transition: all 0.25s;
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
    }
    .nilai-card:hover { transform: translateY(-4px); border-color: rgba(201,168,76,0.35); box-shadow: 0 10px 28px rgba(201,168,76,0.12); }
    .nilai-icon {
        width: 52px; height: 52px; border-radius: 14px;
        background: var(--gold-pale); color: var(--gold);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.3rem; margin: 0 auto 14px;
    }
    .nilai-title { font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 700; color: var(--navy); margin-bottom: 8px; }
    .nilai-desc { font-size: 0.8rem; color: #777; line-height: 1.7; }

    /* ===== QUOTE ===== */
    .quote-box {
        background: var(--gold-pale); border-radius: 22px;
        border: 1.5px solid rgba(201,168,76,0.2);
        padding: 48px 40px; text-align: center;
        position: relative; overflow: hidden;
    }
    .quote-box::before {
        content: '"'; position: absolute; top: -30px; left: 20px;
        font-family: 'Playfair Display', serif; font-size: 16rem;
        color: rgba(201,168,76,0.12); line-height: 1; pointer-events: none;
    }
    .quote-text {
        font-family: 'Playfair Display', serif;
        font-size: clamp(1rem, 2.5vw, 1.25rem);
        font-style: italic; color: var(--navy);
        line-height: 1.8; position: relative; z-index: 1;
        max-width: 700px; margin: 0 auto 20px;
    }
    .quote-author {
        font-size: 0.8rem; font-weight: 600;
        letter-spacing: 2px; text-transform: uppercase;
        color: var(--gold); position: relative; z-index: 1;
    }

    @media (max-width: 640px) {
        .misi-grid { grid-template-columns: 1fr; }
        .misi-card.full { grid-column: span 1; }
        .nilai-grid { grid-template-columns: 1fr 1fr; }
        .sejarah-box { padding: 24px; }
    }
</style>
@endpush

@section('content')
<div class="vm-page">

    {{-- Hero --}}
    <div class="vm-hero">
        <div class="hero-eyebrow"><span></span>Tentang Kami<span></span></div>
        <h1>Visi & <span>Misi</span></h1>
        <p>Fondasi nilai yang menjadi pedoman setiap langkah CV. Sriwijaya Serangkai</p>
    </div>

    <div class="vm-content">

        {{-- Sejarah Singkat --}}
        <div class="sejarah-box">
            <p>
                CV. Sriwijaya Serangkai berdiri sejak <strong>14 Februari 2012</strong>.
                Sejak hari pertama, kami selalu menjunjung tinggi profesionalisme, tanggung jawab,
                dan komitmen untuk memberikan pelayanan terbaik kepada mitra dan konsumen
                di seluruh wilayah Sumatera Selatan.
            </p>
        </div>

        {{-- VISI --}}
        <div class="visi-section">
            <div class="section-label">
                <p class="eyebrow">Pandangan Ke Depan</p>
                <h2>Visi Kami</h2>
                <div class="section-divider"></div>
            </div>
            <div class="visi-card">
                <div class="visi-item">
                    <div class="visi-num">01</div>
                    <div class="visi-text">
                        Menjadi perusahaan distribusi FMCG terbesar, terpercaya, dan paling kompetitif di wilayah Sumatera Selatan.
                    </div>
                </div>
                <div class="visi-item">
                    <div class="visi-num">02</div>
                    <div class="visi-text">
                        Menjadi perusahaan yang unggul dalam efisiensi rantai pasok dan kualitas layanan pelanggan.
                    </div>
                </div>
            </div>
        </div>

        {{-- MISI --}}
        <div class="misi-section">
            <div class="section-label">
                <p class="eyebrow">Langkah Nyata</p>
                <h2>Misi Kami</h2>
                <div class="section-divider"></div>
            </div>
            <div class="misi-grid">

                <div class="misi-card">
                    <div class="misi-num-wrap"><div class="misi-num">1</div></div>
                    <div>
                        <div class="misi-title">Distribusi Efisien</div>
                        <p class="misi-desc">Menerapkan sistem distribusi yang efektif dan efisien untuk memastikan ketersediaan produk di seluruh jaringan pasar.</p>
                    </div>
                </div>

                <div class="misi-card">
                    <div class="misi-num-wrap"><div class="misi-num">2</div></div>
                    <div>
                        <div class="misi-title">Pelayanan Optimal</div>
                        <p class="misi-desc">Memberikan pelayanan yang profesional dan optimal kepada seluruh pelanggan dan mitra bisnis demi kepuasan maksimal.</p>
                    </div>
                </div>

                <div class="misi-card">
                    <div class="misi-num-wrap"><div class="misi-num">3</div></div>
                    <div>
                        <div class="misi-title">Kualitas Terjamin</div>
                        <p class="misi-desc">Menjamin produk yang didistribusikan selalu aman, berkualitas, dan sampai ke konsumen dalam kondisi terbaik.</p>
                    </div>
                </div>

                <div class="misi-card">
                    <div class="misi-num-wrap"><div class="misi-num">4</div></div>
                    <div>
                        <div class="misi-title">Pengembangan SDM</div>
                        <p class="misi-desc">Mengembangkan sumber daya manusia yang kompeten, berintegritas, dan inovatif sebagai aset utama perusahaan.</p>
                    </div>
                </div>

                <div class="misi-card full">
                    <div class="misi-num-wrap"><div class="misi-num">5</div></div>
                    <div>
                        <div class="misi-title">Etika Bisnis</div>
                        <p class="misi-desc">Menjunjung tinggi kaidah dan etika bisnis dalam setiap aspek operasional perusahaan demi kepercayaan jangka panjang.</p>
                    </div>
                </div>

            </div>
        </div>

        {{-- NILAI --}}
        <div class="nilai-section">
            <div class="section-label">
                <p class="eyebrow">Budaya Perusahaan</p>
                <h2>Nilai Kami</h2>
                <div class="section-divider"></div>
            </div>
            <div class="nilai-grid">
                <div class="nilai-card">
                    <div class="nilai-icon"><i class="fas fa-handshake"></i></div>
                    <div class="nilai-title">Integritas</div>
                    <p class="nilai-desc">Jujur dan bertanggung jawab dalam setiap tindakan dan keputusan bisnis</p>
                </div>
                <div class="nilai-card">
                    <div class="nilai-icon"><i class="fas fa-rocket"></i></div>
                    <div class="nilai-title">Inovasi</div>
                    <p class="nilai-desc">Terus berinovasi untuk meningkatkan efisiensi dan kualitas layanan</p>
                </div>
                <div class="nilai-card">
                    <div class="nilai-icon"><i class="fas fa-users"></i></div>
                    <div class="nilai-title">Kerjasama</div>
                    <p class="nilai-desc">Membangun sinergi tim yang kuat untuk mencapai tujuan bersama</p>
                </div>
            </div>
        </div>

        {{-- Quote --}}
        <div class="quote-box">
            <p class="quote-text">
                Dengan keyakinan bahwa bisnis harus menjadi katalis perubahan positif,
                kami terus berupaya memberikan kontribusi terbaik bagi mitra, konsumen,
                dan masyarakat Sumatera Selatan.
            </p>
            <div class="quote-author">— Manajemen CV. Sriwijaya Serangkai —</div>
        </div>

    </div>
</div>
@endsection