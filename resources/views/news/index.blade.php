{{-- 
===========================================
FILE: resources/views/news/index.blade.php
DESKRIPSI: Halaman Daftar Berita
ROUTE: /berita
===========================================
--}}

@extends('partials.master')

@section('title', 'Berita Desa - Kampung Dalam')
@section('description', 'Berita terbaru dan informasi terkini dari Desa Kampung Dalam')

@section('content')
    {{-- Hero Section --}}
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Berita Desa</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Informasi terbaru dan kegiatan terkini dari Desa Kampung Dalam
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured News --}}
    <section class="featured-news section">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h2 class="section-heading" data-aos="fade-up">Berita Utama</h2>
                </div>
            </div>
            <div class="row gy-4">
                {{-- News Carousel - Left Side --}}
                <div class="col-lg-8" data-aos="fade-right">
                    @if ($featuredNews && $featuredNews->count() > 0)
                        <div class="news-carousel-wrapper">
                            <div id="featuredNewsCarousel" class="carousel slide" data-bs-ride="carousel"
                                data-bs-interval="6000">
                                {{-- Indicators --}}
                                <div class="carousel-indicators">
                                    @foreach ($featuredNews->take(6) as $index => $news)
                                        <button type="button" data-bs-target="#featuredNewsCarousel"
                                            data-bs-slide-to="{{ $index }}"
                                            class="{{ $index === 0 ? 'active' : '' }}"
                                            aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-label="Slide {{ $index + 1 }}"></button>
                                    @endforeach
                                </div>

                                {{-- Carousel Items --}}
                                <div class="carousel-inner">
                                    @foreach ($featuredNews->take(6) as $index => $news)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <div class="featured-card">
                                                <div class="featured-image">
                                                    <img src="{{ $news->featured_image
                                                        ? Storage::url('news/' . $news->featured_image)
                                                        : '/placeholder.svg?height=400&width=600&text=Berita+Utama' }}"
                                                        alt="{{ $news->title }}" class="d-block w-100" loading="lazy">
                                                    <div class="featured-overlay">

                                                    </div>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-meta">
                                                        <span
                                                            class="featured-category">{{ ucfirst($news->category) }}</span>
                                                        <span class="featured-date">
                                                            <i class="bi bi-calendar"></i>
                                                            {{ $news->published_at->format('d M Y') }}
                                                        </span>
                                                        <span class="featured-author">
                                                            <i class="bi bi-person"></i>
                                                            {{ $news->author->name ?? 'Admin Desa' }}
                                                        </span>
                                                        <span class="featured-views">
                                                            <i class="bi bi-eye"></i> {{ $news->views ?? 0 }}
                                                        </span>
                                                    </div>
                                                    <h3 class="featured-title">
                                                        <a href="{{ route('news.show', $news->slug) }}" style="color: var(--neutral-white);">
                                                            {{ $news->title }}
                                                        </a>
                                                    </h3>
                                                    <p class="featured-excerpt">
                                                        {{ Str::limit($news->excerpt, 180) }}
                                                    </p>
                                                    <a href="{{ route('news.show', $news->slug) }}" class="featured-btn">
                                                        Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Controls --}}
                                <button class="carousel-control-prev" type="button" data-bs-target="#featuredNewsCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#featuredNewsCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    @else
                        {{-- Jika tidak ada berita utama --}}
                        <div class="featured-card">
                            <div class="featured-image">
                                <img src="/placeholder.svg?height=400&width=600&text=Belum+Ada+Berita+Utama"
                                    alt="No Featured News" class="d-block w-100" loading="lazy">
                                <div class="featured-overlay">
                                    <span class="featured-category">Informasi</span>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-meta">
                                    <span class="featured-date">
                                        <i class="bi bi-calendar"></i>
                                        {{ now()->format('d M Y') }}
                                    </span>
                                    <span class="featured-author">
                                        <i class="bi bi-person"></i>
                                        Admin Desa
                                    </span>
                                </div>
                                <h3 class="featured-title">Belum Ada Berita Utama Tersedia</h3>
                                <p class="featured-excerpt">
                                    Berita utama akan segera dipublikasikan di sini. Tetap ikuti perkembangan terbaru dari
                                    Desa Kampung Dalam.
                                </p>
                                <a href="#" class="featured-btn disabled">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- News Sidebar - Right Side --}}
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="trending-news">
                        <h4 class="trending-title">Berita Populer</h4>
                        <div class="trending-list">
                            @forelse($popularNews as $news)
                                <div class="trending-item">
                                    <div class="trending-image">
                                        <img src="{{ $news->featured_image
                                            ? Storage::url('news/' . $news->featured_image)
                                            : '/placeholder.svg?height=80&width=80&text=News' }}"
                                            alt="{{ $news->title }}">
                                    </div>
                                    <div class="trending-content">
                                        <h6>
                                            <a href="{{ route('news.show', $news->slug) }}">
                                                {{ Str::limit($news->title, 50) }}
                                            </a>
                                        </h6>
                                        <span class="trending-date">{{ $news->published_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-4">
                                    <i class="bi bi-newspaper display-4 text-muted"></i>
                                    <p class="text-muted mt-2">Belum ada berita populer tersedia</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- News Filter --}}
    <section class="news-filter section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="filter-container" data-aos="fade-up">
                        <div class="filter-tabs">
                            <button
                                class="filter-btn {{ !request('category') || request('category') == 'all' ? 'active' : '' }}"
                                data-category="all">Semua Berita</button>
                            {{-- Categories should ideally be dynamic from DB --}}
                            <button class="filter-btn {{ request('category') == 'pembangunan' ? 'active' : '' }}"
                                data-category="pembangunan">Pembangunan</button>
                            <button class="filter-btn {{ request('category') == 'ekonomi' ? 'active' : '' }}"
                                data-category="ekonomi">Ekonomi</button>
                            <button class="filter-btn {{ request('category') == 'kesehatan' ? 'active' : '' }}"
                                data-category="kesehatan">Kesehatan</button>
                            <button class="filter-btn {{ request('category') == 'pendidikan' ? 'active' : '' }}"
                                data-category="pendidikan">Pendidikan</button>
                            <button class="filter-btn {{ request('category') == 'sosial' ? 'active' : '' }}"
                                data-category="sosial">Sosial</button>
                        </div>
                        <div class="search-box">
                            <input type="text" placeholder="Cari berita..." class="search-input"
                                value="{{ request('search') }}">
                            <button class="search-btn" id="search-button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- News Grid (This section will be updated via AJAX) --}}
    <section class="news-grid section bg-light">
        <div class="container">
            <div id="news-results-container">
                {{-- Initial content will be rendered here by JavaScript on page load --}}
                <div class="row gy-4" id="news-cards-wrapper">
                    {{-- News cards will be dynamically inserted here --}}
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <nav class="pagination-nav" data-aos="fade-up" id="pagination-links-container">
                            {{-- Pagination links will be dynamically inserted here --}}
                        </nav>
                    </div>
                </div>
            </div>
            <div id="loading-spinner" class="text-center py-5" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2 text-muted">Memuat berita...</p>
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

        /* News Page Styles */
        .filter-container {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .filter-tabs {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            background: #f8fafc;
            border: 2px solid #e2e8f0;
            color: #64748b;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #3b82f6;
            border-color: #3b82f6;
            color: white;
            transform: translateY(-2px);
        }

        .search-box {
            display: flex;
            position: relative;
        }

        .search-input {
            border: 2px solid #e2e8f0;
            border-radius: 25px;
            padding: 0.75rem 3rem 0.75rem 1.5rem;
            width: 300px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .search-input:focus {
            border-color: #3b82f6;
        }

        .search-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .search-btn:hover {
            background: #2563eb;
        }

        .news-carousel-wrapper {
            background: var(--neutral-white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--neutral-gray-200);
            position: relative;
            z-index: 5;
        }

        .featured-card {
            /* background: white; */
            border-radius: 25px;
            border: 1px solid #e5e7eb;
            /* box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1); */
            overflow: hidden;
            transition: transform 0.3s ease;
            /* box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); */

        }

        /* .featured-card:hover {
                            transform: translateY(-10px);
                        } */

        .featured-image {
            position: relative;
            height: 600px;
            overflow: hidden;
        }

        .featured-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .featured-card:hover .featured-image img {
            /* transform: scale(1.05); */
        }

        .featured-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(17, 24, 39, 0.9) 0%, rgba(17, 24, 39, 0.4) 50%, transparent 100%);
        }

        .featured-category {
            background: #3b82f6;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .featured-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2.5rem;
            color: var(--neutral-white);
            z-index: 10;
        }

        .featured-meta {
            display: flex;
            gap: 2rem;
            margin-bottom: 1rem;
            color: var(--neutral-white);

            font-size: 0.9rem;
            align-items: center;
        }

        .featured-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--neutral-white);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .featured-excerpt {
            color: var(--neutral-white);
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .featured-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--neutral-white);
            text-decoration: none;
            font-weight: 600;
            padding: 12px 24px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 15;
            cursor: pointer;
        }

        .featured-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            color: var(--neutral-white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 56px;
            height: 56px;
            background: var(--neutral-white);
            border-radius: 16px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.9;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-lg);
            z-index: 20;
        }

        .carousel-control-prev {
            left: 24px;
        }

        .carousel-control-next {
            right: 24px;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            opacity: 1;
            background: var(--neutral-white);
            transform: translateY(-50%) scale(1.05);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 24px;
            height: 24px;
            background-size: 24px 24px;
            filter: invert(0.2);
        }

        .carousel-indicators {
            bottom: 24px;
            margin-bottom: 0;
            z-index: 15;
        }

        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 6px;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .carousel-indicators button.active {
            background: var(--neutral-white);
            transform: scale(1.3);
        }

        .featured-btn.disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .trending-news {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            height: fit-content;
        }

        .trending-title {
            color: #1f2937;
            font-weight: 700;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e5e7eb;
        }

        .trending-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #f3f4f6;
            transition: background 0.3s ease;
        }

        .trending-item:hover {
            background: #f8fafc;
            border-radius: 10px;
            padding: 1rem;
            margin: 0 -1rem;
        }

        .trending-item:last-child {
            border-bottom: none;
        }

        .trending-image {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .trending-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .trending-content h6 {
            color: #1f2937;
            font-weight: 600;
            margin-bottom: 0.5rem;
            line-height: 1.3;
            font-size: 0.9rem;
        }

        .trending-content h6 a {
            text-decoration: none;
            color: inherit;
        }

        .trending-content h6 a:hover {
            color: #3b82f6;
        }

        .trending-date {
            color: #6b7280;
            font-size: 0.8rem;
        }

        .news-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .news-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-card:hover .news-image img {
            transform: scale(1.05);
        }

        .news-overlay {
            position: absolute;
            top: 1rem;
            left: 1rem;
        }

        .news-category {
            background: rgba(59, 130, 246, 0.9);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .news-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            height: calc(100% - 200px);
        }

        .news-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            color: #6b7280;
            font-size: 0.8rem;
        }

        .news-meta span {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .news-title {
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .news-title a {
            color: #1f2937;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.3s ease;
        }

        .news-title a:hover {
            color: #3b82f6;
        }

        .news-excerpt {
            color: #6b7280;
            line-height: 1.5;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: 0.9rem;
        }

        .news-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid #f3f4f6;
        }

        .news-author {
            color: #6b7280;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .read-more {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            transition: all 0.3s ease;
        }

        .read-more:hover {
            color: #2563eb;
            transform: translateX(5px);
        }

        .pagination-nav {
            display: flex;
            justify-content: center;
        }

        .pagination {
            display: flex;
            gap: 0.5rem;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .page-item .page-link {
            background: white;
            border: 2px solid #e5e7eb;
            color: #6b7280;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .page-item:hover .page-link,
        .page-item.active .page-link {
            background: #3b82f6;
            border-color: #3b82f6;
            color: white;
            transform: translateY(-2px);
        }

        .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
        }

        @media (max-width: 768px) {
            .filter-container {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-tabs {
                justify-content: center;
            }

            .search-input {
                width: 100%;
            }

            .featured-content {
                padding: 2rem;
            }

            .featured-title {
                font-size: 1.5rem;
            }

            .trending-news {
                margin-top: 2rem;
            }

            .news-content {
                padding: 1.25rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newsCardsWrapper = document.getElementById('news-cards-wrapper');
            const paginationLinksContainer = document.getElementById('pagination-links-container');
            const loadingSpinner = document.getElementById('loading-spinner');
            const filterBtns = document.querySelectorAll('.filter-btn');
            const searchInput = document.querySelector('.search-input');
            const searchButton = document.getElementById('search-button');

            let currentCategory = '{{ request('category', 'all') }}';
            let currentSearch = '{{ request('search', '') }}';
            let currentPage = {{ $allNews->currentPage() }};

            // Debounce function
            function debounce(func, delay) {
                let timeout;
                return function(...args) {
                    const context = this;
                    clearTimeout(timeout);
                    timeout = setTimeout(() => func.apply(context, args), delay);
                };
            }

            // Function to generate HTML for a single news card
            function generateNewsCardHtml(news) {
                return `
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="news-card" data-category="${news.category.toLowerCase()}">
                            <div class="news-image">
                                <img src="${news.featured_image_url}" alt="${news.title}" loading="lazy">
                                <div class="news-overlay">
                                    <span class="news-category">${news.category}</span>
                                </div>
                            </div>
                            <div class="news-content">
                                <div class="news-meta">
                                    <span class="news-date">
                                        <i class="bi bi-calendar"></i>
                                        ${news.published_at}
                                    </span>
                                    <span class="news-views">
                                        <i class="bi bi-eye"></i>
                                        ${news.views}
                                    </span>
                                </div>
                                <h4 class="news-title">
                                    <a href="${news.detail_url}">
                                        ${news.title}
                                    </a>
                                </h4>
                                <p class="news-excerpt">
                                    ${news.excerpt}
                                </p>
                                <div class="news-footer">
                                    <span class="news-author">
                                        <i class="bi bi-person"></i>
                                        ${news.author_name}
                                    </span>
                                    <a href="${news.detail_url}" class="read-more">
                                        Baca <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }

            // Function to fetch news via AJAX
            async function fetchNews(page = 1, category = null, search = null) {
                loadingSpinner.style.display = 'block'; // Show spinner
                newsCardsWrapper.style.opacity = '0.5'; // Dim content
                paginationLinksContainer.style.opacity = '0.5'; // Dim pagination

                const url = new URL(window.location.origin + window.location.pathname);
                url.searchParams.set('page', page);
                if (category && category !== 'all') {
                    url.searchParams.set('category', category);
                } else {
                    url.searchParams.delete('category');
                }
                if (search) {
                    url.searchParams.set('search', search);
                } else {
                    url.searchParams.delete('search');
                }

                try {
                    const response = await fetch(url.toString(), {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest', // Indicate AJAX request
                            'Accept': 'application/json' // Request JSON response
                        }
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const data = await response.json();

                    // Clear existing news cards
                    newsCardsWrapper.innerHTML = '';
                    paginationLinksContainer.innerHTML = '';

                    if (data.has_news) {
                        // Populate news cards
                        data.news.forEach(news => {
                            newsCardsWrapper.insertAdjacentHTML('beforeend', generateNewsCardHtml(
                                news));
                        });
                        // Populate pagination links
                        paginationLinksContainer.innerHTML = data.pagination_html;
                    } else {
                        newsCardsWrapper.innerHTML = `
                            <div class="col-12 text-center py-5">
                                <i class="bi bi-newspaper display-1 text-muted"></i>
                                <h3 class="mt-3 text-muted">Belum ada berita tersedia</h3>
                                <p class="text-muted">Silakan cek kembali nanti atau gunakan filter lain.</p>
                            </div>
                        `;
                    }

                    // Update URL in browser history
                    window.history.pushState({
                        path: url.toString()
                    }, '', url.toString());

                    // Update current state variables
                    currentCategory = category || 'all';
                    currentSearch = search || '';
                    currentPage = page;

                    // Re-attach event listeners for new pagination links
                    attachPaginationListeners();

                    // Re-initialize AOS if you are using it for dynamically loaded content
                    if (typeof AOS !== 'undefined') {
                        AOS.refresh();
                    }

                } catch (error) {
                    console.error('Error fetching news:', error);
                    newsCardsWrapper.innerHTML =
                        '<div class="col-12 text-center py-5"><p class="text-danger">Gagal memuat berita. Silakan coba lagi.</p></div>';
                    paginationLinksContainer.innerHTML = ''; // Clear pagination on error
                } finally {
                    loadingSpinner.style.display = 'none'; // Hide spinner
                    newsCardsWrapper.style.opacity = '1'; // Restore opacity
                    paginationLinksContainer.style.opacity = '1'; // Restore pagination opacity
                }
            }

            // Function to attach listeners to pagination links
            function attachPaginationListeners() {
                // Remove existing listeners to prevent duplicates
                document.querySelectorAll('.pagination .page-link').forEach(link => {
                    link.removeEventListener('click', handlePaginationClick);
                });

                // Add new listeners
                document.querySelectorAll('.pagination .page-link').forEach(link => {
                    link.addEventListener('click', handlePaginationClick);
                });
            }

            function handlePaginationClick(e) {
                e.preventDefault();
                const pageUrl = new URL(e.target.href);
                const page = pageUrl.searchParams.get('page');
                fetchNews(page, currentCategory, currentSearch);
            }

            // Event listeners for filter buttons
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    const category = this.getAttribute('data-category');
                    fetchNews(1, category, currentSearch); // Reset to page 1 on category change
                });
            });

            // Debounced search function
            const debouncedSearch = debounce((searchTerm) => {
                fetchNews(1, currentCategory, searchTerm); // Reset to page 1 on search
            }, 300); // 300ms debounce time

            // Event listener for search input (live search)
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.trim();
                debouncedSearch(searchTerm);
            });

            // Event listener for search button (still works if user prefers to click)
            searchButton.addEventListener('click', function() {
                const searchTerm = searchInput.value.trim();
                fetchNews(1, currentCategory, searchTerm); // Reset to page 1 on search
            });

            // Initial setup on page load
            // Set active category button based on initial URL
            filterBtns.forEach(btn => {
                if (btn.getAttribute('data-category') === currentCategory) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });

            // Initial fetch to populate the news grid on page load
            fetchNews(currentPage, currentCategory, currentSearch);

            // Handle browser back/forward buttons
            window.addEventListener('popstate', function(event) {
                const url = new URL(window.location.href);
                const page = url.searchParams.get('page') || 1;
                const category = url.searchParams.get('category') || 'all';
                const search = url.searchParams.get('search') || '';

                // Update UI elements to reflect the state from history
                filterBtns.forEach(btn => {
                    if (btn.getAttribute('data-category') === category) {
                        btn.classList.add('active');
                    } else {
                        btn.classList.remove('active');
                    }
                });
                searchInput.value = search;

                fetchNews(page, category, search);
            });
        });
    </script>
@endpush
