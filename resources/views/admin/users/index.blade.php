@extends('admin.layout')

@section('title', 'Kelola Petugas')

@section('content')
<div>
    <!-- Header -->
    <div class="bg-blue-950/30 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 shadow-lg mb-6 flex justify-between items-start">
        <div>
            <h1 class="text-3xl font-bold text-indigo-300">Kelola Petugas</h1>
            <p class="text-indigo-200 mt-1">Daftar petugas yang mengelola peminjaman laptop</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-3 px-6 rounded-lg transition">
            + Tambah Petugas
        </a>
    </div>

    <!-- Table -->
    <div class="bg-blue-950/30 backdrop-blur-sm border border-indigo-500/30 rounded-xl shadow-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-indigo-500/20 border-b border-indigo-500/50">
                <tr>
                    <th class="px-6 py-4 text-left text-indigo-300 font-semibold">No</th>
                    <th class="px-6 py-4 text-left text-indigo-300 font-semibold">Nama</th>
                    <th class="px-6 py-4 text-left text-indigo-300 font-semibold">Email</th>
                    <th class="px-6 py-4 text-left text-indigo-300 font-semibold">Role</th>
                    <th class="px-6 py-4 text-left text-indigo-300 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-indigo-500/20">
                @forelse($users->where('role', 'petugas') as $key => $user)
                    <tr class="hover:bg-indigo-500/10 transition">
                        <td class="px-6 py-4 text-gray-300">{{ $key + 1 }}</td>
                        <td class="px-6 py-4 text-white font-medium">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-indigo-500/30 text-indigo-200 px-3 py-1 rounded-full text-sm font-semibold">
                                Petugas
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-3">
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-400 hover:text-blue-300 font-semibold">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus petugas ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 font-semibold">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                            Belum ada petugas. <a href="{{ route('admin.users.create') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold">Tambah petugas sekarang</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Info Section -->
    <div class="bg-blue-950/30 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 shadow-lg mt-6">
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
