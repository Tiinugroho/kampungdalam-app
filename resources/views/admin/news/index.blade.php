@extends('admin.partials.master')
@section('title', 'Berita Desa')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Berita Desa</strong></h1>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>Daftar Berita</span>
                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-sm">Tambah Berita</a>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-hover table-striped nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Excerpt</th>
                                <th>Konten</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Ditayangkan</th>
                                <th>Penulis</th>
                                <th>Views</th>
                                <th>Dibuat</th>
                                <th>Diperbarui</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->category ?? '-' }}</td>
                                    <td>{{ Str::limit($item->excerpt, 50) ?? '-' }}</td>
                                    <td>{{ Str::limit(strip_tags($item->content), 50) ?? '-' }}</td>
                                    <td>
                                        @if ($item->featured_image)
                                            <img src="{{ asset('storage/news/' . $item->featured_image) }}" alt="Image"
                                                width="60">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status === 'published')
                                            <span class="badge bg-success">Published</span>
                                        @elseif($item->status === 'draft')
                                            <span class="badge bg-warning">Draft</span>
                                        @else
                                            <span class="badge bg-secondary">Archived</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->published_at ? $item->published_at->format('d M Y H:i') : '-' }}</td>
                                    <td>{{ $item->author?->name ?? '-' }}</td>
                                    <td>{{ $item->views }}</td>
                                    <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                                    <td>{{ $item->updated_at->format('d M Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.news.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST"
                                            class="d-inline delete-form">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($news->isEmpty())
                                <tr>
                                    <td colspan="13" class="text-center">Belum ada berita</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection

