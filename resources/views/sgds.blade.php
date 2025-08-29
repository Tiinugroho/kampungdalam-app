{{-- 
===========================================
FILE: resources/views/sgdss.blade.php
DESKRIPSI: Halaman SDGs Desa
ROUTE: /profil/sgdss
===========================================
--}}

@extends('partials.master')

@section('title', 'SDGs Desa Kampung Dalam')
@section('description', 'Tujuan Pembangunan Berkelanjutan Desa Kampung Dalam sesuai SDGs')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">SDGs Desa</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Tujuan Pembangunan Berkelanjutan di Kampung Dalam, Kecamatan Siak
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SDGs Cards Section -->
    <section class="goals-section section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-heading" data-aos="fade-up">Tujuan Pembangunan Desa</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Mengacu pada 18 Indikator SDGs Desa
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <form method="GET" action="{{ url('/statistik') }}">
                        <label for="tahun" class="me-2">Pilih Tahun:</label>
                        <select name="tahun" id="tahun" class="form-control" onchange="this.form.submit()">
                            @foreach ($tahunList as $year)
                                <option value="{{ $year }}" {{ $tahun == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-1.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->desa_tanpa_kemiskinan ?? 0 }}
                        </h4>
                    </div>
                </div>
                
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">

                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-2.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->desa_tanpa_kelaparan ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-3.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->desa_sehat_sejahtera ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-4.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->pendidikan_desa_berkualitas ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-5.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->keterlibatan_perempuan_desa ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-6.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->desa_layak_air_bersih ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-7.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->desa_berenergi_bersih ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-8.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->pertumbuhan_ekonomi_desa ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-9.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->infrastruktur_desa ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-10.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->ketimpangan_desa ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-11.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->kawasan_desa ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-12.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->konsumsi_produksi_desa ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-13.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->perubahan_iklim_desa ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-14.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->ekosistem_darat_desa ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-15.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->ekosistem_laut_desa ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-16.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->desa_damai ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-17.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->kemitraan_desa ?? 0 }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="goal-card">
                        <div class="goal-icon">
                            <img src="{{ asset('SGDS/skor-sdgs-18.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <h4 class="text-muted d-block mt-2">

                            Capaian: {{ $sgds->kelembagaan_desa_dinamis ?? 0 }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .hero {
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

        .goal-card {
            background: white;
            padding: .4rem;
            /* lebih kecil */
            border-radius: 12px;
            /* sudut lebih kecil */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
        }

        .goal-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
        }

        .goal-card h4 {
            font-size: 0.9rem;
            /* judul lebih kecil */
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
    </style>
@endpush
