<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CV. Sriwijaya Serangkai - Distributor Resmi Unilever')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @if(file_exists(public_path('css/custom.css')))
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @endif
    
    @stack('styles')
</head>
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