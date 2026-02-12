<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::orderBy('kode_barang', 'asc')->get();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga_barang' => 'required|integer|min:0',
        ]);

        Barang::create($data);

        return redirect()->route('barang.index')->with('success', 'Barang ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $data = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga_barang' => 'required|integer|min:0',
        ]);

        $barang->update($data);

        return redirect()->route('barang.index')->with('success', 'Barang diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang dihapus.');
    }
}
