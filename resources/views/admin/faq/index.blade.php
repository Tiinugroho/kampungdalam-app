@extends('admin.partials.master')
@section('title', 'FAQ Desa')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>FAQ Desa</strong></h1>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Daftar FAQ</span>
                <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary btn-sm">Tambah FAQ</a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-hover table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Kategori</th>
                            <th>Urutan</th>
                            <th>Dilihat</th>
                            <th>Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $faq)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $faq->question }}</td>
                                <td>{{ Str::limit(strip_tags($faq->answer), 50) }}</td>
                                <td>{{ ucfirst($faq->category) }}</td>
                                <td>{{ $faq->order }}</td>
                                <td>{{ $faq->views }}</td>
                                <td>
                                    @if($faq->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($faqs->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data FAQ</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
@endsection