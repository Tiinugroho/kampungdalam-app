@extends('admin.partials.master')
@section('title', 'Tambah Perangkat Desa')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Tambah Perangkat Desa</strong></h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.village-official.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Jabatan</label>
                        <input type="text" name="position" class="form-control" value="{{ old('position') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Foto</label>
                        <input type="file" name="photo" class="form-control">
                        <small class="text-muted">Opsional (JPEG/PNG, maks 2MB)</small>
                    </div>

                    <div class="mb-3">
                        <label>No. Telepon</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Urutan Tampil</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('admin.village-official.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
