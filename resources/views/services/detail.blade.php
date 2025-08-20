@extends('partials.master')

@section('title', 'Layanan Desa - Kampung Dalam')
@section('description', Str::limit(strip_tags($service->content), 160)) {{-- Changed from description to content --}}

@section('content')
    {{-- Hero Section --}}
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div> {{-- Ganti dengan gambar hero layanan --}}
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">{{ $service->name }}</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Detail lengkap mengenai layanan yang disediakan oleh Desa Kampung Dalam.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Service Detail Section --}}
    <section class="service-detail section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm p-4 p-md-5" data-aos="fade-up">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <i class="bi {{ $service->icon }} display-1 text-primary"></i>
                            </div>
                            <h2 class="card-title text-center mb-4">{{ $service->title }}</h2>
                            <div class="service-content-body">
                                {!! $service->content !!}
                            </div>
                            @if ($service->requirements)
                                <h3 class="mt-5 mb-3 section-heading fw-bold">Persyaratan</h3>
                                <div class="requirements-list">
                                    {!! $service->requirements !!}
                                </div>
                            @endif
                            @if ($service->process)
                                <h3 class="mt-5 mb-3 section-heading fw-bold">Proses Pengajuan</h3>
                                <div class="process-steps">
                                    {!! $service->process !!}
                                </div>
                            @endif
                            <div class="service-info mt-5 row text-center">
                                <div class="col-md-6 mb-3">
                                    <div class="info-box">
                                        <i class="bi bi-clock text-secondary"></i>
                                        <h5>Estimasi Waktu</h5>
                                        <p>{{ $service->duration ?? 'Tidak disebutkan' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="info-box">
                                        <i class="bi bi-cash-coin text-secondary"></i>
                                        <h5>Biaya Layanan</h5>
                                        <p>{{ $service->cost > 0 ? 'Rp ' . number_format($service->cost, 0, ',', '.') : 'Gratis' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <a href="{{ route('services') }}" class="custom-btn primary-btn">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Layanan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        
        .service-detail-card {
            background: white;
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .service-detail-header {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            padding: 3rem;
            display: flex;
            align-items: center;
            gap: 2rem;
        }
        .service-icon-large {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            flex-shrink: 0;
        }
        .service-info h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }
        .service-description {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        .service-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }
        
        .service-detail .card {
            border-radius: 15px;
        }
        .service-detail .service-content-body p,
        .service-detail .requirements-list p,
        .service-detail .process-steps p {
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }
        .service-detail .service-content-body ul,
        .service-detail .service-content-body ol {
            margin-bottom: 1rem;
            padding-left: 20px;
        }
        .service-detail .service-content-body li {
            margin-bottom: 0.5rem;
        }
        .service-detail .info-box {
            background: #f8fafc;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
        }
        .service-detail .info-box i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .service-detail .info-box h5 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }
        .service-detail .info-box p {
            font-size: 1rem;
            color: #6b7280;
            margin: 0;
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
        @media (max-width: 768px) {
            .service-detail-header {
                flex-direction: column;
                text-align: center;
                padding: 2rem;
            }
            .service-info h1 {
                font-size: 2rem;
            }
            .service-meta {
                justify-content: center;
                gap: 1rem;
            }
            .service-section {
                padding: 2rem;
            }
            .process-step {
                flex-direction: column;
                text-align: center;
            }
            .process-step::after {
                display: none;
            }
            .sidebar-widget {
                padding: 1.5rem;
            }
            .modal-header,
            .modal-body {
                padding: 1.5rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form submission
            document.getElementById('applicationForm').addEventListener('submit', function(e) {
                e.preventDefault();

                // Show loading state
                const submitBtn = document.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Mengirim...';
                submitBtn.disabled = true;

                // Simulate form submission
                setTimeout(() => {
                    alert(
                        'Permohonan berhasil dikirim! Kami akan menghubungi Anda dalam 1x24 jam.');

                    // Reset form
                    this.reset();

                    // Close modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById(
                        'applyModal'));
                    modal.hide();

                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        });
    </script>
@endpush
