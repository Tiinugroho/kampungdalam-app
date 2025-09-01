@extends('admin.partials.master')
@section('title', 'Data SGDs Desa')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Data SGDs Desa</strong></h1>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Daftar SGDs</span>
                <a href="{{ route('admin.sgds.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="card-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover table-striped nowrap" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten</th>
                            <th>Tahun</th>

                            <th>Tanpa Kemiskinan</th>
                            <th>Tanpa Kelaparan</th>
                            <th>Sehat & Sejahtera</th>
                            <th>Pendidikan</th>
                            <th>Keterlibatan Perempuan</th>
                            <th>Air Bersih</th>
                            <th>Energi Bersih</th>
                            <th>Ekonomi</th>
                            <th>Infrastruktur</th>
                            <th>Ketimpangan</th>
                            <th>Kawasan Desa</th>
                            <th>Konsumsi Produksi</th>
                            <th>Perubahan Iklim</th>
                            <th>Ekosistem Darat</th>
                            <th>Ekosistem Laut</th>
                            <th>Desa Damai</th>
                            <th>Kemitraan</th>
                            <th>Kelembagaan Dinamis</th>

                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sgds as $sgd)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sgd->desa }}</td>
                                <td>{{ $sgd->kecamatan }}</td>
                                <td>{{ $sgd->kabupaten }}</td>
                                <td>{{ $sgd->tahun }}</td>

                                <td>{{ number_format($sgd->desa_tanpa_kemiskinan, 2) }}</td>
                                <td>{{ number_format($sgd->desa_tanpa_kelaparan, 2) }}</td>
                                <td>{{ number_format($sgd->desa_sehat_sejahtera, 2) }}</td>
                                <td>{{ number_format($sgd->pendidikan_desa_berkualitas, 2) }}</td>
                                <td>{{ number_format($sgd->keterlibatan_perempuan_desa, 2) }}</td>
                                <td>{{ number_format($sgd->desa_layak_air_bersih, 2) }}</td>
                                <td>{{ number_format($sgd->desa_berenergi_bersih, 2) }}</td>
                                <td>{{ number_format($sgd->pertumbuhan_ekonomi_desa, 2) }}</td>
                                <td>{{ number_format($sgd->infrastruktur_desa, 2) }}</td>
                                <td>{{ number_format($sgd->ketimpangan_desa, 2) }}</td>
                                <td>{{ number_format($sgd->kawasan_desa, 2) }}</td>
                                <td>{{ number_format($sgd->konsumsi_produksi_desa, 2) }}</td>
                                <td>{{ number_format($sgd->perubahan_iklim_desa, 2) }}</td>
                                <td>{{ number_format($sgd->ekosistem_darat_desa, 2) }}</td>
                                <td>{{ number_format($sgd->ekosistem_laut_desa, 2) }}</td>
                                <td>{{ number_format($sgd->desa_damai, 2) }}</td>
                                <td>{{ number_format($sgd->kemitraan_desa, 2) }}</td>
                                <td>{{ number_format($sgd->kelembagaan_desa_dinamis, 2) }}</td>

                                <td>
                                    <a href="{{ route('admin.sgds.edit', $sgd->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.sgds.destroy', $sgd->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="25" class="text-center">Belum ada data SGDs</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
@endsection
