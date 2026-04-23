@extends('layouts.app')

@section('title', 'Jawaban Sudah Dikirim')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@300;400;500;600&display=swap');

    .submitted-page {
        font-family: 'Inter', sans-serif;
        min-height: 100vh;
        background: #0f1117;
        background-image:
            radial-gradient(ellipse at 30% 30%, rgba(251,191,36,0.05) 0%, transparent 50%),
            radial-gradient(ellipse at 70% 70%, rgba(99,102,241,0.05) 0%, transparent 50%);
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
        max-width: 440px;
        width: 100%;
    }

    .icon-wrapper {
        width: 80px;
        height: 80px;
        background: rgba(251,191,36,0.08);
        border: 2px solid rgba(251,191,36,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        font-size: 2.2rem;
    }

    .page-title {
        font-family: 'Syne', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
        color: white;
        margin-bottom: 10px;
    }

    .page-desc {
        color: rgba(255,255,255,0.4);
        font-size: 0.875rem;
        line-height: 1.7;
    }
</style>
@endpush

@section('content')
<div class="submitted-page">
    <div class="submitted-card">
        <div class="icon-wrapper">⚠️</div>
        <h1 class="page-title">Jawaban Sudah Dikirim</h1>
        <p class="page-desc">
            Anda sudah pernah mengirim jawaban tes sebelumnya.<br>
            Jika ada pertanyaan, silakan hubungi tim HRD kami.
        </p>
    </div>
</div>
@endsectionx