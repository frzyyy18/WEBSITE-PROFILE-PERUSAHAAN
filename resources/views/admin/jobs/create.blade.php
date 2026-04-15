@extends('layouts.app')

@section('title', 'Tambah Lowongan Baru')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold mb-8">Tambah Lowongan Kerja Baru</h1>

    <form action="{{ route('admin.jobs.store') }}" method="POST" class="bg-white rounded-3xl shadow p-10">
        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Judul Lowongan</label>
                <input type="text" name="title" class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Lokasi</label>
                <input type="text" name="location" class="input input-bordered w-full" value="Palembang, Sumatera Selatan" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Gaji (Opsional)</label>
                <input type="text" name="salary" class="input input-bordered w-full" placeholder="Rp 3.000.000 - Rp 4.500.000">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Deadline</label>
                <input type="date" name="deadline" class="input input-bordered w-full" required>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Deskripsi Pekerjaan</label>
                <textarea name="description" rows="6" class="textarea textarea-bordered w-full" required></textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Persyaratan</label>
                <textarea name="requirements" rows="6" class="textarea textarea-bordered w-full" required></textarea>
            </div>
        </div>

        <div class="mt-10 flex gap-4">
            <button type="submit" class="btn btn-primary btn-lg">Simpan Lowongan</button>
            <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline btn-lg">Batal</a>
        </div>
    </form>
</div>
@endsection