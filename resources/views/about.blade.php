{{--
===========================================
FILE: resources/views/profile/about.blade.php
DESKRIPSI: Halaman Tentang Desa
ROUTE: /profil/tentang-desa
===========================================
--}}

@extends('partials.master')

@section('title', 'Tentang Desa - Kampung Dalam')
@section('description',
    'Pelajari lebih lanjut tentang Desa Kampung Dalam, sejarah, visi, misi, dan kondisi
    geografisnya.')

@section('content')
    {{-- Hero Section --}}
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        {{-- Ganti dengan gambar hero tentang desa --}}
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Tentang Desa {{ $profile->village_name ?? 'Kampung Dalam' }}
                    </h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Mengenal lebih dekat Desa {{ $profile->village_name ?? 'Kampung Dalam' }}, sejarah, visi, dan
                        potensi kami.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- About Content Section --}}
    <section class="about-content section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <article class="bg-white p-5 rounded-lg shadow-sm">
                        <h2 class="section-heading text-center hero-title mb-4">Profil Desa
                            {{ $profile->village_name ?? 'Kampung Dalam' }}</h2>
                        {{-- Using a placeholder image as 'about' content doesn't have a direct image field in migration --}}
                        {{-- <img src="{{ asset($aboutImage) }}" class="img-fluid rounded mb-4" alt="Tentang Desa"> --}}
                        <div class="hero-subtitle text-black">
                            {!! $profile->about ?? '<p>Konten tentang Desa Kampung Dalam akan dimuat di sini.</p>' !!}
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-6">
                                <h4 class="mb-5">Informasi Kontak Desa:</h4>
                                <ul class="list-unstyled info-list">
                                    <li><i class="bi bi-geo-alt-fill"></i> <strong>Alamat:</strong>
                                        {{ $profile->contact_address ?? 'N/A' }}</li>
                                    <li><i class="bi bi-envelope-fill"></i> <strong>Email:</strong>
                                        {{ $profile->contact_email ?? 'N/A' }}</li>
                                    <li><i class="bi bi-phone-fill"></i> <strong>Telepon:</strong>
                                        {{ $profile->contact_phone ?? 'N/A' }}</li>
                                    <li><i class="bi bi-globe"></i> <strong>Website:</strong> <a
                                            href="{{ $profile->website ?? '#' }}"
                                            target="_blank">{{ $profile->website ?? 'N/A' }}</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-5">Data Umum Desa:</h4>
                                <ul class="list-unstyled info-list">
                                    <li><i class="bi bi-border-all"></i> <strong>Batas Wilayah:</strong>
                                        {{ $profile->village_boundaries ?? 'N/A' }}</li>
                                    <li><i class="bi bi-people-fill"></i> <strong>Total Penduduk:</strong>
                                        {{ number_format($profile->total_population ?? 0) }} jiwa</li>
                                    <li><i class="bi bi-house-door-fill"></i> <strong>Total KK:</strong>
                                        {{ number_format($profile->total_families ?? 0) }}</li>
                                    <li><i class="bi bi-rulers"></i> <strong>Luas Wilayah:</strong>
                                        {{ $profile->area_size ?? 'N/A' }} km²</li>
                                    <li><i class="bi bi-grid-3x3-gap-fill"></i> <strong>Jumlah RT:</strong>
                                        {{ $profile->total_rt ?? 'N/A' }}</li>
                                    <li><i class="bi bi-grid-3x3-gap-fill"></i> <strong>Jumlah RW:</strong>
                                        {{ $profile->total_rw ?? 'N/A' }}</li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <div class="container contact-map" data-aos="fade-up" data-aos-delay="200">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15168.134137051906!2d102.050517!3d0.8024114999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d427486d615127%3A0x94decb4b46dc7a37!2sKp.%20Dalam%2C%20Kec.%20Siak%2C%20Kabupaten%20Siak%2C%20Riau!5e1!3m2!1sid!2sid!4v1754576030885!5m2!1sid!2sid"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            {{-- <p class="map-note">
                <i class="bi bi-info-circle"></i> Lokasi di peta adalah contoh. Harap ganti dengan koordinat Desa Kampung Dalam yang sebenarnya.
            </p> --}}
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .contact-map {
            margin-top: 4rem;
        }

        .contact-map iframe {
            /* width: 100%; */
            border-radius: 12px;
            height: 450px;
            border: 0;
            transition: all 0.3s ease;
        }

        .hero {
            /* margin-top: 10%; */
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

        .hero-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
        }

        /* Specific styles for profile pages */
        .about-content article {
            line-height: 1.8;
            font-size: 1.05rem;
            color: var(--text-color);
            border: 1px solid var(--neutral-gray-200);
            border-radius: 12px;
        }

        .about-content article h2,
        .about-content article h3,
        .about-content article h4 {
            color: var(--heading-color);
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }

        .about-content article p {
            margin-bottom: 1rem;
        }

        .about-content article img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 1.5rem auto;
            display: block;
        }

        .info-list li {
            margin-bottom: 0.75rem;
            display: flex;
            align-items: flex-start;
        }

        .info-list li i {
            font-size: 1.2rem;
            color: var(--primary-color);
            margin-right: 0.75rem;
            flex-shrink: 0;
        }

        .info-list li strong {
            margin-right: 0.5rem;
        }
    </style>
@endpush
