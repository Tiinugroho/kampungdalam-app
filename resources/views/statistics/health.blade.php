{{-- 
===========================================
FILE: resources/views/statistics/health.blade.php
DESKRIPSI: Halaman Statistik Kesehatan
ROUTE: /statistik/kesehatan
===========================================
--}}

@extends('partials.master')

@section('title', 'Data Kesehatan - Statistik Desa')
@section('description', 'Data statistik fasilitas kesehatan dan kondisi kesehatan masyarakat Desa Kampung Dalam.')

@section('content')
    {{-- Hero Section --}}
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div> {{-- Ganti dengan gambar hero statistik --}}
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Data Kesehatan Desa</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Informasi fasilitas dan kondisi kesehatan masyarakat Desa Kampung Dalam tahun
                        {{ $healthData->year }}.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Health Statistics Section --}}
    <section class="health-stats section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="bg-white p-5 rounded-lg shadow-sm">
                        <h2 class="section-heading text-center mb-4">Statistik Kesehatan Tahun {{ $healthData->year }}</h2>
                        @if (
                            $healthData->posyandu_count == 0 &&
                                $healthData->puskesmas_count == 0 &&
                                $healthData->doctor_count == 0 &&
                                $healthData->nurse_count == 0 &&
                                $healthData->midwife_count == 0 &&
                                $healthData->infant_mortality_rate == 0 &&
                                $healthData->maternal_mortality_rate == 0 &&
                                $healthData->stunting_cases == 0 &&
                                $healthData->immunization_coverage == 0)
                            <p class="text-center text-muted">Data kesehatan belum tersedia untuk tahun ini.</p>
                        @else
                            <div class="row text-center mb-5">
                                <div class="col-md-4 mb-4">
                                    <div class="stat-card-small">
                                        <i class="bi bi-hospital"></i>
                                        <h4>Jumlah Posyandu</h4>
                                        <p class="display-5 fw-bold">{{ number_format($healthData->posyandu_count) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="stat-card-small">
                                        <i class="bi bi-building"></i>
                                        <h4>Jumlah Puskesmas</h4>
                                        <p class="display-5 fw-bold">{{ number_format($healthData->puskesmas_count) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="stat-card-small">
                                        <i class="bi bi-person-plus"></i>
                                        <h4>Jumlah Dokter</h4>
                                        <p class="display-5 fw-bold">{{ number_format($healthData->doctor_count) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="stat-card-small">
                                        <i class="bi bi-person-badge"></i>
                                        <h4>Jumlah Perawat</h4>
                                        <p class="display-5 fw-bold">{{ number_format($healthData->nurse_count) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="stat-card-small">
                                        <i class="bi bi-person-heart"></i>
                                        <h4>Jumlah Bidan</h4>
                                        <p class="display-5 fw-bold">{{ number_format($healthData->midwife_count) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="stat-card-small">
                                        <i class="bi bi-baby"></i>
                                        <h4>Angka Kematian Bayi</h4>
                                        <p class="display-5 fw-bold">{{ number_format($healthData->infant_mortality_rate) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="stat-card-small">
                                        <i class="bi bi-motherhood"></i>
                                        <h4>Angka Kematian Ibu</h4>
                                        <p class="display-5 fw-bold">
                                            {{ number_format($healthData->maternal_mortality_rate) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="stat-card-small">
                                        <i class="bi bi-bandaid"></i>
                                        <h4>Kasus Stunting</h4>
                                        <p class="display-5 fw-bold">{{ number_format($healthData->stunting_cases) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="stat-card-small">
                                        <i class="bi bi-shield-check"></i>
                                        <h4>Cakupan Imunisasi</h4>
                                        <p class="display-5 fw-bold">
                                            {{ number_format($healthData->immunization_coverage) }}%</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="text-center mt-5">
                            <a href="{{ route('statistics.index') }}" class="custom-btn primary-btn"><i
                                    class="bi bi-arrow-left"></i> Kembali ke Statistik Utama</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Modern Government Color Scheme */
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

        /* Specific styles for health statistics page */
        .stat-card-small {
            background-color: var(--light-bg);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .stat-card-small i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .stat-card-small h4 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--heading-color);
            margin-bottom: 0.5rem;
        }

        .stat-card-small p.display-5 {
            font-size: 2.5rem;
            color: var(--text-color);
        }
    </style>
@endpush
