{{-- 
===========================================
FILE: resources/views/vision-mission.blade.php
DESKRIPSI: Halaman Visi & Misi Desa
ROUTE: /profil/visi-misi
===========================================
--}}

@extends('partials.master')

@section('title', 'Visi & Misi - Kampung Dalam')
@section('description', 'Visi, Misi, dan Tujuan Pembangunan Desa Kampung Dalam')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Visi & Misi</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Komitmen dan arah pembangunan Desa Kampung Dalam
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission Content -->
    <section class="vision-mission-content section">
        <div class="container">
            <div class="row gy-5">
                <!-- Vision -->
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="vision-card">
                        <div class="card-header">
                            <div class="icon-wrapper">
                                <i class="bi bi-eye"></i>
                            </div>
                            <h2 class="text-white">Visi</h2>
                        </div>
                        <div class="card-content">
                            <blockquote class="vision-text">
                                {{ $profile->vision ?? 'Mewujudkan Desa Kampung Dalam yang maju, mandiri, dan sejahtera berdasarkan nilai-nilai gotong royong dan kearifan lokal.' }}
                            </blockquote>
                        </div>
                    </div>
                </div>

                <!-- Mission -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="mission-card">
                        <div class="card-header">
                            <div class="icon-wrapper">
                                <i class="bi bi-grid"></i>
                            </div>
                            <h2 class="text-white">Misi</h2>
                        </div>
                        <div class="card-content">
                            <ul class="mission-list">
                                @if ($profile && $profile->mission)
                                    @foreach (explode('.', $profile->mission) as $index => $mission)
                                        @if (!empty(trim($mission)))
                                            <li data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                                                <span class="mission-number">{{ $index + 1 }}</span>
                                                <span class="mission-text">{{ trim($mission) }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <li data-aos="fade-up" data-aos-delay="100">
                                        <span class="mission-number">1</span>
                                        <span class="mission-text">Meningkatkan kualitas pelayanan publik yang prima dan
                                            transparan</span>
                                    </li>
                                    <li data-aos="fade-up" data-aos-delay="200">
                                        <span class="mission-number">2</span>
                                        <span class="mission-text">Mengembangkan potensi ekonomi masyarakat dan UMKM
                                            lokal</span>
                                    </li>
                                    <li data-aos="fade-up" data-aos-delay="300">
                                        <span class="mission-number">3</span>
                                        <span class="mission-text">Melestarikan budaya dan kearifan lokal</span>
                                    </li>
                                    <li data-aos="fade-up" data-aos-delay="400">
                                        <span class="mission-number">4</span>
                                        <span class="mission-text">Membangun infrastruktur yang berkelanjutan</span>
                                    </li>
                                    <li data-aos="fade-up" data-aos-delay="500">
                                        <span class="mission-number">5</span>
                                        <span class="mission-text">Meningkatkan kualitas sumber daya manusia</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Goals Section -->
    <section class="goals-section section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-heading" data-aos="fade-up">Tujuan Pembangunan</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Target-target strategis yang ingin dicapai dalam pembangunan desa
                    </p>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Kesejahteraan Masyarakat</h4>
                        <p>Meningkatkan taraf hidup dan kesejahteraan seluruh warga desa melalui berbagai program
                            pemberdayaan.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h4>Infrastruktur Berkualitas</h4>
                        <p>Membangun dan memperbaiki infrastruktur desa untuk mendukung aktivitas ekonomi dan sosial
                            masyarakat.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <i class="bi bi-tree"></i>
                        </div>
                        <h4>Lingkungan Berkelanjutan</h4>
                        <p>Menjaga kelestarian lingkungan dan mengembangkan desa yang ramah lingkungan untuk generasi
                            mendatang.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <i class="bi bi-mortarboard"></i>
                        </div>
                        <h4>Pendidikan Berkualitas</h4>
                        <p>Meningkatkan akses dan kualitas pendidikan untuk mencerdaskan kehidupan bangsa di tingkat desa.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-heading" data-aos="fade-up">Nilai-Nilai Dasar</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Prinsip-prinsip yang menjadi landasan dalam setiap kegiatan pembangunan desa
                    </p>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <h4>Gotong Royong</h4>
                        <p>Semangat kebersamaan dan saling membantu dalam setiap kegiatan pembangunan desa.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Transparansi</h4>
                        <p>Keterbukaan dalam pengelolaan pemerintahan dan pembangunan desa untuk menciptakan kepercayaan.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h4>Inovasi</h4>
                        <p>Mengembangkan ide-ide kreatif dan inovatif untuk kemajuan desa di era modern.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
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

        /* Vision Mission Page Styles */
        .vision-card,
        .mission-card {
            background: white;
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .vision-card:hover,
        .mission-card:hover {
            transform: translateY(-10px);
        }

        .card-header {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            padding: 3rem 2rem 2rem;
            text-align: center;
            color: white;
            position: relative;
        }

        .mission-card .card-header {
            background: linear-gradient(135deg, #059669, #10b981);
        }

        .icon-wrapper {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
        }

        .card-header h2 {
            font-size: 2rem;
            font-weight: 800;
            margin: 0;
        }

        .card-content {
            padding: 3rem 2rem;
        }

        .vision-text {
            font-size: 1.3rem;
            line-height: 1.8;
            color: #374151;
            font-style: italic;
            text-align: center;
            margin: 0;
            position: relative;
        }

        .vision-text::before,
        .vision-text::after {
            content: '"';
            font-size: 3rem;
            color: #3b82f6;
            font-weight: bold;
        }

        .mission-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mission-list li {
            display: flex;
            align-items: flex-start;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: #f8fafc;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .mission-list li:hover {
            background: #e0f2fe;
            transform: translateX(10px);
        }

        .mission-number {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #059669, #10b981);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .mission-text {
            color: #374151;
            line-height: 1.6;
            font-weight: 500;
        }

        .goal-card,
        .value-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
        }

        .goal-card:hover,
        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .goal-icon,
        .value-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 1.8rem;
        }

        .value-icon {
            background: linear-gradient(135deg, #059669, #10b981);
        }

        .goal-card h4,
        .value-card h4 {
            color: #1f2937;
            margin-bottom: 1rem;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .goal-card p,
        .value-card p {
            color: #6b7280;
            line-height: 1.6;
            margin: 0;
        }

        @media (max-width: 768px) {
            .card-header {
                padding: 2rem 1.5rem 1.5rem;
            }

            .card-content {
                padding: 2rem 1.5rem;
            }

            .vision-text {
                font-size: 1.1rem;
            }

            .mission-list li {
                padding: 1rem;
                margin-bottom: 1rem;
            }

            .mission-number {
                width: 35px;
                height: 35px;
                font-size: 0.9rem;
            }

            .goal-card,
            .value-card {
                padding: 2rem;
            }
        }
    </style>
@endpush
