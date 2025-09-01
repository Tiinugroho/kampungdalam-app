@extends('admin.partials.master')
@section('title', 'Edit FAQ')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Edit FAQ</strong></h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Pertanyaan</label>
                        <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Jawaban</label>
                        <textarea name="answer" class="form-control" rows="4" required>{{ old('answer', $faq->answer) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="category" class="form-control" required>
                            <option value="layanan" {{ old('category', $faq->category) == 'layanan' ? 'selected' : '' }}>Layanan</option>
                            <option value="administrasi" {{ old('category', $faq->category) == 'administrasi' ? 'selected' : '' }}>Administrasi</option>
                            <option value="umum" {{ old('category', $faq->category) == 'umum' ? 'selected' : '' }}>Umum</option>
                            <option value="wisata" {{ old('category', $faq->category) == 'wisata' ? 'selected' : '' }}>Wisata</option>
                            <option value="umkm" {{ old('category', $faq->category) == 'umkm' ? 'selected' : '' }}>UMKM</option>
                            <option value="kesehatan" {{ old('category', $faq->category) == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                            <option value="pendidikan" {{ old('category', $faq->category) == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Urutan</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', $faq->order) }}" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1" {{ old('is_active', $faq->is_active) == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('is_active', $faq->is_active) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
