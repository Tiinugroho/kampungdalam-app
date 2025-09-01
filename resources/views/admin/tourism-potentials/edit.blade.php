@extends('admin.partials.master')
@section('title', 'Edit Potensi Wisata')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Edit Potensi Wisata</strong></h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.tourism-potentials.update', $tourismPotential->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ old('name', $tourismPotential->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="category" class="form-control" required>
                            @foreach($categories as $key => $val)
                                <option value="{{ $key }}" {{ old('category', $tourismPotential->category) == $key ? 'selected' : '' }}>
                                    {{ $val }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Alamat</label>
                        <input type="text" name="address" class="form-control"
                               value="{{ old('address', $tourismPotential->address) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="5">{{ old('description', $tourismPotential->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Gambar Utama</label><br>
                        @if ($tourismPotential->featured_image)
                            <img src="{{ asset('storage/' . $tourismPotential->featured_image) }}" width="120" class="mb-2">
                        @endif
                        <input type="file" name="featured_image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Gallery</label><br>
                        @if ($tourismPotential->gallery_images)
                            @foreach ($tourismPotential->gallery_images as $img)
                                <img src="{{ asset('storage/' . $img) }}" width="90" class="mb-2 me-2">
                            @endforeach
                        @endif
                        <input type="file" name="gallery_images[]" class="form-control mt-2" multiple>
                    </div>

                    <div class="mb-3">
                        <label>Lokasi</label>
                        <input type="text" name="location" class="form-control"
                               value="{{ old('location', $tourismPotential->location) }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Latitude</label>
                            <input type="text" name="latitude" class="form-control"
                                   value="{{ old('latitude', $tourismPotential->latitude) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Longitude</label>
                            <input type="text" name="longitude" class="form-control"
                                   value="{{ old('longitude', $tourismPotential->longitude) }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Fasilitas (pisahkan baris per baris)</label>
                        <textarea name="facilities" class="form-control" rows="3">{{ old('facilities', implode("\n", $tourismPotential->facilities ?? [])) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Aktivitas (pisahkan baris per baris)</label>
                        <textarea name="activities" class="form-control" rows="3">{{ old('activities', implode("\n", $tourismPotential->activities ?? [])) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Jam Buka</label>
                        <input type="text" name="opening_hours" class="form-control"
                               value="{{ old('opening_hours', $tourismPotential->opening_hours) }}">
                    </div>

                    <div class="mb-3">
                        <label>Harga Tiket</label>
                        <input type="number" name="ticket_price" class="form-control"
                               value="{{ old('ticket_price', $tourismPotential->ticket_price) }}">
                    </div>

                    <div class="mb-3">
                        <label>Kontak Person</label>
                        <input type="text" name="contact_person" class="form-control"
                               value="{{ old('contact_person', $tourismPotential->contact_person) }}">
                    </div>

                    <div class="mb-3">
                        <label>Telepon</label>
                        <input type="text" name="contact_phone" class="form-control"
                               value="{{ old('contact_phone', $tourismPotential->contact_phone) }}">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email', $tourismPotential->email) }}">
                    </div>

                    <div class="mb-3">
                        <label>Website</label>
                        <input type="url" name="website" class="form-control"
                               value="{{ old('website', $tourismPotential->website) }}">
                    </div>

                    <div class="mb-3">
                        <label>Akses Rute</label>
                        <textarea name="access_route" class="form-control" rows="3">{{ old('access_route', $tourismPotential->access_route) }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Tingkat Kesulitan</label>
                            <select name="difficulty_level" class="form-control">
                                @foreach($difficultyLevels as $key => $val)
                                    <option value="{{ $key }}" {{ old('difficulty_level', $tourismPotential->difficulty_level) == $key ? 'selected' : '' }}>
                                        {{ $val }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Durasi Estimasi (menit)</label>
                            <input type="number" name="estimated_duration" class="form-control"
                                   value="{{ old('estimated_duration', $tourismPotential->estimated_duration) }}">
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_featured" value="1" class="form-check-input"
                               {{ old('is_featured', $tourismPotential->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label">Featured</label>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_active" value="1" class="form-check-input"
                               {{ old('is_active', $tourismPotential->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label">Aktif</label>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('admin.tourism-potentials.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
