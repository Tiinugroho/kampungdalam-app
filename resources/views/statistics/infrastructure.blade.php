{{--
===========================================
FILE: resources/views/statistics/infrastructure.blade.php
DESKRIPSI: Halaman Statistik Infrastruktur
ROUTE: /statistik/infrastruktur
===========================================
--}}

@extends('partials.master')

@section('title', 'Data Infrastruktur - Statistik Desa')
@section('description', 'Data statistik pembangunan dan ketersediaan infrastruktur di Desa Kampung Dalam.')

@section('content')
    {{-- Hero Section --}}
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Data Infrastruktur Desa</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Informasi pembangunan dan ketersediaan infrastruktur di Desa Kampung Dalam tahun
                        {{ $infrastructureData->year }}.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Infrastructure Statistics Section --}}
    <section class="infrastructure-stats section bg-transparent">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="content-glass-card glass-card p-5">
                        <h2 class="section-heading text-center mb-4">Statistik Infrastruktur Tahun
                            {{ $infrastructureData->year }}</h2>
                        @if (
                            $infrastructureData->paved_road_length == 0 &&
                                $infrastructureData->unpaved_road_length == 0 &&
                                $infrastructureData->damaged_road_length == 0 &&
                                $infrastructureData->clean_water_access == 0 &&
                                $infrastructureData->proper_sanitation == 0 &&
                                $infrastructureData->waste_management == 0 &&
                                $infrastructureData->electricity_coverage == 0 &&
                                $infrastructureData->internet_coverage == 0 &&
                                $infrastructureData->mobile_coverage == 0 &&
                                $infrastructureData->public_transport == 0 &&
                                $infrastructureData->bridge_count == 0 &&
                                $infrastructureData->government_buildings == 0 &&
                                $infrastructureData->religious_buildings == 0 &&
                                $infrastructureData->market_count == 0)
                            <p class="text-center text-white">Data infrastruktur belum tersedia untuk tahun ini.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Jenis Infrastruktur</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Panjang Jalan Beraspal</td>
                                            <td>{{ number_format($infrastructureData->paved_road_length, 1) }} km</td>
                                        </tr>
                                        <tr>
                                            <td>Panjang Jalan Tanah/Kerikil</td>
                                            <td>{{ number_format($infrastructureData->unpaved_road_length, 1) }} km</td>
                                        </tr>
                                        <tr>
                                            <td>Panjang Jalan Rusak</td>
                                            <td>{{ number_format($infrastructureData->damaged_road_length, 1) }} km</td>
                                        </tr>
                                        <tr>
                                            <td>Akses Air Bersih</td>
                                            <td>{{ number_format($infrastructureData->clean_water_access) }}%</td>
                                        </tr>
                                        <tr>
                                            <td>Sanitasi Layak</td>
                                            <td>{{ number_format($infrastructureData->proper_sanitation) }}%</td>
                                        </tr>
                                        <tr>
                                            <td>Pengelolaan Sampah</td>
                                            <td>{{ number_format($infrastructureData->waste_management) }}%</td>
                                        </tr>
                                        <tr>
                                            <td>Cakupan Listrik</td>
                                            <td>{{ number_format($infrastructureData->electricity_coverage) }}%</td>
                                        </tr>
                                        <tr>
                                            <td>Cakupan Internet</td>
                                            <td>{{ number_format($infrastructureData->internet_coverage) }}%</td>
                                        </tr>
                                        <tr>
                                            <td>Cakupan Sinyal Seluler</td>
                                            <td>{{ number_format($infrastructureData->mobile_coverage) }}%</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Angkutan Umum</td>
                                            <td>{{ number_format($infrastructureData->public_transport) }} unit</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Jembatan</td>
                                            <td>{{ number_format($infrastructureData->bridge_count) }} unit</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Gedung Pemerintahan</td>
                                            <td>{{ number_format($infrastructureData->government_buildings) }} unit</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Bangunan Ibadah</td>
                                            <td>{{ number_format($infrastructureData->religious_buildings) }} unit</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pasar Desa</td>
                                            <td>{{ number_format($infrastructureData->market_count) }} unit</td>
                                        </tr>
                                    </tbody>
                                </table>
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

        /* Specific styles for infrastructure statistics page */
        .content-glass-card {
            padding: 3rem;
        }

        .table-responsive {
            margin-top: 2rem;
        }

        .table-bordered th,
        .table-bordered td {
            border-color: rgba(255, 255, 255, 0.4);
            /* Adjusted for glassmorphism */
            color: var(--neutral-white);
            /* Adjusted for glassmorphism */
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.05);
            /* Adjusted for glassmorphism */
        }

        .table-primary {
            background-color: rgba(59, 130, 246, 0.7) !important;
            /* Adjusted for glassmorphism */
            color: var(--neutral-white);
        }
    </style>
@endpush
