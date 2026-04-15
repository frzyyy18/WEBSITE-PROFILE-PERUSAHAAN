<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pesan Baru dari Website</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>Pesan Baru dari Form Kontak</h2>
    
    <p><strong>Nama:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Telepon:</strong> {{ $data['phone'] }}</p>
    <p><strong>Pesan:</strong></p>
    <p style="background:#f9f9f9; padding:15px; border-left:4px solid #00d4ff;">
        {!! nl2br(e($data['message'])) !!}
    </p>
    
    <hr>
    <small>Dikirim pada: {{ now()->format('d M Y H:i') }}</small>
</body>
</html>