{{-- 
===========================================
FILE: resources/views/services/index.blade.php
DESKRIPSI: Halaman Daftar Layanan
ROUTE: /informasi/layanan
===========================================
--}}

@extends('partials.master')

@section('title', 'Layanan Desa - Kampung Dalam')
@section('description', 'Daftar layanan administrasi dan publik yang disediakan oleh Desa Kampung Dalam untuk
    masyarakat.')

@section('content')
    {{-- Hero Section --}}
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div> {{-- Ganti dengan gambar hero layanan --}}
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Layanan Desa</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Berbagai layanan administrasi dan publik untuk kemudahan warga Desa Kampung Dalam.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Services List Section --}}
    <section id="services" class="services section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Layanan Desa</h2>
            <p>Berbagai layanan yang tersedia untuk masyarakat</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                @forelse($services as $service)
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="service-item position-relative h-100">
                            <div class="icon">
                                <i class="bi {{ $service->icon ?? 'bi-activity' }}"></i>
                            </div>
                            <h4><a href="{{ route('services.detail', $service->slug) }}"
                                    class="stretched-link">{{ $service->name }}</a></h4>
                            <p>{{ Str::limit($service->description, 100) }}</p>
                            @if ($service->requirements)
                                <div class="requirements mt-2">
                                    <small class="text-muted">
                                        <i class="bi bi-file-text"></i>
                                        {{ Str::limit($service->requirements, 80) }}
                                    </small>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada layanan yang tersedia.</p>
                    </div>
                @endforelse
            </div>
            {{-- <div class="text-center mt-4" data-aos="fade-up">
                <a href="{{ route('services') }}" class="custom-btn primary-btn">Lihat Semua Layanan</a>
            </div> --}}
        </div>
    </section>
@endsection

@push('styles')
    <style>
        :root {
            --primary-blue: #1e40af;
            --primary-blue-light: #3b82f6;
            --primary-blue-dark: #1e3a8a;
            --success-green: #059669;
            --success-green-light: #10b981;
            --warning-yellow: #d97706;
            --warning-yellow-light: #f59e0b;
            --neutral-white: #ffffff;
            --neutral-gray-50: #f9fafb;
            --neutral-gray-100: #f3f4f6;
            --neutral-gray-200: #e5e7eb;
            --neutral-gray-300: #d1d5db;
            --neutral-gray-400: #9ca3af;
            --neutral-gray-500: #6b7280;
            --neutral-gray-600: #4b5563;
            --neutral-gray-700: #374151;
            --neutral-gray-800: #1f2937;
            --neutral-gray-900: #111827;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
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

        /* Specific styles for services index page */
        .service-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            padding: 2rem;
            text-align: center;
        }

        /* Custom Buttons */
        .custom-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 14px 28px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
            position: relative;
            z-index: 10;
            cursor: pointer;
            overflow: hidden;
        }

        .custom-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .custom-btn:hover::before {
            left: 100%;
        }

        .primary-btn {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
            color: var(--neutral-white);
            border-color: var(--primary-blue);
            box-shadow: var(--shadow-md);
        }

        .primary-btn:hover {
            color: var(--neutral-white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .service-card .icon {
            font-size: 3.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .service-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .service-card p {
            font-size: 0.95rem;
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .service-card .read-more {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.25rem;
            transition: all 0.3s ease;
            margin-top: auto;
            /* Push to bottom */
        }

        .service-card .read-more:hover {
            color: var(--secondary-color);
            transform: translateX(5px);
        }
    </style>
@endpush
