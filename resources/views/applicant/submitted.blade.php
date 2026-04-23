@extends('layouts.app')

@section('title', 'Jawaban Terkirim')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@300;400;500;600&display=swap');

    .submitted-page {
        font-family: 'Inter', sans-serif;
        min-height: 100vh;
        background: #0f1117;
        background-image:
            radial-gradient(ellipse at 30% 30%, rgba(34,197,94,0.06) 0%, transparent 50%),
            radial-gradient(ellipse at 70% 70%, rgba(59,130,246,0.06) 0%, transparent 50%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 16px;
    }

    .submitted-card {
        background: #1a1d27;
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 28px;
        padding: 56px 48px;
        text-align: center;
        max-width: 480px;
        width: 100%;
        animation: fadeUp 0.5s ease forwards;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .success-icon-wrapper {
        width: 88px;
        height: 88px;
        background: rgba(34,197,94,0.1);
        border: 2px solid rgba(34,197,94,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 28px;
        animation: pop 0.4s ease 0.3s both;
    }

    @keyframes pop {
        0%   { transform: scale(0.6); opacity: 0; }
        70%  { transform: scale(1.1); }
        100% { transform: scale(1);   opacity: 1; }
    }

    .success-icon { font-size: 2.5rem; }

    .submitted-title {
        font-family: 'Syne', sans-serif;
        font-size: 1.75rem;
        font-weight: 800;
        color: white;
        margin-bottom: 12px;
        line-height: 1.2;
    }

    .submitted-desc {
        color: rgba(255,255,255,0.45);
        font-size: 0.9rem;
        line-height: 1.7;
        margin-bottom: 32px;
    }

    .info-box {
        background: rgba(255,255,255,0.02);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 16px;
        padding: 20px 24px;
        margin-bottom: 28px;
        text-align: left;
    }

    .info-row {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.82rem;
        color: rgba(255,255,255,0.4);
        padding: 7px 0;
    }

    .info-row:not(:last-child) {
        border-bottom: 1px solid rgba(255,255,255,0.04);
    }

    .info-row i {
        width: 16px;
        text-align: center;
        color: rgba(255,255,255,0.25);
        flex-shrink: 0;
    }

    .info-row span {
        color: rgba(255,255,255,0.65);
    }

    .close-note {
        font-size: 0.78rem;
        color: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }
</style>
@endpush

@section('content')
<div class="submitted-page">
    <div class="submitted-card">

        {{-- Icon sukses --}}
        <div class="success-icon-wrapper">
            <span class="success-icon">✅</span>
        </div>

        {{-- Judul --}}
        <h1 class="submitted-title">Jawaban Berhasil<br>Dikirim!</h1>

        {{-- Deskripsi --}}
        <p class="submitted-desc">
            Terima kasih, <strong style="color:rgba(255,255,255,0.7);">{{ $application->name ?? 'Peserta' }}</strong>.<br>
            Jawaban tes Anda telah kami terima. Tim HRD akan meninjau hasil tes Anda dan menghubungi Anda untuk informasi selanjutnya.
        </p>

        {{-- Info detail --}}
        <div class="info-box">
            <div class="info-row">
                <i class="fas fa-user"></i>
                <span>{{ $application->name ?? '-' }}</span>
            </div>
            <div class="info-row">
                <i class="fas fa-briefcase"></i>
                <span>{{ $application->job->title ?? '-' }}</span>
            </div>
            <div class="info-row">
                <i class="fas fa-clock"></i>
                <span>Dikirim: {{ now()->format('d M Y, H:i') }} WIB</span>
            </div>
            @if($application->answer_iq_file)
            <div class="info-row">
                <i class="fas fa-check-circle" style="color:rgba(34,197,94,0.5)"></i>
                <span>Jawaban IQ berhasil diunggah</span>
            </div>
            @endif
            @if($application->answer_disc_file)
            <div class="info-row">
                <i class="fas fa-check-circle" style="color:rgba(34,197,94,0.5)"></i>
                <span>Jawaban DISC berhasil diunggah</span>
            </div>
            @endif
        </div>

        {{-- Catatan --}}
        <p class="close-note">
            <i class="fas fa-lock" style="font-size:10px;"></i>
            Anda boleh menutup halaman ini
        </p>

    </div>
</div>
@endsection