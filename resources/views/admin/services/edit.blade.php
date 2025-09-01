@extends('admin.partials.master')
@section('title', 'Edit Layanan Desa')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Edit Layanan Desa</strong></h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Nama Layanan</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $service->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <input type="text" name="category" class="form-control" value="{{ old('category', $service->category) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ old('description', $service->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Syarat</label>
                        <textarea name="requirements" class="form-control" rows="3">{{ old('requirements', $service->requirements) }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Proses</label>
                        <textarea name="process" class="form-control" rows="3">{{ old('process', $service->process) }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Durasi</label>
                        <input type="text" name="duration" class="form-control" value="{{ old('duration', $service->duration) }}">
                        <small class="text-muted">Opsional (contoh: 3 hari kerja)</small>
                    </div>

                    <div class="mb-3">
                        <label>Biaya</label>
                        <input type="number" name="cost"  class="form-control" value="{{ old('cost', $service->cost) }}" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1" {{ old('is_active', $service->is_active) == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('is_active', $service->is_active) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
