@extends('admin.partials.master')
@section('title', 'Tambah UMKM')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Tambah UMKM</strong></h1>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Nama Usaha</label>
                            <input type="text" name="business_name" class="form-control"
                                value="{{ old('business_name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Nama Pemilik</label>
                            <input type="text" name="owner_name" class="form-control" value="{{ old('owner_name') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control" value="{{ old('nik') }}">
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="kuliner"
                                    {{ old('category', $villageProfile->category ?? '') == 'kuliner' ? 'selected' : '' }}>
                                    Kuliner</option>
                                <option value="kerajinan"
                                    {{ old('category', $villageProfile->category ?? '') == 'kerajinan' ? 'selected' : '' }}>
                                    Kerajinan</option>
                                <option value="pertanian"
                                    {{ old('category', $villageProfile->category ?? '') == 'pertanian' ? 'selected' : '' }}>
                                    Pertanian</option>
                                <option value="perdagangan"
                                    {{ old('category', $villageProfile->category ?? '') == 'perdagangan' ? 'selected' : '' }}>
                                    Perdagangan</option>
                                <option value="jasa"
                                    {{ old('category', $villageProfile->category ?? '') == 'jasa' ? 'selected' : '' }}>Jasa
                                </option>
                                <option value="teknologi"
                                    {{ old('category', $villageProfile->category ?? '') == 'teknologi' ? 'selected' : '' }}>
                                    Teknologi</option>
                                <option value="lainnya"
                                    {{ old('category', $villageProfile->category ?? '') == 'lainnya' ? 'selected' : '' }}>
                                    Lainnya</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Gambar Utama</label>
                            <input type="file" name="featured_image" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Gambar Produk</label>
                            <input type="file" name="product_images[]" class="form-control" multiple>
                        </div>

                        <div class="mb-3">
                            <label>Alamat</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}"
                                required>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Telepon</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Whatsapp</label>
                                <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Instagram</label>
                                <input type="text" name="instagram" class="form-control" value="{{ old('instagram') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Facebook</label>
                                <input type="text" name="facebook" class="form-control" value="{{ old('facebook') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Website</label>
                                <input type="url" name="website" class="form-control" value="{{ old('website') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Produk</label>
                            <input type="text" name="products" class="form-control" value="{{ old('products') }}">
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Modal</label>
                                <input type="number" name="capital" class="form-control" value="{{ old('capital') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Omzet Bulanan</label>
                                <input type="number" name="monthly_revenue" class="form-control"
                                    value="{{ old('monthly_revenue') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Jumlah Karyawan</label>
                                <input type="number" name="employee_count" class="form-control"
                                    value="{{ old('employee_count') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Tanggal Berdiri</label>
                                <input type="date" name="established_date" class="form-control"
                                    value="{{ old('established_date') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>No. Izin Usaha</label>
                                <input type="text" name="license_number" class="form-control"
                                    value="{{ old('license_number') }}">
                            </div>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" name="is_active" value="1" class="form-check-input"
                                {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label">Aktif</label>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.umkm.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
