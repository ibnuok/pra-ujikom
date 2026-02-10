<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
{
    $kategori = Kategori::all();
    return view('admin.kategori.index', compact('kategori'));
}


    public function create(){
        return view('admin.kategori.create');
    }

    public function store(Request $request){
        Kategori::create($request->all());
        return redirect()->route('admin.kategori.index');
    }

    public function edit(Kategori $kategori){
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori){
        $kategori->update($request->all());
        return redirect()->route('admin.kategori.index');
    }

    public function destroy(Kategori $kategori){
        $kategori->delete();
        return back();
    }
}
