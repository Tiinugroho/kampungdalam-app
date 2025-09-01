@extends('admin.partials.master')
@section('title', 'Tambah Profil Desa')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Tambah Profil Desa</strong></h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.village-profiles.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Nama Desa</label>
                        <input type="text" name="village_name" class="form-control" value="{{ old('village_name') }}">
                    </div>

                    <div class="mb-3">
                        <label>Kode Desa</label>
                        <input type="text" name="village_code" class="form-control" value="{{ old('village_code') }}">
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Kecamatan</label>
                        <input type="text" name="district" class="form-control" value="{{ old('district') }}">
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Kabupaten</label>
                        <input type="text" name="regency" class="form-control" value="{{ old('regency') }}">
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Provinsi</label>
                        <input type="text" name="province" class="form-control" value="{{ old('province') }}">
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Kode Pos</label>
                        <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code') }}">
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Tentang Desa</label>
                        <textarea name="about" class="form-control">{{ old('about') }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Sejarah</label>
                        <textarea name="history" class="form-control">{{ old('history') }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Visi</label>
                        <textarea name="vision" class="form-control">{{ old('vision') }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Misi</label>
                        <textarea name="mission" class="form-control">{{ old('mission') }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Total Penduduk</label>
                        <input type="number" name="total_population" class="form-control" value="{{ old('total_population', 0) }}">
                    </div>

                    <div class="mb-3">
                        <label>Total KK</label>
                        <input type="number" name="total_families" class="form-control" value="{{ old('total_families', 0) }}">
                    </div>

                    <div class="mb-3">
                        <label>Luas Wilayah (km²)</label>
                        <input type="number" step="0.01" name="area_size" class="form-control" value="{{ old('area_size', 0) }}">
                    </div>

                    <div class="mb-3">
                        <label>Total RT</label>
                        <input type="number" name="total_rt" class="form-control" value="{{ old('total_rt', 0) }}">
                    </div>

                    <div class="mb-3">
                        <label>Total RW</label>
                        <input type="number" name="total_rw" class="form-control" value="{{ old('total_rw', 0) }}">
                    </div>

                    <div class="mb-3">
                        <label>Google Map Embed URL</label>
                        <input type="url" name="map_embed_url" class="form-control" value="{{ old('map_embed_url') }}">
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Batas Utara</label>
                        <textarea name="boundary_north" class="form-control">{{ old('boundary_north') }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>
                    <div class="mb-3">
                        <label>Batas Selatan</label>
                        <textarea name="boundary_south" class="form-control">{{ old('boundary_south') }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>
                    <div class="mb-3">
                        <label>Batas Timur</label>
                        <textarea name="boundary_east" class="form-control">{{ old('boundary_east') }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>
                    <div class="mb-3">
                        <label>Batas Barat</label>
                        <textarea name="boundary_west" class="form-control">{{ old('boundary_west') }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Ringkasan Batas Wilayah</label>
                        <textarea name="village_boundaries" class="form-control">{{ old('village_boundaries') }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>No. Telepon</label>
                        <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone') }}">
                        <small class="text-muted">Opsional</small>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email') }}">
                        <small class="text-muted">Opsional</small>
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <textarea name="contact_address" class="form-control">{{ old('contact_address') }}</textarea>
                        <small class="text-muted">Opsional</small>
                    </div>
                    <div class="mb-3">
                        <label>Website</label>
                        <input type="url" name="website" class="form-control" value="{{ old('website') }}">
                        <small class="text-muted">Opsional</small>
                    </div>

                    <div class="mb-3">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control" value="{{ old('latitude') }}">
                        <small class="text-muted">Opsional</small>
                    </div>
                    <div class="mb-3">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control" value="{{ old('longitude') }}">
                        <small class="text-muted">Opsional</small>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('admin.village-profiles.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
