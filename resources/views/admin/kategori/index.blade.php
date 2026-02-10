<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kategori</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-slate-900 via-gray-900 to-zinc-900 text-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-950 shadow-xl p-6">
        <h2 class="text-2xl font-bold text-indigo-400 mb-8 text-center">Admin Panel</h2>

        <nav class="space-y-3">
            <a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 rounded hover:bg-slate-800">Dashboard</a>
            <a href="{{ route('admin.users.index') }}" class="block py-2 px-3 rounded hover:bg-slate-800">User</a>
            <a href="{{ route('admin.alat.index') }}" class="block py-2 px-3 rounded hover:bg-slate-800">Alat</a>
            <a href="{{ route('admin.kategori.index') }}" class="block py-2 px-3 rounded bg-indigo-600">Kategori</a>
            <a href="{{ route('admin.peminjaman.index') }}" class="block py-2 px-3 rounded hover:bg-slate-800">Data Peminjaman</a>
        </nav>

        <div class="mt-10">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="block bg-red-600 text-center py-2 rounded hover:bg-red-500 transition">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-8">

        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-900 to-indigo-900 rounded-xl p-6 mb-6 shadow-lg flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-300">Kategori</h1>

            <a href="{{ route('admin.kategori.create') }}"
               class="bg-indigo-600 hover:bg-indigo-500 px-4 py-2 rounded text-white font-semibold">
                + Tambah Kategori
            </a>
        </div>

        <!-- Alert sukses -->
        @if(session('success'))
            <div class="bg-green-600 text-white px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="bg-slate-800 rounded-xl shadow p-6">

            <table class="w-full text-left">
                <thead class="text-indigo-300 border-b border-slate-600">
                    <tr>
                        <th class="py-2">No</th>
                        <th class="py-2">Nama Kategori</th>
                        <th class="py-2">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-gray-300">
                    @foreach($kategori as $k)
                    <tr class="border-b border-slate-700 hover:bg-slate-700/50 transition">
                        <td class="py-2">{{ $loop->iteration }}</td>
                        <td class="py-2">{{ $k->nama_kategori }}</td>
                        <td class="py-2 space-x-2">

                            <a href="{{ route('admin.kategori.edit',$k->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-400 text-black px-3 py-1 rounded">
                                Edit
                            </a>

                            <form action="{{ route('admin.kategori.destroy',$k->id) }}" 
                                  method="POST" 
                                  class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-500 px-3 py-1 rounded">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </main>

</div>

</body>
</html>
