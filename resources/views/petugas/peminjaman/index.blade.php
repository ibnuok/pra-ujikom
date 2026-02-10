@extends('layouts.app-simple')

@section('title', 'Manajemen Peminjaman')
@section('content')

<div class="max-w-7xl mx-auto">

    <!-- Header + Button Dashboard -->
    <div class="bg-gradient-to-r from-blue-950/40 to-indigo-950/40 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 mb-6 shadow-lg flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-indigo-300">Manajemen Peminjaman</h1>
            <p class="text-indigo-200 mt-1">Kelola persetujuan dan pengembalian alat</p>
        </div>

        <a href="{{ route('petugas.dashboard') }}"
           class="bg-gradient-to-r from-gray-600 to-gray-800 hover:from-gray-700 hover:to-gray-900 text-white px-4 py-2 rounded-lg font-semibold transition">
            ⬅ Kembali ke Dashboard
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
                        <th class="px-6 py-4 text-left text-indigo-300 font-semibold">Tanggal Pinjam</th>
                        <th class="px-6 py-4 text-left text-indigo-300 font-semibold">Tanggal Kembali</th>
                        <th class="px-6 py-4 text-left text-indigo-300 font-semibold">Status</th>
                        <th class="px-6 py-4 text-left text-indigo-300 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjaman as $p)
                    <tr class="border-b border-white/10 hover:bg-white/5 transition">
                        <td class="px-6 py-4 text-gray-300">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            <div class="font-semibold text-indigo-300">{{ optional($p->user)->name ?? '-' }}</div>
                            <div class="text-sm text-indigo-200">{{ optional($p->user)->email ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-semibold text-white">{{ optional($p->alat)->nama_alat ?? '-' }}</div>
                            <div class="text-sm text-indigo-200">Kategori: {{ optional(optional($p->alat)->kategori)->nama_kategori ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 text-gray-300">{{ $p->tanggal_pinjam }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ $p->tanggal_kembali }}</td>
                        <td class="px-6 py-4">
                            @if($p->status == 'pending')
                                <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-500/50 px-3 py-1 rounded-full text-sm font-semibold">⏳ Pending</span>
                            @elseif($p->status == 'dipinjam')
                                <span class="inline-block bg-green-500/20 text-green-300 border border-green-500/50 px-3 py-1 rounded-full text-sm font-semibold">✓ Dipinjam</span>
                            @elseif($p->status == 'dikembalikan')
                                <span class="inline-block bg-blue-500/20 text-blue-300 border border-blue-500/50 px-3 py-1 rounded-full text-sm font-semibold">✓ Dikembalikan</span>
                            @else
                                <span class="inline-block bg-gray-500/20 text-gray-300 border border-gray-500/50 px-3 py-1 rounded-full text-sm font-semibold">{{ $p->status }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                @if($p->status == 'pending')
                                    <form action="{{ route('petugas.peminjaman.approve', $p->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button class="bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white px-4 py-2 rounded-lg font-semibold text-sm transition">
                                            ✓ Setujui
                                        </button>
                                    </form>
                                @endif

                                @if($p->status == 'dipinjam')
                                    <form action="{{ route('petugas.peminjaman.return', $p->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-4 py-2 rounded-lg font-semibold text-sm transition">
                                            📦 Dikembalikan
                                        </button>
                                    </form>
                                @endif

                                @if($p->status == 'dikembalikan')
                                    <span class="text-gray-400 text-sm">Transaksi selesai</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>

@endsection
