@extends('layouts.app')

@section('title', 'Produk Kami - CV. Sriwijaya Serangkai')

@section('content')

<!-- Hero Produk -->
<section class="relative bg-gradient-to-br from-blue-800 via-blue-700 to-indigo-900 text-white py-32 overflow-hidden">
    <!-- Decorative blobs -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-blue-500 opacity-20 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-500 opacity-20 rounded-full translate-x-1/3 translate-y-1/3 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6 text-center">
        <span class="inline-block bg-white/10 backdrop-blur border border-white/20 text-sm font-medium px-4 py-1.5 rounded-full mb-6 tracking-wide">
            🏆 Distributor Resmi Unilever
        </span>
        <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight tracking-tight">
            Produk <span class="text-emerald-400">Unggulan</span> Kami
        </h1>
        <p class="mt-4 max-w-2xl mx-auto text-lg text-blue-100 leading-relaxed">
            Rangkaian lengkap produk Unilever berkualitas tinggi — tersedia dengan harga distributor
            langsung untuk kebutuhan usaha Anda.
        </p>
        <div class="mt-10 flex flex-wrap justify-center gap-4 text-sm font-medium">
            <span class="bg-white/15 backdrop-blur px-5 py-2 rounded-full border border-white/20">✅ Produk Original</span>
            <span class="bg-white/15 backdrop-blur px-5 py-2 rounded-full border border-white/20">🚚 Pengiriman Cepat</span>
            <span class="bg-white/15 backdrop-blur px-5 py-2 rounded-full border border-white/20">💰 Harga Terbaik</span>
        </div>
    </div>
</section>

<div class="max-w-7xl mx-auto px-6 py-20">

    <!-- Stats Bar -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-24 -mt-12 relative z-10">
        @foreach([
            ['num' => '12+', 'label' => 'Brand Unilever'],
            ['num' => '100%', 'label' => 'Produk Original'],
            ['num' => 'Rp 100rb', 'label' => 'Min. Order'],
            ['num' => 'Se-Sumsel', 'label' => 'Jangkauan Distribusi'],
        ] as $s)
        <div class="bg-white rounded-2xl shadow-lg p-6 text-center border border-gray-100">
            <p class="text-3xl font-extrabold text-blue-700">{{ $s['num'] }}</p>
            <p class="text-sm text-gray-500 mt-1 font-medium">{{ $s['label'] }}</p>
        </div>
        @endforeach
    </div>

    <!-- Keunggulan -->
    <div class="mb-24">
        <div class="text-center mb-12">
            <span class="text-emerald-600 font-semibold text-sm uppercase tracking-widest">Mengapa Kami?</span>
            <h2 class="text-4xl font-bold mt-2 text-gray-800">Keunggulan CV. Sriwijaya Serangkai</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach([
                ['icon' => '✅', 'title' => 'Produk Original', 'desc' => '100% asli Unilever dengan garansi resmi dan sertifikat halal MUI — terjamin keasliannya.', 'color' => 'from-emerald-50 to-green-100', 'border' => 'border-emerald-200'],
                ['icon' => '🚚', 'title' => 'Pengiriman Cepat', 'desc' => 'Distribusi tepat waktu ke seluruh Palembang dan Sumatera Selatan oleh armada kami.', 'color' => 'from-blue-50 to-indigo-100', 'border' => 'border-blue-200'],
                ['icon' => '💰', 'title' => 'Harga Distributor', 'desc' => 'Dapatkan harga terbaik langsung dari distributor resmi Unilever tanpa perantara.', 'color' => 'from-amber-50 to-yellow-100', 'border' => 'border-amber-200'],
            ] as $k)
            <div class="bg-gradient-to-br {{ $k['color'] }} border {{ $k['border'] }} p-10 rounded-3xl hover:shadow-xl transition-all duration-300 text-center group">
                <div class="text-6xl mb-5 group-hover:scale-110 transition-transform duration-300 inline-block">{{ $k['icon'] }}</div>
                <h3 class="font-bold text-xl mb-3 text-gray-800">{{ $k['title'] }}</h3>
                <p class="text-gray-600 leading-relaxed text-sm">{{ $k['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Filter Kategori -->
    <div class="mb-12 text-center">
        <span class="text-emerald-600 font-semibold text-sm uppercase tracking-widest">Katalog</span>
        <h2 class="text-4xl font-bold mt-2 mb-8 text-gray-800">Produk Kami</h2>

        <div class="flex flex-wrap justify-center gap-3" id="filter-buttons">
            @foreach(['Semua', 'Personal Care', 'Home Care', 'Hair Care', 'Oral Care', 'Skin Care', 'Foods', 'Beverages'] as $cat)
            <button
                onclick="filterProducts('{{ $cat }}')"
                data-cat="{{ $cat }}"
                class="filter-btn px-5 py-2 rounded-full border text-sm font-medium transition-all duration-200
                    {{ $cat === 'Semua' ? 'bg-blue-700 text-white border-blue-700' : 'bg-white text-gray-600 border-gray-200 hover:border-blue-400 hover:text-blue-700' }}">
                {{ $cat }}
            </button>
            @endforeach
        </div>
    </div>

    <!-- Grid Produk -->
    <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-7" id="product-grid">

        @foreach([
            ['img' => 'dove.png',          'name' => 'Dove',          'cat' => 'Personal Care', 'desc' => 'Sabun mandi, shampoo, dan body care dengan kelembapan tinggi'],
            ['img' => 'lifebuoy.png',       'name' => 'Lifebuoy',      'cat' => 'Personal Care', 'desc' => 'Sabun mandi antibakteri dengan perlindungan 99.9% kuman'],
            ['img' => 'rinso.png',          'name' => 'Rinso',         'cat' => 'Home Care',     'desc' => 'Deterjen dengan kekuatan membersihkan noda yang sangat baik'],
            ['img' => 'pepsodent.png',      'name' => 'Pepsodent',     'cat' => 'Oral Care',     'desc' => 'Pasta gigi dengan perlindungan gigi berlubang dan napas segar'],
            ['img' => 'sunlight.png',       'name' => 'Sunlight',      'cat' => 'Home Care',     'desc' => 'Sabun cuci piring dengan kekuatan membersihkan lemak maksimal'],
            ['img' => 'axe.png',            'name' => 'Axe',           'cat' => 'Personal Care', 'desc' => 'Body spray & deodorant pria dengan aroma maskulin'],
            ['img' => 'bango.png',          'name' => 'Bango',         'cat' => 'Foods',         'desc' => 'Kecap manis premium dari kedelai pilihan'],
            ['img' => 'buavita.png',        'name' => 'Buavita',       'cat' => 'Beverages',     'desc' => 'Minuman buah segar dengan nutrisi lengkap'],
            ['img' => 'clear.png',          'name' => 'Clear',         'cat' => 'Hair Care',     'desc' => 'Sampo anti-ketombe nomor satu di Indonesia'],
            ['img' => 'glow & lovely.png',  'name' => 'Glow & Lovely', 'cat' => 'Skin Care',     'desc' => 'Perawatan kulit dengan multivitamin dan glow serum'],
            ['img' => 'closeup.png',        'name' => 'Closeup',       'cat' => 'Oral Care',     'desc' => 'Pasta gigi dengan perlindungan napas segar hingga 12 jam'],
            ['img' => 'wipol.png',          'name' => 'Wipol',         'cat' => 'Home Care',     'desc' => 'Pembersih lantai dengan aroma cemara yang segar'],
        ] as $p)

        @php
            $catColors = [
                'Personal Care' => 'bg-pink-100 text-pink-700',
                'Home Care'     => 'bg-blue-100 text-blue-700',
                'Hair Care'     => 'bg-purple-100 text-purple-700',
                'Oral Care'     => 'bg-cyan-100 text-cyan-700',
                'Skin Care'     => 'bg-rose-100 text-rose-700',
                'Foods'         => 'bg-orange-100 text-orange-700',
                'Beverages'     => 'bg-green-100 text-green-700',
            ];
            $badgeClass = $catColors[$p['cat']] ?? 'bg-gray-100 text-gray-600';
        @endphp

        <div class="product-card bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition-all duration-300 group flex flex-col"
             data-cat="{{ $p['cat'] }}">
            <!-- Image -->
            <div class="relative h-52 bg-gray-50 overflow-hidden">
                <img src="{{ asset('assets/images/' . $p['img']) }}"
                     alt="{{ $p['name'] }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <!-- Badge overlay -->
                <span class="absolute top-3 left-3 text-xs font-semibold px-3 py-1 rounded-full {{ $badgeClass }}">
                    {{ $p['cat'] }}
                </span>
            </div>
            <!-- Content -->
            <div class="p-6 flex flex-col flex-1">
                <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $p['name'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed flex-1">{{ $p['desc'] }}</p>
                <div class="mt-5 pt-4 border-t border-gray-100 flex items-center justify-between">
                    <span class="text-xs text-gray-400 font-medium">✅ Halal MUI</span>
                    <a href="#contact"
                       class="text-xs font-semibold text-blue-700 hover:text-blue-900 transition flex items-center gap-1">
                        Order Sekarang →
                    </a>
                </div>
            </div>
        </div>

        @endforeach
    </div>

    <!-- CTA Banner -->
    <div class="mt-24 bg-gradient-to-r from-blue-700 to-indigo-800 rounded-3xl p-12 text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('/assets/images/pattern.svg')] opacity-10"></div>
        <div class="relative">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Tertarik Menjadi Mitra Kami?</h2>
            <p class="text-blue-100 max-w-xl mx-auto mb-8">
                Hubungi tim kami sekarang dan dapatkan penawaran harga distributor terbaik untuk toko Anda.
            </p>
            <a href="https://wa.me/6282281877406"
               class="inline-block bg-emerald-400 hover:bg-emerald-300 text-white font-bold px-10 py-4 rounded-full transition-all duration-200 shadow-lg hover:shadow-emerald-400/40 hover:-translate-y-0.5">
                💬 Hubungi Kami via WhatsApp
            </a>
        </div>
    </div>

    <!-- FAQ -->
    <div class="mt-28" x-data="{ open: null }">
        <div class="text-center mb-14">
            <span class="text-emerald-600 font-semibold text-sm uppercase tracking-widest">FAQ</span>
            <h2 class="text-4xl font-bold mt-2 text-gray-800">Pertanyaan yang Sering Diajukan</h2>
        </div>

        <div class="max-w-3xl mx-auto space-y-4">
            @foreach([
                [
                    'q' => 'Bagaimana cara toko baru untuk order ke CV. Sriwijaya Serangkai?',
                    'a' => 'Toko dapat menghubungi nomor telepon atau WhatsApp yang tertera. Supervisor atau sales kami akan mengunjungi toko Anda untuk melakukan survei dan pengumpulan data pemilik toko.'
                ],
                [
                    'q' => 'Apakah semua produk memiliki sertifikat halal?',
                    'a' => 'Ya, semua produk Unilever yang kami distribusikan telah memiliki sertifikasi halal dari MUI.'
                ],
                [
                    'q' => 'Berapa nilai minimum belanja untuk setiap toko?',
                    'a' => 'Nilai minimum pembelanjaan untuk setiap pesanan toko adalah Rp 100.000,-.'
                ],
                [
                    'q' => 'Area mana saja yang dilayani pengiriman?',
                    'a' => 'Kami melayani distribusi ke seluruh wilayah Palembang dan Sumatera Selatan dengan armada pengiriman sendiri.'
                ],
            ] as $i => $faq)
            <div class="bg-white rounded-2xl shadow border border-gray-100 overflow-hidden"
                 x-data="{ open: false }">
                <button
                    @click="open = !open"
                    class="w-full flex items-center justify-between px-8 py-6 text-left font-semibold text-gray-800 hover:text-blue-700 transition">
                    <span>{{ $faq['q'] }}</span>
                    <span class="ml-4 text-xl transition-transform duration-300"
                          :class="open ? 'rotate-45' : 'rotate-0'">+</span>
                </button>
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="px-8 pb-7 text-gray-600 leading-relaxed text-sm border-t border-gray-100 pt-5">
                    {{ $faq['a'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

<!-- Filter Script -->
<script>
function filterProducts(cat) {
    const cards = document.querySelectorAll('.product-card');
    const buttons = document.querySelectorAll('.filter-btn');

    buttons.forEach(btn => {
        const active = btn.dataset.cat === cat;
        btn.classList.toggle('bg-blue-700', active);
        btn.classList.toggle('text-white', active);
        btn.classList.toggle('border-blue-700', active);
        btn.classList.toggle('bg-white', !active);
        btn.classList.toggle('text-gray-600', !active);
        btn.classList.toggle('border-gray-200', !active);
    });

    cards.forEach(card => {
        const match = cat === 'Semua' || card.dataset.cat === cat;
        card.style.transition = 'opacity 0.3s, transform 0.3s';
        if (match) {
            card.style.opacity = '1';
            card.style.transform = 'scale(1)';
            card.style.display = 'flex';
        } else {
            card.style.opacity = '0';
            card.style.transform = 'scale(0.95)';
            setTimeout(() => {
                if (card.dataset.cat !== cat && cat !== 'Semua') {
                    card.style.display = 'none';
                }
            }, 300);
        }
    });
}
</script>

@endsection
