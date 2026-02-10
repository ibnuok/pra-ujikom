@extends('admin.layout')

@section('content')
<div class="max-w-2xl mx-auto bg-slate-800 p-8 rounded-xl shadow-lg">

    <h1 class="text-2xl font-bold mb-6 text-indigo-400">Detail Peminjaman</h1>

    <div class="space-y-4">
        <!-- User -->
        <div>
            <label class="block mb-1 text-gray-400">Peminjam</label>
            <p class="p-2 bg-slate-700 rounded">{{ optional($peminjaman->user)->name ?? '-' }}</p>
        </div>

        <!-- Alat -->
        <div>
            <label class="block mb-1 text-gray-400">Nama Alat</label>
            <p class="p-2 bg-slate-700 rounded">{{ optional($peminjaman->alat)->nama_alat ?? '-' }}</p>
        </div>

        <!-- Tanggal Pinjam -->
        <div>
            <label class="block mb-1 text-gray-400">Tanggal Pinjam</label>
            <p class="p-2 bg-slate-700 rounded">{{ $peminjaman->tanggal_pinjam }}</p>
        </div>

        <!-- Tanggal Kembali -->
        <div>
            <label class="block mb-1 text-gray-400">Tanggal Kembali</label>
            <p class="p-2 bg-slate-700 rounded">{{ $peminjaman->tanggal_kembali }}</p>
        </div>

        <!-- Status -->
        <div>
            <label class="block mb-1 text-gray-400">Status</label>
            <p class="p-2 bg-slate-700 rounded">
                @if($peminjaman->status == 'dipinjam')
                    <span class="bg-yellow-600 px-2 py-1 rounded">Dipinjam</span>
                @else
                    <span class="bg-green-600 px-2 py-1 rounded">Dikembalikan</span>
                @endif
            </p>
        </div>

        <!-- Tombol -->
        <div class="flex gap-2 pt-4">
            <a href="{{ route('admin.peminjaman.edit', $peminjaman->id) }}" 
               class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded">
                Edit
            </a>
            <a href="{{ route('admin.peminjaman.index') }}" 
               class="bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
