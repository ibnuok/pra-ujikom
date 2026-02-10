<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Sistem Peminjaman Laptop</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900 min-h-screen text-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar with matching theme -->
    <aside class="w-64 bg-blue-950/50 backdrop-blur-md shadow-xl p-6 border-r border-white/10">
        <div class="text-center mb-8">
            <img src="{{ asset('logo-smkn.svg') }}" alt="SMKN 1 Ciomas" class="h-12 w-12 mx-auto mb-3">
            <h2 class="text-2xl font-bold text-indigo-300 mb-2">Admin Panel</h2>
            <div class="h-1 w-12 bg-gradient-to-r from-indigo-500 to-purple-500 rounded mx-auto"></div>
        </div>

        <nav class="space-y-3">
            <a href="{{ route('admin.dashboard') }}" class="block py-3 px-4 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('admin.dashboard') ? 'bg-white/15 text-indigo-300' : '' }}">
                <span class="font-semibold">Dashboard</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="block py-3 px-4 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('admin.users.*') ? 'bg-white/15 text-indigo-300' : '' }}">
                <span class="font-semibold">👥 User</span>
            </a>
            <a href="{{ route('admin.alat.index') }}" class="block py-3 px-4 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('admin.alat.*') ? 'bg-white/15 text-indigo-300' : '' }}">
                <span class="font-semibold">💻 Alat</span>
            </a>
            <a href="{{ route('admin.kategori.index') }}" class="block py-3 px-4 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('admin.kategori.*') ? 'bg-white/15 text-indigo-300' : '' }}">
                <span class="font-semibold">📂 Kategori</span>
            </a>
             <a href="{{ route('admin.peminjaman.index') }}"
       class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
        📦 Data Peminjaman
    </a>    
        </nav>

        <div class="mt-10 pt-6 border-t border-white/20">
            <p class="text-xs text-indigo-300 mb-3">Logged in as:</p>
            <p class="text-sm font-semibold text-white mb-4">{{ auth()->user()->name }}</p>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 py-2 rounded-lg font-semibold transition">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-8">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-500/20 text-green-300 border border-green-500/50 rounded-lg">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-4 bg-red-500/20 text-red-300 border border-red-500/50 rounded-lg">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

</div>

</body>
</html>
