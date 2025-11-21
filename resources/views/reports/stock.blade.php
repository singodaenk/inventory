@extends('layouts.app')

@section('title', 'Laporan Stok')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2" style="background: var(--gradient-bg); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        <i class="fas fa-chart-bar me-2"></i>Laporan Stok
    </h1>
</div>

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
                        <th>Satuan</th>
                        <th>Status Stok</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td><strong>{{ $product->code }}</strong></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            @if($product->stock <= $product->min_stock)
                                <span class="badge bg-danger">{{ $product->stock }}</span>
                            @elseif($product->stock <= $product->min_stock * 2)
                                <span class="badge bg-warning">{{ $product->stock }}</span>
                            @else
                                <span class="badge bg-success">{{ $product->stock }}</span>
                            @endif
                        </td>
                        <td>{{ $product->min_stock }}</td>
                        <td>{{ $product->unit }}</td>
                        <td>
                            @if($product->stock_status == 'low')
                                <span class="badge bg-danger">Stok Menipis</span>
                            @elseif($product->stock_status == 'medium')
                                <span class="badge bg-warning">Stok Cukup</span>
                            @else
                                <span class="badge bg-success">Stok Aman</span>
                            @endif
                        </td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection