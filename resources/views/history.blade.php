@extends('partials.master')

@section('title', 'Sejarah Desa - Kampung Dalam')
@section('description', 'Sejarah panjang dan perkembangan Desa Kampung Dalam dari masa ke masa')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Sejarah Desa Kampung Dalam</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Perjalanan panjang sebuah desa yang kaya akan sejarah dan budaya
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- History Content -->
    <section class="history-content section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="timeline-container" data-aos="fade-up">
                        <div class="history-card main-history">
                            <div class="history-icon">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div class="history-content">
                                <h3>Asal Usul Nama</h3>
                                <p>{{ $profile->history ?? 'Kampung Dalam merupakan salah satu desa yang terletak di Kecamatan Siak, Kabupaten Siak, Provinsi Riau. Desa ini memiliki sejarah panjang sebagai bagian dari Kesultanan Siak Sri Indrapura yang berdiri sejak abad ke-18.' }}
                                </p>

                                <p>Nama "Kampung Dalam" berasal dari posisinya yang berada di bagian dalam wilayah
                                    Kesultanan Siak, yang dahulu merupakan pusat pemerintahan dan perdagangan di kawasan
                                    Riau. Kata "dalam" merujuk pada lokasi geografis yang berada di pedalaman, jauh dari
                                    pesisir pantai.</p>
                            </div>
                        </div>

                        <!-- Timeline Items -->
                        <div class="timeline">
                            <div class="timeline-item" data-aos="fade-right">
                                <div class="timeline-marker">
                                    <span class="timeline-year">1700an</span>
                                </div>
                                <div class="timeline-content">
                                    <h4>Era Kesultanan Siak</h4>
                                    <p>Wilayah Kampung Dalam menjadi bagian dari Kesultanan Siak Sri Indrapura. Pada masa
                                        ini, daerah ini menjadi jalur perdagangan penting antara pedalaman dan pesisir.</p>
                                </div>
                            </div>

                            <div class="timeline-item" data-aos="fade-left">
                                <div class="timeline-marker">
                                    <span class="timeline-year">1800an</span>
                                </div>
                                <div class="timeline-content">
                                    <h4>Masa Kolonial Belanda</h4>
                                    <p>Pada masa kolonial Belanda, wilayah ini mulai mengalami perubahan sistem
                                        pemerintahan. Masyarakat mulai mengenal sistem administrasi modern.</p>
                                </div>
                            </div>

                            <div class="timeline-item" data-aos="fade-right">
                                <div class="timeline-marker">
                                    <span class="timeline-year">1945</span>
                                </div>
                                <div class="timeline-content">
                                    <h4>Era Kemerdekaan</h4>
                                    <p>Setelah kemerdekaan Indonesia, Kampung Dalam mulai berkembang sebagai desa mandiri
                                        dengan sistem pemerintahan desa yang lebih terorganisir.</p>
                                </div>
                            </div>

                            <div class="timeline-item" data-aos="fade-left">
                                <div class="timeline-marker">
                                    <span class="timeline-year">1970an</span>
                                </div>
                                <div class="timeline-content">
                                    <h4>Pembangunan Modern</h4>
                                    <p>Dimulainya pembangunan infrastruktur modern seperti jalan, sekolah, dan fasilitas
                                        kesehatan yang mengubah wajah desa.</p>
                                </div>
                            </div>

                            <div class="timeline-item" data-aos="fade-right">
                                <div class="timeline-marker">
                                    <span class="timeline-year">2000an</span>
                                </div>
                                <div class="timeline-content">
                                    <h4>Era Digital</h4>
                                    <p>Memasuki era digital, Kampung Dalam mulai mengembangkan sistem pelayanan berbasis
                                        teknologi dan meningkatkan konektivitas internet.</p>
                                </div>
                            </div>

                            <div class="timeline-item" data-aos="fade-left">
                                <div class="timeline-marker">
                                    <span class="timeline-year">Sekarang</span>
                                </div>
                                <div class="timeline-content">
                                    <h4>Desa Modern</h4>
                                    <p>Saat ini, Kampung Dalam telah berkembang menjadi desa modern yang tetap
                                        mempertahankan nilai-nilai tradisional dan kearifan lokal.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Heritage Section -->
    <section class="heritage-section section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-heading" data-aos="fade-up">Warisan Budaya</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Kekayaan budaya dan tradisi yang masih dilestarikan hingga kini
                    </p>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="heritage-card">
                        <div class="heritage-icon">
                            <i class="bi bi-music-note-beamed"></i>
                        </div>
                        <h4>Seni Tradisional</h4>
                        <p>Berbagai seni tradisional Melayu seperti tari zapin, musik gambus, dan pantun masih dilestarikan
                            oleh masyarakat desa.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="heritage-card">
                        <div class="heritage-icon">
                            <i class="bi bi-cup-hot"></i>
                        </div>
                        <h4>Kuliner Tradisional</h4>
                        <p>Makanan khas seperti gulai ikan patin, rendang daging, dan berbagai kue tradisional Melayu
                            menjadi warisan kuliner yang dijaga.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="heritage-card">
                        <div class="heritage-icon">
                            <i class="bi bi-house-heart"></i>
                        </div>
                        <h4>Arsitektur Tradisional</h4>
                        <p>Rumah panggung khas Melayu dengan ornamen ukiran yang indah masih dapat ditemukan di beberapa
                            bagian desa.</p>
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

        /* History Page Styles */
        .timeline-container {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .main-history {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 4rem;
            text-align: center;
        }

        .history-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            color: white;
            font-size: 2rem;
        }

        .timeline {
            position: relative;
            padding: 2rem 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, #3b82f6, #1e40af);
            transform: translateX(-50%);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 3rem;
            display: flex;
            align-items: center;
        }

        .timeline-item:nth-child(odd) {
            flex-direction: row;
        }

        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline-marker {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 60px;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .timeline-year {
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .timeline-content {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            width: calc(50% - 80px);
            position: relative;
        }

        .timeline-item:nth-child(odd) .timeline-content {
            margin-right: auto;
        }

        .timeline-item:nth-child(even) .timeline-content {
            margin-left: auto;
        }

        .timeline-content::before {
            content: '';
            position: absolute;
            top: 50%;
            width: 0;
            height: 0;
            border: 15px solid transparent;
            transform: translateY(-50%);
        }

        .timeline-item:nth-child(odd) .timeline-content::before {
            right: -30px;
            border-left-color: white;
        }

        .timeline-item:nth-child(even) .timeline-content::before {
            left: -30px;
            border-right-color: white;
        }

        .timeline-content h4 {
            color: #1f2937;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .timeline-content p {
            color: #6b7280;
            line-height: 1.6;
            margin: 0;
        }

        .heritage-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .heritage-card:hover {
            transform: translateY(-10px);
        }

        .heritage-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #059669, #10b981);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 1.8rem;
        }

        .heritage-card h4 {
            color: #1f2937;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .heritage-card p {
            color: #6b7280;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .timeline::before {
                left: 30px;
            }

            .timeline-item {
                flex-direction: column !important;
                align-items: flex-start;
            }

            .timeline-marker {
                left: 30px;
                transform: translateX(-50%);
                width: 100px;
                height: 50px;
            }

            .timeline-content {
                width: calc(100% - 80px);
                margin-left: 80px !important;
                margin-right: 0 !important;
            }

            .timeline-content::before {
                left: -30px !important;
                right: auto !important;
                border-right-color: white !important;
                border-left-color: transparent !important;
            }

            .main-history {
                padding: 2rem;
            }
        }
    </style>
@endpush
