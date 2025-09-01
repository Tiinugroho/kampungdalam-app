@extends('admin.partials.master')
@section('title', 'Edit Galeri')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Edit Galeri</strong></h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $gallery->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Gambar</label><br>
                        @if($gallery->image_path)
                            <img src="{{ asset('storage/gallery/'.$gallery->image_path) }}" alt="{{ $gallery->title }}" class="img-thumbnail mb-2" width="150">
                        @endif
                        <input type="file" name="image_path" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti</small>
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="category" class="form-control" required>
                            <option value="kegiatan" {{ old('category', $gallery->category) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="fasilitas" {{ old('category', $gallery->category) == 'fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                            <option value="wisata" {{ old('category', $gallery->category) == 'wisata' ? 'selected' : '' }}>Wisata</option>
                            <option value="umkm" {{ old('category', $gallery->category) == 'umkm' ? 'selected' : '' }}>UMKM</option>
                            <option value="lainnya" {{ old('category', $gallery->category) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Urutan</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', $gallery->order) }}" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label>Highlight</label>
                        <select name="is_featured" class="form-control">
                            <option value="0" {{ old('is_featured', $gallery->is_featured) == 0 ? 'selected' : '' }}>Tidak</option>
                            <option value="1" {{ old('is_featured', $gallery->is_featured) == 1 ? 'selected' : '' }}>Ya</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
