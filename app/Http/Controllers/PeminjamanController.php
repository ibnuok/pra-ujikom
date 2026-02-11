<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Alat;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['user','alat'])->get();

        $totalPeminjaman = Peminjaman::count();
        $dipinjam = Peminjaman::where('status','dipinjam')->count();
        $dikembalikan = Peminjaman::where('status','dikembalikan')->count();
        $userMeminjam = Peminjaman::distinct('user_id')->count('user_id');

        return view('admin.peminjaman.index', compact(
            'peminjaman',
            'totalPeminjaman',
            'dipinjam',
            'dikembalikan',
            'userMeminjam'
        ));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();
        $alat = Alat::all();

        return view('admin.peminjaman.create', compact('users', 'alat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'alat_id' => 'required|exists:alats,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        $peminjaman = Peminjaman::create([
            'user_id' => $request->user_id,
            'alat_id' => $request->alat_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
        ]);

        // Kurangi stok jika status langsung dipinjam
        if ($request->status === 'dipinjam') {
            $peminjaman->alat->decrement('stok');
        }

        return redirect()->route('admin.peminjaman.index')
            ->with('success', 'Data peminjaman berhasil ditambahkan');
    }

    public function show(Peminjaman $peminjaman)
    {
        return view('admin.peminjaman.show', compact('peminjaman'));
    }

    public function edit(Peminjaman $peminjaman)
    {
        $users = User::where('role', 'user')->get();
        $alat = Alat::all();

        return view('admin.peminjaman.edit', compact('peminjaman', 'users', 'alat'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'alat_id' => 'required|exists:alats,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        $oldStatus = $peminjaman->status;
        $oldAlatId = $peminjaman->alat_id;
        $newStatus = $request->status;
        $newAlatId = $request->alat_id;

        // Handle perubahan status
        if ($oldStatus !== 'dipinjam' && $newStatus === 'dipinjam') {
            // Jika berubah dari non-dipinjam ke dipinjam, kurangi stok alat
            $peminjaman->alat->decrement('stok');
        } elseif ($oldStatus === 'dipinjam' && $newStatus !== 'dipinjam') {
            // Jika berubah dari dipinjam ke non-dipinjam, naikkan stok alat
            $peminjaman->alat->increment('stok');
        }

        // Handle perubahan alat pada status dipinjam
        if ($oldAlatId !== $newAlatId && $oldStatus === 'dipinjam') {
            // Naikkan stok alat lama
            Alat::find($oldAlatId)->increment('stok');
            // Kurangi stok alat baru
            Alat::find($newAlatId)->decrement('stok');
        }

        $peminjaman->update([
            'user_id' => $request->user_id,
            'alat_id' => $request->alat_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.peminjaman.index')
            ->with('success', 'Data peminjaman berhasil diperbarui');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        // Kembalikan stok jika peminjaman sedang dipinjam
        if ($peminjaman->status === 'dipinjam') {
            $peminjaman->alat->increment('stok');
        }

        $peminjaman->delete();

        return redirect()->route('admin.peminjaman.index')
            ->with('success', 'Data peminjaman berhasil dihapus');
    }
}
