<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-900 text-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-950 shadow-xl p-6">
        <h2 class="text-2xl font-bold text-indigo-400 mb-8 text-center">Admin</h2>

        <nav class="space-y-3">
            <a href="/admin/dashboard" class="block py-2 px-3 rounded bg-indigo-600 hover:bg-indigo-500 transition">Dashboard</a>
            <a href="/admin/users" class="block py-2 px-3 rounded hover:bg-slate-800"> User</a>
            <a href="/admin/alat" class="block py-2 px-3 rounded hover:bg-slate-800"> Alat</a>
            <a href="/admin/kategori" class="block py-2 px-3 rounded hover:bg-slate-800"> Kategori</a>
            <a href="/admin/peminjaman" class="block py-2 px-3 rounded hover:bg-slate-800">Data Peminjaman</a>
        </nav>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-8 bg-gradient-to-br from-slate-900 via-gray-900 to-zinc-900">

        <h1 class="text-2xl font-bold text-indigo-400 mb-6">
            @yield('title')
        </h1>

        <div class="bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700">
            @yield('content')
        </div>

    </main>

</div>

</body>
</html>
