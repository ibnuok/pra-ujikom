@extends('admin.layout')

@section('content')

<div class="space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-br from-indigo-600/40 to-indigo-800/40 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 shadow-lg flex justify-between items-start">
        <div>
            <h1 class="text-3xl font-bold text-indigo-300">💻 Data Alat</h1>
            <p class="text-indigo-200 mt-1">Kelola inventaris alat peminjaman</p>
        </div>
        <a href="{{ route('admin.alat.create') }}"
           class="bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 px-6 py-2 rounded-lg text-white font-semibold shadow transition">
           + Tambah Alat
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl overflow-hidden shadow-lg">
        <table class="w-full text-left text-gray-300">
            <thead class="bg-gradient-to-r from-indigo-600/40 to-purple-600/40 border-b border-indigo-500/30">
                <tr>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">No</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Nama Alat</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Kategori</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Stok</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Kondisi</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @forelse($alat as $a)
                <tr class="hover:bg-white/5 transition">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">
                        <span class="font-semibold text-white">{{ $a->nama_alat }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-indigo-300">{{ optional($a->kategori)->nama_kategori ?? '-' }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-block bg-indigo-500/30 text-indigo-300 border border-indigo-500/50 px-3 py-1 rounded-full text-sm font-semibold">{{ $a->stok }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                            @if($a->kondisi == 'baik') bg-green-500/30 text-green-300 border border-green-500/50
                            @elseif($a->kondisi == 'rusak') bg-red-500/30 text-red-300 border border-red-500/50
                            @else bg-yellow-500/30 text-yellow-300 border border-yellow-500/50 @endif">
                            {{ ucfirst($a->kondisi) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.alat.edit',$a->id) }}"
                               class="bg-gradient-to-r from-yellow-600 to-yellow-700 hover:from-yellow-700 hover:to-yellow-800 text-white px-3 py-1 rounded-lg text-sm font-semibold transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.alat.destroy',$a->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin hapus data?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-3 py-1 rounded-lg text-sm font-semibold transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center">
                        <p class="text-indigo-200">Belum ada data alat</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
