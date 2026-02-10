@extends('layouts.app-simple')

@section('title', 'Laporan Peminjaman')
@section('content')

<div class="max-w-7xl mx-auto">
    <div class="bg-gradient-to-r from-blue-950/40 to-indigo-950/40 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 mb-6 shadow-lg">
        <h1 class="text-3xl font-bold text-indigo-300">Laporan Peminjaman</h1>
        <p class="text-indigo-200 mt-1">Laporan lengkap semua peminjaman alat</p>
    </div>

    <!-- Action Buttons -->
    <div class="mb-6 flex gap-3">
        <button onclick="window.print()" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold px-6 py-3 rounded-lg transition shadow-lg">
            🖨️ Cetak Laporan
        </button>
        <a href="{{ route('petugas.dashboard') }}" class="bg-white/10 hover:bg-white/15 text-indigo-200 font-semibold px-6 py-3 rounded-lg transition">
            ← Kembali ke Dashboard
        </a>
    </div>

    @if($peminjaman->isEmpty())
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-12 text-center">
            <div class="text-6xl mb-4">📭</div>
            <p class="text-indigo-200">Tidak ada data peminjaman</p>
        </div>
    @else
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl overflow-hidden shadow-lg">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-indigo-600/40 to-purple-600/40 border-b border-indigo-500/50">
                    <tr>
                        <th class="px-6 py-4 text-left text-indigo-300 font-semibold">No</th>
                        <th class="px-6 py-4 text-left text-indigo-300 font-semibold">User</th>
                        <th class="px-6 py-4 text-left text-indigo-300 font-semibold">Alat</th>
                        <th class="px-6 py-4 text-left text-indigo-300 font-semibold">Kategori</th>
                        <th class="px-6 py-4 text-left text-indigo-300 font-semibold">Tanggal Pinjam</th>
                        <th class="px-6 py-4 text-left text-indigo-300 font-semibold">Tanggal Kembali</th>
                        <th class="px-6 py-4 text-left text-indigo-300 font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjaman as $p)
                    <tr class="border-b border-white/10 hover:bg-white/5 transition">
                        <td class="px-6 py-4 text-gray-300">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            <div class="font-semibold text-indigo-300">{{ optional($p->user)->name ?? '-' }}</div>
                            <div class="text-xs text-indigo-200">{{ optional($p->user)->email ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-white">{{ optional($p->alat)->nama_alat ?? '-' }}</td>
                        <td class="px-6 py-4 text-indigo-200">{{ optional(optional($p->alat)->kategori)->nama_kategori ?? '-' }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ $p->tanggal_pinjam }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ $p->tanggal_kembali }}</td>
                        <td class="px-6 py-4">
                            @if($p->status == 'pending')
                                <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-500/50 px-3 py-1 rounded-full text-xs font-semibold">⏳ Pending</span>
                            @elseif($p->status == 'dipinjam')
                                <span class="inline-block bg-green-500/20 text-green-300 border border-green-500/50 px-3 py-1 rounded-full text-xs font-semibold">✓ Dipinjam</span>
                            @elseif($p->status == 'dikembalikan')
                                <span class="inline-block bg-blue-500/20 text-blue-300 border border-blue-500/50 px-3 py-1 rounded-full text-xs font-semibold">✓ Dikembalikan</span>
                            @else
                                <span class="inline-block bg-gray-500/20 text-gray-300 border border-gray-500/50 px-3 py-1 rounded-full text-xs font-semibold">{{ $p->status }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center text-indigo-200 text-sm">
            <p>Total Peminjaman: <span class="font-bold text-indigo-300">{{ $peminjaman->count() }}</span></p>
        </div>
    @endif
</div>

<style media="print">
    body {
        background: white !important;
        color: black !important;
    }
    nav, .text-center button, button {
        display: none !important;
    }
    .bg-gradient-to-r, .border-indigo-500, .text-indigo-300 {
        color: black !important;
    }
</style>

@endsection
