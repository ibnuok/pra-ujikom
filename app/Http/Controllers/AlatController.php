<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        $alat = Alat::all();
        return view('admin.alat.index', compact('alat'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.alat.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        Alat::create($request->all());

        return redirect()->route('admin.alat.index')
            ->with('success','Alat berhasil ditambahkan!');
    }

    public function edit(Alat $alat)
    {
        $kategori = Kategori::all();
        return view('admin.alat.edit', compact('alat', 'kategori'));
    }

    public function update(Request $request, Alat $alat)
    {
        $alat->update($request->all());

        return redirect()->route('admin.alat.index')
            ->with('success','Alat berhasil diupdate!');
    }

    public function destroy(Alat $alat)
    {
        $alat->delete();

        return redirect()->route('admin.alat.index')
            ->with('success','Alat berhasil dihapus!');
    }
}
