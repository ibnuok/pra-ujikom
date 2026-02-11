<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Alat;
use App\Models\Kategori;

class UserPeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = auth()->user()->peminjaman()->with('alat')->get();
        return view('user.peminjaman.index', compact('peminjaman'));
    }

    public function alats()
    {
        $alat = Alat::where('stok', '>', 0)->with('kategori')->get();
        return view('user.alats', compact('alat'));
    }

    public function create(Request $request)
    {
        $kategori = Kategori::all();
        $alat = Alat::with('kategori')->get();
        $selected = $request->query('alat');
        $selectedKategori = $request->query('kategori');
        return view('user.peminjaman.create', compact('alat', 'kategori', 'selected', 'selectedKategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alat_id' => 'required|exists:alats,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        // Cek stok alat
        $alat = Alat::findOrFail($request->alat_id);
        if ($request->jumlah > $alat->stok) {
            return back()->withErrors(['jumlah' => 'Stok alat tidak mencukupi! Stok tersedia: ' . $alat->stok . ' unit.'])->withInput();
        }

        Peminjaman::create([
            'user_id' => auth()->id(),
            'alat_id' => $request->alat_id,
            'jumlah' => $request->jumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'pending',
        ]);

        return redirect()->route('user.peminjaman.index')->with('success', 'Pengajuan peminjaman terkirim.');
    }

    public function return(Peminjaman $peminjaman)
    {
        if ($peminjaman->user_id !== auth()->id()) {
            abort(403);
        }

        // Hanya bisa return jika status sudah dipinjam (approved)
        if ($peminjaman->status !== 'dipinjam') {
            return back()->with('error', 'Alat belum disetujui atau sudah dikembalikan.');
        }

        // Naikkan stok alat sesuai jumlah yang dikembalikan
        $peminjaman->alat->increment('stok', $peminjaman->jumlah);
        
        $peminjaman->update(['status' => 'dikembalikan']);

        return back()->with('success', 'Alat berhasil dikembalikan. Terima kasih!');
    }
}
