{{--
===========================================
FILE: resources/views/statistics/population.blade.php
DESKRIPSI: Halaman Statistik Penduduk
ROUTE: /statistik/penduduk
===========================================
--}}

@extends('partials.master')

@section('title', 'Data Penduduk - Statistik Desa')
@section('description', 'Data statistik penduduk Desa Kampung Dalam berdasarkan jenis kelamin dan kelompok usia.')

@section('content')
    {{-- Hero Section --}}
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Data Penduduk Desa</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Informasi demografi penduduk Desa Kampung Dalam tahun {{ $populationData->year }}.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Population Statistics Section --}}
    <section class="population-stats section bg-transparent">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="content-glass-card glass-card p-5">
                        <h2 class="section-heading text-center mb-4">Statistik Penduduk Tahun {{ $populationData->year }}
                        </h2>
                        @if ($populationData->total_population == 0)
                            <p class="text-center text-white">Data penduduk belum tersedia untuk tahun ini.</p>
                        @else
                            <div class="row text-center mb-5">
                                <div class="col-md-6 mb-4">
                                    <div class="stat-card-small glass-card">
                                        <i class="bi bi-people-fill"></i>
                                        <h4>Total Penduduk</h4>
                                        <p class="display-5 fw-bold">{{ number_format($populationData->total_population) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="stat-card-small glass-card">
                                        <i class="bi bi-house-door-fill"></i>
                                        <h4>Total Kepala Keluarga</h4>
                                        <p class="display-5 fw-bold">{{ number_format($populationData->total_families) }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-center mb-4 text-white">Komposisi Penduduk Berdasarkan Jenis Kelamin</h3>
                            <div class="row text-center mb-5">
                                <div class="col-md-6 mb-4">
                                    <div class="stat-card-small glass-card">
                                        <i class="bi bi-person-fill"></i>
                                        <h4>Laki-laki</h4>
                                        <p class="display-5 fw-bold">{{ number_format($populationData->male_population) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="stat-card-small glass-card">
                                        <i class="bi bi-person-fill-dash"></i>
                                        <h4>Perempuan</h4>
                                        <p class="display-5 fw-bold">{{ number_format($populationData->female_population) }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-center mb-4 text-white">Komposisi Penduduk Berdasarkan Kelompok Usia</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Kelompok Usia</th>
                                            <th>Jumlah Penduduk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>0-4 Tahun</td>
                                            <td>{{ number_format($populationData->age_0_4) }}</td>
                                        </tr>
                                        <tr>
                                            <td>5-9 Tahun</td>
                                            <td>{{ number_format($populationData->age_5_9) }}</td>
                                        </tr>
                                        <tr>
                                            <td>10-14 Tahun</td>
                                            <td>{{ number_format($populationData->age_10_14) }}</td>
                                        </tr>
                                        <tr>
                                            <td>15-19 Tahun</td>
                                            <td>{{ number_format($populationData->age_15_19) }}</td>
                                        </tr>
                                        <tr>
                                            <td>20-24 Tahun</td>
                                            <td>{{ number_format($populationData->age_20_24) }}</td>
                                        </tr>
                                        <tr>
                                            <td>25-29 Tahun</td>
                                            <td>{{ number_format($populationData->age_25_29) }}</td>
                                        </tr>
                                        <tr>
                                            <td>30-34 Tahun</td>
                                            <td>{{ number_format($populationData->age_30_34) }}</td>
                                        </tr>
                                        <tr>
                                            <td>35-39 Tahun</td>
                                            <td>{{ number_format($populationData->age_35_39) }}</td>
                                        </tr>
                                        <tr>
                                            <td>40-44 Tahun</td>
                                            <td>{{ number_format($populationData->age_40_44) }}</td>
                                        </tr>
                                        <tr>
                                            <td>45-49 Tahun</td>
                                            <td>{{ number_format($populationData->age_45_49) }}</td>
                                        </tr>
                                        <tr>
                                            <td>50-54 Tahun</td>
                                            <td>{{ number_format($populationData->age_50_54) }}</td>
                                        </tr>
                                        <tr>
                                            <td>55-59 Tahun</td>
                                            <td>{{ number_format($populationData->age_55_59) }}</td>
                                        </tr>
                                        <tr>
                                            <td>60-64 Tahun</td>
                                            <td>{{ number_format($populationData->age_60_64) }}</td>
                                        </tr>
                                        <tr>
                                            <td>65+ Tahun</td>
                                            <td>{{ number_format($populationData->age_65_plus) }}</td>
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

        /* Specific styles for population statistics page */
        .content-glass-card {
            padding: 3rem;
        }

        .stat-card-small {
            background: rgba(255, 255, 255, 0.15);
            /* Glassmorphism background */
            backdrop-filter: blur(15px);
            /* Glassmorphism blur */
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
            /* Glassmorphism border */
        }

        .stat-card-small i {
            font-size: 3rem;
            color: var(--neutral-white);
            /* Adjusted for glassmorphism */
            margin-bottom: 1rem;
        }

        .stat-card-small h4 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--neutral-white);
            /* Adjusted for glassmorphism */
            margin-bottom: 0.5rem;
        }

        .stat-card-small p.display-5 {
            font-size: 2.5rem;
            color: var(--neutral-white);
            /* Adjusted for glassmorphism */
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
