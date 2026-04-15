.ss-nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 200;
    height: 70px; padding: 0 5vw;
    display: flex; align-items: center; justify-content: space-between;
    transition: background 0.4s, box-shadow 0.4s;
}
.ss-nav.scrolled {
    background: rgba(10,22,40,0.97);
    backdrop-filter: blur(14px);
    box-shadow: 0 1px 0 rgba(255,255,255,0.06);
}
.nav-brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
.nav-mark {
    width: 40px; height: 40px; border-radius: 10px;
    background: var(--accent); display: flex; align-items: center; justify-content: center;
    font-family: var(--serif); font-size: 17px; font-weight: 700; color: var(--navy);
    flex-shrink: 0;
}
.nav-name { font-family: var(--serif); font-size: 14px; font-weight: 700; color: #fff; line-height: 1.2; }
.nav-name small { display: block; font-family: var(--sans); font-size: 10px; font-weight: 400; color: rgba(255,255,255,0.45); letter-spacing: 1px; text-transform: uppercase; }
.nav-links { display: flex; gap: 28px; list-style: none; }
.nav-links a { color: rgba(255,255,255,0.7); text-decoration: none; font-size: 13.5px; font-weight: 500; transition: color .2s; }
.nav-links a:hover { color: var(--accent-lt); }
.nav-btn {
    background: var(--accent); color: var(--navy);
    padding: 9px 22px; border-radius: 8px;
    font-weight: 700; font-size: 13px; text-decoration: none;
    transition: background .2s, transform .2s;
}
.nav-btn:hover { background: var(--accent-lt); transform: translateY(-1px); }

{{-- ═══════════════ NAVBAR ═══════════════ --}}
<nav class="ss-nav" id="ss-nav">
    <a href="/" class="nav-brand">
        <div class="nav-mark">SS</div>
        <div class="nav-name">
            CV. Sriwijaya Serangkai
            <small>Distributor Resmi Unilever</small>
        </div>
    </a>
 
    <ul class="nav-links">
        <li><a href="#tentang">Tentang</a></li>
        <li><a href="#produk">Produk</a></li>
        <li><a href="#layanan">Layanan</a></li>
        <li><a href="#karir">Karir</a></li>
        <li><a href="#kontak">Kontak</a></li>
    </ul>
 
    <a href="#kontak" class="nav-btn">Hubungi Kami</a>
 
    <button class="nav-toggle" id="nav-toggle" aria-label="Menu">
        <span></span><span></span><span></span>
    </button>
</nav>
 
{{-- Mobile nav --}}
<div class="nav-mobile" id="nav-mobile">
    <a href="#tentang" onclick="closeMob()">Tentang Kami</a>
    <a href="#produk"  onclick="closeMob()">Produk</a>
    <a href="#layanan" onclick="closeMob()">Layanan</a>
    <a href="#karir"   onclick="closeMob()">Karir</a>
    <a href="#kontak"  onclick="closeMob()">Hubungi Kami →</a>
</div>