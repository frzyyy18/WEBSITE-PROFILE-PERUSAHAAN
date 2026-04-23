<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .header { background: #16A34A; padding: 40px; text-align: center; }
        .header h1 { color: white; margin: 0; font-size: 24px; }
        .header p { color: #BBF7D0; margin: 8px 0 0; font-size: 14px; }
        .body { padding: 40px; }
        .body p { color: #374151; line-height: 1.7; margin: 0 0 16px; }
        .info-box { background: #F0FDF4; border: 1px solid #BBF7D0; border-radius: 12px; padding: 20px; margin: 24px 0; }
        .footer { background: #F9FAFB; padding: 24px 40px; text-align: center; border-top: 1px solid #E5E7EB; }
        .footer p { color: #9CA3AF; font-size: 13px; margin: 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Selamat, Anda Diterima!</h1>
            <p>CV. Sriwijaya Serangkai</p>
        </div>
        <div class="body">
            <p>Yth. <strong>{{ $application->name }}</strong>,</p>
            <p>
                Dengan bangga kami informasikan bahwa Anda telah <strong>diterima</strong> 
                untuk posisi <strong>{{ $application->job->title ?? 'yang Anda lamar' }}</strong> 
                di CV. Sriwijaya Serangkai.
            </p>
            <div class="info-box">
                <p>📌 Tim HRD kami akan segera menghubungi Anda melalui nomor telepon 
                <strong>{{ $application->phone }}</strong> untuk informasi lebih lanjut mengenai 
                jadwal orientasi dan onboarding.</p>
            </div>
            <p>Selamat bergabung bersama keluarga besar CV. Sriwijaya Serangkai!</p>
            <p>Hormat kami,<br><strong>Tim HRD CV. Sriwijaya Serangkai</strong></p>
        </div>
        <div class="footer">
            <p>Email ini dikirim otomatis oleh sistem HRD CV. Sriwijaya Serangkai.</p>
        </div>
    </div>
</body>
</html>