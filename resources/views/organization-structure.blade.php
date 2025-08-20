@extends('partials.master')

@section('title', 'Struktur Organisasi - Kampung Dalam')
@section('description',
    'Struktur organisasi pemerintahan Desa Kampung Dalam yang profesional dan berorientasi
    pelayanan')

@section('content')
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Struktur Organisasi</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Struktur pemerintahan desa yang solid dan profesional
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="organization-chart section">
        <div class="container">
            <div class="org-chart-container" data-aos="fade-up">
                <div class="org-level level-1">
                    <div class="org-card head-card">
                        <div class="org-photo">
                            <img src="/placeholder.svg?height=120&width=120&text=Kepala+Desa" alt="Kepala Desa">
                        </div>
                        <div class="org-info">
                            <h4>{{ $villageHead->name ?? 'H. Ahmad Syahrial, S.Sos' }}</h4>
                            <p>Kepala Desa</p>
                            <span class="period">{{ $villageHead->period ?? '2019-2025' }}</span>
                        </div>
                    </div>
                </div>

                <div class="connection-line vertical"></div>

                <div class="org-level level-2">
                    <div class="org-card secretary-card">
                        <div class="org-photo">
                            <img src="/placeholder.svg?height=100&width=100&text=Sekdes" alt="Sekretaris Desa">
                        </div>
                        <div class="org-info">
                            <h4>{{ $secretary->name ?? 'Dra. Siti Aminah' }}</h4>
                            <p>Sekretaris Desa</p>
                            <span class="period">{{ $secretary->period ?? '2020-2026' }}</span>
                        </div>
                    </div>
                </div>

                <div class="connection-lines">
                    <div class="connection-line vertical short"></div>
                    <div class="connection-line horizontal"></div>
                    <div class="connection-line vertical short down"></div>
                    <div class="connection-line vertical short down" style="left: 33.33%"></div>
                    <div class="connection-line vertical short down" style="left: 66.66%"></div>
                    <div class="connection-line vertical short down" style="right: 0"></div>
                </div>

                <div class="org-level level-3">
                    <div class="org-card dept-card">
                        <div class="org-photo">
                            <img src="/placeholder.svg?height=80&width=80&text=Kaur+Pembangunan" alt="Kaur Pembangunan">
                        </div>
                        <div class="org-info">
                            <h5>Ir. Bambang Sutrisno</h5>
                            <p>Kaur Pembangunan</p>
                            <div class="responsibilities">
                                <span class="resp-tag">Infrastruktur</span>
                                <span class="resp-tag">Perencanaan</span>
                            </div>
                        </div>
                    </div>

                    <div class="org-card dept-card">
                        <div class="org-photo">
                            <img src="/placeholder.svg?height=80&width=80&text=Kaur+Keuangan" alt="Kaur Keuangan">
                        </div>
                        <div class="org-info">
                            <h5>S.E. Ratna Dewi</h5>
                            <p>Kaur Keuangan</p>
                            <div class="responsibilities">
                                <span class="resp-tag">Anggaran</span>
                                <span class="resp-tag">Pelaporan</span>
                            </div>
                        </div>
                    </div>

                    <div class="org-card dept-card">
                        <div class="org-photo">
                            <img src="/placeholder.svg?height=80&width=80&text=Kaur+Umum" alt="Kaur Umum">
                        </div>
                        <div class="org-info">
                            <h5>Drs. Hendra Wijaya</h5>
                            <p>Kaur Umum</p>
                            <div class="responsibilities">
                                <span class="resp-tag">Administrasi</span>
                                <span class="resp-tag">Pelayanan</span>
                            </div>
                        </div>
                    </div>

                    <div class="org-card dept-card">
                        <div class="org-photo">
                            <img src="/placeholder.svg?height=80&width=80&text=Kaur+Kesra" alt="Kaur Kesejahteraan">
                        </div>
                        <div class="org-info">
                            <h5>S.Sos. Maya Sari</h5>
                            <p>Kaur Kesejahteraan</p>
                            <div class="responsibilities">
                                <span class="resp-tag">Pemberdayaan</span>
                                <span class="resp-tag">Sosial</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="rt-rw-section section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-heading" data-aos="fade-up">Ketua RT/RW</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Struktur kepemimpinan di tingkat RT dan RW
                    </p>
                </div>
            </div>

            <div class="row gy-4">
                @for ($i = 1; $i <= 4; $i++)
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="rt-card">
                            <div class="rt-header">
                                <div class="rt-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <h4>RT {{ sprintf('%02d', $i) }}</h4>
                            </div>
                            <div class="rt-info">
                                <h5>Bapak RT {{ $i }}</h5>
                                <p class="rt-area">Kampung Dalam {{ ['Utara', 'Tengah', 'Selatan', 'Timur'][$i - 1] }}</p>
                                <div class="rt-stats">
                                    <div class="stat-item">
                                        <span class="stat-number">{{ rand(150, 250) }}</span>
                                        <span class="stat-label">KK</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-number">{{ rand(500, 800) }}</span>
                                        <span class="stat-label">Jiwa</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <section class="org-info-section section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <h4>Struktur Terpadu</h4>
                        <p>Organisasi pemerintahan desa yang solid dengan pembagian tugas yang jelas untuk memberikan
                            pelayanan terbaik.</p>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="bi bi-clock"></i>
                        </div>
                        <h4>Pelayanan 24/7</h4>
                        <p>Sistem pelayanan yang terintegrasi dan dapat diakses kapan saja untuk kemudahan masyarakat.</p>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h4>Tim Profesional</h4>
                        <p>Perangkat desa yang kompeten dan berpengalaman dalam memberikan pelayanan prima kepada
                            masyarakat.</p>
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

        .hero-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
        }

        /* Organization Chart Styles */
        .org-chart-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            padding: 2rem 0;
        }

        .org-level {
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .level-3 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .org-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
        }

        .org-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .head-card {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            max-width: 350px;
        }

        .secretary-card {
            background: linear-gradient(135deg, #059669, #10b981);
            color: white;
            max-width: 300px;
        }

        .dept-card {
            background: white;
            border: 2px solid #e5e7eb;
        }

        .org-photo {
            width: 100px;
            height: 100px;
            margin: 0 auto 1.5rem;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid rgba(255, 255, 255, 0.3);
        }

        .dept-card .org-photo {
            width: 80px;
            height: 80px;
            border: 3px solid #e5e7eb;
        }

        .org-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .org-info h4 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .org-info h5 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }

        .org-info p {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            opacity: 0.9;
        }

        .dept-card .org-info p {
            color: #3b82f6;
            font-weight: 600;
        }

        .period {
            font-size: 0.9rem;
            opacity: 0.8;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            display: inline-block;
        }

        .responsibilities {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            justify-content: center;
            margin-top: 1rem;
        }

        .resp-tag {
            background: #f3f4f6;
            color: #374151;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .connection-line {
            background: #d1d5db;
            position: absolute;
        }

        .connection-line.vertical {
            width: 2px;
            height: 60px;
            left: 50%;
            transform: translateX(-50%);
            top: -30px;
        }

        .connection-line.vertical.short {
            height: 30px;
            top: -15px;
        }

        .connection-line.vertical.down {
            top: auto;
            bottom: -45px;
        }

        .connection-line.horizontal {
            height: 2px;
            width: 80%;
            left: 10%;
            top: -30px;
        }

        .connection-lines {
            position: relative;
            height: 0;
            margin-bottom: 2rem;
        }

        .rt-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .rt-card:hover {
            transform: translateY(-10px);
        }

        .rt-header {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .rt-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }

        .rt-header h4 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }

        .rt-info {
            padding: 2rem;
            text-align: center;
        }

        .rt-info h5 {
            color: #1f2937;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .rt-area {
            color: #6b7280;
            margin-bottom: 1.5rem;
        }

        .rt-stats {
            display: flex;
            justify-content: space-around;
            border-top: 1px solid #e5e7eb;
            padding-top: 1rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            display: block;
            font-size: 1.5rem;
            font-weight: 700;
            color: #3b82f6;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #6b7280;
        }

        .info-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-10px);
        }

        .info-icon {
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

        .info-card h4 {
            color: #1f2937;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .info-card p {
            color: #6b7280;
            line-height: 1.6;
            margin: 0;
        }

        @media (max-width: 768px) {
            .level-3 {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .org-card {
                padding: 1.5rem;
            }

            .org-photo {
                width: 80px;
                height: 80px;
            }

            .connection-lines {
                display: none;
            }

            .rt-header,
            .rt-info {
                padding: 1.5rem;
            }
        }
    </style>
@endpush
