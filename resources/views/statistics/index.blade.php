@extends('partials.master')

@section('title', 'Data & Statistik Desa')
@section('description',
    'Data dan statistik umum Desa Kampung Dalam: penduduk, pendidikan, pekerjaan, kesehatan,
    infrastruktur, ekonomi, sosial, dan agama.')

@section('content')
    {{-- Hero Section --}}
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div> {{-- Ganti dengan gambar hero statistik --}}
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Data & Statistik Desa</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Data dan informasi demografi serta pembangunan Desa Kampung Dalam
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Statistics Overview Section --}}
    <section class="statistics-overview section bg-light">
        <div class="container">
            <h2 class="section-heading" data-aos="fade-up">Gambaran Umum Statistik</h2>
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="stats-card">
                        <div class="icon"><i class="bi bi-people"></i></div>
                        <div class="number" data-count="2847">0</div>
                        <div class="label">Total Penduduk</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="stats-card">
                        <div class="icon"><i class="bi bi-house-door"></i></div>
                        <div class="number" data-count="892">0</div>
                        <div class="label">Jumlah Kepala Keluarga</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="stats-card">
                        <div class="icon"><i class="bi bi-graph-up"></i></div>
                        <div class="number" data-count="70">0</div>
                        <div class="label">Tingkat Partisipasi Pembangunan (%)</div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <p class="lead">Untuk data statistik yang lebih rinci, silakan kunjungi halaman-halaman berikut:</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('statistics.population') }}" class="custom-btn primary-btn"><i
                            class="bi bi-people"></i> Data Penduduk</a>
                    <a href="{{ route('statistics.education') }}" class="custom-btn primary-btn"><i
                            class="bi bi-mortarboard"></i> Data Pendidikan</a>
                    <a href="{{ route('statistics.occupation') }}" class="custom-btn primary-btn"><i
                            class="bi bi-briefcase"></i> Data Pekerjaan</a>
                    <a href="{{ route('statistics.health') }}" class="custom-btn primary-btn"><i
                            class="bi bi-heart-pulse"></i> Data Kesehatan</a>
                    <a href="{{ route('statistics.infrastructure') }}" class="custom-btn primary-btn"><i
                            class="bi bi-building"></i> Data Infrastruktur</a>
                    <a href="{{ route('statistics.economic') }}" class="custom-btn primary-btn"><i
                            class="bi bi-cash-coin"></i> Data Ekonomi</a>
                    <a href="{{ route('statistics.social') }}" class="custom-btn primary-btn"><i
                            class="bi bi-hand-heart"></i> Data Sosial</a>
                    <a href="{{ route('statistics.religion') }}" class="custom-btn primary-btn"><i class="bi bi-book"></i>
                        Data Agama</a>
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

        /* Statistics Page Styles */
        .statistics-overview .stats-card {
            background: linear-gradient(135deg, var(--primary-color), #2563eb);
            color: var(--primary-blue-light);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .statistics-overview .stats-card .icon {
            font-size: 3.5rem;
            margin-bottom: 15px;
            color: var(--primary-blue-dark);
        }

        .statistics-overview .stats-card .number {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1;
        }

        .statistics-overview .stats-card .label {
            font-size: 1.2rem;
            margin-top: 10px;
            opacity: 0.9;
        }

        .stat-category-card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .stat-category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .statistics-overview .stats-card {
                padding: 2rem;
            }

            .statistics-overview .stats-card .icon {
                font-size: 2.5rem;
            }

            .statistics-overview .stats-card .number {
                font-size: 2.5rem;
            }

            .statistics-overview .stats-card .label {
                font-size: 1rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Counter Animation
            function animateCounter(element) {
                const target = parseInt(element.getAttribute('data-count'));
                const increment = target / 100;
                let current = 0;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    element.textContent = Math.floor(current);
                }, 20);
            }

            // Animate counters when in view
            const counters = document.querySelectorAll('.stats-card .number');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            }); // Trigger when 50% of the element is visible

            counters.forEach(counter => observer.observe(counter));
        });
    </script>
@endpush
