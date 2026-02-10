@extends('layouts.app-simple')

@section('title', 'Daftar Alat')
@section('content')

<div class="max-w-7xl mx-auto">
    <div class="bg-gradient-to-r from-blue-950/40 to-indigo-950/40 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 mb-8 shadow-lg">
        <h1 class="text-3xl font-bold text-indigo-300">Daftar Alat Tersedia</h1>
        <p class="text-indigo-200 mt-1">Pilih alat yang ingin Anda pinjam</p>
    </div>

    <!-- Filter Kategori -->
    <div class="mb-6 bg-white/5 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-4">
        <div class="flex flex-wrap gap-2">
            <button type="button" data-filter="all" class="filter-btn px-4 py-2 rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold active">
                📋 Semua Alat
            </button>
            @foreach($alat->pluck('kategori')->unique('id') as $k)
                @if($k)
                    <button type="button" data-filter="{{ $k->id }}" class="filter-btn px-4 py-2 rounded-lg bg-white/10 hover:bg-white/20 text-indigo-200 hover:text-white font-semibold transition">
                        {{ $k->nama_kategori }}
                    </button>
                @endif
            @endforeach
        </div>
    </div>

    @if($alat->isEmpty())
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-12 text-center">
            <div class="text-6xl mb-4">📭</div>
            <p class="text-indigo-200">Tidak ada alat yang tersedia</p>
        </div>
    @else
        <div id="alat-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($alat as $a)
            <div class="alat-card bg-gradient-to-br from-white/5 to-white/3 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-6 hover:border-indigo-500/60 hover:shadow-lg transition" data-kategori-id="{{ $a->kategori_id }}">
                <!-- Header -->
                <div class="mb-4">
                    <div class="inline-block text-3xl mb-2">📦</div>
                    <h3 class="text-xl font-bold text-indigo-300">{{ $a->nama_alat }}</h3>
                    <p class="text-sm text-indigo-200 mt-1">
                        📂 {{ optional($a->kategori)->nama_kategori ?? 'Belum dikategorikan' }}
                    </p>
                </div>

                <!-- Info -->
                <div class="space-y-3 mb-6 py-4 border-t border-b border-white/10">
                    <div class="flex justify-between items-center">
                        <span class="text-indigo-200">Stok Tersedia:</span>
                        <span class="text-xl font-bold {{ $a->stok > 0 ? 'text-green-300' : 'text-red-300' }}">
                            {{ $a->stok }} {{ $a->stok > 1 ? 'unit' : 'unit' }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-indigo-200">Kondisi:</span>
                        <span class="bg-green-500/20 text-green-300 border border-green-500/50 px-3 py-1 rounded-full text-sm font-semibold">
                            ✓ {{ $a->kondisi }}
                        </span>
                    </div>
                </div>

                <!-- Action Button -->
                @if($a->stok > 0)
                    <a href="{{ route('user.peminjaman.create', ['alat' => $a->id, 'kategori' => $a->kategori_id]) }}" class="w-full bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-semibold py-3 rounded-lg transition text-center block">
                        ✓ Ajukan Peminjaman
                    </a>
                @else
                    <button disabled class="w-full bg-gray-600/30 text-gray-400 font-semibold py-3 rounded-lg cursor-not-allowed text-center">
                        ✗ Stok Habis
                    </button>
                @endif
            </div>
            @endforeach
        </div>
    @endif

    <!-- Back Button -->
    <div class="mt-8 text-center">
        <a href="{{ route('user.dashboard') }}" class="text-indigo-300 hover:text-indigo-200 font-semibold transition">
            ← Kembali ke Dashboard
        </a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const alatCards = document.querySelectorAll('.alat-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filterValue = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active', 'from-indigo-600', 'to-purple-600', 'text-white'));
            filterButtons.forEach(btn => btn.classList.add('bg-white/10', 'hover:bg-white/20', 'text-indigo-200', 'hover:text-white'));
            
            this.classList.add('from-indigo-600', 'to-purple-600', 'text-white');
            this.classList.remove('bg-white/10', 'hover:bg-white/20', 'text-indigo-200', 'hover:text-white');
            this.classList.add('active', 'bg-gradient-to-r');

            // Filter cards
            alatCards.forEach(card => {
                if (filterValue === 'all') {
                    card.style.display = 'block';
                } else if (card.getAttribute('data-kategori-id') === filterValue) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>

@endsection
