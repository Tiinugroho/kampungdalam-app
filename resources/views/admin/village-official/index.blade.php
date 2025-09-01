@extends('admin.partials.master')
@section('title', 'Perangkat Desa')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Perangkat Desa</strong></h1>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Daftar Perangkat Desa</span>
                <a href="{{ route('admin.village-official.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-hover table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>No. Telepon</th>
                            <th>Email</th>
                            <th>Urutan</th>
                            <th>Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($officials as $official)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($official->photo)
                                        <img src="{{ asset('storage/' . $official->photo) }}" alt="{{ $official->name }}" class="img-thumbnail" width="60">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $official->name }}</td>
                                <td>{{ $official->position }}</td>
                                <td>{{ $official->phone ?? '-' }}</td>
                                <td>{{ $official->email ?? '-' }}</td>
                                <td>{{ $official->order }}</td>
                                <td>
                                    @if($official->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.village-official.edit', $official->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.village-official.destroy', $official->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($officials->isEmpty())
                            <tr>
                                <td colspan="9" class="text-center">Belum ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
@endsection