@extends('admin.layout')

@section('title', 'Edit Kategori')

@section('content')
<div class="max-w-2xl">
    <!-- Header -->
    <div class="bg-white shadow-lg border border-gray-200 rounded-xl p-6 mb-6">
        <h1 class="text-3xl font-bold text-indigo-700">Edit Kategori</h1>
        <p class="text-indigo-600 mt-1">Ubah informasi kategori</p>
    </div>

    <!-- Form -->
    <div class="bg-white shadow-lg border border-gray-200 rounded-xl p-6">
        <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-indigo-700 font-semibold mb-2">Nama Kategori</label>
                <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" 
                    class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-500 focus:outline-none focus:border-indigo-500"
                    required>
                @error('nama_kategori')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                    ✓ Perbarui Kategori
                </button>
                <a href="{{ route('admin.kategori.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                    ↶ Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
