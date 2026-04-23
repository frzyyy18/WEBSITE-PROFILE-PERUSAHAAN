<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .header { background: #4F46E5; padding: 40px; text-align: center; }
        .header h1 { color: white; margin: 0; font-size: 24px; }
        .header p { color: #C7D2FE; margin: 8px 0 0; font-size: 14px; }
        .body { padding: 40px; }
        .body p { color: #374151; line-height: 1.7; margin: 0 0 16px; }
        .btn { display: block; width: fit-content; margin: 24px auto; background: #4F46E5; color: white !important; text-decoration: none; padding: 16px 40px; border-radius: 12px; font-weight: bold; font-size: 16px; text-align: center; }
        .info-box { background: #F3F4F6; border-radius: 12px; padding: 20px; margin: 24px 0; }
        .info-box p { margin: 6px 0; font-size: 14px; color: #6B7280; }
        .info-box strong { color: #111827; }
        .footer { background: #F9FAFB; padding: 24px 40px; text-align: center; border-top: 1px solid #E5E7EB; }
        .footer p { color: #9CA3AF; font-size: 13px; margin: 0; }
        .warning { background: #FEF3C7; border-left: 4px solid #F59E0B; padding: 12px 16px; border-radius: 8px; margin: 16px 0; font-size: 14px; color: #92400E; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 Link Tes Online</h1>
            <p>CV. Sriwijaya Serangkai</p>
        </div>
        <div class="body">
            <p>Yth. <strong>{{ $application->name }}</strong>,</p>
            <p>
                Selamat! Anda telah berhasil masuk ke tahap tes online untuk posisi 
                <strong>{{ $application->job->title ?? 'yang Anda lamar' }}</strong> 
                di CV. Sriwijaya Serangkai.
            </p>

            <div class="info-box">
                <p>⏱ <strong>Durasi Tes:</strong> {{ $application->test_duration ?? 60 }} menit</p>
                <p>📘 <strong>Soal IQ:</strong> {{ $application->iq_test_file ? 'Tersedia' : 'Tidak tersedia' }}</p>
                <p>📗 <strong>Soal DISC:</strong> {{ $application->disc_test_file ? 'Tersedia' : 'Tidak tersedia' }}</p>
            </div>

            <div class="warning">
                ⚠️ Timer akan langsung berjalan saat Anda membuka link tes. Pastikan Anda siap sebelum mengklik tombol di bawah.
            </div>

            <a href="{{ $testLink }}" class="btn">Mulai Tes Sekarang</a>

            <p style="font-size:13px; color:#9CA3AF; text-align:center;">
                Atau copy link ini ke browser:<br>
                <a href="{{ $testLink }}" style="color:#4F46E5;">{{ $testLink }}</a>
            </p>
        </div>
        <div class="footer">
            <p>Email ini dikirim otomatis oleh sistem HRD CV. Sriwijaya Serangkai.<br>
            Jangan balas email ini.</p>
        </div>
    </div>
</body>
</html>