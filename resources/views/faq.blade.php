{{-- 
===========================================
FILE: resources/views/faq.blade.php
DESKRIPSI: Halaman FAQ (Frequently Asked Questions)
ROUTE: /informasi/faq
===========================================
--}}

@extends('partials.master')

@section('title', 'FAQ - Kampung Dalam')
@section('description', 'Pertanyaan yang sering diajukan seputar Desa Kampung Dalam dan layanan yang tersedia.')

@section('content')
    {{-- Hero Section --}}
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div> {{-- Ganti dengan gambar hero FAQ --}}
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Pertanyaan Umum (FAQ)</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Temukan jawaban atas pertanyaan yang sering diajukan seputar Desa Kampung Dalam.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section id="faq" class="faq section bg-light">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    @if ($faqs->isEmpty())
                        <div class="text-center py-5">
                            <i class="bi bi-question-circle display-1 text-muted"></i>
                            <h3 class="mt-3 text-muted">Belum ada pertanyaan umum yang tersedia.</h3>
                            <p class="text-muted">Silakan cek kembali nanti.</p>
                        </div>
                    @else
                        <div class="accordion accordion-flush" id="faqAccordion">
                            @foreach ($faqs as $category => $faqList)
                                <h3 style="text-transform: capitalize">{{ $category }}</h3>
                                @foreach ($faqList as $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}"
                                                aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                                {{ $faq->question }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                {!! $faq->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                        </div>
                    @endif
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

        /* FAQ Page Styles */
        .search-box {
            background: white;
            padding: 3rem;
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .search-input-group {
            position: relative;
            max-width: 500px;
            margin: 0 auto 1rem;
        }

        .search-input {
            width: 100%;
            padding: 1.25rem 4rem 1.25rem 2rem;
            border: 2px solid #e5e7eb;
            border-radius: 25px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
            outline: none;
        }

        .search-btn {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .search-btn:hover {
            background: #2563eb;
        }

        .search-help {
            color: #6b7280;
            margin: 0;
            font-style: italic;
        }

        .category-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .category-card:hover {
            transform: translateY(-10px);
            border-color: #3b82f6;
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.2);
        }

        .category-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
            transition: transform 0.3s ease;
        }

        .category-card:hover .category-icon {
            transform: scale(1.1);
        }

        .category-card h4 {
            color: #1f2937;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .category-card p {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .question-count {
            background: #e0f2fe;
            color: #0369a1;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .faq-category-section {
            margin-bottom: 4rem;
        }

        .category-title {
            color: #1f2937;
            font-weight: 700;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid #3b82f6;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.8rem;
        }

        .category-title i {
            color: #3b82f6;
        }

        .faq-item {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            border-bottom: 1px solid #e2e8f0;
        }

        .faq-item:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .faq-question {
            padding: 1rem 0;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: #333;
            border-bottom: 1px solid #f3f4f6;
        }

        .faq-question:hover {
            background: #f8fafc;
        }

        .faq-question h5 {
            color: #1f2937;
            font-weight: 700;
            margin: 0;
            font-size: 1.2rem;
            flex-grow: 1;
            padding-right: 1rem;
        }

        .faq-question i {
            color: #3b82f6;
            font-size: 1.2rem;
            transition: transform 0.3s ease-in-out;
        }

        .faq-question.active i {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding-bottom: 1rem;
            color: #555;
            display: none;
        }

        .faq-answer.active {
            display: block;
        }

        .cta-card {
            background: white;
            padding: 4rem 3rem;
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .cta-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            color: white;
            font-size: 2.5rem;
        }

        .cta-card h3 {
            color: #1f2937;
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 2rem;
        }

        .cta-card p {
            color: #6b7280;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2.5rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .cta-btn {
            padding: 1.25rem 2.5rem;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
        }

        .cta-btn.primary {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
        }

        .cta-btn.primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
            color: white;
        }

        .cta-btn.secondary {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .cta-btn.secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4);
            color: white;
        }

        /* Search functionality styles */
        .faq-item.hidden {
            display: none;
        }

        .faq-category-section.hidden {
            display: none;
        }

        .search-highlight {
            background: #fef3c7;
            padding: 0.2rem 0.4rem;
            border-radius: 4px;
            font-weight: 600;
        }

        .no-results {
            text-align: center;
            padding: 4rem 2rem;
            color: #6b7280;
        }

        .no-results i {
            font-size: 4rem;
            color: #d1d5db;
            margin-bottom: 1rem;
        }

        .faq .accordion-item {
            margin-bottom: 15px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            overflow: hidden;
            transition: box-shadow 0.2s ease, transform 0.2s ease, background-color 0.2s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        }

        .faq .accordion-item:hover {
            background-color: #f8f9fa;
            /* warna abu-abu terang Bootstrap */
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
            transform: translateY(-3px);
        }

        .faq .accordion-button {
            background-color: #fff;
            color: var(--primary-color);
            font-weight: 600;
            padding: 18px 20px;
            border: none;
            font-size: 1.1rem;
            text-align: left;
            transition: all 0.3s ease;
        }

        .faq .accordion-button:not(.collapsed) {
            background-color: var(--primary-color);
            color: var(--primary-color);
            box-shadow: none;
        }

        .faq .accordion-button:focus {
            box-shadow: none;
            border-color: transparent;
        }

        .faq .accordion-body::focus {
            box-shadow: none;
            background: var(--primary-blue-light) border-color: transparent;
        }

        .faq .accordion-collapse .accordion-body {
            background-color: var(--primary-blue-light) !important;
            color: var(--neutral-white) !important;
            padding: 1rem;
            border: 2px solid var(--primary-color);
        }

        .faq .accordion-button::after {
            font-family: "bootstrap-icons";
            content: "\f282";
            /* down */
            font-size: 1.2rem;
            transition: transform 0.3s ease-in-out;
        }

        .faq .accordion-button:not(.collapsed)::after {
            transform: rotate(180deg);
        }


        .faq .accordion-body {
            padding: 20px;
            background-color: #fefefe;
            border-top: 1px solid var(--border-color);
            color: #555;
            line-height: 1.7;
        }

        .faq-section .accordion-item {
            margin-bottom: 15px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            overflow: hidden;

            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .faq-section .accordion-button {
            background-color: white;
            color: var(--primary-color);
            font-weight: 600;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .faq-section .accordion-button:not(.collapsed) {
            background-color: var(--primary-color);
            color: white;
            box-shadow: none;
        }

        .faq-section .accordion-button:not(.collapsed)::after {
            filter: brightness(0) invert(1);
            /* Invert arrow color for dark background */
        }

        .faq-section .accordion-body {
            padding: 1.5rem;
            background-color: #fdfdfd;
            color: var(--text-color);
            line-height: 1.7;
        }

        @media (max-width: 768px) {
            .search-box {
                padding: 2rem;
            }

            .search-input {
                padding: 1rem 3.5rem 1rem 1.5rem;
                font-size: 1rem;
            }

            .search-btn {
                width: 40px;
                height: 40px;
                right: 6px;
            }

            .category-card {
                padding: 2rem;
            }

            .category-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .category-title {
                font-size: 1.5rem;
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }

            .faq-question {
                padding: 1.5rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .faq-question h5 {
                font-size: 1.1rem;
                padding-right: 0;
            }

            .answer-content {
                padding: 1.5rem;
            }

            .cta-card {
                padding: 3rem 2rem;
            }

            .cta-card h3 {
                font-size: 1.5rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .cta-btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Search functionality (if implemented)
            const searchInput = document.getElementById(
                'faqSearch'); // Assuming you have a search input with this ID
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    document.querySelectorAll('#faqAccordion .accordion-item').forEach(item => {
                        const question = item.querySelector('.accordion-button').textContent
                            .toLowerCase();
                        const answer = item.querySelector('.accordion-body').textContent
                            .toLowerCase();
                        if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>
@endpush
