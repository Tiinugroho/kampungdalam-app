@extends('partials.master')

@section('title', 'Galeri Desa Kampung Dalam')
@section('description', 'Galeri foto kegiatan, fasilitas, wisata, dan UMKM di Desa Kampung Dalam, Kecamatan Siak.')
@section('keywords', 'galeri, desa kampung dalam, siak, foto, dokumentasi')

@section('content')
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container text-center">
            <h1 class="hero-title" data-aos="fade-up">Galeri Desa</h1>
            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                Dokumentasi kegiatan, fasilitas, wisata, dan UMKM Desa Kampung Dalam
            </p>
        </div>
    </section>

    <section id="gallery" class="section">
        <div class="container section-title" data-aos="fade-up">
            <h2 class="section-heading">Galeri Desa</h2>
            <p class="section-subtitle">Lihat momen terbaik dari Desa Kampung Dalam</p>
        </div>

        <div class="container">
            <div class="row gy-4">
                @forelse($galleries as $gallery)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="gallery-card">
                            <a href="{{ asset('storage/' . $gallery->image_path) }}" data-lightbox="gallery"
                                data-title="{{ $gallery->title }}">
                                <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}"
                                    class="img-fluid rounded">
                            </a>
                            <div class="gallery-info">
                                <h5>{{ $gallery->title }}</h5>
                                <p>{{ Str::limit($gallery->description, 80) }}</p>
                                <span class="badge bg-primary">{{ ucfirst($gallery->category) }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <i class="bi bi-image display-1 text-muted"></i>
                        <p class="text-muted mt-3">Belum ada galeri tersedia</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                {{ $galleries->links() }}
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .hero {
            min-height: 60vh;
            position: relative;
            display: flex;
            align-items: center;
            z-index: 1;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(30, 64, 175, 0.85) 0%, rgba(5, 150, 105, 0.75) 100%);
            z-index: 2;
        }

        .hero-title {
            color: white;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .gallery-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .gallery-info {
            padding: 12px;
        }

        .gallery-info h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .gallery-info p {
            font-size: 0.9rem;
            color: #666;
        }
    </style>
@endpush
