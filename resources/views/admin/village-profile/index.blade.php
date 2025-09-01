@extends('admin.partials.master')
@section('title', 'Profil Desa')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Profil Desa</strong></h1>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Daftar Profil Desa</span>
                <a href="{{ route('admin.village-profiles.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-hover table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Desa</th>
                            <th>Kode Desa</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten</th>
                            <th>Provinsi</th>
                            <th>Kode Pos</th>
                            <th>Total Penduduk</th>
                            <th>Total KK</th>
                            <th>Luas Wilayah (km²)</th>
                            <th>Total RT</th>
                            <th>Total RW</th>
                            <th>No. Telepon</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($villageProfile as $profile)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $profile->village_name }}</td>
                                <td>{{ $profile->village_code }}</td>
                                <td>{{ $profile->district }}</td>
                                <td>{{ $profile->regency }}</td>
                                <td>{{ $profile->province }}</td>
                                <td>{{ $profile->postal_code }}</td>
                                <td>{{ number_format($profile->total_population) }}</td>
                                <td>{{ number_format($profile->total_families) }}</td>
                                <td>{{ $profile->area_size }}</td>
                                <td>{{ $profile->total_rt }}</td>
                                <td>{{ $profile->total_rw }}</td>
                                <td>{{ $profile->contact_phone }}</td>
                                <td>{{ $profile->contact_email }}</td>
                                <td>{{ $profile->website }}</td>
                                <td>{{ $profile->latitude }}</td>
                                <td>{{ $profile->longitude }}</td>
                                <td>
                                    <a href="{{ route('admin.village-profiles.edit', $profile->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.village-profiles.destroy', $profile->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm"">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($villageProfile->isEmpty())
                            <tr>
                                <td colspan="18" class="text-center">Belum ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
@endsection