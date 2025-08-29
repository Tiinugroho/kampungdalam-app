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
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Desa</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten</th>
                            <th>Provinsi</th>
                            <th>Total Penduduk</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($villageProfiles as  $profile)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $profile->village_name }}</td>
                                <td>{{ $profile->district }}</td>
                                <td>{{ $profile->regency }}</td>
                                <td>{{ $profile->province }}</td>
                                <td>{{ number_format($profile->total_population) }}</td>
                                <td>
                                    <a href="{{ route('admin.village-profiles.edit', $profile->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.village-profiles.destroy', $profile->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($villageProfiles->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
@endsection
