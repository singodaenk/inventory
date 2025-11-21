@extends('layouts.app')

@section('title', 'Stok Keluar')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2" style="background: var(--gradient-bg); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        <i class="fas fa-arrow-up me-2"></i>Stok Keluar
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('stock-outs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Stok Keluar
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>Quantity</th>
                        <th>Tanggal</th>
                        <th>Catatan</th>
                        <th>Input Oleh</th>
                        <th>Waktu Input</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stockOuts as $stockOut)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong>{{ $stockOut->product->name }}</strong>
                            <br><small class="text-muted">{{ $stockOut->product->code }}</small>
                        </td>
                        <td>
                            <span class="badge bg-danger">{{ $stockOut->quantity }} {{ $stockOut->product->unit }}</span>
                        </td>
                        <td>{{ $stockOut->date->format('d/m/Y') }}</td>
                        <td>{{ $stockOut->note ?? '-' }}</td>
                        <td>{{ $stockOut->user->name }}</td>
                        <td>{{ $stockOut->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection