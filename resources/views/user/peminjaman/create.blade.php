@extends('layouts.app-simple')

@section('title', 'Ajukan Peminjaman')
@section('content')

<div class="max-w-3xl mx-auto">
    <div class="bg-gradient-to-br from-blue-950/40 to-indigo-950/40 backdrop-blur-sm border border-indigo-500/30 rounded-xl p-8 shadow-lg">
        <h1 class="text-3xl font-bold mb-2 text-indigo-300">Ajukan Peminjaman</h1>
        <p class="text-indigo-200 mb-8">Lengkapi form di bawah untuk mengajukan peminjaman alat</p>

        <form action="{{ route('user.peminjaman.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Peminjam -->
            <div>
                <label class="block text-sm font-semibold text-indigo-300 mb-2">👤 Nama Peminjam</label>
                <input type="text" value="{{ auth()->user()->name }}" disabled class="w-full px-4 py-3 rounded-lg bg-white/5 border border-white/10 text-white cursor-not-allowed">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            </div>

            <!-- Pilih Kategori -->
            <div>
                <label class="block text-sm font-semibold text-indigo-300 mb-2">📂 Pilih Kategori Alat</label>
                <select id="kategori-select" class="w-full px-4 py-3 rounded-lg bg-white/5 border border-indigo-500/50 text-white focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ $selectedKategori == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                <p class="text-indigo-200 text-xs mt-1">Pilih kategori alat terlebih dahulu untuk melihat daftar alat yang tersedia</p>
            </div>

            <!-- Pilih Alat (Filtered by Kategori) -->
            <div>
                <label class="block text-sm font-semibold text-indigo-300 mb-2">💻 Pilih Alat</label>
                <select name="alat_id" id="alat-select" class="w-full px-4 py-3 rounded-lg bg-white/5 border border-indigo-500/50 text-white focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition" required>
                    <option value="">-- Pilih Alat --</option>
                    @foreach($alat as $a)
                        <option value="{{ $a->id }}" 
                                data-kategori-id="{{ $a->kategori_id }}"
                                data-stok="{{ $a->stok }}"
                                class="alat-option"
                                {{ isset($selected) && $selected == $a->id ? 'selected' : '' }}>
                            {{ $a->nama_alat }} • Stok: {{ $a->stok }}
                        </option>
                    @endforeach
                </select>
                <p class="text-indigo-200 text-xs mt-1" id="stok-info"></p>
                @error('alat_id')<span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>@enderror
            </div>

            <!-- Jumlah Peminjaman -->
            <div>
                <label class="block text-sm font-semibold text-indigo-300 mb-2">📦 Jumlah Peminjaman</label>
                <input type="number" name="jumlah" id="jumlah-input" class="w-full px-4 py-3 rounded-lg bg-white/5 border border-indigo-500/50 text-white focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition" value="{{ old('jumlah', 1) }}" min="1" required>
                <p class="text-red-400 text-sm mt-1 hidden" id="stok-error">Stok tidak mencukupi!</p>
                @error('jumlah')<span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>@enderror
            </div>

            <!-- Tanggal Pinjam -->
            <div>
                <label class="block text-sm font-semibold text-indigo-300 mb-2">📅 Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="w-full px-4 py-3 rounded-lg bg-white/5 border border-indigo-500/50 text-white focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition" value="{{ old('tanggal_pinjam') }}" required>
                @error('tanggal_pinjam')<span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>@enderror
            </div>

            <!-- Tanggal Kembali -->
            <div>
                <label class="block text-sm font-semibold text-indigo-300 mb-2">📅 Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="w-full px-4 py-3 rounded-lg bg-white/5 border border-indigo-500/50 text-white focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400 transition" value="{{ old('tanggal_kembali') }}" required>
                @error('tanggal_kembali')<span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>@enderror
            </div>

            <!-- Info Box -->
            <div class="bg-white/5 backdrop-blur-sm border border-indigo-500/30 rounded-lg p-4 text-indigo-200 text-sm">
                <p class="font-semibold text-indigo-300 mb-2">ℹ️ Informasi Penting</p>
                <ul class="space-y-1">
                    <li>• Pengajuan akan masuk ke status <span class="text-amber-300 font-semibold">Pending</span></li>
                    <li>• Petugas akan mereview dan menyetujui pengajuan Anda</li>
                    <li>• Setelah disetujui, Anda bisa melakukan peminjaman</li>
                </ul>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 pt-4">
                <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-semibold py-3 rounded-lg transition transform hover:scale-105 active:scale-95 shadow-lg">
                    ✓ Ajukan Peminjaman
                </button>
                <a href="{{ route('user.dashboard') }}" class="flex-1 bg-white/10 hover:bg-white/15 text-indigo-200 font-semibold py-3 rounded-lg transition text-center">
                    ← Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const kategoriSelect = document.getElementById('kategori-select');
    const alatSelect = document.getElementById('alat-select');
    const jumlahInput = document.getElementById('jumlah-input');
    const stokInfo = document.getElementById('stok-info');
    const stokError = document.getElementById('stok-error');
    const submitBtn = document.querySelector('button[type="submit"]');

    // Validasi stok
    function validateStok() {
        const selectedOption = alatSelect.options[alatSelect.selectedIndex];
        const stokTersedia = parseInt(selectedOption.getAttribute('data-stok')) || 0;
        const jumlahPinjam = parseInt(jumlahInput.value) || 0;

        if (jumlahPinjam > stokTersedia && alatSelect.value) {
            stokError.classList.remove('hidden');
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            return false;
        } else {
            stokError.classList.add('hidden');
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            return true;
        }
    }

    // Filter alat berdasarkan kategori yang dipilih
    kategoriSelect.addEventListener('change', function() {
        const selectedKategoriId = this.value;
        
        // Reset alat select
        alatSelect.value = '';
        stokInfo.textContent = '';
        jumlahInput.value = 1;
        stokError.classList.add('hidden');

        // Tampilkan/sembunyikan opsi alat berdasarkan kategori
        const alatOptions = document.querySelectorAll('.alat-option');
        alatOptions.forEach(option => {
            if (selectedKategoriId === '') {
                option.style.display = 'none';
            } else if (option.getAttribute('data-kategori-id') === selectedKategoriId) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });
    });

    // Tampilkan info stok saat alat dipilih
    alatSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        jumlahInput.value = 1;
        if (this.value) {
            const stok = selectedOption.getAttribute('data-stok');
            stokInfo.textContent = '✓ Stok tersedia: ' + stok + ' unit';
        } else {
            stokInfo.textContent = '';
        }
        validateStok();
    });

    // Validasi saat jumlah berubah
    jumlahInput.addEventListener('input', validateStok);
    jumlahInput.addEventListener('change', validateStok);

    // Trigger kategori change untuk initialize tampilan
    if (kategoriSelect.value) {
        kategoriSelect.dispatchEvent(new Event('change'));
    }
});
</script>

@endsection
