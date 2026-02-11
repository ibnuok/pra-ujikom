<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>- Sistem Peminjaman Laptop</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-slate-900 via-gray-900 to-black min-h-screen text-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 shadow-lg p-6 border-r border-slate-700">
        <div class="text-center mb-8">
            <img src="{{ asset('logo-smkn.svg') }}" alt="SMKN 1 Ciomas" class="h-12 w-12 mx-auto mb-3">
            <h2 class="text-2xl font-bold text-indigo-300 mb-2">PEMINJAMAN ALAT</h2>
            <div class="h-1 w-12 bg-gradient-to-r from-indigo-500 to-purple-500 rounded mx-auto"></div>
        </div>

        <nav class="space-y-3">
            <a href="{{ route('admin.dashboard') }}"
               class="block py-3 px-4 rounded-lg transition
               {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-900/50 text-indigo-300 font-semibold' : 'text-gray-300 hover:bg-slate-800' }}">
                <span class="font-semibold">Dashboard</span>
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="block py-3 px-4 rounded-lg transition
               {{ request()->routeIs('admin.users.*') ? 'bg-indigo-900/50 text-indigo-300 font-semibold' : 'text-gray-300 hover:bg-slate-800' }}">
                <span class="font-semibold">👥 User</span>
            </a>

            <a href="{{ route('admin.alat.index') }}"
               class="block py-3 px-4 rounded-lg transition
               {{ request()->routeIs('admin.alat.*') ? 'bg-indigo-900/50 text-indigo-300 font-semibold' : 'text-gray-300 hover:bg-slate-800' }}">
                <span class="font-semibold">💻 Alat</span>
            </a>

            <a href="{{ route('admin.kategori.index') }}"
               class="block py-3 px-4 rounded-lg transition
               {{ request()->routeIs('admin.kategori.*') ? 'bg-indigo-900/50 text-indigo-300 font-semibold' : 'text-gray-300 hover:bg-slate-800' }}">
                <span class="font-semibold">📂 Kategori</span>
            </a>

            <a href="{{ route('admin.peminjaman.index') }}"
               class="block py-3 px-4 rounded-lg transition
               {{ request()->routeIs('admin.peminjaman.*') ? 'bg-indigo-900/50 text-indigo-300 font-semibold' : 'text-gray-300 hover:bg-slate-800' }}">
                <span class="font-semibold">📦 Data Peminjaman</span>
            </a>
        </nav>

        <div class="mt-10 pt-6 border-t border-slate-700">
            <p class="text-xs text-gray-400 mb-3">Logged in as:</p>
            <p class="text-sm font-semibold text-gray-200 mb-4">{{ auth()->user()->name }}</p>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 py-2 rounded-lg font-semibold transition text-white">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-8">
        @if(session('success'))
            <div id="alert-success" class="mb-4 p-4 bg-green-900/40 text-green-200 border border-green-600 rounded-lg flex justify-between items-center">
                <span>✓ {{ session('success') }}</span>
                <button type="button" onclick="document.getElementById('alert-success').style.display='none'" class="text-green-300 hover:text-green-100 font-bold text-lg">✕</button>
            </div>
        @endif

        @if($errors->any())
            <div id="alert-error" class="mb-4 p-4 bg-red-900/40 text-red-200 border border-red-600 rounded-lg flex justify-between items-start">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" onclick="document.getElementById('alert-error').style.display='none'" class="text-red-300 hover:text-red-100 font-bold text-lg ml-4 flex-shrink-0">✕</button>
            </div>
        @endif

        @yield('content')
    </main>

</div>

</body>
</html>
