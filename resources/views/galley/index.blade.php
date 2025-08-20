@extends('partials.master')

@section('title', 'Galeri Foto Desa - Kampung Dalam')
@section('description', 'Kumpulan foto-foto kegiatan, pemandangan, dan momen penting di Desa Kampung Dalam.')

@section('content')
    {{-- Hero Section --}}
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div> {{-- Ganti dengan gambar hero galeri --}}
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Galeri Foto Desa</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Abadikan momen dan keindahan Desa Kampung Dalam dalam gambar.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Gallery List Section --}}
    <section class="gallery-list section bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <div class="btn-group" role="group" aria-label="Filter Kategori Galeri">
                        <a href="{{ route('gallery') }}"
                            class="btn btn-outline-primary {{ !request('category') ? 'active' : '' }}">Semua</a>
                        @foreach ($categories as $cat)
                            <a href="{{ route('gallery.category', Str::slug($cat)) }}"
                                class="btn btn-outline-primary {{ request('category') == Str::slug($cat) ? 'active' : '' }}">{{ $cat }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row gy-4">
                @forelse ($gallery as $galleryItem)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="gallery-card">
                            <a href="{{ route('gallery.show', $galleryItem->slug) }}" class="gallery-link">
                                <img src="{{ $galleryItem->image_url }}" class="img-fluid" alt="{{ $galleryItem->title }}">
                                <div class="gallery-overlay">
                                    <div class="gallery-info">
                                        <h4 class="gallery-title">{{ $galleryItem->title }}</h4>
                                        <p class="gallery-category">{{ $galleryItem->category }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-images display-1 text-muted"></i>
                        <h3 class="mt-3 text-muted">Belum ada foto di galeri.</h3>
                        <p class="text-muted">Silakan cek kembali nanti atau pilih kategori lain.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Gallery Index Page Styles */
        .gallery-list .btn-group .btn {
            border-radius: 20px;
            margin: 0 5px;
            padding: 8px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .gallery-list .btn-group .btn-outline-primary.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .gallery-card {
            position: relative;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }

        .gallery-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .gallery-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(30, 64, 175, 0.7);
            /* Primary color with transparency */
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-info {
            color: white;
            text-align: center;
            padding: 1rem;
        }

        .gallery-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .gallery-category {
            font-size: 0.9rem;
            font-weight: 500;
            opacity: 0.8;
        }
    </style>
@endpush
