@extends('admin.partials.master')
@section('title', 'Edit Berita')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Edit Berita</strong></h1>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $news->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Kategori</label>
                            <select name="category" class="form-control">
                                <option value="" disabled {{ $news->category ? '' : 'selected' }}>Pilih kategori
                                </option>
                                <option value="pembangunan"
                                    {{ old('category', $news->category) == 'pembangunan' ? 'selected' : '' }}>Pembangunan
                                </option>
                                <option value="ekonomi"
                                    {{ old('category', $news->category) == 'ekonomi' ? 'selected' : '' }}>Ekonomi</option>
                                <option value="kesehatan"
                                    {{ old('category', $news->category) == 'kesehatan' ? 'selected' : '' }}>Kesehatan
                                </option>
                                <option value="pendidikan"
                                    {{ old('category', $news->category) == 'pendidikan' ? 'selected' : '' }}>Pendidikan
                                </option>
                                <option value="sosial" {{ old('category', $news->category) == 'sosial' ? 'selected' : '' }}>
                                    Sosial</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label>Excerpt/Kutipan</label>
                            <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt', $news->excerpt) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Konten</label>
                            <textarea name="content" class="form-control" rows="6">{{ old('content', $news->content) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Gambar Utama</label><br>
                            @if ($news->featured_image)
                                <img src="{{ asset('storage/news/' . $news->featured_image) }}" alt="Gambar"
                                    width="120" class="mb-2">
                            @endif
                            <input type="file" name="featured_image" class="form-control">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="draft" {{ old('status', $news->status) == 'draft' ? 'selected' : '' }}>
                                    Draft</option>
                                <option value="published"
                                    {{ old('status', $news->status) == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="archived"
                                    {{ old('status', $news->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Publikasi</label>
                            <input type="datetime-local" name="published_at" class="form-control"
                                value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : '') }}">
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
