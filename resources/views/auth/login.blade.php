<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Peminjaman Laptop</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-4">
        <!-- Header Logo -->
        <div class="text-center mb-8">
            <div class="inline-block bg-white/10 backdrop-blur-md rounded-full p-4 mb-4">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-white">Sistem Peminjaman Laptop</h1>
            <p class="text-indigo-200 mt-2">SMKN 1 Ciomas</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 shadow-2xl border border-white/20">
            
            @if (session('status'))
                <div class="mb-4 p-4 bg-green-500/20 text-green-200 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-indigo-100 mb-2">Email Address</label>
                    <input id="email" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-indigo-200/50 focus:outline-none focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition @error('email') border-red-500 @enderror" 
                        type="email" name="email" value="{{ old('email') }}" required autofocus>
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

                <!-- Role Selection -->
                <div>
                    <label for="role" class="block text-sm font-medium text-indigo-100 mb-2">Pilih Role</label>
                    <select id="role" name="role" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                        <option value="user">User</option>
                    </select>
                    @error('role')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded bg-white/20 border-white/30 text-indigo-400 focus:ring-indigo-300">
                    <label for="remember_me" class="ms-2 text-sm text-indigo-200">Ingat saya</label>
                </div>

                <!-- Login Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold py-3 rounded-lg transition transform hover:scale-105 active:scale-95 shadow-lg mt-6">
                    Masuk
                </button>

                <!-- Forgot Password -->
                @if (Route::has('password.request'))
                    <div class="text-center pt-4">
                        <a href="{{ route('password.request') }}" class="text-indigo-200 hover:text-white text-sm transition">
                            Lupa Password?
                        </a>
                    </div>
                @endif
            </form>

            <!-- Demo Credentials -->
            <div class="mt-8 pt-6 border-t border-white/20">
                <p class="text-white text-sm font-semibold mb-3">📝 Akun Demo:</p>
                <div class="space-y-2 text-xs text-indigo-200">
                    <p><span class="text-indigo-100 font-semibold">Admin:</span> admin@example.com / admin123</p>
                    <p><span class="text-indigo-100 font-semibold">Petugas:</span> petugas@example.com / petugas123</p>
                    <p><span class="text-indigo-100 font-semibold">User:</span> budi@example.com / user123</p>
                </div>

                <!-- Register Link -->
                <div class="mt-6 pt-6 border-t border-white/20">
                    <p class="text-indigo-200 text-sm text-center">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-white font-semibold hover:underline">Daftar sebagai Peminjam</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
