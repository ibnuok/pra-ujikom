<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PetugasPeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['user','alat'])->get();
        return view('petugas.peminjaman.index', compact('peminjaman'));
    }

    public function approve(Peminjaman $peminjaman)
    {
        // Kurangi stok alat sesuai jumlah yang dipinjam
        $peminjaman->alat->decrement('stok', $peminjaman->jumlah);
        
        $peminjaman->update([
            'status' => 'dipinjam',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);
        return back()->with('success', 'Pengajuan peminjaman disetujui.');
    }

    public function markReturned(Peminjaman $peminjaman)
    {
        $peminjaman->update(['status' => 'dikembalikan']);
        return back()->with('success', 'Status pengembalian diperbarui.');
    }

    public function report()
    {
        $peminjaman = Peminjaman::with(['user','alat'])->get();
        return view('petugas.peminjaman.report', compact('peminjaman'));
    }
}
