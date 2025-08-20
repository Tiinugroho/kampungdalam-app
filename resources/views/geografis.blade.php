{{-- 
===========================================
FILE: resources/views/profile/geografis.blade.php
DESKRIPSI: Halaman Kondisi Geografis Desa
ROUTE: /profil/geografis
===========================================
--}}

@extends('partials.master')

@section('title', 'Kondisi Geografis Desa - Kampung Dalam')
@section('description', 'Informasi lengkap mengenai kondisi geografis, batas wilayah, dan topografi Desa Kampung
    Dalam.')

@section('content')
    {{-- Hero Section --}}
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider9.jpg') }}');"></div> {{-- Ganti dengan gambar hero geografis --}}
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Kondisi Geografis Desa</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Mengenal lebih jauh letak, luas, dan karakteristik wilayah Desa Kampung Dalam.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Geografis Content --}}
    <section class="geografis-content section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="content-card p-4 p-md-5 rounded-3 shadow-sm bg-white" data-aos="fade-up">
                        <h2 class="section-heading text-start">Gambaran Umum Geografis</h2>
                        @if ($geografisContent->image)
                            <div class="text-center mb-4">
                                <img src="{{ asset($geografisContent->image) }}" alt="{{ $geografisContent->title }}"
                                    class="img-fluid rounded-3 shadow-sm" style="max-height: 400px; object-fit: cover;">
                            </div>
                        @endif
                        @foreach ($geografisContent->paragraphs as $paragraph)
                            <p class="lead">{{ $paragraph }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            @if ($geografisContent->map_embed_url)
                <div class="row mt-5">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="section-heading text-center">Peta Lokasi Desa</h2>
                        <div class="map-container rounded-3 shadow-sm overflow-hidden">
                            <iframe src="{{ $geografisContent->map_embed_url }}" width="100%" height="450"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            @endif
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

        .hero-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
        }

        .content-card {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .content-card p {
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .content-card img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 2rem auto;
        }

        .map-container {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .content-card {
                padding: 2rem;
            }
        }
    </style>
@endpush
