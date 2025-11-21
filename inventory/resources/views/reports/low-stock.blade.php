@extends('layouts.app')

@section('title', 'Laporan Stok Menipis')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2" style="background: var(--gradient-bg); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        <i class="fas fa-exclamation-triangle me-2"></i>Laporan Stok Menipis
    </h1>
</div>

@if($products->count() > 0)
<div class="alert alert-warning">
    <i class="fas fa-exclamation-circle me-2"></i>
    Terdapat <strong>{{ $products->count() }}</strong> produk dengan stok menipis yang perlu diperhatikan.
</div>
@else
<div class="alert alert-success">
    <i class="fas fa-check-circle me-2"></i>
    Semua produk memiliki stok yang cukup.
</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok Saat Ini</th>
                        <th>Minimal Stok</th>
                        <th>Kekurangan</th>
                        <th>Satuan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td><strong>{{ $product->code }}</strong></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <span class="badge bg-danger">{{ $product->stock }}</span>
                        </td>
                        <td>{{ $product->min_stock }}</td>
                        <td>
                            @php
                                $shortage = $product->min_stock - $product->stock;
                            @endphp
                            @if($shortage > 0)
                                <span class="badge bg-danger">{{ $shortage }}</span>
                            @else
                                <span class="badge bg-success">0</span>
                            @endif
                        </td>
                        <td>{{ $product->unit }}</td>
                        <td>
                            <span class="badge bg-danger">Perlu Restock</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection