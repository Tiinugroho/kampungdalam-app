@extends('admin.partials.master')
@section('title', 'Tambah Berita')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Tambah Berita</strong></h1>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Kategori</label>
                            <select name="category" class="form-control">
                                <option value="" disabled {{ old('category') ? '' : 'selected' }}>Pilih kategori
                                </option>
                                <option value="pembangunan" {{ old('category') == 'pembangunan' ? 'selected' : '' }}>
                                    Pembangunan</option>
                                <option value="ekonomi" {{ old('category') == 'ekonomi' ? 'selected' : '' }}>Ekonomi
                                </option>
                                <option value="kesehatan" {{ old('category') == 'kesehatan' ? 'selected' : '' }}>Kesehatan
                                </option>
                                <option value="pendidikan" {{ old('category') == 'pendidikan' ? 'selected' : '' }}>
                                    Pendidikan</option>
                                <option value="sosial" {{ old('category') == 'sosial' ? 'selected' : '' }}>Sosial</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label>Excerpt/Kutipan</label>
                            <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Konten</label>
                            <textarea name="content" class="form-control" rows="6">{{ old('content') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Gambar Utama</label>
                            <input type="file" name="featured_image" class="form-control">
                            <small class="text-muted">Opsional. Format: jpeg, png, jpg, gif, svg, webp. Max 2MB</small>
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published
                                </option>
                                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Publikasi</label>
                            <input type="datetime-local" name="published_at" class="form-control"
                                value="{{ old('published_at') }}">
                            <small class="text-muted">Opsional. Kosongkan jika belum ingin dipublikasikan.</small>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
