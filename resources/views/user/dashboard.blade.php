@extends('layouts.app-simple')

@section('title', 'Dashboard User')
@section('content')

<div class="max-w-6xl mx-auto">

    <!-- Main Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <!-- Card: Lihat Daftar Alat -->
        <a href="{{ route('user.alats') }}" class="group bg-gradient-to-br from-indigo-600/40 to-indigo-800/40 backdrop-blur-sm border border-indigo-500/50 p-8 rounded-xl hover:shadow-xl hover:scale-105 transition">
            <div class="text-4xl mb-4">📋</div>
            <h2 class="text-xl font-bold text-indigo-300 mb-2">Lihat Daftar Alat</h2>
            <p class="text-indigo-200 text-sm">Browsing laptop tersedia dengan filter kategori</p>
            <div class="mt-4 text-indigo-400 text-sm font-semibold group-hover:translate-x-1 transition">Lihat →</div>
        </a>

        <!-- Card: Ajukan Peminjaman -->
        <a href="{{ route('user.peminjaman.create') }}" class="group bg-gradient-to-br from-emerald-600/40 to-emerald-800/40 backdrop-blur-sm border border-emerald-500/50 p-8 rounded-xl hover:shadow-xl hover:scale-105 transition">
            <div class="text-4xl mb-4">✏️</div>
            <h2 class="text-xl font-bold text-emerald-300 mb-2">Ajukan Peminjaman</h2>
            <p class="text-emerald-200 text-sm">Ajukan peminjaman alat yang Anda butuhkan</p>
            <div class="mt-4 text-emerald-400 text-sm font-semibold group-hover:translate-x-1 transition">Ajukan →</div>
        </a>

        <!-- Card: Monitor Peminjaman -->
        <a href="{{ route('user.peminjaman.index') }}" class="group bg-gradient-to-br from-amber-600/40 to-amber-800/40 backdrop-blur-sm border border-amber-500/50 p-8 rounded-xl hover:shadow-xl hover:scale-105 transition">
            <div class="text-4xl mb-4">📊</div>
            <h2 class="text-xl font-bold text-amber-300 mb-2">Riwayat Peminjaman</h2>
            <p class="text-amber-200 text-sm">Monitor pengajuan dan pengembalian alat</p>
            <div class="mt-4 text-amber-400 text-sm font-semibold group-hover:translate-x-1 transition">Lihat →</div>
        </a>

    </div>

    <!-- Info Section -->
    <div class="bg-gradient-to-r from-blue-950/40 to-purple-950/40 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-8 shadow-lg mt-8">
        <h3 class="text-xl font-bold text-indigo-300 mb-4">ℹ️ Alur Peminjaman</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-indigo-200">
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg p-4">
                <div class="text-2xl mb-2">1️⃣</div>
                <p><strong>Ajukan Peminjaman</strong></p>
                <p class="text-sm mt-2">Pilih alat dan tanggal yang Anda butuhkan</p>
            </div>
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg p-4">
                <div class="text-2xl mb-2">2️⃣</div>
                <p><strong>Menunggu Persetujuan</strong></p>
                <p class="text-sm mt-2">Petugas akan mereview pengajuan Anda</p>
            </div>
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg p-4">
                <div class="text-2xl mb-2">3️⃣</div>
                <p><strong>Pinjam & Kembalikan</strong></p>
                <p class="text-sm mt-2">Setelah disetujui, kelola peminjaman Anda</p>
            </div>
        </div>
    </div>
</div>

@endsection
