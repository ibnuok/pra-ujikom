@extends('admin.layout')

@section('content')

<!-- Header -->
<div class="bg-blue-950/30 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 shadow-lg mb-6">
    <h1 class="text-3xl font-bold text-indigo-300">Dashboard Admin</h1>
    <p class="text-indigo-200 mt-1">Selamat datang, {{ Auth::user()->name }}</p>
</div>

<!-- Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <a href="{{ route('admin.users.index') }}" class="bg-gradient-to-br from-indigo-600/40 to-indigo-800/40 backdrop-blur-sm border border-indigo-500/50 p-6 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition">
        <h3 class="text-xl font-bold text-indigo-300">👥 User</h3>
        <p class="text-indigo-200 mt-2">Kelola users sistem</p>
    </a>

    <a href="{{ route('admin.alat.index') }}" class="bg-gradient-to-br from-emerald-600/40 to-emerald-800/40 backdrop-blur-sm border border-emerald-500/50 p-6 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition">
        <h3 class="text-xl font-bold text-emerald-300">💻 Alat</h3>
        <p class="text-emerald-200 mt-2">Kelola inventaris alat</p>
    </a>

    <a href="{{ route('admin.kategori.index') }}" class="bg-gradient-to-br from-yellow-600/40 to-yellow-800/40 backdrop-blur-sm border border-yellow-500/50 p-6 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition">
        <h3 class="text-xl font-bold text-yellow-300">📂 Kategori</h3>
        <p class="text-yellow-200 mt-2">Kelola kategori alat</p>
    </a>

</div>

<!-- Info Section -->
<div class="bg-blue-950/30 backdrop-blur-sm border border-indigo-500/30 mt-8 rounded-xl shadow-lg p-6">
    <h2 class="text-xl font-bold text-indigo-300 mb-4">ℹ️ Informasi Admin</h2>
    <div class="text-indigo-200 space-y-2">
        <p>• Admin bertanggung jawab untuk mengelola <strong>User</strong>, <strong>Alat</strong>, dan <strong>Kategori</strong></p>
        <p>• <strong>Kategori</strong> adalah tipe/jenis alat (contoh: Laptop, Proyektor)</p>
        <p>• <strong>Alat</strong> adalah spesifik merek/model alat (contoh: Dell Laptop, HP Laptop, Epson Proyektor)</p>
        <p>• Data peminjaman yang sudah disetujui petugas akan otomatis tampil di laporan</p>
    </div>
</div>

@endsection
