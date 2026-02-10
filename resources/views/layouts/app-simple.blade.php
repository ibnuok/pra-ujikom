<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Peminjaman Laptop')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900 min-h-screen text-gray-100">

<div class="min-h-screen flex flex-col">
    
    <!-- Top Navigation with theme -->
    <nav class="bg-blue-950/50 backdrop-blur-md shadow-xl p-6 border-b border-indigo-500/30 flex justify-between items-center">
        <div class="flex items-center gap-4">
            <img src="{{ asset('logo-smkn.svg') }}" alt="SMKN 1 Ciomas" class="h-10 w-10">
            <h1 class="text-2xl font-bold text-indigo-300">@yield('title', 'Sistem Peminjaman Laptop')</h1>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2 px-4 py-2 bg-white/5 rounded-lg border border-white/10">
                <span class="text-indigo-300">👤</span>
                <span class="text-gray-300">{{ auth()->user()->name }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 px-4 py-2 rounded-lg font-semibold transition">Logout</button>
            </form>
        </div>
    </nav>

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
