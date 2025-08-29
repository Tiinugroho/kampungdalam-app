@extends('admin.partials.master')
@section('title', 'Edit Profil Desa')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Edit Profil Desa</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.village-profiles.update', $villageProfile->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label>Nama Desa</label>
                        <input type="text" name="village_name" class="form-control" value="{{ old('village_name', $villageProfile->village_name) }}">
                    </div>
                    <div class="mb-3">
                        <label>Kecamatan</label>
                        <input type="text" name="district" class="form-control" value="{{ old('district', $villageProfile->district) }}">
                    </div>
                    <div class="mb-3">
                        <label>Kabupaten</label>
                        <input type="text" name="regency" class="form-control" value="{{ old('regency', $villageProfile->regency) }}">
                    </div>
                    <div class="mb-3">
                        <label>Provinsi</label>
                        <input type="text" name="province" class="form-control" value="{{ old('province', $villageProfile->province) }}">
                    </div>
                    <div class="mb-3">
                        <label>Total Penduduk</label>
                        <input type="number" name="total_population" class="form-control" value="{{ old('total_population', $villageProfile->total_population) }}">
                    </div>
                    <div class="mb-3">
                        <label>Total KK</label>
                        <input type="number" name="total_families" class="form-control" value="{{ old('total_families', $villageProfile->total_families) }}">
                    </div>
                    <div class="mb-3">
                        <label>Luas Wilayah (km²)</label>
                        <input type="number" step="0.01" name="area_size" class="form-control" value="{{ old('area_size', $villageProfile->area_size) }}">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('admin.village-profiles.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
