@extends('layouts.app')

@section('title', 'Kontak Kami - CV. Sriwijaya Serangkai')

@section('content')

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl mb-8 flex items-center gap-3">
        <i class="fa-solid fa-check-circle text-2xl"></i>
        <span class="font-medium">{{ session('success') }}</span>
    </div>
@endif
<!-- Hero -->
<section class="bg-gradient-to-br from-blue-800 to-indigo-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-5xl font-bold mb-4">Hubungi Kami</h1>
        <p class="text-xl text-blue-100">Kami siap membantu Anda</p>
    </div>
</section>

<div class="max-w-4xl mx-auto px-6 py-16">

    <!-- Notifikasi Sukses / Error -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-8 py-5 rounded-3xl mb-10 text-center font-medium">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-8 py-5 rounded-3xl mb-10 text-center font-medium">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid md:grid-cols-5 gap-12">
        
        <!-- Informasi Kontak -->
        <div class="md:col-span-2">
            <h2 class="text-3xl font-bold mb-8">Informasi Kontak</h2>
            
            <div class="space-y-8">
                <div class="flex gap-4">
                    <div class="text-3xl">📍</div>
                    <div>
                        <p class="font-semibold">Alamat Kantor</p>
                        <p class="text-gray-600">Jl. Sapta Marga No.23, Bukit Sangkal,<br>Kec. Kalidoni, Kota Palembang, Sumatera Selatan 30163</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="text-3xl">📞</div>
                    <div>
                        <p class="font-semibold">Telepon</p>
                        <p class="text-gray-600">0711-820700</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="text-3xl">💬</div>
                    <div>
                        <p class="font-semibold">WhatsApp</p>
                        <a href="https://wa.me/6282281877406" class="text-emerald-600 hover:underline">0822-8187-7406</a>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="text-3xl">✉️</div>
                    <div>
                        <p class="font-semibold">Email</p>
                        <p class="text-gray-600">cvss2012@yahoo.co.id</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Kontak -->
        <div class="md:col-span-3">
            <div class="bg-white rounded-3xl shadow-xl p-10">
                <h3 class="text-2xl font-semibold mb-8">Kirim Pesan</h3>
                
                <form action="{{ route('kontak.store') }}" method="POST">
                    @csrf
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon / WhatsApp</label>
                            <input type="text" name="phone" class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                            <textarea name="message" rows="6" class="w-full px-5 py-4 border border-gray-300 rounded-3xl focus:outline-none focus:border-blue-500" required></textarea>
                        </div>

                        <button type="submit" 
                                class="w-full bg-blue-700 hover:bg-blue-800 text-white font-semibold py-5 rounded-2xl transition">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection