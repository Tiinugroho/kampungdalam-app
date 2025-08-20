@extends('partials.master')

@section('title', $news->title . ' - Kampung Dalam')
@section('description', Str::limit($news->excerpt, 160))
@section('image', $news->featured_image ? Storage::url('news/' . $news->featured_image) : asset('placeholder.svg'))

@section('content')
    {{-- Breadcrumb --}}

    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <nav aria-label="breadcrumb" data-aos="fade-up">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Berita</a></li>
                    <li class="breadcrumb-item active">{{ Str::limit($news->title) }}</li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- News Detail Section --}}
    <section class="news-detail section">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-8">
                    <article class="news-article" data-aos="fade-up">
                        <div class="article-header">
                            <span class="article-category">{{ ucfirst($news->category) }}</span>
                            <h1 class="article-title">{{ $news->title }}</h1>
                            <div class="article-meta">
                                <span class="meta-item"><i class="bi bi-calendar"></i>
                                    {{ $news->published_at->format('d M Y') }}</span>
                                <span class="meta-item"><i class="bi bi-person"></i>
                                    {{ $news->author->name ?? 'Admin Desa' }}</span>
                                <span class="meta-item"><i class="bi bi-eye"></i> {{ $news->views }} Dilihat</span>
                            </div>
                        </div>

                        @if ($news->featured_image)
                            <div class="article-image" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ Storage::url('news/' . $news->featured_image) }}" alt="{{ $news->title }}"
                                    class="img-fluid rounded-3 shadow-sm">
                                @if ($news->source_name)
                                    <figcaption class="image-caption">Sumber: {{ $news->source_name }} @if ($news->source_url)
                                            (<a href="{{ $news->source_url }}" target="_blank">Link</a>)
                                        @endif
                                    </figcaption>
                                @endif
                            </div>
                        @endif

                        <div class="article-content" data-aos="fade-up" data-aos-delay="200">
                            {!! $news->content !!}
                        </div>

                        <div class="article-footer" data-aos="fade-up" data-aos-delay="300">
                            <div class="share-buttons">
                                <span>Bagikan:</span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                    target="_blank" class="share-btn facebook"><i class="bi bi-facebook"></i></a>
                                <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($news->title) }}"
                                    target="_blank" class="share-btn twitter"><i class="bi bi-twitter"></i></a>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($news->title . ' ' . url()->current()) }}"
                                    target="_blank" class="share-btn whatsapp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </div>
                    </article>
                </div>

                {{-- Sidebar --}}
                <div class="col-lg-4">
                    <div class="sidebar" data-aos="fade-left">
                        {{-- Related News --}}
                        <div class="sidebar-widget">
                            <h4 class="widget-title">Berita Terkait</h4>
                            <div class="related-news-list">
                                @forelse($relatedNews as $related)
                                    <div class="related-news-item">
                                        <div class="related-news-image">
                                            <img src="{{ $related->featured_image ? Storage::url('news/' . $related->featured_image) : '/placeholder.svg?height=80&width=80&text=News' }}"
                                                alt="{{ $related->title }}">
                                        </div>
                                        <div class="related-news-content">
                                            <h6><a
                                                    href="{{ route('news.show', $related->slug) }}">{{ Str::limit($related->title, 60) }}</a>
                                            </h6>
                                            <span
                                                class="related-news-date">{{ $related->published_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted text-center">Tidak ada berita terkait.</p>
                                @endforelse
                            </div>
                        </div>

                        {{-- Popular Categories --}}
                        <div class="sidebar-widget">
                            <h4 class="widget-title">Kategori Populer</h4>
                            <div class="category-tags">
                                {{-- These should ideally be dynamic from DB --}}
                                <a href="{{ route('news.index', ['category' => 'pembangunan']) }}"
                                    class="tag-btn">Pembangunan</a>
                                <a href="{{ route('news.index', ['category' => 'ekonomi']) }}" class="tag-btn">Ekonomi</a>
                                <a href="{{ route('news.index', ['category' => 'kesehatan']) }}"
                                    class="tag-btn">Kesehatan</a>
                                <a href="{{ route('news.index', ['category' => 'pendidikan']) }}"
                                    class="tag-btn">Pendidikan</a>
                                <a href="{{ route('news.index', ['category' => 'sosial']) }}" class="tag-btn">Sosial</a>
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
        .hero {
            /* margin-top: 10%; */
            min-height: 30vh;
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

        /* News Detail Styles */
        .breadcrumb-section {
            background: #f8fafc;
            padding: 2rem 0;
            margin-top: 80px;
        }

        .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item a {
            color: #e9e9e9;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: white;
        }

        .news-article {
            background: white;
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .article-header {
            padding: 3rem;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
        }

        .article-category {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: inline-block;
        }

        .article-title {
            font-size: 2.8rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .article-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .meta-item i {
            font-size: 1.1rem;
        }

        .article-image {
            padding: 2rem 3rem 0;
            text-align: center;
        }

        .article-image img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .image-caption {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #6b7280;
            font-style: italic;
        }

        .image-caption a {
            color: #3b82f6;
            text-decoration: none;
        }

        .article-content {
            padding: 3rem;
            font-size: 1.1rem;
            line-height: 1.8;
            color: #374151;
        }

        .article-content h2,
        .article-content h3,
        .article-content h4 {
            color: #1f2937;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .article-content p {
            margin-bottom: 1.5rem;
        }

        .article-content ul,
        .article-content ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .article-content li {
            margin-bottom: 0.5rem;
        }

        .article-content img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 1.5rem auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .article-footer {
            padding: 2rem 3rem 3rem;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            /* Align to right */
            align-items: center;
        }

        .share-buttons {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .share-buttons span {
            font-weight: 600;
            color: #374151;
        }

        .share-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .share-btn:hover {
            transform: translateY(-3px);
            color: white;

            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .share-btn.facebook {
            background: #1877f2;
        }

        .share-btn.twitter {
            background: #1da1f2;
        }

        .share-btn.whatsapp {
            background: #25d366;
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .sidebar-widget {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .widget-title {
            color: #1f2937;
            font-weight: 700;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e5e7eb;
        }

        .related-news-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .related-news-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #f3f4f6;
            transition: background 0.3s ease;
        }

        .related-news-item:hover {
            background: #f8fafc;
            border-radius: 10px;
            padding: 1rem;
            margin: 0 -1rem;
        }

        .related-news-item:last-child {
            border-bottom: none;
        }

        .related-news-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .related-news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .related-news-content h6 {
            color: #1f2937;
            font-weight: 600;
            margin-bottom: 0.5rem;
            line-height: 1.3;
            font-size: 1rem;
        }

        .related-news-content h6 a {
            text-decoration: none;
            color: inherit;
        }

        .related-news-content h6 a:hover {
            color: #3b82f6;
        }

        .related-news-date {
            color: #6b7280;
            font-size: 0.85rem;
        }

        .category-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .tag-btn {
            background: #e0f2fe;
            color: #0369a1;
            padding: 0.75rem 1.25rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .tag-btn:hover {
            background: #93c5fd;
            color: #1e40af;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .article-header {
                padding: 2rem;
            }

            .article-title {
                font-size: 2rem;
            }

            .article-meta {
                flex-direction: column;
                gap: 0.5rem;
            }

            .article-image {
                padding: 1.5rem 2rem 0;
            }

            .article-content {
                padding: 2rem;
                font-size: 1rem;
            }

            .article-footer {
                padding: 1.5rem 2rem;
                justify-content: center;
            }

            .share-buttons {
                flex-wrap: wrap;
                justify-content: center;
            }

            .sidebar-widget {
                padding: 1.5rem;
            }
        }
    </style>
@endpush
