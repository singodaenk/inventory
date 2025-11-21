@extends('layouts.app')

@section('title', 'Stok Masuk')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2" style="background: var(--gradient-bg); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        <i class="fas fa-arrow-down me-2"></i>Stok Masuk
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('stock-ins.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Stok Masuk
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
                    @foreach($stockIns as $stockIn)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong>{{ $stockIn->product->name }}</strong>
                            <br><small class="text-muted">{{ $stockIn->product->code }}</small>
                        </td>
                        <td>
                            <span class="badge bg-success">{{ $stockIn->quantity }} {{ $stockIn->product->unit }}</span>
                        </td>
                        <td>{{ $stockIn->date->format('d/m/Y') }}</td>
                        <td>{{ $stockIn->note ?? '-' }}</td>
                        <td>{{ $stockIn->user->name }}</td>
                        <td>{{ $stockIn->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection