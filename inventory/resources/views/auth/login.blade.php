@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="text-center mb-4">
            <h2 class="fw-bold" style="background: var(--gradient-bg); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                <i class="fas fa-boxes me-2"></i>Inventory System
            </h2>
            <p class="text-muted">Silakan login untuk melanjutkan</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                       id="password" name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">
                <i class="fas fa-sign-in-alt me-2"></i>Login
            </button>
        </form>

        <div class="mt-4 text-center">
            <small class="text-muted">
                <strong>Demo Accounts:</strong><br>
                Admin: admin@inventory.com / password<br>
                Gudang: gudang@inventory.com / password
            </small>
        </div>
    </div>
</div>
@endsection