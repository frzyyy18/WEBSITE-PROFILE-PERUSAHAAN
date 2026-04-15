<footer class="bg-gray-900 text-gray-300 py-16 mt-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-3 gap-10">

            <!-- Kolom 1: Info Perusahaan -->
            <div>
                <h3 class="text-white text-xl font-semibold mb-4">CV. Sriwijaya Serangkai</h3>
                <p class="text-gray-400 leading-relaxed">
                    Distributor Resmi Produk Unilever<br>
                    Wilayah Palembang dan Sumatera Selatan
                </p>
            </div>

            <!-- Kolom 2: Alamat -->
            <div>
                <h4 class="text-white font-medium mb-3">Alamat</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Jl. Sapta Marga No.23, Bukit Sangkal,<br>
                    Kec. Kalidoni, Kota Palembang,<br>
                    Sumatera Selatan 30163
                </p>
            </div>

            <!-- Kolom 3: Kontak Kami -->
            <div>
                <h4 class="text-white font-medium mb-4">Kami Siap Membantu</h4>
                
                <div class="space-y-4">
                    <!-- Email -->
                    <div class="flex items-center gap-3">
                        <i class="fas fa-envelope text-blue-400 text-xl"></i>
                        <div>
                            <p class="text-sm text-gray-400">Email</p>
                            <a href="mailto:cvss2012@yahoo.co.id" 
                               class="text-gray-300 hover:text-white transition">
                                cvss2012@yahoo.co.id
                            </a>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="flex items-center gap-3">
                        <i class="fas fa-phone text-green-400 text-xl"></i>
                        <div>
                            <p class="text-sm text-gray-400">Telepon</p>
                            <a href="tel:0711820700" 
                               class="text-gray-300 hover:text-white transition">
                                0711-820700
                            </a>
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div class="flex items-center gap-3">
                        <i class="fab fa-whatsapp text-emerald-400 text-2xl"></i>
                        <div>
                            <p class="text-sm text-gray-400">WhatsApp</p>
                            <a href="https://wa.me/6282281877406" 
                               target="_blank"
                               class="text-gray-300 hover:text-white transition">
                                0822-8187-7406
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} CV. Sriwijaya Serangkai - Distributor Resmi Unilever<br>
            <span class="text-xs">Palembang, Sumatera Selatan</span>
        </div>
    </div>
</footer>