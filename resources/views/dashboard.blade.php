@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style="background: var(--gradient-bg); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
    </h1>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="fw-bold">{{ $totalProducts }}</h3>
                    <p class="mb-0">Total Produk</p>
                </div>
                <div class="align-self-center">
                    <i class="fas fa-box fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="fw-bold">{{ $lowStockProducts }}</h3>
                    <p class="mb-0">Stok Menipis</p>
                </div>
                <div class="align-self-center">
                    <i class="fas fa-exclamation-triangle fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header" style="background: var(--gradient-bg); color: white;">
                <h5 class="card-title mb-0"><i class="fas fa-arrow-down me-2"></i>Stok Masuk Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentStockIns as $stockIn)
                            <tr>
                                <td>{{ $stockIn->product->name }}</td>
                                <td><span class="badge bg-success">{{ $stockIn->quantity }}</span></td>
                                <td>{{ $stockIn->date->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header" style="background: var(--gradient-bg); color: white;">
                <h5 class="card-title mb-0"><i class="fas fa-arrow-up me-2"></i>Stok Keluar Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentStockOuts as $stockOut)
                            <tr>
                                <td>{{ $stockOut->product->name }}</td>
                                <td><span class="badge bg-danger">{{ $stockOut->quantity }}</span></td>
                                <td>{{ $stockOut->date->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection