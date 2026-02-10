<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-blue-950 text-white min-h-screen p-8">

<h1 class="text-2xl mb-4">Tambah Kategori</h1>

<form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-4">
    @csrf

    <input type="text" name="nama_kategori" placeholder="Nama Kategori"
        class="w-full p-2 text-black rounded">

    <button class="bg-green-600 px-4 py-2 rounded">Simpan</button>
    <a href="{{ route('admin.kategori.index') }}" class="bg-gray-600 px-4 py-2 rounded">Kembali</a>
</form>

</body>
</html>
