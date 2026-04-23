@extends('layouts.app')

@section('title', 'Lowongan Kerja - CV. Sriwijaya Serangkai')

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

    .low-page { font-family: 'DM Sans', sans-serif; background: var(--cream); min-height: 100vh; }

    /* ===== HERO ===== */
    .low-hero {
        background: var(--navy);
        padding: 80px 24px 100px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .low-hero::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(ellipse at 20% 50%, rgba(201,168,76,0.12) 0%, transparent 55%),
                    radial-gradient(ellipse at 80% 30%, rgba(201,168,76,0.08) 0%, transparent 55%);
    }
    .low-hero::after {
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
    .hero-eyebrow::before, .hero-eyebrow::after {
        content: ''; width: 36px; height: 1px; background: var(--gold); opacity: 0.5;
    }
    .low-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2rem, 5vw, 3.2rem); font-weight: 900;
        color: white; line-height: 1.15;
        position: relative; z-index: 1; margin-bottom: 14px;
    }
    .low-hero h1 span { color: var(--gold-light); font-style: italic; }
    .low-hero p { color: rgba(255,255,255,0.5); font-size: 0.95rem; position: relative; z-index: 1; }

    /* ===== STATS BAR ===== */
    .stats-bar {
        background: white;
        border-bottom: 1px solid rgba(201,168,76,0.12);
        padding: 28px 24px;
    }
    .stats-inner { max-width: 700px; margin: 0 auto; display: flex; justify-content: center; gap: 48px; flex-wrap: wrap; }
    .stat-item { text-align: center; }
    .stat-num { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 900; color: var(--navy); line-height: 1; }
    .stat-num span { color: var(--gold); }
    .stat-lbl { font-size: 0.78rem; color: #888; margin-top: 4px; }

    /* ===== CONTENT ===== */
    .low-content { max-width: 1000px; margin: 0 auto; padding: 56px 24px 80px; }

    /* ===== SECTION LABEL ===== */
    .section-label { margin-bottom: 36px; }
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

    /* ===== JOB CARD ===== */
    .job-card {
        background: white;
        border: 1.5px solid rgba(201,168,76,0.12);
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 3px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    .job-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 48px rgba(201,168,76,0.14);
        border-color: rgba(201,168,76,0.35);
    }

    /* Top accent bar */
    .job-card-accent {
        height: 4px;
        background: linear-gradient(to right, var(--gold), var(--gold-light));
    }

    .job-card-body { padding: 28px 28px 24px; flex: 1; }

    /* Badge posisi */
    .job-badge {
        display: inline-flex; align-items: center; gap: 6px;
        background: var(--gold-pale); color: #8A6B1F;
        border: 1px solid rgba(201,168,76,0.25);
        border-radius: 100px; padding: 4px 14px;
        font-size: 0.7rem; font-weight: 600;
        letter-spacing: 1.5px; text-transform: uppercase;
        margin-bottom: 14px;
    }

    .job-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem; font-weight: 700;
        color: var(--navy); margin-bottom: 14px;
        line-height: 1.3;
    }

    /* Meta info */
    .job-meta { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 18px; }
    .job-meta-item {
        display: inline-flex; align-items: center; gap: 6px;
        background: #f8f8f8; border-radius: 100px;
        padding: 5px 12px; font-size: 0.78rem; color: #555;
    }
    .job-meta-item i { color: var(--gold); font-size: 0.7rem; }

    /* Deadline warning */
    .job-meta-item.deadline-near { background: #FFF7ED; color: #C05621; }
    .job-meta-item.deadline-near i { color: #ED8936; }

    .job-desc {
        font-size: 0.875rem; color: #666;
        line-height: 1.75; margin-bottom: 0;
        display: -webkit-box; -webkit-line-clamp: 3;
        -webkit-box-orient: vertical; overflow: hidden;
    }

    /* Footer card */
    .job-card-footer {
        padding: 18px 28px 24px;
        border-top: 1px solid rgba(201,168,76,0.08);
        display: flex; align-items: center; justify-content: space-between;
        gap: 12px;
    }

    .job-salary {
        font-size: 0.8rem; color: #888;
        display: flex; align-items: center; gap: 6px;
    }
    .job-salary strong { color: var(--navy); font-weight: 600; }

    .btn-lamar {
        display: inline-flex; align-items: center; gap: 8px;
        background: var(--navy); color: white;
        padding: 11px 24px; border-radius: 100px;
        font-size: 0.85rem; font-weight: 600;
        text-decoration: none; transition: all 0.2s;
        white-space: nowrap;
    }
    .btn-lamar:hover {
        background: var(--navy-mid);
        box-shadow: 0 8px 24px rgba(13,27,42,0.25);
        transform: translateX(2px);
    }
    .btn-lamar i { font-size: 0.7rem; transition: transform 0.2s; }
    .btn-lamar:hover i { transform: translateX(3px); }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        text-align: center; padding: 80px 24px;
        background: white; border-radius: 24px;
        border: 1.5px dashed rgba(201,168,76,0.25);
    }
    .empty-icon {
        width: 72px; height: 72px; border-radius: 20px;
        background: var(--gold-pale); color: var(--gold);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem; margin: 0 auto 20px;
    }
    .empty-state h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem; color: var(--navy); margin-bottom: 10px;
    }
    .empty-state p { color: #888; font-size: 0.9rem; line-height: 1.7; }

    /* ===== CTA BOTTOM ===== */
    .cta-box {
        background: var(--navy); border-radius: 24px;
        padding: 48px; text-align: center;
        position: relative; overflow: hidden;
        margin-top: 56px;
    }
    .cta-box::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(ellipse at center, rgba(201,168,76,0.1) 0%, transparent 70%);
    }
    .cta-box * { position: relative; z-index: 1; }
    .cta-eyebrow {
        font-size: 0.7rem; font-weight: 600; letter-spacing: 4px;
        text-transform: uppercase; color: var(--gold); margin-bottom: 12px;
    }
    .cta-box h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.7rem; font-weight: 700; color: white; margin-bottom: 10px;
    }
    .cta-box h3 span { color: var(--gold-light); font-style: italic; }
    .cta-box p { color: rgba(255,255,255,0.5); margin-bottom: 28px; font-size: 0.9rem; }
    .btn-cta {
        display: inline-flex; align-items: center; gap: 8px;
        background: var(--gold); color: var(--navy);
        padding: 14px 32px; border-radius: 100px;
        font-weight: 700; font-size: 0.9rem;
        text-decoration: none; transition: all 0.2s;
    }
    .btn-cta:hover { background: var(--gold-light); transform: translateY(-2px); }

    /* Grid */
    .jobs-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; }
    @media (max-width: 768px) { .jobs-grid { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')
<div class="low-page">

    {{-- Hero --}}
    <div class="low-hero">
        <div class="hero-eyebrow"><span></span>Karir<span></span></div>
        <h1>Lowongan <span>Kerja</span></h1>
        <p>Bergabunglah bersama tim profesional CV. Sriwijaya Serangkai</p>
    </div>

    {{-- Stats Bar --}}
    <div class="stats-bar">
        <div class="stats-inner">
            <div class="stat-item">
                <div class="stat-num">{{ $jobs->count() }}<span>+</span></div>
                <div class="stat-lbl">Posisi Tersedia</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">7<span>+</span></div>
                <div class="stat-lbl">Cabang Operasional</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">20<span>+</span></div>
                <div class="stat-lbl">Tahun Berpengalaman</div>
            </div>
        </div>
    </div>

    <div class="low-content">

        @if($jobs->isEmpty())
            {{-- Empty State --}}
            <div class="empty-state">
                <div class="empty-icon"><i class="fas fa-briefcase"></i></div>
                <h3>Belum Ada Lowongan</h3>
                <p>Saat ini belum ada posisi yang dibuka.<br>Silakan kunjungi halaman ini kembali dalam waktu dekat.</p>
            </div>
        @else
            <div class="section-label">
                <p class="eyebrow">Posisi Terbuka</p>
                <h2>Lowongan Tersedia</h2>
                <div class="section-divider"></div>
            </div>

            <div class="jobs-grid">
                @foreach($jobs as $job)
                @php
                    $deadlineDiff = (int) now()->startOfDay()->diffInDays($job->deadline->startOfDay(), false);
                    $isNearDeadline = $deadlineDiff >= 0 && $deadlineDiff <= 7;
                    $isExpired = $deadlineDiff < 0;
                @endphp
                <div class="job-card">
                    <div class="job-card-accent"></div>
                    <div class="job-card-body">

                        <div class="job-badge">
                            <i class="fas fa-circle" style="font-size:5px;"></i>
                            Lowongan Aktif
                        </div>

                        <h3 class="job-title">{{ $job->title }}</h3>

                        <div class="job-meta">
                            <div class="job-meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $job->location }}</span>
                            </div>
                            @if($job->salary)
                            <div class="job-meta-item">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>{{ $job->salary }}</span>
                            </div>
                            @endif
                            <div class="job-meta-item {{ $isNearDeadline ? 'deadline-near' : '' }}">
                                <i class="fas fa-{{ $isNearDeadline ? 'fire' : 'calendar-alt' }}"></i>
                                <span>
                                    @if($isExpired)
                                        Sudah ditutup
                                    @elseif($isNearDeadline)
                                        Tutup {{ $deadlineDiff == 0 ? 'hari ini' : 'dalam '.$deadlineDiff.' hari lagi' }}
                                    @else
                                        Deadline: {{ $job->deadline->format('d M Y') }}
                                    @endif
                                </span>
                            </div>
                        </div>

                        <p class="job-desc">
                            {!! Str::limit(strip_tags($job->description), 160) !!}
                        </p>

                    </div>
                    <div class="job-card-footer">
                        <div class="job-salary">
                            <i class="fas fa-users" style="color:var(--gold);"></i>
                            <span>Dibuka untuk umum</span>
                        </div>
                        <a href="{{ route('lowongan.show', $job->slug) }}" class="btn-lamar">
                            Lihat & Lamar <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @endif

        {{-- CTA --}}
        <div class="cta-box">
            <p class="cta-eyebrow">Tentang Kami</p>
            <h3>Kenapa Bergabung <span>Bersama Kami?</span></h3>
            <p>Lingkungan kerja profesional, jenjang karir jelas, dan bersama distributor resmi Unilever terpercaya</p>
            <a href="/profil" class="btn-cta">
                <i class="fas fa-building"></i> Lihat Profil Perusahaan
            </a>
        </div>

    </div>
</div>
@endsection