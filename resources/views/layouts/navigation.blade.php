<nav class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between h-16 items-center">

            <!-- Logo -->
            <div class="flex items-center gap-3">
                <img src="{{ asset('assets/images/logo.png') }}" 
                     alt="Logo CV. Sriwijaya Serangkai" 
                     class="h-10 w-auto">
                <div>
                    <h1 class="font-bold text-xl text-gray-800">CV. Sriwijaya Serangkai</h1>
                    <p class="text-xs text-gray-500 -mt-1">Distributor Resmi Unilever</p>
                </div>
            </div>

            <!-- Menu Utama -->
            <div class="hidden md:flex items-center gap-8 font-medium">
                <a href="/" class="hover:text-blue-600 transition">Beranda</a>
                <a href="/visi-misi" class="hover:text-blue-600 transition">Visi & Misi</a>
                <a href="/produk" class="hover:text-blue-600 transition">Produk</a>
                <a href="/lowongan" class="hover:text-blue-600 transition">Lowongan Kerja</a>
                <a href="/kontak" class="hover:text-blue-600 transition">Kontak</a>
            </div>

            <!-- User Menu -->
            <div class="flex items-center gap-4">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium">Login</a>
                @else
                    <div class="relative group">
                        <button onclick="document.getElementById('userDropdown').classList.toggle('hidden')" 
                                class="flex items-center gap-2 text-gray-700 hover:text-gray-900 font-medium">
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>

                        <!-- Dropdown -->
                        <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border py-2 z-50">
                            <a href="/admin/jobs" class="block px-4 py-3 hover:bg-gray-100 text-gray-700">
                                <i class="fas fa-cog mr-2"></i> Kelola Lowongan
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                        class="block w-full text-left px-4 py-3 text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-2xl text-gray-600" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t">
        <div class="px-6 py-6 space-y-4">
            <a href="/" class="block text-gray-700 font-medium">Beranda</a>
            <a href="/visi-misi" class="block text-gray-700 font-medium">Visi & Misi</a>
            <a href="/produk" class="block text-gray-700 font-medium">Produk</a>
            <a href="/lowongan" class="block text-gray-700 font-medium">Lowongan Kerja</a>
            <a href="/kontak" class="block text-gray-700 font-medium">Kontak</a>
        </div>
    </div>
</nav>