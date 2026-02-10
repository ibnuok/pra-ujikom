<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-blue-950 text-white min-h-screen p-8">

<h1 class="text-2xl mb-4">Edit Kategori</h1>

<form action="{{ route('admin.kategori.update',$kategori->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}"
        class="w-full p-2 text-black rounded">

    <button class="bg-yellow-500 px-4 py-2 rounded">Update</button>
    <a href="{{ route('admin.kategori.index') }}" class="bg-gray-600 px-4 py-2 rounded">Kembali</a>
</form>

</body>
</html>
