@extends('admin.layout')

@section('title', 'Kelola Petugas')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-br from-indigo-600/40 to-indigo-800/40 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 shadow-lg flex justify-between items-start">
        <div>
            <h1 class="text-3xl font-bold text-indigo-300">👥 Data Petugas</h1>
            <p class="text-indigo-200 mt-1">Kelola petugas yang mengelola peminjaman alat</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-semibold py-2 px-6 rounded-lg shadow transition">
            + Tambah Petugas
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl overflow-hidden shadow-lg">
        <table class="w-full text-left text-gray-300">
            <thead class="bg-gradient-to-r from-indigo-600/40 to-purple-600/40 border-b border-indigo-500/30">
                <tr>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">No</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Nama</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Email</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Role</th>
                    <th class="px-6 py-4 text-indigo-300 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @forelse($users->where('role', 'petugas') as $key => $user)
                    <tr class="hover:bg-white/5 transition">
                        <td class="px-6 py-4">{{ $key + 1 }}</td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-white">{{ $user->name }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-indigo-200">{{ $user->email }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-indigo-500/30 text-indigo-300 border border-indigo-500/50 px-3 py-1 rounded-full text-sm font-semibold">
                                Petugas
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.users.edit', $user) }}" class="bg-gradient-to-r from-yellow-600 to-yellow-700 hover:from-yellow-700 hover:to-yellow-800 text-white px-3 py-1 rounded-lg text-sm font-semibold transition">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus petugas ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-3 py-1 rounded-lg text-sm font-semibold transition">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center">
                            <p class="text-indigo-200">Belum ada petugas. <a href="{{ route('admin.users.create') }}" class="text-indigo-300 hover:text-indigo-200 font-semibold">Tambah petugas sekarang</a></p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Info Section -->
    <div class="bg-gradient-to-br from-blue-950/30 to-indigo-950/30 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 shadow-lg">
        <h2 class="text-xl font-bold text-indigo-300 mb-4">ℹ️ Informasi Petugas</h2>
        <div class="text-indigo-200 space-y-2">
            <p>• Petugas adalah staf yang bertugas <strong>meninjau dan menyetujui pengajuan peminjaman</strong> dari peminjam</p>
            <p>• Admin dapat menambah, mengedit, atau menghapus akun petugas di halaman ini</p>
            <p>• Akun peminjam dibuat melalui <strong>halaman registrasi publik</strong>, bukan di sini</p>
            <p>• Petugas dapat login dan mengakses dashboard untuk menyetujui/menolak peminjaman</p>
        </div>
    </div>
</div>
@endsection
