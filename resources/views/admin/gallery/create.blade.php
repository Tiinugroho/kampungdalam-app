@extends('admin.partials.master')
@section('title', 'Tambah Galeri')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Tambah Galeri</strong></h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Gambar</label>
                        <input type="file" name="image_path" class="form-control" required>
                        <small class="text-muted">Format: JPG, PNG (maks 2MB)</small>
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="category" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="kegiatan" {{ old('category') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="fasilitas" {{ old('category') == 'fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                            <option value="wisata" {{ old('category') == 'wisata' ? 'selected' : '' }}>Wisata</option>
                            <option value="umkm" {{ old('category') == 'umkm' ? 'selected' : '' }}>UMKM</option>
                            <option value="lainnya" {{ old('category') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Urutan</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label>Highlight</label>
                        <select name="is_featured" class="form-control">
                            <option value="0" {{ old('is_featured', 0) == 0 ? 'selected' : '' }}>Tidak</option>
                            <option value="1" {{ old('is_featured') == 1 ? 'selected' : '' }}>Ya</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
