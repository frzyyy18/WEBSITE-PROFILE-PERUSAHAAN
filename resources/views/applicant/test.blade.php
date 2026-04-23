@extends('layouts.app')

@section('title', 'Tes Online')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@300;400;500;600&display=swap');
    .test-page { font-family: 'Inter', sans-serif; min-height: 100vh; background: #0f1117; background-image: radial-gradient(ellipse at 20% 20%, rgba(59,130,246,0.08) 0%, transparent 50%), radial-gradient(ellipse at 80% 80%, rgba(139,92,246,0.08) 0%, transparent 50%); }
    .test-card { background: #1a1d27; border: 1px solid rgba(255,255,255,0.06); border-radius: 24px; }
    .timer-ring { position: relative; width: 180px; height: 180px; margin: 0 auto; }
    .timer-ring svg { transform: rotate(-90deg); }
    .ring-bg { fill: none; stroke: rgba(255,255,255,0.05); stroke-width: 8; }
    .ring-progress { fill: none; stroke: url(#timerGradient); stroke-width: 8; stroke-linecap: round; stroke-dasharray: 502; stroke-dashoffset: 0; transition: stroke-dashoffset 1s linear; }
    .ring-progress.warning { stroke: url(#warningGradient); }
    .ring-progress.danger { stroke: url(#dangerGradient); animation: pulse-ring 1s ease-in-out infinite; }
    @keyframes pulse-ring { 0%,100%{opacity:1} 50%{opacity:0.5} }
    .timer-center { position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); text-align: center; }
    .timer-display { font-family: 'Syne',sans-serif; font-size: 2.2rem; font-weight: 800; color: white; line-height: 1; letter-spacing: -1px; }
    .timer-label { font-size: 0.65rem; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 2px; margin-top: 4px; }
    .soal-btn { display: flex; align-items: center; gap: 16px; padding: 20px 24px; border-radius: 16px; text-decoration: none; transition: all 0.2s; border: 1px solid; }
    .soal-btn:hover { transform: translateY(-2px); }
    .soal-btn.iq { background: rgba(59,130,246,0.08); border-color: rgba(59,130,246,0.2); color: #93c5fd; }
    .soal-btn.iq:hover { border-color: rgba(59,130,246,0.4); box-shadow: 0 8px 32px rgba(59,130,246,0.15); }
    .soal-btn.disc { background: rgba(139,92,246,0.08); border-color: rgba(139,92,246,0.2); color: #c4b5fd; }
    .soal-btn.disc:hover { border-color: rgba(139,92,246,0.4); box-shadow: 0 8px 32px rgba(139,92,246,0.15); }
    .soal-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; flex-shrink: 0; }
    .soal-btn.iq .soal-icon { background: rgba(59,130,246,0.15); }
    .soal-btn.disc .soal-icon { background: rgba(139,92,246,0.15); }
    .upload-box { border: 2px dashed rgba(255,255,255,0.1); border-radius: 16px; padding: 24px; text-align: center; transition: all 0.2s; cursor: pointer; position: relative; }
    .upload-box input[type="file"] { position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%; }
    .upload-box:hover { border-color: rgba(255,255,255,0.2); }
    .upload-box.selected-iq { border-color: rgba(59,130,246,0.4); background: rgba(59,130,246,0.04); }
    .upload-box.selected-disc { border-color: rgba(139,92,246,0.4); background: rgba(139,92,246,0.04); }
    .file-info { display: none; align-items: center; gap: 10px; background: rgba(34,197,94,0.08); border: 1px solid rgba(34,197,94,0.2); border-radius: 10px; padding: 10px 14px; margin-top: 10px; }
    .submit-btn { width: 100%; padding: 18px; background: linear-gradient(135deg,#3b82f6,#6366f1); color: white; border: none; border-radius: 16px; font-family: 'Syne',sans-serif; font-size: 1rem; font-weight: 700; letter-spacing: 0.5px; cursor: pointer; transition: all 0.2s; }
    .submit-btn:hover:not(:disabled) { transform: translateY(-2px); box-shadow: 0 12px 40px rgba(99,102,241,0.35); }
    .submit-btn:disabled { opacity: 0.35; cursor: not-allowed; transform: none; }
    .section-title { font-family: 'Syne',sans-serif; font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 3px; color: rgba(255,255,255,0.3); margin-bottom: 12px; }
    .divider { height: 1px; background: rgba(255,255,255,0.06); margin: 24px 0; }
    .badge { display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; border-radius: 100px; font-size: 0.75rem; font-weight: 500; }
    .badge-blue { background: rgba(59,130,246,0.1); color: #93c5fd; border: 1px solid rgba(59,130,246,0.2); }
    .progress-item { flex: 1; padding: 10px 14px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.06); background: rgba(255,255,255,0.02); display: flex; align-items: center; gap: 8px; font-size: 0.8rem; color: rgba(255,255,255,0.3); transition: all 0.3s; }
    .progress-item.done { border-color: rgba(34,197,94,0.3); background: rgba(34,197,94,0.06); color: #86efac; }
    .progress-item .dot { width: 8px; height: 8px; border-radius: 50%; background: rgba(255,255,255,0.15); flex-shrink: 0; transition: all 0.3s; }
    .progress-item.done .dot { background: #22c55e; }

    /* Overlay waktu habis */
    .timeout-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.85); backdrop-filter: blur(8px); z-index: 9999; display: none; align-items: center; justify-content: center; }
    .timeout-overlay.show { display: flex; }
    .timeout-card { background: #1a1d27; border: 1px solid rgba(239,68,68,0.3); border-radius: 24px; padding: 48px 40px; text-align: center; max-width: 400px; width: 90%; }

    /* Loading overlay saat submit */
    .loading-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.85); backdrop-filter: blur(8px); z-index: 9998; display: none; align-items: center; justify-content: center; }
    .loading-overlay.show { display: flex; }
    .loading-card { background: #1a1d27; border: 1px solid rgba(99,102,241,0.3); border-radius: 24px; padding: 48px 40px; text-align: center; max-width: 380px; width: 90%; }
    .spinner { width: 56px; height: 56px; border: 4px solid rgba(99,102,241,0.2); border-top-color: #6366f1; border-radius: 50%; animation: spin 0.8s linear infinite; margin: 0 auto 20px; }
    @keyframes spin { to { transform: rotate(360deg); } }

    /* Alert flash */
    .flash-alert { border-radius: 14px; padding: 14px 18px; margin-bottom: 16px; display: flex; align-items: center; gap: 10px; font-size: 0.875rem; }
    .flash-success { background: rgba(34,197,94,0.08); border: 1px solid rgba(34,197,94,0.2); color: #86efac; }
    .flash-error { background: rgba(239,68,68,0.08); border: 1px solid rgba(239,68,68,0.2); color: #fca5a5; }
</style>
@endpush

@section('content')

{{-- ===== OVERLAY WAKTU HABIS ===== --}}
<div class="timeout-overlay" id="timeoutOverlay">
    <div class="timeout-card">
        <div style="font-size:3rem;margin-bottom:16px;">⏰</div>
        <h2 style="font-family:'Syne',sans-serif;font-size:1.5rem;font-weight:800;color:white;margin-bottom:8px;">
            Waktu Habis!
        </h2>
        <p style="color:rgba(255,255,255,0.5);font-size:0.875rem;margin-bottom:24px;">
            Jawaban Anda akan dikirim secara otomatis dalam <span id="autoSubmitCountdown">5</span> detik...
        </p>
        <div style="height:4px;background:rgba(255,255,255,0.06);border-radius:99px;overflow:hidden;">
            <div id="autoSubmitBar" style="height:100%;background:linear-gradient(90deg,#ef4444,#dc2626);width:100%;transition:width 5s linear;border-radius:99px;"></div>
        </div>
    </div>
</div>

{{-- ===== OVERLAY LOADING SUBMIT ===== --}}
<div class="loading-overlay" id="loadingOverlay">
    <div class="loading-card">
        <div class="spinner"></div>
        <h2 style="font-family:'Syne',sans-serif;font-size:1.3rem;font-weight:800;color:white;margin-bottom:8px;">
            Mengirim Jawaban...
        </h2>
        <p style="color:rgba(255,255,255,0.4);font-size:0.85rem;">
            Mohon tunggu, jangan tutup halaman ini
        </p>
    </div>
</div>

<div class="test-page py-10 px-4">
<div class="max-w-2xl mx-auto">

    {{-- Flash Messages --}}
    @if(session('success'))
    <div class="flash-alert flash-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="flash-alert flash-error">
        <i class="fas fa-exclamation-circle"></i>
        {{ session('error') }}
    </div>
    @endif

    {{-- Header --}}
    <div class="text-center mb-8">
        <span class="badge badge-blue mb-4">
            <i class="fas fa-circle" style="font-size:6px"></i> Sesi Tes Aktif
        </span>
        <h1 class="font-bold text-white mb-1" style="font-family:'Syne',sans-serif;font-size:1.75rem;">Tes Online</h1>
        <p class="text-sm" style="color:rgba(255,255,255,0.4);">
            Peserta: <span style="color:rgba(255,255,255,0.7);">{{ $application->name }}</span>
        </p>
    </div>

    {{-- Timer --}}
    <div class="test-card p-8 mb-4 text-center">
        <p class="section-title">Sisa Waktu</p>
        <div class="timer-ring mb-4">
            <svg width="180" height="180" viewBox="0 0 180 180">
                <defs>
                    <linearGradient id="timerGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#3b82f6"/>
                        <stop offset="100%" style="stop-color:#6366f1"/>
                    </linearGradient>
                    <linearGradient id="warningGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#f59e0b"/>
                        <stop offset="100%" style="stop-color:#ef4444"/>
                    </linearGradient>
                    <linearGradient id="dangerGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#ef4444"/>
                        <stop offset="100%" style="stop-color:#dc2626"/>
                    </linearGradient>
                </defs>
                <circle class="ring-bg" cx="90" cy="90" r="80"/>
                <circle class="ring-progress" id="timerRing" cx="90" cy="90" r="80"/>
            </svg>
            <div class="timer-center">
                <div class="timer-display" id="timer">--:--</div>
                <div class="timer-label">menit : detik</div>
            </div>
        </div>
        <div id="timerStatus" class="text-sm" style="color:rgba(255,255,255,0.4);">
            Kerjakan dengan tenang dan teliti
        </div>
    </div>

    {{-- Download Soal --}}
    @if($application->iq_test_file || $application->disc_test_file)
    <div class="test-card p-6 mb-4">
        <p class="section-title">Unduh Soal</p>
        <div class="space-y-3">
            @if($application->iq_test_file)
            <a href="{{ Storage::url($application->iq_test_file) }}" target="_blank" class="soal-btn iq">
                <div class="soal-icon">📘</div>
                <div class="flex-1">
                    <div class="font-semibold" style="font-family:'Syne',sans-serif;">Soal IQ</div>
                    <div class="text-xs mt-0.5" style="color:rgba(147,197,253,0.6);">Klik untuk download PDF</div>
                </div>
                <i class="fas fa-download text-sm opacity-60"></i>
            </a>
            @endif
            @if($application->disc_test_file)
            <a href="{{ Storage::url($application->disc_test_file) }}" target="_blank" class="soal-btn disc">
                <div class="soal-icon">📗</div>
                <div class="flex-1">
                    <div class="font-semibold" style="font-family:'Syne',sans-serif;">Soal DISC</div>
                    <div class="text-xs mt-0.5" style="color:rgba(196,181,253,0.6);">Klik untuk download PDF</div>
                </div>
                <i class="fas fa-download text-sm opacity-60"></i>
            </a>
            @endif
        </div>
    </div>
    @endif

    {{-- Upload Jawaban --}}
    <div class="test-card p-6">
        <p class="section-title">Upload Jawaban</p>

        {{-- Progress indicator --}}
        <div class="flex gap-3 mb-6">
            @if($application->iq_test_file)
            <div class="progress-item" id="prog-iq">
                <div class="dot"></div>
                <span>Jawaban IQ</span>
            </div>
            @endif
            @if($application->disc_test_file)
            <div class="progress-item" id="prog-disc">
                <div class="dot"></div>
                <span>Jawaban DISC</span>
            </div>
            @endif
        </div>

        {{-- FORM SUBMIT --}}
        <form action="{{ route('applicant.submit', $application->id) }}"
              method="POST"
              enctype="multipart/form-data"
              id="submitForm">
            @csrf

            {{-- Upload Jawaban IQ --}}
            @if($application->iq_test_file)
            <div class="mb-5">
                <p class="text-sm font-semibold mb-2" style="color:#93c5fd;font-family:'Syne',sans-serif;">
                    📘 Jawaban Soal IQ
                </p>
                <div class="upload-box" id="boxIq">
                    <input type="file" name="answer_iq_file" id="fileIq"
                           accept=".pdf,.jpg,.jpeg,.png,.zip"
                           onchange="handleFile(this, 'iq')">
                    <i class="fas fa-cloud-upload-alt text-2xl mb-2" style="color:rgba(147,197,253,0.3);"></i>
                    <p class="text-sm" style="color:rgba(255,255,255,0.4);">Klik atau drag file jawaban IQ</p>
                    <p class="text-xs mt-1" style="color:rgba(255,255,255,0.2);">PDF, JPG, PNG, ZIP — Maks. 20MB</p>
                </div>
                <div class="file-info" id="infoIq">
                    <i class="fas fa-file-check text-green-400 text-sm shrink-0"></i>
                    <span class="text-sm text-green-400 font-medium flex-1 truncate" id="nameIq"></span>
                    <button type="button" onclick="clearFile('iq')"
                            class="text-xs text-red-400 hover:text-red-300 shrink-0 ml-2">
                        <i class="fas fa-times"></i> Hapus
                    </button>
                </div>
            </div>
            @endif

            {{-- Upload Jawaban DISC --}}
            @if($application->disc_test_file)
            <div class="mb-5">
                <p class="text-sm font-semibold mb-2" style="color:#c4b5fd;font-family:'Syne',sans-serif;">
                    📗 Jawaban Soal DISC
                </p>
                <div class="upload-box" id="boxDisc">
                    <input type="file" name="answer_disc_file" id="fileDisc"
                           accept=".pdf,.jpg,.jpeg,.png,.zip"
                           onchange="handleFile(this, 'disc')">
                    <i class="fas fa-cloud-upload-alt text-2xl mb-2" style="color:rgba(196,181,253,0.3);"></i>
                    <p class="text-sm" style="color:rgba(255,255,255,0.4);">Klik atau drag file jawaban DISC</p>
                    <p class="text-xs mt-1" style="color:rgba(255,255,255,0.2);">PDF, JPG, PNG, ZIP — Maks. 20MB</p>
                </div>
                <div class="file-info" id="infoDisc">
                    <i class="fas fa-file-check text-green-400 text-sm shrink-0"></i>
                    <span class="text-sm text-green-400 font-medium flex-1 truncate" id="nameDisc"></span>
                    <button type="button" onclick="clearFile('disc')"
                            class="text-xs text-red-400 hover:text-red-300 shrink-0 ml-2">
                        <i class="fas fa-times"></i> Hapus
                    </button>
                </div>
            </div>
            @endif

            <div class="divider"></div>

            <button type="submit" id="submitBtn" class="submit-btn" disabled>
                <i class="fas fa-paper-plane mr-2"></i> Kirim Semua Jawaban
            </button>
            <p class="text-center text-xs mt-3" style="color:rgba(255,255,255,0.2);">
                Upload semua jawaban terlebih dahulu untuk mengaktifkan tombol kirim
            </p>
        </form>
    </div>

</div>
</div>

@push('scripts')
<script>
    // ============================================================
    // TIMER
    // ============================================================
    let timeLeft  = {{ $timeLeft ?? 3600 }};
    const totalTime  = {{ ($application->test_duration ?? 60) * 60 }};
    const timerEl    = document.getElementById('timer');
    const timerRing  = document.getElementById('timerRing');
    const timerStatus = document.getElementById('timerStatus');
    const circumference = 502;
    timerRing.style.strokeDasharray = circumference;

    let timerExpired = false;

    function updateTimer() {
        if (timerExpired) return;

        const m = Math.floor(timeLeft / 60);
        const s = timeLeft % 60;
        timerEl.textContent = String(m).padStart(2, '0') + ':' + String(s).padStart(2, '0');
        timerRing.style.strokeDashoffset = circumference * (1 - timeLeft / totalTime);

        // Waktu habis
        if (timeLeft <= 0) {
            timerExpired = true;
            timerEl.textContent = '00:00';
            timerStatus.textContent = '⚠️ Waktu habis! Jawaban dikirim otomatis...';
            timerStatus.style.color = '#ef4444';
            triggerAutoSubmit();
            return;
        }

        // Peringatan < 5 menit
        if (timeLeft <= 300) {
            timerRing.classList.remove('warning');
            timerRing.classList.add('danger');
            timerStatus.textContent = '⚠️ Segera kirim jawaban!';
            timerStatus.style.color = '#ef4444';
        }
        // Peringatan < 10 menit
        else if (timeLeft <= 600) {
            timerRing.classList.add('warning');
            timerStatus.textContent = '⏳ Sisa waktu kurang dari 10 menit';
            timerStatus.style.color = '#f59e0b';
        }

        timeLeft--;
    }

    // Jalankan timer setiap 1 detik
    const timerInterval = setInterval(updateTimer, 1000);
    updateTimer(); // langsung tampil tanpa delay 1 detik

    // ============================================================
    // AUTO SUBMIT SAAT WAKTU HABIS
    // ============================================================
    function triggerAutoSubmit() {
        clearInterval(timerInterval);

        // Tampilkan overlay waktu habis
        const overlay = document.getElementById('timeoutOverlay');
        overlay.classList.add('show');

        // Animasi progress bar countdown
        const bar = document.getElementById('autoSubmitBar');
        const countdownEl = document.getElementById('autoSubmitCountdown');
        let count = 5;

        // Reset bar lalu animate
        setTimeout(() => {
            bar.style.width = '0%';
        }, 100);

        const countdownInterval = setInterval(() => {
            count--;
            countdownEl.textContent = count;
            if (count <= 0) {
                clearInterval(countdownInterval);
                // Submit form
                document.getElementById('submitForm').submit();
            }
        }, 1000);
    }

    // ============================================================
    // UPLOAD FILE HANDLER
    // ============================================================
    const hasIq   = {{ $application->iq_test_file ? 'true' : 'false' }};
    const hasDisc = {{ $application->disc_test_file ? 'true' : 'false' }};
    let doneIq   = false;
    let doneDisc = false;

    function handleFile(input, type) {
        if (!input.files.length) return;

        const file = input.files[0];

        // Cek ukuran file (max 20MB)
        if (file.size > 20 * 1024 * 1024) {
            alert('File terlalu besar! Maksimal 20MB.');
            input.value = '';
            return;
        }

        if (type === 'iq') {
            document.getElementById('nameIq').textContent = file.name;
            document.getElementById('infoIq').style.display = 'flex';
            document.getElementById('boxIq').classList.add('selected-iq');
            document.getElementById('prog-iq').classList.add('done');
            doneIq = true;
        } else {
            document.getElementById('nameDisc').textContent = file.name;
            document.getElementById('infoDisc').style.display = 'flex';
            document.getElementById('boxDisc').classList.add('selected-disc');
            document.getElementById('prog-disc').classList.add('done');
            doneDisc = true;
        }

        checkReady();
    }

    function clearFile(type) {
        if (type === 'iq') {
            document.getElementById('fileIq').value = '';
            document.getElementById('infoIq').style.display = 'none';
            document.getElementById('boxIq').classList.remove('selected-iq');
            document.getElementById('prog-iq').classList.remove('done');
            doneIq = false;
        } else {
            document.getElementById('fileDisc').value = '';
            document.getElementById('infoDisc').style.display = 'none';
            document.getElementById('boxDisc').classList.remove('selected-disc');
            document.getElementById('prog-disc').classList.remove('done');
            doneDisc = false;
        }
        checkReady();
    }

    function checkReady() {
        const iqOk   = !hasIq   || doneIq;
        const discOk = !hasDisc || doneDisc;
        document.getElementById('submitBtn').disabled = !(iqOk && discOk);
    }

    // ============================================================
    // SUBMIT FORM — tampilkan loading overlay
    // ============================================================
    document.getElementById('submitForm').addEventListener('submit', function(e) {
        if (!confirm('Yakin ingin mengirim semua jawaban? Tindakan ini tidak bisa dibatalkan.')) {
            e.preventDefault();
            return;
        }

        // Tampilkan loading overlay
        document.getElementById('loadingOverlay').classList.add('show');

        // Disable tombol agar tidak double submit
        const btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Mengirim...';
    });
</script>
@endpush
@endsection