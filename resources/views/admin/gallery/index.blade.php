@extends('admin.partials.master')
@section('title', 'Galeri Desa')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Galeri Desa</strong></h1>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Daftar Galeri</span>
                <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary btn-sm">Tambah Galeri</a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-hover table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Urutan</th>
                            <th>Highlight</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galleries as $gallery)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $gallery->title }}</td>
                                <td>{{ Str::limit(strip_tags($gallery->description), 50) }}</td>
                                <td>
                                    @if($gallery->image_path)
                                        <img src="{{ asset('storage/gallery/'.$gallery->image_path) }}" alt="{{ $gallery->title }}" class="img-thumbnail" width="80">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>{{ ucfirst($gallery->category) }}</td>
                                <td>{{ $gallery->order }}</td>
                                <td>
                                    @if($gallery->is_featured)
                                        <span class="badge bg-success">Ya</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($galleries->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data galeri</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
@endsection