@extends('layouts.app-simple')

@section('title', 'Dashboard Petugas')
@section('content')

<div class="max-w-6xl mx-auto">

    <!-- Main Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <!-- Card: Setujui Peminjaman -->
        <a href="{{ route('petugas.peminjaman.index') }}" class="group bg-gradient-to-br from-indigo-600/40 to-indigo-800/40 backdrop-blur-sm border border-indigo-500/50 p-8 rounded-xl hover:shadow-xl hover:scale-105 transition">
            <div class="text-4xl mb-4">✅</div>
            <h2 class="text-xl font-bold text-indigo-300 mb-2">Setujui Peminjaman</h2>
            <p class="text-indigo-200 text-sm">Review dan setujui pengajuan peminjaman dari user</p>
            <div class="mt-4 text-indigo-400 text-sm font-semibold group-hover:translate-x-1 transition">Kelola →</div>
        </a>

        <!-- Card: Pantau Pengembalian -->
        <a href="{{ route('petugas.peminjaman.index') }}" class="group bg-gradient-to-br from-emerald-600/40 to-emerald-800/40 backdrop-blur-sm border border-emerald-500/50 p-8 rounded-xl hover:shadow-xl hover:scale-105 transition">
            <div class="text-4xl mb-4">📦</div>
            <h2 class="text-xl font-bold text-emerald-300 mb-2">Pantau Pengembalian</h2>
            <p class="text-emerald-200 text-sm">Monitor alat yang sudah dikembalikan</p>
            <div class="mt-4 text-emerald-400 text-sm font-semibold group-hover:translate-x-1 transition">Pantau →</div>
        </a>

        <!-- Card: Cetak Laporan -->
        <a href="{{ route('petugas.peminjaman.report') }}" class="group bg-gradient-to-br from-amber-600/40 to-amber-800/40 backdrop-blur-sm border border-amber-500/50 p-8 rounded-xl hover:shadow-xl hover:scale-105 transition">
            <div class="text-4xl mb-4">📄</div>
            <h2 class="text-xl font-bold text-amber-300 mb-2">Cetak Laporan</h2>
            <p class="text-amber-200 text-sm">Generate dan cetak laporan peminjaman</p>
            <div class="mt-4 text-amber-400 text-sm font-semibold group-hover:translate-x-1 transition">Cetak →</div>
        </a>

    </div>

    <!-- Info Section -->
    <div class="bg-gradient-to-r from-blue-950/40 to-purple-950/40 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-8 shadow-lg mt-8">
        <h3 class="text-xl font-bold text-indigo-300 mb-4">ℹ️ Tanggung Jawab Petugas</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-indigo-200">
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg p-4">
                <p class="font-semibold text-indigo-300 mb-2">✓ Persetujuan Peminjaman</p>
                <p class="text-sm">Setujui atau tolak pengajuan peminjaman dari user berdasarkan ketersediaan alat</p>
            </div>
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg p-4">
                <p class="font-semibold text-indigo-300 mb-2">✓ Konfirmasi Pengembalian</p>
                <p class="text-sm">Verifikasi bahwa alat yang dipinjam telah dikembalikan dalam kondisi baik</p>
            </div>
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg p-4">
                <p class="font-semibold text-indigo-300 mb-2">📊 Laporan Peminjaman</p>
                <p class="text-sm">Buat laporan peinjaman alat untuk keperluan dokumentasi dan audit</p>
            </div>
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg p-4">
                <p class="font-semibold text-indigo-300 mb-2">📝 Data Otomatis Admin</p>
                <p class="text-sm">Setiap peminjaman yang disetujui akan otomatis masuk ke data admin</p>
            </div>
        </div>
    </div>
</div>

@endsection
