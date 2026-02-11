@extends('admin.layout')

@section('title', 'Tambah Kategori')

@section('content')
<div class="max-w-2xl">
    <!-- Header -->
    <div class="bg-white shadow-lg border border-gray-200 rounded-xl p-6 mb-6">
        <h1 class="text-3xl font-bold text-indigo-700">Tambah Kategori Baru</h1>
        <p class="text-indigo-600 mt-1">Isi form di bawah untuk menambahkan kategori alat baru</p>
    </div>

    <!-- Form -->
    <div class="bg-white shadow-lg border border-gray-200 rounded-xl p-6">
        <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-indigo-700 font-semibold mb-2">Nama Kategori</label>
                <input type="text" name="nama_kategori" placeholder="Contoh: Laptop, Monitor, Keyboard" 
                    class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-500 focus:outline-none focus:border-indigo-500"
                    required>
                @error('nama_kategori')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                    ✓ Simpan Kategori
                </button>
                <a href="{{ route('admin.kategori.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                    ↶ Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
