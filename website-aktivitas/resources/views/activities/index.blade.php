@extends('layouts.app')

@section('title', 'Daftar Aktivitas')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Daftar Aktivitas Saya</h1>
            <a href="{{ route('activities.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Aktivitas
            </a>
        </div>

        <!-- Notifikasi -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Tabel Data -->
        <div class="card">
            <div class="card-body">
                @if($activities->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Aktivitas</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>No. HP</th>
                                    <th>Status</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activities as $index => $activity)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ Str::limit($activity->nama_aktivitas, 30) }}</td>
                                    <td>{{ Str::limit($activity->deskripsi, 50) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($activity->tanggal)->format('d/m/Y') }}</td>
                                    <td>{{ $activity->no_hp }}</td>
                                    <td>
                                        @if($activity->status == 'berjalan')
                                            <span class="badge bg-warning">Berjalan</span>
                                        @else
                                            <span class="badge bg-success">Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('activities.edit', $activity->id) }}" 
                                               class="btn btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('activities.destroy', $activity->id) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-outline-danger"
                                                        onclick="return confirm('Yakin ingin menghapus aktivitas ini?')"
                                                        title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <!-- Jika tidak ada data -->
                    <div class="text-center py-5">
                        <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Belum ada aktivitas</h4>
                        <p class="text-muted">Mulai dengan menambahkan aktivitas pertama Anda</p>
                        <a href="{{ route('activities.create') }}" class="btn btn-primary mt-2">
                            <i class="fas fa-plus me-1"></i>Tambah Aktivitas Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection