@extends('admin.partials.master')
@section('title', 'Daftar UMKM')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Daftar UMKM</strong></h1>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>List UMKM</span>
                    <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary btn-sm">Tambah UMKM</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-hover table-striped nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Usaha</th>
                                    <th>Pemilik</th>
                                    <th>NIK</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar Utama</th>
                                    <th>Gambar Produk</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Whatsapp</th>
                                    <th>Email</th>
                                    <th>Instagram</th>
                                    <th>Facebook</th>
                                    <th>Website</th>
                                    <th>Produk</th>
                                    <th>Modal</th>
                                    <th>Omzet Bulanan</th>
                                    <th>Jumlah Karyawan</th>
                                    <th>Tanggal Berdiri</th>
                                    <th>No. Izin Usaha</th>
                                    <th>Status</th>
                                    <th>Dibuat</th>
                                    <th>Update</th>
                                    <th width="180">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($umkms as $umkm)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $umkm->business_name }}</td>
                                        <td>{{ $umkm->owner_name }}</td>
                                        <td>{{ $umkm->nik ?? '-' }}</td>
                                        <td>{{ ucfirst($umkm->category) }}</td>
                                        <td>{{ Str::limit($umkm->description, 50) }}</td>
                                        <td>
                                            @if ($umkm->featured_image)
                                                <img src="{{ asset('storage/' . $umkm->featured_image) }}" alt="featured"
                                                    class="img-thumbnail" width="60">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($umkm->product_images && is_array($umkm->product_images))
                                                <div style="display:flex; flex-wrap:wrap; gap:2px; max-width:150px;">
                                                    @foreach ($umkm->product_images as $img)
                                                        <img src="{{ asset('storage/' . $img) }}" alt="product"
                                                            class="img-thumbnail mb-1" width="50">
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $umkm->address }}</td>
                                        <td>{{ $umkm->phone ?? '-' }}</td>
                                        <td>{{ $umkm->whatsapp ?? '-' }}</td>
                                        <td>{{ $umkm->email ?? '-' }}</td>
                                        <td>{{ $umkm->instagram ?? '-' }}</td>
                                        <td>{{ $umkm->facebook ?? '-' }}</td>
                                        <td>{{ $umkm->website ?? '-' }}</td>
                                        <td>{{ $umkm->products ?? '-' }}</td>
                                        <td>{{ $umkm->capital ? 'Rp ' . number_format($umkm->capital, 0, ',', '.') : '-' }}
                                        </td>
                                        <td>{{ $umkm->monthly_revenue ? 'Rp ' . number_format($umkm->monthly_revenue, 0, ',', '.') : '-' }}
                                        </td>
                                        <td>{{ $umkm->employee_count }}</td>
                                        <td>{{ $umkm->established_date ? \Carbon\Carbon::parse($umkm->established_date)->format('d M Y') : '-' }}
                                        </td>
                                        <td>{{ $umkm->license_number ?? '-' }}</td>
                                        <td>
                                            <form
                                                action="{{ route('admin.umkm.toggle-active', $umkm->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-sm {{ $umkm->is_active ? 'btn-success' : 'btn-outline-secondary' }}">
                                                    {{ $umkm->is_active ? 'Aktif' : 'Nonaktif' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td>{{ $umkm->created_at->format('d M Y H:i') }}</td>
                                        <td>{{ $umkm->updated_at->format('d M Y H:i') }}</td>
                                        <td>
                                            
                                            <a href="{{ route('admin.umkm.edit', $umkm->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.umkm.destroy', $umkm->id) }}" method="POST"
                                                class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($umkms->isEmpty())
                                    <tr>
                                        <td colspan="25" class="text-center">Belum ada data UMKM</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
