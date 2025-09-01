@extends('admin.partials.master')
@section('title', 'Tambah Layanan Desa')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Tambah Layanan Desa</strong></h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.services.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Nama Layanan</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <input type="text" name="category" class="form-control" value="{{ old('category') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Syarat</label>
                        <textarea name="requirements" class="form-control" rows="3">{{ old('requirements') }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Proses</label>
                        <textarea name="process" class="form-control" rows="3">{{ old('process') }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Durasi</label>
                        <input type="text" name="duration" class="form-control" value="{{ old('duration') }}">
                        <small class="text-muted">Opsional (contoh: 3 hari kerja)</small>
                    </div>

                    <div class="mb-3">
                        <label>Biaya</label>
                        <input type="number" name="cost" step="100" class="form-control" value="{{ old('cost', 0) }}" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
