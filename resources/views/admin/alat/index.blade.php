@extends('admin.layout')

@section('content')

<h1 class="text-2xl font-bold text-indigo-400 mb-6"> Alat</h1>

<a href="{{ route('admin.alat.create') }}"
   class="bg-indigo-600 hover:bg-indigo-500 px-4 py-2 rounded mb-4 inline-block">
   + Tambah Alat
</a>

<div class="bg-slate-800 rounded-xl shadow p-6">

<table class="w-full text-left">
    <thead class="text-indigo-300 border-b border-slate-600">
        <tr>
            <th>No</th>
            <th>Nama Alat</th>
            <th>Stok</th>
            <th>Kondisi</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody class="text-gray-300">
        @foreach($alat as $a)
        <tr class="border-b border-slate-700">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $a->nama_alat }}</td>
            <td>{{ $a->stok }}</td>
            <td>{{ $a->kondisi }}</td>
            <td class="space-x-2">

                <a href="{{ route('admin.alat.edit',$a->id) }}"
                   class="bg-yellow-500 px-3 py-1 rounded text-black">Edit</a>

                <form action="{{ route('admin.alat.destroy',$a->id) }}" method="POST" class="inline"
                      onsubmit="return confirm('Yakin hapus data?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 px-3 py-1 rounded">Hapus</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>

@endsection
