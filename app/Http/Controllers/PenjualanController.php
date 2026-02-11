<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('pelanggan')->orderByDesc('faktur')->get();
        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::orderBy('nama_pelanggan')->get();
        return view('penjualan.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'no_pelanggan' => 'required|integer|exists:pelanggans,no_pelanggan',
            'tanggal_penjualan' => 'required|date',
        ]);

        Penjualan::create($data);

        return redirect()->route('penjualan.index')->with('success', 'Penjualan ditambahkan.');
    }

    public function edit(Penjualan $penjualan)
    {
        $pelanggans = Pelanggan::orderBy('nama_pelanggan')->get();
        return view('penjualan.edit', compact('penjualan', 'pelanggans'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $data = $request->validate([
            'no_pelanggan' => 'required|integer|exists:pelanggans,no_pelanggan',
            'tanggal_penjualan' => 'required|date',
        ]);

        $penjualan->update($data);

        return redirect()->route('penjualan.index')->with('success', 'Penjualan diperbarui.');
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Penjualan dihapus.');
    }
}
