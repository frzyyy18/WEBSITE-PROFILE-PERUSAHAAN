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
                <a href="/" class="hover:text-blue-600 transition {{ request()->is('/') ? 'text-blue-600' : 'text-gray-700' }}">
                    Beranda
                </a>

                <!-- Dropdown Tentang -->
                <div class="relative" id="tentangMenu">
                    <button onclick="toggleDropdown('tentangDropdown')"
                            class="flex items-center gap-1 hover:text-blue-600 transition {{ request()->is('profil','visi-misi','struktur-organisasi') ? 'text-blue-600' : 'text-gray-700' }}">
                        Tentang
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200" id="tentangIcon"></i>
                    </button>

                    <!-- Dropdown Panel -->
                    <div id="tentangDropdown" 
                         class="hidden absolute left-0 mt-3 w-52 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-50">
                        <a href="/profil" 
                           class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 hover:text-blue-600 transition text-gray-700 {{ request()->is('profil') ? 'text-blue-600 bg-blue-50' : '' }}">
                            <i class="fas fa-building text-sm w-4"></i>
                            Profil Perusahaan
                        </a>
                        <a href="/struktur-organisasi" 
                           class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 hover:text-blue-600 transition text-gray-700 {{ request()->is('struktur-organisasi') ? 'text-blue-600 bg-blue-50' : '' }}">
                            <i class="fas fa-sitemap text-sm w-4"></i>
                            Struktur Organisasi
                        </a>
                        <a href="/visi-misi" 
                           class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 hover:text-blue-600 transition text-gray-700 {{ request()->is('visi-misi') ? 'text-blue-600 bg-blue-50' : '' }}">
                            <i class="fas fa-bullseye text-sm w-4"></i>
                            Visi & Misi
                        </a>
                    </div>
                </div>

                <a href="/produk" class="hover:text-blue-600 transition {{ request()->is('produk') ? 'text-blue-600' : 'text-gray-700' }}">
                    Produk
                </a>
                <a href="/lowongan" class="hover:text-blue-600 transition {{ request()->is('lowongan') ? 'text-blue-600' : 'text-gray-700' }}">
                    Lowongan Kerja
                </a>
                <a href="/kontak" class="hover:text-blue-600 transition {{ request()->is('kontak') ? 'text-blue-600' : 'text-gray-700' }}">
                    Kontak
                </a>
            </div>

            <!-- User Menu -->
            <div class="flex items-center gap-4">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium">Login</a>
                @else
                    <div class="relative">
                        <button onclick="toggleDropdown('userDropdown')" 
                                class="flex items-center gap-2 text-gray-700 hover:text-gray-900 font-medium">
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>

                        <!-- User Dropdown -->
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
                <button class="md:hidden text-2xl text-gray-600" 
                        onclick="toggleDropdown('mobileMenu')">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t">
        <div class="px-6 py-6 space-y-1">
            <a href="/" class="block px-3 py-3 rounded-xl text-gray-700 font-medium hover:bg-blue-50 hover:text-blue-600">
                Beranda
            </a>

            <!-- Mobile: Tentang Accordion -->
            <div>
                <button onclick="toggleDropdown('mobileTentang'); toggleIcon('mobileTentangIcon')"
                        class="flex items-center justify-between w-full px-3 py-3 rounded-xl text-gray-700 font-medium hover:bg-blue-50 hover:text-blue-600">
                    Tentang
                    <i class="fas fa-chevron-down text-sm transition-transform duration-200" id="mobileTentangIcon"></i>
                </button>
                <div id="mobileTentang" class="hidden pl-4 space-y-1 mt-1">
                    <a href="/profil" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-600 hover:bg-blue-50 hover:text-blue-600">
                        <i class="fas fa-building text-sm w-4"></i> Profil Perusahaan
                    </a>
                    <a href="/struktur-organisasi" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-600 hover:bg-blue-50 hover:text-blue-600">
                        <i class="fas fa-sitemap text-sm w-4"></i> Struktur Organisasi
                    </a>
                    <a href="/visi-misi" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-600 hover:bg-blue-50 hover:text-blue-600">
                        <i class="fas fa-bullseye text-sm w-4"></i> Visi & Misi
                    </a>
                </div>
            </div>

            <a href="/produk" class="block px-3 py-3 rounded-xl text-gray-700 font-medium hover:bg-blue-50 hover:text-blue-600">
                Produk
            </a>
            <a href="/lowongan" class="block px-3 py-3 rounded-xl text-gray-700 font-medium hover:bg-blue-50 hover:text-blue-600">
                Lowongan Kerja
            </a>
            <a href="/kontak" class="block px-3 py-3 rounded-xl text-gray-700 font-medium hover:bg-blue-50 hover:text-blue-600">
                Kontak
            </a>
        </div>
    </div>
</nav>

<script>
    function toggleDropdown(id) {
        const el = document.getElementById(id);
        el.classList.toggle('hidden');
    }

    function toggleIcon(id) {
        const icon = document.getElementById(id);
        icon.classList.toggle('rotate-180');
    }

    // Tutup semua dropdown kalau klik di luar
    document.addEventListener('click', function(e) {
        const menus = ['tentangDropdown', 'userDropdown'];
        menus.forEach(menuId => {
            const menu = document.getElementById(menuId);
            const trigger = menu?.previousElementSibling;
            if (menu && !menu.contains(e.target) && trigger && !trigger.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    });
</script>