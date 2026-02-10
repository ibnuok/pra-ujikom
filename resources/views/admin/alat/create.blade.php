@extends('admin.layout')

@section('title','Tambah Alat')

@section('content')
<form action="{{ route('admin.alat.store') }}" method="POST" class="space-y-4">
@csrf

<input type="text" name="nama_alat" placeholder="Nama Alat"
class="w-full p-2 bg-slate-700 rounded text-white">

<input type="number" name="stok" placeholder="Stok"
class="w-full p-2 bg-slate-700 rounded text-white">

<input type="text" name="kondisi" placeholder="Kondisi"
class="w-full p-2 bg-slate-700 rounded text-white">

<button class="bg-green-600 px-4 py-2 rounded">Simpan</button>
<a href="{{ route('admin.alat.index') }}" class="bg-gray-600 px-4 py-2 rounded">Kembali</a>
</form>
@endsection
