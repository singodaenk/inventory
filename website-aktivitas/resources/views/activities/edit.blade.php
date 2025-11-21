@extends('layouts.app')

@section('title', 'Edit Aktivitas')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-warning">
                <h4 class="mb-0">Edit Aktivitas</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('activities.update', $activity->id) }}" method="POST" id="editActivityForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Aktivitas <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_aktivitas') is-invalid @enderror" 
                               name="nama_aktivitas" value="{{ old('nama_aktivitas', $activity->nama_aktivitas) }}" 
                               required minlength="3" maxlength="255">
                        @error('nama_aktivitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  name="deskripsi" rows="3" required minlength="10">{{ old('deskripsi', $activity->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                               name="tanggal" value="{{ old('tanggal', $activity->tanggal) }}" required
                               max="{{ date('Y-m-d') }}">
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. HP <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" 
                               name="no_hp" value="{{ old('no_hp', $activity->no_hp) }}" required
                               pattern="^[0-9+\-\s()]+$" title="Format nomor HP tidak valid"
                               placeholder="Contoh: 08123456789">
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="berjalan" {{ old('status', $activity->status) == 'berjalan' ? 'selected' : '' }}>
                                Berjalan
                            </option>
                            <option value="selesai" {{ old('status', $activity->status) == 'selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('activities.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('editActivityForm').addEventListener('submit', function(e) {
    const noHp = document.querySelector('input[name="no_hp"]');
    const noHpValue = noHp.value.replace(/[^0-9]/g, '');
    
    if (noHpValue.length < 10 || noHpValue.length > 15) {
        e.preventDefault();
        alert('Nomor HP harus antara 10-15 digit angka');
        noHp.focus();
    }
});
</script>
@endsection