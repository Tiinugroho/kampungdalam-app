@extends('admin.partials.master')
@section('title', 'Daftar Potensi Wisata')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Daftar Potensi Wisata</strong></h1>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>Data Potensi Wisata</span>
                    <a href="{{ route('admin.tourism-potentials.create') }}" class="btn btn-primary btn-sm">
                        Tambah Potensi Wisata
                    </a>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-hover table-striped nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar Utama</th>
                                <th>Nama</th>
                                <th>Slug</th>
                                <th>Kategori</th>
                                <th>Alamat</th>
                                <th>Deskripsi</th>
                                <th>Gallery</th>
                                <th>Lokasi</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Fasilitas</th>
                                <th>Aktivitas</th>
                                <th>Jam Buka</th>
                                <th>Harga Tiket</th>
                                <th>Kontak</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Akses Rute</th>
                                <th>Tingkat Kesulitan</th>
                                <th>Durasi</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th>Dibuat</th>
                                <th width="220">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tourismPotentials as $tourism)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    {{-- Gambar utama --}}
                                    <td>
                                        @if ($tourism->featured_image)
                                            <img src="{{ asset('storage/' . $tourism->featured_image) }}"
                                                alt="{{ $tourism->name }}" class="img-thumbnail" width="80">
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>

                                    <td>{{ $tourism->name }}</td>
                                    <td>{{ $tourism->slug }}</td>
                                    <td>{{ $tourism->category }}</td>
                                    <td>{{ $tourism->address }}</td>
                                    <td>{{ Str::limit($tourism->description, 50) }}</td>

                                    {{-- Gallery --}}
                                    <td>
                                        @if ($tourism->gallery_images && is_array($tourism->gallery_images))
                                            <div style="display:flex; flex-wrap:wrap; gap:2px; max-width:150px;">
                                                @foreach ($tourism->gallery_images as $img)
                                                    <img src="{{ asset('storage/' . $img) }}" class="img-thumbnail"
                                                        style="width:50px; height:50px; object-fit:cover;">
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>


                                    <td>{{ $tourism->location ?? '-' }}</td>
                                    <td>{{ $tourism->latitude ?? '-' }}</td>
                                    <td>{{ $tourism->longitude ?? '-' }}</td>

                                    {{-- Fasilitas --}}
                                    <td>
                                        @if ($tourism->facilities)
                                            <ul class="mb-0">
                                                @foreach ($tourism->facilities as $f)
                                                    <li>{{ $f }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>

                                    {{-- Aktivitas --}}
                                    <td>
                                        @if ($tourism->activities)
                                            <ul class="mb-0">
                                                @foreach ($tourism->activities as $a)
                                                    <li>{{ $a }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>

                                    <td>{{ $tourism->opening_hours ?? '-' }}</td>
                                    <td>{{ $tourism->ticket_price ? 'Rp ' . number_format($tourism->ticket_price, 0, ',', '.') : '-' }}
                                    </td>
                                    <td>
                                        {{ $tourism->contact_person }} <br>
                                        {{ $tourism->contact_phone }}
                                    </td>
                                    <td>{{ $tourism->email ?? '-' }}</td>
                                    <td>{{ $tourism->website ?? '-' }}</td>
                                    <td>{{ $tourism->access_route ?? '-' }}</td>
                                    <td>{{ ucfirst($tourism->difficulty_level) }}</td>
                                    <td>{{ $tourism->estimated_duration ? $tourism->estimated_duration . ' menit' : '-' }}
                                    </td>

                                    {{-- Status --}}
                                    <td>
                                        <form action="{{ route('admin.tourism-potentials.toggle-active', $tourism->id) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-sm {{ $tourism->is_active ? 'btn-success' : 'btn-outline-secondary' }}">
                                                {{ $tourism->is_active ? 'Aktif' : 'Nonaktif' }}
                                            </button>
                                        </form>
                                    </td>

                                    {{-- Featured --}}
                                    <td>
                                        <form
                                            action="{{ route('admin.tourism-potentials.toggle-featured', $tourism->id) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-sm {{ $tourism->is_featured ? 'btn-warning' : 'btn-outline-warning' }}">
                                                {{ $tourism->is_featured ? 'Featured' : 'Tidak' }}
                                            </button>
                                        </form>
                                    </td>

                                    <td>{{ $tourism->created_at->format('d M Y') }}</td>

                                    {{-- Aksi --}}
                                    <td>
                                        
                                        <a href="{{ route('admin.tourism-potentials.edit', $tourism->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('admin.tourism-potentials.destroy', $tourism->id) }}"
                                            method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="25" class="text-center">Belum ada data potensi wisata</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>
@endsection
