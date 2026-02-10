@extends('admin.layout')

@section('title','Edit Petugas')

@section('content')
<div class="max-w-2xl">
    <!-- Header -->
    <div class="bg-blue-950/30 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 shadow-lg mb-6">
        <h1 class="text-3xl font-bold text-indigo-300">Edit Petugas</h1>
        <p class="text-indigo-200 mt-1">Perbarui informasi petugas</p>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="bg-blue-950/30 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 shadow-lg space-y-6">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <label class="block text-sm font-medium text-indigo-100 mb-2">Nama Lengkap</label>
            <input type="text" name="name" placeholder="Masukkan nama petugas"
                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-indigo-200/50 focus:outline-none focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition @error('name') border-red-500 @enderror"
                value="{{ old('name', $user->name) }}" required>
            @error('name')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-indigo-100 mb-2">Email</label>
            <input type="email" name="email" placeholder="Masukkan email petugas"
                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-indigo-200/50 focus:outline-none focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition @error('email') border-red-500 @enderror"
                value="{{ old('email', $user->email) }}" required>
            @error('email')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password (Optional) -->
        <div>
            <label class="block text-sm font-medium text-indigo-100 mb-2">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" name="password" placeholder="Masukkan password baru (min 8 karakter)"
                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-indigo-200/50 focus:outline-none focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition @error('password') border-red-500 @enderror">
            @error('password')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Role (Hidden, always Petugas) -->
        <input type="hidden" name="role" value="petugas">
        <div class="bg-indigo-500/20 border border-indigo-500/50 rounded-lg p-4">
            <p class="text-indigo-100 text-sm"><span class="font-semibold">Role:</span> Petugas (penyetuju peminjaman)</p>
        </div>

        <!-- Buttons -->
        <div class="flex gap-3">
            <button type="submit" class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 rounded-lg transition">
                ✎ Perbarui Petugas
            </button>
            <a href="{{ route('admin.users.index') }}" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-semibold py-3 rounded-lg transition text-center">
                ✕ Batal
            </a>
        </div>
    </form>
</div>
@endsection
