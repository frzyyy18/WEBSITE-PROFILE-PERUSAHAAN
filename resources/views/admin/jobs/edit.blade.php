@extends('layouts.app')

@section('title', 'Edit Lowongan - ' . $job->title)

@section('content')
<div class="max-w-4xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold mb-8">Edit Lowongan Kerja</h1>

    <form action="{{ route('admin.jobs.update', $job) }}" method="POST" class="bg-white rounded-3xl shadow p-10">
        @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Judul Lowongan</label>
                <input type="text" name="title" value="{{ old('title', $job->title) }}" 
                       class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $job->location) }}" 
                       class="input input-bordered w-full" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Gaji (Opsional)</label>
                <input type="text" name="salary" value="{{ old('salary', $job->salary) }}" 
                       class="input input-bordered w-full">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Deadline</label>
                <input type="date" name="deadline" value="{{ old('deadline', $job->deadline->format('Y-m-d')) }}" 
                       class="input input-bordered w-full" required>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Deskripsi Pekerjaan</label>
                <textarea name="description" rows="6" 
                          class="textarea textarea-bordered w-full" required>{{ old('description', $job->description) }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Persyaratan</label>
                <textarea name="requirements" rows="6" 
                          class="textarea textarea-bordered w-full" required>{{ old('requirements', $job->requirements) }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Status Lowongan</label>
                <select name="is_active" class="select select-bordered w-full">
                    <option value="1" {{ $job->is_active ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ !$job->is_active ? 'selected' : '' }}>Non-Aktif</option>
                </select>
            </div>
        </div>

        <div class="mt-10 flex gap-4">
            <button type="submit" class="btn btn-primary btn-lg">Update Lowongan</button>
            <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline btn-lg">Batal</a>
        </div>
    </form>
</div>
@endsection