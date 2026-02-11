@extends('admin.layout')

@section('title','Tambah Alat')

@section('content')
<div class="max-w-2xl">
    <div class="bg-gradient-to-br from-indigo-600/40 to-indigo-800/40 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 shadow-lg mb-6">
        <h1 class="text-2xl font-bold text-indigo-300">➕ Tambah Alat Baru</h1>
    </div>

    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6 shadow-lg">
        <form action="{{ route('admin.alat.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nama Alat -->
            <div>
                <label class="block text-indigo-300 font-semibold mb-2">Nama Alat</label>
                <input type="text" name="nama_alat" placeholder="Contoh: Dell Laptop XPS 13"
                    class="w-full p-3 bg-slate-800 border border-slate-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-indigo-500 transition"
                    required>
                @error('nama_alat')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kategori -->
            <div>
                <label class="block text-indigo-300 font-semibold mb-2">Kategori</label>
                <select name="kategori_id" class="w-full p-3 bg-slate-800 border border-slate-700 rounded-lg text-white focus:outline-none focus:border-indigo-500 transition"
                    required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    @forelse($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                    @empty
                        <option value="" disabled>Belum ada kategori</option>
                    @endforelse
                </select>
                @error('kategori_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Stok -->
            <div>
                <label class="block text-indigo-300 font-semibold mb-2">Stok</label>
                <input type="number" name="stok" placeholder="Jumlah stok alat"
                    class="w-full p-3 bg-slate-800 border border-slate-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-indigo-500 transition"
                    min="0" required>
                @error('stok')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kondisi -->
            <div>
                <label class="block text-indigo-300 font-semibold mb-2">Kondisi</label>
                <select name="kondisi" class="w-full p-3 bg-slate-800 border border-slate-700 rounded-lg text-white focus:outline-none focus:border-indigo-500 transition"
                    required>
                    <option value="" disabled selected>Pilih Kondisi</option>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                    <option value="diperbaiki">Diperbaiki</option>
                </select>
                @error('kondisi')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol -->
            <div class="flex gap-3 pt-4">
                <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-semibold py-3 rounded-lg transition">
                    ✓ Simpan Alat
                </button>
                <a href="{{ route('admin.alat.index') }}" class="flex-1 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white font-semibold py-3 rounded-lg transition text-center">
                    ← Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
