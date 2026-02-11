@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title mb-3">Edit Penjualan</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('penjualan.update', $penjualan) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="no_pelanggan" class="form-label">Pelanggan</label>
                    <select id="no_pelanggan" name="no_pelanggan" class="form-select" required>
                        @foreach ($pelanggans as $pelanggan)
                            <option value="{{ $pelanggan->no_pelanggan }}" @selected(old('no_pelanggan', $penjualan->no_pelanggan) == $pelanggan->no_pelanggan)>
                                {{ $pelanggan->no_pelanggan }} - {{ $pelanggan->nama_pelanggan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
                    <input type="date" id="tanggal_penjualan" name="tanggal_penjualan" value="{{ old('tanggal_penjualan', $penjualan->tanggal_penjualan) }}" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
