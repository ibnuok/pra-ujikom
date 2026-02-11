@extends('admin.layout')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-br from-indigo-600/40 to-indigo-800/40 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 shadow-lg flex justify-between items-start">
        <div>
            <h1 class="text-3xl font-bold text-indigo-300">📂 Data Kategori</h1>
            <p class="text-indigo-200 mt-1">Kelola kategori alat peminjaman</p>
        </div>
        <a href="{{ route('admin.kategori.create') }}" class="bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-semibold py-2 px-6 rounded-lg shadow transition">
            + Tambah Kategori
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl overflow-hidden shadow-lg">
        <table class="w-full text-left text-gray-300">
            <thead class="bg-gradient-to-r from-indigo-600/40 to-purple-600/40 border-b border-indigo-500/30">
                <tr>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">No</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Nama Kategori</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @forelse($kategori as $k)
                    <tr class="hover:bg-white/5 transition">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-white">{{ $k->nama_kategori }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.kategori.edit', $k->id) }}" class="bg-gradient-to-r from-yellow-600 to-yellow-700 hover:from-yellow-700 hover:to-yellow-800 text-white px-3 py-1 rounded-lg text-sm font-semibold transition">Edit</a>
                                <form action="{{ route('admin.kategori.destroy', $k->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-3 py-1 rounded-lg text-sm font-semibold transition">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center">
                            <p class="text-indigo-200">Belum ada kategori. <a href="{{ route('admin.kategori.create') }}" class="text-indigo-300 hover:text-indigo-200 font-semibold">Tambah kategori sekarang</a></p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
