@extends('admin.layout')

@section('content')

<div class="space-y-6">

    <!-- Header -->
    <div class="bg-gradient-to-br from-indigo-600/40 to-indigo-800/40 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 shadow-lg">
        <h1 class="text-3xl font-bold text-indigo-300">📦 Data Peminjaman</h1>
        <p class="text-indigo-200 mt-1">Pantau semua data peminjaman alat</p>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-gradient-to-br from-blue-600/40 to-blue-800/40 backdrop-blur-sm border border-blue-500/30 p-6 rounded-xl shadow text-white">
            <p class="text-indigo-200 text-sm">Total Peminjaman</p>
            <h2 class="text-3xl font-bold text-blue-300 mt-2">{{ $totalPeminjaman }}</h2>
        </div>

        <div class="bg-gradient-to-br from-yellow-600/40 to-yellow-800/40 backdrop-blur-sm border border-yellow-500/30 p-6 rounded-xl shadow text-white">
            <p class="text-yellow-200 text-sm">Sedang Dipinjam</p>
            <h2 class="text-3xl font-bold text-yellow-300 mt-2">{{ $dipinjam }}</h2>
        </div>

        <div class="bg-gradient-to-br from-emerald-600/40 to-emerald-800/40 backdrop-blur-sm border border-emerald-500/30 p-6 rounded-xl shadow text-white">
            <p class="text-emerald-200 text-sm">Sudah Dikembalikan</p>
            <h2 class="text-3xl font-bold text-emerald-300 mt-2">{{ $dikembalikan }}</h2>
        </div>

        <div class="bg-gradient-to-br from-purple-600/40 to-purple-800/40 backdrop-blur-sm border border-purple-500/30 p-6 rounded-xl shadow text-white text-center">
            <p class="text-purple-200 text-sm">User Aktif Pinjam</p>
            <h2 class="text-3xl font-bold text-purple-300 mt-2">{{ $userMeminjam }}</h2>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl overflow-hidden shadow-lg">
        <table class="w-full text-left text-gray-300">
            <thead class="bg-gradient-to-r from-indigo-600/40 to-purple-600/40 border-b border-indigo-500/30">
                <tr>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">No</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Peminjam</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Alat</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Jumlah</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Tanggal Pinjam</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Tanggal Kembali</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Status</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @forelse($peminjaman as $p)
                <tr class="hover:bg-white/5 transition">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">
                        <div class="font-semibold text-white">{{ optional($p->user)->name ?? '-' }}</div>
                        <div class="text-sm text-indigo-200">{{ optional($p->user)->email ?? '-' }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-semibold text-white">{{ optional($p->alat)->nama_alat ?? '-' }}</div>
                        <div class="text-sm text-indigo-200">{{ optional(optional($p->alat)->kategori)->nama_kategori ?? '-' }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-block bg-indigo-500/30 text-indigo-300 border border-indigo-500/50 px-3 py-1 rounded-full text-sm font-semibold">{{ $p->jumlah ?? 1 }} unit</span>
                    </td>
                    <td class="px-6 py-4 text-gray-300">{{ $p->tanggal_pinjam }}</td>
                    <td class="px-6 py-4 text-gray-300">{{ $p->tanggal_kembali }}</td>

                    <td class="px-6 py-4">
                        @if($p->status == 'dipinjam')
                            <span class="inline-block bg-yellow-500/20 text-yellow-300 border border-yellow-500/50 px-3 py-1 rounded-full text-sm font-semibold">
                                ⏳ Dipinjam
                            </span>
                        @else
                            <span class="inline-block bg-emerald-500/20 text-emerald-300 border border-emerald-500/50 px-3 py-1 rounded-full text-sm font-semibold">
                                ✓ Dikembalikan
                            </span>
                        @endif
                    </td>

                    <td class="px-6 py-4">
                        <a href="{{ route('admin.peminjaman.show',$p->id) }}"
                           class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">
                            👁 Lihat
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-8 text-center">
                        <p class="text-indigo-200">Belum ada data peminjaman</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
