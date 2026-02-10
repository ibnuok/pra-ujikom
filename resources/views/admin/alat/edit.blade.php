@extends('admin.layout')

@section('title','Edit Alat')

@section('content')
<form action="{{ route('admin.alat.update',$alat->id) }}" method="POST" class="space-y-4">
@csrf
@method('PUT')

<input type="text" name="nama_alat" value="{{ $alat->nama_alat }}"
class="w-full p-2 bg-slate-700 rounded text-white">

<input type="number" name="stok" value="{{ $alat->stok }}"
class="w-full p-2 bg-slate-700 rounded text-white">

<input type="text" name="kondisi" value="{{ $alat->kondisi }}"
class="w-full p-2 bg-slate-700 rounded text-white">

<button class="bg-blue-600 px-4 py-2 rounded">Update</button>
<a href="{{ route('admin.alat.index') }}" class="bg-gray-600 px-4 py-2 rounded">Kembali</a>
</form>
@endsection
