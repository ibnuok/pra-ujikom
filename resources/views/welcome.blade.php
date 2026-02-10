<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistem Peminjaman Laptop - SMKN 1 Ciomas</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900 min-h-screen">
        
        <!-- Navbar -->
        <nav class="bg-black/30 backdrop-blur-md border-b border-white/10">
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="bg-indigo-500 rounded-lg p-2">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-white">Sistem Peminjaman Laptop</h1>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('login') }}" class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">
                        Login
                    </a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="min-h-screen flex items-center justify-center px-6 py-20">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-5xl md:text-6xl font-bold text-white mb-6">Kelola Peminjaman Laptop dengan Mudah</h2>
                <p class="text-xl text-indigo-200 mb-12">Platform terpadu untuk mengelola peminjaman laptop di SMKN 1 Ciomas</p>
                
                <div class="grid md:grid-cols-3 gap-6 mb-12">
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-8">
                        <div class="bg-blue-500/20 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 010 4m0-4a2 2 0 100 4m0-4a2 2 0 010 4M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Admin Panel</h3>
                        <p class="text-indigo-200 text-sm">Kelola semua peminjaman, alat, dan user dalam satu dashboard</p>
                    </div>

                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-8">
                        <div class="bg-purple-500/20 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Petugas</h3>
                        <p class="text-indigo-200 text-sm">Setujui peminjaman, pantau pengembalian, dan buat laporan</p>
                    </div>

                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-8">
                        <div class="bg-green-500/20 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">User</h3>
                        <p class="text-indigo-200 text-sm">Lihat alat tersedia dan ajukan peminjaman dengan mudah</p>
                    </div>
                </div>

                <a href="{{ route('login') }}" class="inline-block bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-bold py-4 px-8 rounded-lg transition transform hover:scale-105">
                    Mulai Sekarang
                </a>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-20 px-6 bg-black/50">
            <div class="max-w-6xl mx-auto">
                <h3 class="text-4xl font-bold text-white mb-12 text-center">Fitur Unggulan</h3>
                
                <div class="grid md:grid-cols-2 gap-12">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-white">Manajemen Alat Realtime</h4>
                            <p class="text-indigo-200 mt-2">Pantau stok dan kondisi alat secara realtime</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-white">Sistem Approval Mudah</h4>
                            <p class="text-indigo-200 mt-2">Petugas dapat menyetujui atau menolak dengan cepat</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-white">Laporan Terperinci</h4>
                            <p class="text-indigo-200 mt-2">Cetak laporan peminjaman kapan saja</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-white">Interface Intuitif</h4>
                            <p class="text-indigo-200 mt-2">Desain user-friendly yang mudah dipelajari</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-black/70 border-t border-white/10 py-6 px-6">
            <div class="max-w-6xl mx-auto text-center text-indigo-200">
                <p>&copy; 2026 SMKN 1 Ciomas - Sistem Peminjaman Laptop. Semua hak dilindungi.</p>
            </div>
        </footer>

    </body>
</html>
