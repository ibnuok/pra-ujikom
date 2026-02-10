@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Data Peminjaman</h1>

<div class="grid grid-cols-4 gap-4 mb-6">
    <div class="bg-blue-700 p-4 rounded">
        Total: {{ $totalPeminjaman }}
    </div>
    <div class="bg-yellow-600 p-4 rounded">
        Dipinjam: {{ $dipinjam }}
    </div>
    <div class="bg-green-600 p-4 rounded">
        Dikembalikan: {{ $dikembalikan }}
    </div>
    <div class="bg-pink-600 p-4 rounded text-center">
        <p>User Meminjam</p>
        <h2 class="text-2xl">{{ $userMeminjam }}</h2>
    </div>
</div>

<a href="{{ route('admin.peminjaman.create') }}" 
   class="bg-indigo-600 px-4 py-2 rounded inline-block mb-4">
   Tambah Peminjaman
</a>

<table class="w-full mt-4 border text-white">
    <thead class="bg-slate-800">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Alat</th>
            <th>Tgl Pinjam</th>
            <th>Tgl Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($peminjaman as $p)
        <tr class="border-b">
            <td>{{ $loop->iteration }}</td>
            <td>{{ optional($p->user)->name ?? '-' }}</td>
            <td>{{ optional($p->alat)->nama_alat ?? '-' }}</td>
            <td>{{ $p->tanggal_pinjam }}</td>
            <td>{{ $p->tanggal_kembali }}</td>
            <td>{{ $p->status }}</td>
            <td>
                <div class="flex gap-2">
                    <a href="{{ route('admin.peminjaman.show',$p->id) }}" 
                       class="bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded text-sm">Lihat</a>
                    <a href="{{ route('admin.peminjaman.edit',$p->id) }}" 
                       class="bg-yellow-500 hover:bg-yellow-600 px-2 py-1 rounded text-sm">Edit</a>
                    <form action="{{ route('admin.peminjaman.destroy',$p->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 px-2 py-1 rounded text-sm"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
