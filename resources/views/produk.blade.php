@extends('layouts.app')

@section('title', 'Produk Kami - CV. Sriwijaya Serangkai')

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

    .prod-page { font-family: 'DM Sans', sans-serif; background: var(--cream); min-height: 100vh; }

    /* ===== HERO ===== */
    .prod-hero {
        background: var(--navy); padding: 80px 24px 100px;
        text-align: center; position: relative; overflow: hidden;
    }
    .prod-hero::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(ellipse at 20% 50%, rgba(201,168,76,0.12) 0%, transparent 55%),
                    radial-gradient(ellipse at 80% 30%, rgba(201,168,76,0.08) 0%, transparent 55%);
    }
    .prod-hero::after {
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
    .prod-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2rem, 5vw, 3.2rem); font-weight: 900;
        color: white; line-height: 1.15; position: relative; z-index: 1; margin-bottom: 14px;
    }
    .prod-hero h1 span { color: var(--gold-light); font-style: italic; }
    .prod-hero p { color: rgba(255,255,255,0.5); font-size: 0.95rem; position: relative; z-index: 1; }

    /* Hero pills */
    .hero-pills { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin-top: 24px; position: relative; z-index: 1; }
    .hero-pill {
        display: inline-flex; align-items: center; gap: 6px;
        background: rgba(201,168,76,0.12); border: 1px solid rgba(201,168,76,0.3);
        color: var(--gold-light); border-radius: 100px;
        padding: 6px 16px; font-size: 0.78rem; font-weight: 500;
    }

    /* ===== CONTENT ===== */
    .prod-content { max-width: 1100px; margin: 0 auto; padding: 56px 24px 80px; }

    /* ===== STATS ===== */
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 56px; }
    .stat-card {
        background: white; border-radius: 18px;
        border: 1.5px solid rgba(201,168,76,0.12);
        padding: 24px 16px; text-align: center;
        box-shadow: 0 3px 16px rgba(0,0,0,0.05);
    }
    .stat-num { font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 900; color: var(--navy); line-height: 1; }
    .stat-num span { color: var(--gold); }
    .stat-lbl { font-size: 0.75rem; color: #888; margin-top: 6px; }

    /* ===== SECTION LABEL ===== */
    .section-label { margin-bottom: 28px; }
    .section-label .eyebrow { font-size: 0.7rem; font-weight: 600; letter-spacing: 4px; text-transform: uppercase; color: var(--gold); margin-bottom: 8px; }
    .section-label h2 { font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 700; color: var(--navy); }
    .section-divider { width: 48px; height: 3px; margin-top: 12px; background: linear-gradient(to right, var(--gold), rgba(201,168,76,0.3)); border-radius: 2px; }

    /* ===== KEUNGGULAN ===== */
    .unggulan-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; margin-bottom: 56px; }
    .unggulan-card {
        background: white; border-radius: 18px;
        border: 1.5px solid rgba(201,168,76,0.1);
        padding: 28px 22px; text-align: center;
        transition: all 0.25s; box-shadow: 0 3px 16px rgba(0,0,0,0.05);
    }
    .unggulan-card:hover { transform: translateY(-4px); border-color: rgba(201,168,76,0.4); box-shadow: 0 12px 36px rgba(201,168,76,0.12); }
    .unggulan-icon { width: 56px; height: 56px; border-radius: 16px; background: var(--gold-pale); color: var(--gold); display: flex; align-items: center; justify-content: center; font-size: 1.4rem; margin: 0 auto 16px; }
    .unggulan-title { font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 700; color: var(--navy); margin-bottom: 8px; }
    .unggulan-desc { font-size: 0.82rem; color: #666; line-height: 1.7; }

    /* ===== FILTER ===== */
    .filter-wrap { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 28px; }
    .filter-btn {
        padding: 7px 18px; border-radius: 100px; font-size: 0.8rem; font-weight: 500;
        border: 1.5px solid rgba(201,168,76,0.2); background: white; color: #555;
        cursor: pointer; transition: all 0.2s;
    }
    .filter-btn:hover { border-color: var(--gold); color: var(--navy); }
    .filter-btn.active { background: var(--navy); color: white; border-color: var(--navy); }

    /* ===== PRODUCT GRID ===== */
    .product-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 56px; }
    .product-card {
        background: white; border-radius: 18px; overflow: hidden;
        border: 1.5px solid rgba(201,168,76,0.1);
        box-shadow: 0 3px 16px rgba(0,0,0,0.05);
        transition: all 0.25s; display: flex; flex-direction: column;
    }
    .product-card:hover { transform: translateY(-5px); box-shadow: 0 14px 40px rgba(201,168,76,0.15); border-color: rgba(201,168,76,0.35); }

    .product-img {
        height: 180px; background: #f8f5f0; overflow: hidden; position: relative;
    }
    .product-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s; }
    .product-card:hover .product-img img { transform: scale(1.06); }

    .cat-badge {
        position: absolute; top: 10px; left: 10px;
        font-size: 0.62rem; font-weight: 700; letter-spacing: 1px;
        text-transform: uppercase; padding: 3px 10px; border-radius: 100px;
    }
    .product-body { padding: 18px 16px; flex: 1; display: flex; flex-direction: column; }
    .product-name { font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 700; color: var(--navy); margin-bottom: 6px; }
    .product-desc { font-size: 0.78rem; color: #777; line-height: 1.65; flex: 1; }
    .product-footer { margin-top: 14px; padding-top: 12px; border-top: 1px solid rgba(201,168,76,0.1); display: flex; align-items: center; justify-content: space-between; }
    .halal-badge { font-size: 0.68rem; color: #888; display: flex; align-items: center; gap: 4px; }
    .order-link { font-size: 0.72rem; font-weight: 600; color: var(--gold); text-decoration: none; display: flex; align-items: center; gap: 4px; transition: color 0.2s; }
    .order-link:hover { color: var(--navy); }

    /* ===== CTA ===== */
    .cta-box {
        background: var(--navy); border-radius: 24px; padding: 56px 40px;
        text-align: center; position: relative; overflow: hidden; margin-bottom: 56px;
    }
    .cta-box::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse at center, rgba(201,168,76,0.1) 0%, transparent 70%); }
    .cta-box * { position: relative; z-index: 1; }
    .cta-eyebrow { font-size: 0.7rem; font-weight: 600; letter-spacing: 4px; text-transform: uppercase; color: var(--gold); margin-bottom: 12px; }
    .cta-box h3 { font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 700; color: white; margin-bottom: 10px; }
    .cta-box h3 span { color: var(--gold-light); font-style: italic; }
    .cta-box p { color: rgba(255,255,255,0.5); margin-bottom: 28px; font-size: 0.9rem; max-width: 500px; margin-left: auto; margin-right: auto; }
    .btn-wa {
        display: inline-flex; align-items: center; gap: 10px;
        background: #22c55e; color: white;
        padding: 14px 32px; border-radius: 100px;
        font-weight: 700; font-size: 0.9rem; text-decoration: none;
        transition: all 0.2s; box-shadow: 0 4px 20px rgba(34,197,94,0.3);
    }
    .btn-wa:hover { background: #16a34a; transform: translateY(-2px); box-shadow: 0 8px 28px rgba(34,197,94,0.4); }

    /* ===== FAQ ===== */
    .faq-item { background: white; border-radius: 16px; border: 1.5px solid rgba(201,168,76,0.1); overflow: hidden; margin-bottom: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.04); }
    .faq-btn {
        width: 100%; display: flex; align-items: center; justify-content: space-between;
        padding: 20px 24px; text-align: left; background: none; border: none;
        font-family: 'DM Sans', sans-serif; font-size: 0.9rem; font-weight: 600;
        color: var(--navy); cursor: pointer; transition: color 0.2s;
    }
    .faq-btn:hover { color: var(--gold); }
    .faq-icon { width: 26px; height: 26px; border-radius: 50%; background: var(--gold-pale); color: var(--gold); display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; transition: transform 0.3s; }
    .faq-icon.open { transform: rotate(45deg); }
    .faq-body { padding: 0 24px 20px; font-size: 0.85rem; color: #666; line-height: 1.75; border-top: 1px solid rgba(201,168,76,0.08); padding-top: 16px; display: none; }
    .faq-body.open { display: block; }

    @media (max-width: 1024px) { .product-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (max-width: 768px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .unggulan-grid { grid-template-columns: 1fr; }
        .product-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 480px) { .product-grid { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')
<div class="prod-page">

    {{-- Hero --}}
    <div class="prod-hero">
        <div class="hero-eyebrow"><span></span>Distributor Resmi Unilever<span></span></div>
        <h1>Produk <span>Unggulan</span> Kami</h1>
        <p>Rangkaian lengkap produk Unilever berkualitas tinggi untuk kebutuhan usaha Anda</p>
        <div class="hero-pills">
            <div class="hero-pill"><i class="fas fa-check-circle"></i> Produk Original</div>
            <div class="hero-pill"><i class="fas fa-truck"></i> Pengiriman Cepat</div>
            <div class="hero-pill"><i class="fas fa-tag"></i> Harga Distributor</div>
        </div>
    </div>

    <div class="prod-content">

        {{-- Stats --}}
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-num">12<span>+</span></div>
                <div class="stat-lbl">Brand Unilever</div>
            </div>
            <div class="stat-card">
                <div class="stat-num">100<span>%</span></div>
                <div class="stat-lbl">Produk Original</div>
            </div>
            <div class="stat-card">
                <div class="stat-num">100<span>rb</span></div>
                <div class="stat-lbl">Min. Order</div>
            </div>
            <div class="stat-card">
                <div class="stat-num">Se<span>-Sumsel</span></div>
                <div class="stat-lbl">Jangkauan Distribusi</div>
            </div>
        </div>

        {{-- Keunggulan --}}
        <div class="section-label">
            <p class="eyebrow">Mengapa Kami</p>
            <h2>Keunggulan Kami</h2>
            <div class="section-divider"></div>
        </div>
        <div class="unggulan-grid">
            <div class="unggulan-card">
                <div class="unggulan-icon"><i class="fas fa-certificate"></i></div>
                <div class="unggulan-title">Produk Original</div>
                <p class="unggulan-desc">100% asli Unilever dengan garansi resmi dan sertifikat halal MUI — terjamin keasliannya.</p>
            </div>
            <div class="unggulan-card">
                <div class="unggulan-icon"><i class="fas fa-truck-fast"></i></div>
                <div class="unggulan-title">Pengiriman Cepat</div>
                <p class="unggulan-desc">Distribusi tepat waktu ke seluruh Palembang dan Sumatera Selatan oleh armada kami sendiri.</p>
            </div>
            <div class="unggulan-card">
                <div class="unggulan-icon"><i class="fas fa-tags"></i></div>
                <div class="unggulan-title">Harga Distributor</div>
                <p class="unggulan-desc">Dapatkan harga terbaik langsung dari distributor resmi Unilever tanpa perantara tambahan.</p>
            </div>
        </div>

        {{-- Katalog --}}
        <div class="section-label">
            <p class="eyebrow">Katalog</p>
            <h2>Produk Kami</h2>
            <div class="section-divider"></div>
        </div>

        {{-- Filter --}}
        <div class="filter-wrap" id="filterWrap">
            @foreach(['Semua', 'Personal Care', 'Home Care', 'Hair Care', 'Oral Care', 'Skin Care', 'Foods', 'Beverages'] as $cat)
            <button class="filter-btn {{ $cat === 'Semua' ? 'active' : '' }}"
                    onclick="filterProducts('{{ $cat }}', this)">
                {{ $cat }}
            </button>
            @endforeach
        </div>

        @php
      $products = [
    ['img' => 'DOVE.png',           'name' => 'Dove',          'cat' => 'Personal Care', 'desc' => 'Sabun mandi, shampoo, dan body care dengan kelembapan tinggi'],
    ['img' => 'LIFEBUOY.png',       'name' => 'Lifebuoy',      'cat' => 'Personal Care', 'desc' => 'Sabun mandi antibakteri dengan perlindungan 99.9% kuman'],
    ['img' => 'RINSO.png',          'name' => 'Rinso',         'cat' => 'Home Care',     'desc' => 'Deterjen dengan kekuatan membersihkan noda yang sangat baik'],
    ['img' => 'PEPSODENT.png',      'name' => 'Pepsodent',     'cat' => 'Oral Care',     'desc' => 'Pasta gigi dengan perlindungan gigi berlubang dan napas segar'],
    ['img' => 'SUNLIGHT.png',       'name' => 'Sunlight',      'cat' => 'Home Care',     'desc' => 'Sabun cuci piring dengan kekuatan membersihkan lemak maksimal'],
    ['img' => 'AXE.png',            'name' => 'Axe',           'cat' => 'Personal Care', 'desc' => 'Body spray & deodorant pria dengan aroma maskulin'],
    ['img' => 'BANGO.png',          'name' => 'Bango',         'cat' => 'Foods',         'desc' => 'Kecap manis premium dari kedelai pilihan'],
    ['img' => 'BUAVITA.png',        'name' => 'Buavita',       'cat' => 'Beverages',     'desc' => 'Minuman buah segar dengan nutrisi lengkap'],
    ['img' => 'CLEAR.png',          'name' => 'Clear',         'cat' => 'Hair Care',     'desc' => 'Sampo anti-ketombe nomor satu di Indonesia'],
    ['img' => 'GLOW & LOVELY.png',  'name' => 'Glow & Lovely', 'cat' => 'Skin Care',     'desc' => 'Perawatan kulit dengan multivitamin dan glow serum'],
    ['img' => 'CLOSEUP.png',        'name' => 'Closeup',       'cat' => 'Oral Care',     'desc' => 'Pasta gigi dengan perlindungan napas segar hingga 12 jam'],
    ['img' => 'WIPOL.png',          'name' => 'Wipol',         'cat' => 'Home Care',     'desc' => 'Pembersih lantai dengan aroma cemara yang segar'],
];

        $catBadge = [
            'Personal Care' => 'background:#fdf2f8;color:#9d174d;',
            'Home Care'     => 'background:#eff6ff;color:#1e40af;',
            'Hair Care'     => 'background:#f5f3ff;color:#5b21b6;',
            'Oral Care'     => 'background:#ecfeff;color:#155e75;',
            'Skin Care'     => 'background:#fff1f2;color:#9f1239;',
            'Foods'         => 'background:#fff7ed;color:#9a3412;',
            'Beverages'     => 'background:#f0fdf4;color:#166534;',
        ];
        @endphp

        <div class="product-grid" id="productGrid">
            @foreach($products as $p)
            <div class="product-card" data-cat="{{ $p['cat'] }}">
                <div class="product-img">
                    <img src="{{ asset('assets/images/' . $p['img']) }}" alt="{{ $p['name'] }}" loading="lazy">
                    <span class="cat-badge" style="{{ $catBadge[$p['cat']] ?? '' }}">{{ $p['cat'] }}</span>
                </div>
                <div class="product-body">
                    <div class="product-name">{{ $p['name'] }}</div>
                    <p class="product-desc">{{ $p['desc'] }}</p>
                    <div class="product-footer">
                        <div class="halal-badge"><i class="fas fa-check-circle" style="color:#22c55e;"></i> Halal MUI</div>
                        <a href="https://wa.me/6282281877406" class="order-link" target="_blank">
                            Order <i class="fas fa-arrow-right" style="font-size:0.6rem;"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- CTA --}}
        <div class="cta-box">
            <p class="cta-eyebrow">Kemitraan</p>
            <h3>Tertarik Menjadi <span>Mitra Kami?</span></h3>
            <p>Hubungi tim kami sekarang dan dapatkan penawaran harga distributor terbaik untuk toko Anda.</p>
            <a href="https://wa.me/6282281877406" class="btn-wa" target="_blank">
                <i class="fab fa-whatsapp text-xl"></i> Hubungi via WhatsApp
            </a>
        </div>

        {{-- FAQ --}}
        <div class="section-label">
            <p class="eyebrow">FAQ</p>
            <h2>Pertanyaan Umum</h2>
            <div class="section-divider"></div>
        </div>

        @php
        $faqs = [
            ['q' => 'Bagaimana cara toko baru untuk order ke CV. Sriwijaya Serangkai?', 'a' => 'Toko dapat menghubungi nomor telepon atau WhatsApp yang tertera. Supervisor atau sales kami akan mengunjungi toko Anda untuk melakukan survei dan pengumpulan data pemilik toko.'],
            ['q' => 'Apakah semua produk memiliki sertifikat halal?', 'a' => 'Ya, semua produk Unilever yang kami distribusikan telah memiliki sertifikasi halal dari MUI.'],
            ['q' => 'Berapa nilai minimum belanja untuk setiap toko?', 'a' => 'Nilai minimum pembelanjaan untuk setiap pesanan toko adalah Rp 100.000,-'],
            ['q' => 'Area mana saja yang dilayani pengiriman?', 'a' => 'Kami melayani distribusi ke seluruh wilayah Palembang dan Sumatera Selatan dengan armada pengiriman sendiri.'],
        ];
        @endphp

        <div id="faqWrap">
            @foreach($faqs as $i => $faq)
            <div class="faq-item">
                <button class="faq-btn" onclick="toggleFaq({{ $i }})">
                    <span>{{ $faq['q'] }}</span>
                    <div class="faq-icon" id="faq-icon-{{ $i }}">+</div>
                </button>
                <div class="faq-body" id="faq-body-{{ $i }}">{{ $faq['a'] }}</div>
            </div>
            @endforeach
        </div>

    </div>
</div>

@push('scripts')
<script>
    function filterProducts(cat, btn) {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        document.querySelectorAll('.product-card').forEach(card => {
            const match = cat === 'Semua' || card.dataset.cat === cat;
            card.style.transition = 'opacity 0.25s, transform 0.25s';
            if (match) {
                card.style.opacity = '1';
                card.style.transform = 'scale(1)';
                card.style.display = 'flex';
            } else {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.95)';
                setTimeout(() => { if (!match) card.style.display = 'none'; }, 250);
            }
        });
    }

    function toggleFaq(i) {
        const body = document.getElementById('faq-body-' + i);
        const icon = document.getElementById('faq-icon-' + i);
        const isOpen = body.classList.contains('open');
        // tutup semua
        document.querySelectorAll('.faq-body').forEach(b => b.classList.remove('open'));
        document.querySelectorAll('.faq-icon').forEach(ic => { ic.classList.remove('open'); ic.textContent = '+'; });
        // buka yang diklik jika belum open
        if (!isOpen) {
            body.classList.add('open');
            icon.classList.add('open');
            icon.textContent = '+';
        }
    }
</script>
@endpush

@endsection