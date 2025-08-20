{{-- 
===========================================
FILE: resources/views/officials.blade.php
DESKRIPSI: Halaman Perangkat Desa
ROUTE: /profil/perangkat-desa
===========================================
--}}

@extends('partials.master')

@section('title', 'Perangkat Desa - Kampung Dalam')
@section('description', 'Profil lengkap perangkat desa dan struktur pemerintahan Desa Kampung Dalam')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Perangkat Desa</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Tim profesional yang berkomitmen melayani masyarakat Kampung Dalam
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Officials Content -->
    <section class="officials-content section">
        <div class="container">
            <div class="row gy-4">
                @forelse($officials as $official)
                    <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up"
                        data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="official-card">
                            <div class="official-photo">
                                @if ($official->photo && Storage::disk('public')->exists($official->photo))
                                    <img src="{{ asset('storage/' . $official->photo) }}" alt="{{ $official->name }}"
                                        loading="lazy">
                                @else
                                    <img src="/placeholder.svg?height=300&width=300&text={{ urlencode($official->name ?? 'Official') }}"
                                        alt="{{ $official->name }}" loading="lazy">
                                @endif
                                <div class="photo-overlay">
                                    <div class="contact-buttons">
                                        @if ($official->phone)
                                            <a href="tel:{{ $official->phone }}" class="contact-btn">
                                                <i class="bi bi-telephone"></i>
                                            </a>
                                        @endif
                                        @if ($official->email)
                                            <a href="mailto:{{ $official->email }}" class="contact-btn">
                                                <i class="bi bi-envelope"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="official-info">
                                <h4 class="official-name">{{ $official->name }}</h4>
                                <p class="official-position">{{ $official->position }}</p>
                                <div class="official-contact">
                                    @if ($official->phone)
                                        <div class="contact-item">
                                            <i class="bi bi-telephone"></i>
                                            <span>{{ $official->phone }}</span>
                                        </div>
                                    @endif
                                    @if ($official->email)
                                        <div class="contact-item">
                                            <i class="bi bi-envelope"></i>
                                            <span>{{ $official->email }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Default Officials if no data -->
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <div class="official-card">
                                <div class="official-photo">
                                    <img src="/placeholder.svg?height=300&width=300&text=Perangkat+{{ $i }}"
                                        alt="Perangkat {{ $i }}" loading="lazy">
                                    <div class="photo-overlay">
                                        <div class="contact-buttons">
                                            <a href="#" class="contact-btn">
                                                <i class="bi bi-telephone"></i>
                                            </a>
                                            <a href="#" class="contact-btn">
                                                <i class="bi bi-envelope"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-info">
                                    <h4 class="official-name">Nama Perangkat {{ $i }}</h4>
                                    <p class="official-position">Jabatan {{ $i }}</p>
                                    <div class="official-contact">
                                        <div class="contact-item">
                                            <i class="bi bi-telephone"></i>
                                            <span>+62 812-3456-789{{ $i }}</span>
                                        </div>
                                        <div class="contact-item">
                                            <i class="bi bi-envelope"></i>
                                            <span>perangkat{{ $i }}@kampungdalam.go.id</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endforelse
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-info-section section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-heading" data-aos="fade-up">Kontak Kantor Desa</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Informasi kontak dan jam pelayanan kantor desa
                    </p>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info-card">
                        <div class="info-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h4>Alamat</h4>
                        <p>{{ $profile->contact_address ?? 'Jl. Raya Kampung Dalam, Kec. Siak, Kab. Siak, Riau 28671' }}
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-info-card">
                        <div class="info-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <h4>Telepon</h4>
                        <p>{{ $profile->contact_phone ?? '+62 761 123456' }}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-info-card">
                        <div class="info-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <h4>Email</h4>
                        <p>{{ $profile->contact_email ?? 'kampungdalam@siak.go.id' }}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="contact-info-card">
                        <div class="info-icon">
                            <i class="bi bi-clock"></i>
                        </div>
                        <h4>Jam Kerja</h4>
                        <p>Senin - Jumat: 08:00 - 16:00<br>Sabtu: 08:00 - 12:00</p>
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

        /* Officials Page Styles */
        .official-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }

        .official-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .official-photo {
            position: relative;
            height: 300px;
            overflow: hidden;
        }

        .official-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .official-card:hover .official-photo img {
            transform: scale(1.05);
        }

        .photo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.7));
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: 2rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .official-card:hover .photo-overlay {
            opacity: 1;
        }

        .contact-buttons {
            display: flex;
            gap: 1rem;
        }

        .contact-btn {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.9);
            color: #3b82f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .contact-btn:hover {
            background: #3b82f6;
            color: white;
            transform: scale(1.1);
        }

        .official-info {
            padding: 2rem;
            /* text-align: center; */
        }

        .official-name {
            color: #1f2937;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .official-position {
            color: #3b82f6;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        /* .official-contact {
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
            } */

        .contact-item {
            /* display: flex;
                align-items: center;
                justify-content: center; */
            /* gap: 0.5rem; */
            color: #6b7280;
            font-size: 1rem;
        }

        .contact-item i {
            color: #3b82f6;
            /* font-size: 1rem; */
        }

        .contact-item span {
            margin-top: 10px;
            /* color: #3b82f6; */
            font-size: 1rem;
        }

        .contact-info-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .contact-info-card:hover {
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

        .contact-info-card h4 {
            color: #1f2937;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .contact-info-card p {
            color: #6b7280;
            line-height: 1.6;
            margin: 0;
        }

        @media (max-width: 768px) {
            .official-photo {
                height: 250px;
            }

            .official-info {
                padding: 1.5rem;
            }

            .official-name {
                font-size: 1.1rem;
            }

            .official-position {
                font-size: 1rem;
            }

            .contact-info-card {
                padding: 2rem;
            }

            .contact-buttons {
                gap: 0.5rem;
            }

            .contact-btn {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
            }
        }
    </style>
@endpush
