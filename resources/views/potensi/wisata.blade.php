@extends('partials.master')

@section('title', 'Potensi Wisata - Kampung Dalam')
@section('description', 'Informasi potensi wisata Desa Kampung Dalam, Kecamatan Siak, Kabupaten Siak, Provinsi Riau.')
@section('keywords', 'wisata, desa kampung dalam, siak, pariwisata, potensi wisata')

@section('content')
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Potensi Wisata</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Temukan pesona alam dan budaya yang menanti untuk Anda jelajahi
                    </p>

                </div>
            </div>
        </div>
    </section>

    <section id="tourism" class="tourism section">
        <div class="container section-title" data-aos="fade-up">
            <h2 class="section-heading">Potensi Wisata</h2>
            <p class="section-subtitle">Destinasi wisata unggulan di Istana Siak</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                @forelse($tourismPotentials as $tourism)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="tourism-card">
                            <div class="tourism-image">
                                @if ($tourism->featured_image && Storage::disk('public')->exists($tourism->featured_image))
                                    <img src="{{ asset('storage/' . $tourism->featured_image) }}" alt="{{ $tourism->name }}"
                                        loading="lazy">
                                @else
                                    <img src="/placeholder.svg?height=200&width=300&text={{ urlencode($tourism->name) }}"
                                        alt="{{ $tourism->name }}" loading="lazy">
                                @endif
                            </div>
                            <div class="tourism-content">
                                <span class="tourism-category">{{ ucfirst($tourism->category) }}</span>
                                <h4 class="tourism-title">{{ $tourism->name }}</h4>
                                <p class="tourism-address"><i class="bi bi-geo-alt"></i> {{ $tourism->address }}</p>
                                <p class="tourism-description">{{ Str::limit($tourism->description, 100) }}</p>

                                @if ($tourism->ticket_price)
                                    <div class="tourism-price">
                                        <i class="bi bi-tag"></i>
                                        <span>Rp {{ number_format($tourism->ticket_price, 2, ',', '.') }}</span>
                                    </div>
                                @endif

                                @if ($tourism->opening_hours)
                                    <div class="tourism-hours">
                                        <i class="bi bi-clock"></i>
                                        <span>{{ $tourism->opening_hours }}</span>
                                    </div>
                                @endif

                                @if ($tourism->contact_phone)
                                    <div class="tourism-contact">
                                        <i class="bi bi-telephone"></i>
                                        <span>{{ $tourism->contact_phone }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <i class="bi bi-camera display-1 text-muted"></i>
                        <p class="text-muted mt-3">Belum ada data wisata tersedia</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                {{ $tourismPotentials->links() }} {{-- Pagination --}}
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

        /* Section Titles */
        .section-title {
            margin-bottom: 40px;
            text-align: center;
        }

        .section-heading {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #222;
        }

        .section-subtitle {
            font-size: 1rem;
            color: #666;
        }

        /* Tourism Card */
        .tourism-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .tourism-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
        }

        .tourism-image img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .tourism-content {
            padding: 16px;
            flex-grow: 1;
        }

        .tourism-category {
            display: inline-block;
            background: #007bff;
            color: #fff;
            font-size: 0.75rem;
            padding: 4px 10px;
            border-radius: 20px;
            margin-bottom: 10px;
        }

        .tourism-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .tourism-address {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 8px;
        }

        .tourism-description {
            font-size: 0.9rem;
            color: #444;
            margin-bottom: 12px;
        }

        .tourism-price,
        .tourism-hours,
        .tourism-contact {
            font-size: 0.85rem;
            color: #333;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Empty State */
        .text-muted {
            color: #999 !important;
        }

        .bi-camera {
            opacity: 0.6;
        }

        /* Pagination */
        /* Pagination (Tailwind-style) */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 6px;
            margin-top: 20px;
        }

        .pagination .page-link {
            display: inline-block;
            padding: 8px 14px;
            font-size: 0.9rem;
            border-radius: 8px;
            border: 1px solid #ddd;
            background: #fff;
            color: #007bff;
            transition: all 0.2s ease-in-out;
        }

        .pagination .page-link:hover {
            background: #007bff;
            color: #fff;
        }

        .pagination .active .page-link {
            background: #007bff;
            border-color: #007bff;
            color: #fff;
            font-weight: 600;
        }
    </style>
@endpush
