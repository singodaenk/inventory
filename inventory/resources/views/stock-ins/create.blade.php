@extends('layouts.app')

@section('title', 'Tambah Stok Masuk')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2" style="background: var(--gradient-bg); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        <i class="fas fa-arrow-down me-2"></i>Tambah Stok Masuk
    </h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('stock-ins.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Produk</label>
                        <select class="form-select @error('product_id') is-invalid @enderror" 
                                id="product_id" name="product_id" required>
                            <option value="">Pilih Produk</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }} (Stok: {{ $product->stock }} {{ $product->unit }})
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" 
                               id="quantity" name="quantity" value="{{ old('quantity') }}" min="1" required>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" 
                               id="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required>
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Catatan</label>
                <textarea class="form-control @error('note') is-invalid @enderror" 
                          id="note" name="note" rows="3" placeholder="Keterangan stok masuk...">{{ old('note') }}</textarea>
                @error('note')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Stok Masuk
                </button>
                <a href="{{ route('stock-ins.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection