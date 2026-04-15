<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CV. Sriwijaya Serangkai - Distributor Resmi Unilever')</title>
    
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @stack('styles')
</head>
<script>
    let currentGoLive = 0;
    const goLiveSlides = document.querySelectorAll('#go-live-slider .slider-item');
    const goLiveDotsContainer = document.getElementById('go-live-dots');

    function createGoLiveDots() {
        goLiveDotsContainer.innerHTML = '';
        goLiveSlides.forEach((_, index) => {
            const dot = document.createElement('button');
            dot.className = `w-3 h-3 rounded-full transition-all ${index === 0 ? 'bg-white scale-125' : 'bg-white/50'}`;
            dot.onclick = () => goToGoLiveSlide(index);
            goLiveDotsContainer.appendChild(dot);
        });
    }

    function showGoLiveSlide(index) {
        goLiveSlides.forEach((slide, i) => {
            slide.style.opacity = (i === index) ? '1' : '0';
        });

        const dots = goLiveDotsContainer.querySelectorAll('button');
        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-white', i === index);
            dot.classList.toggle('bg-white/50', i !== index);
            dot.classList.toggle('scale-125', i === index);
        });

        currentGoLive = index;
    }

    function nextGoLiveSlide() {
        let next = currentGoLive + 1;
        if (next >= goLiveSlides.length) next = 0;
        showGoLiveSlide(next);
    }

    function prevGoLiveSlide() {
        let prev = currentGoLive - 1;
        if (prev < 0) prev = goLiveSlides.length - 1;
        showGoLiveSlide(prev);
    }

    function goToGoLiveSlide(index) {
        showGoLiveSlide(index);
    }

    // Auto slide setiap 4.5 detik
    setInterval(() => {
        nextGoLiveSlide();
    }, 4500);

    // Inisialisasi
    document.addEventListener('DOMContentLoaded', () => {
        createGoLiveDots();
        showGoLiveSlide(0);
    });
</script>
<body class="bg-gray-50 font-sans">

    {{-- Navbar --}}
    @include('layouts.navigation')

    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    @stack('scripts')

</body>
</html>