@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 class="mb-0">Data Penjualan</h3>
        <a href="{{ route('penjualan.create') }}" class="btn btn-primary">Tambah Penjualan</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Faktur</th>
                    <th>No Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Penjualan</th>
                    <th style="width: 160px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penjualans as $penjualan)
                    <tr>
                        <td>{{ $penjualan->faktur }}</td>
                        <td>{{ $penjualan->no_pelanggan }}</td>
                        <td>{{ $penjualan->pelanggan?->nama_pelanggan ?? '-' }}</td>
                        <td>{{ $penjualan->tanggal_penjualan }}</td>
                        <td>
                            <a href="{{ route('penjualan.edit', $penjualan) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('penjualan.destroy', $penjualan) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus penjualan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
