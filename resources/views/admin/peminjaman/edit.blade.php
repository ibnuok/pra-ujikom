@extends('admin.layout')

@section('content')
<div class="max-w-2xl mx-auto bg-slate-800 p-8 rounded-xl shadow-lg">

    <h1 class="text-2xl font-bold mb-6 text-indigo-400">Edit Peminjaman</h1>

    <form action="{{ route('admin.peminjaman.update', $peminjaman->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- User -->
        <div>
            <label class="block mb-1">Nama Peminjam</label>
            <select name="user_id" class="w-full p-2 rounded text-black">
                <option value="">-- Pilih Peminjam --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}"
                        {{ $peminjaman->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Alat -->
        <div>
            <label class="block mb-1">Nama Alat</label>
            <select name="alat_id" class="w-full p-2 rounded text-black">
                @foreach($alat as $a)
                    @if(strtolower($a->nama_alat) == 'laptop' || strtolower($a->nama_alat) == 'proyektor')
                        <option value="{{ $a->id }}" 
                            {{ $peminjaman->alat_id == $a->id ? 'selected' : '' }}>
                            {{ $a->nama_alat }}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('alat_id')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tanggal Pinjam -->
        <div>
            <label class="block mb-1">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" 
                class="w-full p-2 rounded text-black">
            @error('tanggal_pinjam')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tanggal Kembali -->
        <div>
            <label class="block mb-1">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}" 
                class="w-full p-2 rounded text-black">
            @error('tanggal_kembali')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full p-2 rounded text-black">
                <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="dikembalikan" {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
            </select>
            @error('status')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tombol -->
        <div class="flex gap-2">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded">
                Update Peminjaman
            </button>
            <a href="{{ route('admin.peminjaman.index') }}" class="bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
