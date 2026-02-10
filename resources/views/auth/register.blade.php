<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Peminjam - Sistem Peminjaman Laptop</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-4">
        <!-- Header Logo -->
        <div class="text-center mb-8">
            <div class="inline-block bg-white/10 backdrop-blur-md rounded-full p-4 mb-4">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-white">Daftar Peminjam</h1>
            <p class="text-indigo-200 mt-2">Sistem Peminjaman Laptop SMKN 1 Ciomas</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 shadow-2xl border border-white/20">
            
            @if (session('status'))
                <div class="mb-4 p-4 bg-green-500/20 text-green-200 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-indigo-100 mb-2">Nama Lengkap</label>
                    <input id="name" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-indigo-200/50 focus:outline-none focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition @error('name') border-red-500 @enderror" 
                        type="text" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-indigo-100 mb-2">Email Address</label>
                    <input id="email" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-indigo-200/50 focus:outline-none focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition @error('email') border-red-500 @enderror" 
                        type="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-indigo-100 mb-2">Password</label>
                    <input id="password" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-indigo-200/50 focus:outline-none focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition @error('password') border-red-500 @enderror" 
                        type="password" name="password" required>
                    @error('password')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-indigo-100 mb-2">Konfirmasi Password</label>
                    <input id="password_confirmation" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-indigo-200/50 focus:outline-none focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition" 
                        type="password" name="password_confirmation" required>
                    @error('password_confirmation')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Register Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold py-3 rounded-lg transition transform hover:scale-105 active:scale-95 shadow-lg mt-6">
                    Daftar Sekarang
                </button>

                <!-- Login Link -->
                <div class="text-center pt-4">
                    <p class="text-indigo-200 text-sm">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-white font-semibold hover:underline">Masuk di sini</a>
                    </p>
                </div>
            </form>

            <!-- Info Section -->
            <div class="mt-8 pt-6 border-t border-white/20">
                <p class="text-white text-sm font-semibold mb-3">ℹ️ Informasi Pendaftaran:</p>
                <div class="space-y-2 text-xs text-indigo-200">
                    <p>• Daftar sebagai <span class="text-indigo-100 font-semibold">Peminjam</span> untuk meminjam laptop</p>
                    <p>• Setelah mendaftar, Anda bisa langsung masuk dan mengajukan peminjaman</p>
                    <p>• Petugas akan meninjau pengajuan peminjaman Anda</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
