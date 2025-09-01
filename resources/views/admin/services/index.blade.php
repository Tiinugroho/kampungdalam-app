@extends('admin.partials.master')
@section('title', 'Layanan Desa')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Layanan Desa</strong></h1>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Daftar Layanan</span>
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-hover table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Durasi</th>
                            <th>Biaya</th>
                            <th>Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->category }}</td>
                                <td>{{ Str::limit($service->description, 50) }}</td>
                                <td>{{ $service->duration ?? '-' }}</td>
                                <td>Rp {{ number_format($service->cost, 0, ',', '.') }}</td>
                                <td>
                                    @if($service->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($services->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data layanan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#servicesTable').DataTable({
            responsive: true,
            pageLength: 10,
            ordering: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/id.json"
            }
        });
    });
</script>
@endpush
