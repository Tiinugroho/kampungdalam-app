@extends('admin.partials.master')
@section('title', 'Tambah FAQ')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Tambah FAQ</strong></h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.faqs.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Pertanyaan</label>
                        <input type="text" name="question" class="form-control" value="{{ old('question') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Jawaban</label>
                        <textarea name="answer" class="form-control" rows="4" required>{{ old('answer') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="category" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="layanan" {{ old('category') == 'layanan' ? 'selected' : '' }}>Layanan</option>
                            <option value="administrasi" {{ old('category') == 'administrasi' ? 'selected' : '' }}>Administrasi</option>
                            <option value="umum" {{ old('category') == 'umum' ? 'selected' : '' }}>Umum</option>
                            <option value="wisata" {{ old('category') == 'wisata' ? 'selected' : '' }}>Wisata</option>
                            <option value="umkm" {{ old('category') == 'umkm' ? 'selected' : '' }}>UMKM</option>
                            <option value="kesehatan" {{ old('category') == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                            <option value="pendidikan" {{ old('category') == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Urutan</label>
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
                    <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
