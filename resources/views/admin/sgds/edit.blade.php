@extends('admin.partials.master')
@section('title', 'Edit Data SGDs')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Edit Data SGDs</strong></h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.sgds.update', $sgd->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label>Desa</label>
                            <input type="text" name="desa" class="form-control" value="{{ old('desa', $sgd->desa) }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" value="{{ old('kecamatan', $sgd->kecamatan) }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Kabupaten</label>
                            <input type="text" name="kabupaten" class="form-control" value="{{ old('kabupaten', $sgd->kabupaten) }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Tahun</label>
                            <input type="number" name="tahun" class="form-control" value="{{ old('tahun', $sgd->tahun) }}" required>
                        </div>
                    </div>
                    
                    <h5>Indikator SGDs</h5>
                    <div class="row">
                        @php
                            $fields = [
                                'desa_tanpa_kemiskinan' => 'Tanpa Kemiskinan',
                                'desa_tanpa_kelaparan' => 'Tanpa Kelaparan',
                                'desa_sehat_sejahtera' => 'Sehat & Sejahtera',
                                'pendidikan_desa_berkualitas' => 'Pendidikan',
                                'keterlibatan_perempuan_desa' => 'Keterlibatan Perempuan',
                                'desa_layak_air_bersih' => 'Air Bersih',
                                'desa_berenergi_bersih' => 'Energi Bersih',
                                'pertumbuhan_ekonomi_desa' => 'Ekonomi',
                                'infrastruktur_desa' => 'Infrastruktur',
                                'ketimpangan_desa' => 'Ketimpangan',
                                'kawasan_desa' => 'Kawasan Desa',
                                'konsumsi_produksi_desa' => 'Konsumsi & Produksi',
                                'perubahan_iklim_desa' => 'Perubahan Iklim',
                                'ekosistem_darat_desa' => 'Ekosistem Darat',
                                'ekosistem_laut_desa' => 'Ekosistem Laut',
                                'desa_damai' => 'Desa Damai',
                                'kemitraan_desa' => 'Kemitraan Desa',
                                'kelembagaan_desa_dinamis' => 'Kelembagaan Dinamis',
                            ];
                        @endphp

                        @foreach($fields as $name => $label)
                            <div class="col-md-4 mb-3">
                                <label>{{ $label }}</label>
                                <input type="number" step="0.01" name="{{ $name }}" class="form-control" 
                                    value="{{ old($name, $sgd->$name) }}" required>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('admin.sgds.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
