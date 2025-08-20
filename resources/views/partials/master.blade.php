{{-- 
===========================================
FILE: resources/views/partials/master.blade.php
DESKRIPSI: Layout Master untuk semua halaman Blade
===========================================
--}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Kampung Dalam - Website Resmi Desa')</title>
    <meta name="description" content="@yield('description', 'Website resmi Desa Kampung Dalam, Kecamatan Siak, Kabupaten Siak, Provinsi Riau. Informasi layanan, berita, dan profil desa.')">
    <meta name="keywords" content="@yield('keywords', 'kampung dalam, desa, siak, riau, layanan desa, berita desa, profil desa')">
    <meta name="author" content="Pemerintah Desa Kampung Dalam">
    {{-- Open Graph / Facebook  --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Kampung Dalam - Website Resmi Desa')">
    <meta property="og:description" content="@yield('description', 'Website resmi Desa Kampung Dalam, Kecamatan Siak, Kabupaten Siak, Provinsi Riau.')">
    <meta property="og:image" content="{{ asset('Lambang_Kabupaten_Siak.png') }}">
    {{-- Twitter  --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'Kampung Dalam - Website Resmi Desa')">
    <meta property="twitter:description" content="@yield('description', 'Website resmi Desa Kampung Dalam, Kecamatan Siak, Kabupaten Siak, Provinsi Riau.')">
    <meta property="twitter:image" content="{{ asset('Lambang_Kabupaten_Siak.png') }}">
    {{-- Favicons  --}}
    <link href="{{ asset('Lambang_Kabupaten_Siak.png') }}" rel="icon">
    <link href="{{ asset('Lambang_Kabupaten_Siak.png') }}" rel="apple-touch-icon">
    {{-- Fonts  --}}
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- Vendor CSS Files  --}}
    <link href="{{ asset('fe/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    {{-- Main CSS File  --}}
    <link href="{{ asset('fe/assets/css/main.css') }}" rel="stylesheet">
    {{-- Custom Styles  --}}
    @stack('styles')

    {{-- FIXED: Enhanced Preloader Styles with centered rings - Moved to head  --}}
    <style>
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 9999;
            overflow: hidden;
            /* background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 50%, #059669 100%); */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .preloader-content {
            text-align: center;
            color: white;
            position: relative;
        }

        .preloader-logo {
            position: relative;
            margin-bottom: 2rem;
            display: inline-block;
        }

        .preloader-logo-img {
            width: 80px;
            height: 95px;
            position: relative;
            z-index: 2;
        }

        .preloader-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 120px;
            height: 140px;
            background: radial-gradient(circle, rgba(96, 165, 250, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            animation: glowPulse 2s ease-in-out infinite alternate;
        }

        /* FIXED: Centered spinner rings */
        .preloader-spinner {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto 6rem;
        }

        .spinner-ring {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 3px solid transparent;
            border-top: 3px solid rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            animation: spinRing 1.5s linear infinite;
        }

        .spinner-ring:nth-child(1) {
            width: 100px;
            height: 100px;
        }

        .spinner-ring:nth-child(2) {
            width: 80px;
            height: 80px;
            border-top-color: rgba(96, 165, 250, 0.8);
            animation-duration: 2s;
            animation-direction: reverse;
        }

        .spinner-ring:nth-child(3) {
            width: 60px;
            height: 60px;
            border-top-color: rgba(52, 211, 153, 0.8);
            animation-duration: 2.5s;
        }

        .preloader-text h4 {
            font-size: 2rem;
            font-weight: 600;
            margin: 0;
            letter-spacing: -0.025em;
            color: #000;
            /* background: linear-gradient(135deg, #ffffff 0%, #60a5fa 100%); */
            /* -webkit-background-clip: text; */
            /* -webkit-text-fill-color: transparent; */
            background-clip: text;
            animation: textFade 2s ease-in-out infinite alternate;
        }

        @keyframes glowPulse {
            0% {
                opacity: 0.3;
                transform: translate(-50%, -50%) scale(1);
            }

            100% {
                opacity: 0.6;
                transform: translate(-50%, -50%) scale(1.1);
            }
        }

        @keyframes spinRing {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes textFade {
            0% {
                opacity: 0.7;
            }

            100% {
                opacity: 1;
            }
        }

        /* Enhanced Scroll Top Button */
        #scroll-top {
            position: fixed;
            visibility: hidden;
            opacity: 0;
            right: 20px;
            bottom: 20px;
            z-index: 99999;
            background: linear-gradient(135deg, #1e40af 0%, #059669 100%);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 20px rgba(30, 64, 175, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        #scroll-top:hover {
            background: linear-gradient(135deg, #059669 0%, #1e40af 100%);
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 12px 30px rgba(30, 64, 175, 0.4);
            border-color: rgba(255, 255, 255, 0.4);
        }

        #scroll-top.active {
            visibility: visible;
            opacity: 1;
        }

        #scroll-top i {
            font-size: 24px;
            color: white;
            transition: transform 0.3s ease;
        }

        #scroll-top:hover i {
            transform: translateY(-2px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .preloader-logo-img {
                width: 60px;
                height: 75px;
            }

            .preloader-glow {
                width: 100px;
                height: 120px;
            }

            .preloader-spinner {
                width: 80px;
                height: 80px;
            }

            .spinner-ring:nth-child(1) {
                width: 80px;
                height: 80px;
            }

            .spinner-ring:nth-child(2) {
                width: 64px;
                height: 64px;
            }

            .spinner-ring:nth-child(3) {
                width: 48px;
                height: 48px;
            }

            .preloader-text h4 {
                font-size: 1.3rem;
            }

            #scroll-top {
                width: 45px;
                height: 45px;
                right: 15px;
                bottom: 15px;
            }

            #scroll-top i {
                font-size: 20px;
            }
        }
    </style>

    {{-- JSON-LD Structured Data  --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "GovernmentOrganization",
        "name": "Pemerintah Desa Kampung Dalam",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('Lambang_Kabupaten_Siak.png') }}",
        "description": "Website resmi Pemerintah Desa Kampung Dalam, Kecamatan Siak, Kabupaten Siak, Provinsi Riau",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jl. Raya Kampung Dalam",
            "addressLocality": "Siak",
            "addressRegion": "Riau",
            "postalCode": "28671",
            "addressCountry": "ID"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+62-761-123456",
            "contactType": "customer service",
            "email": "kampungdalam@siak.go.id"
        }
    }
    </script>
</head>

<body class="index-page">
    {{-- FIXED: Simplified Preloader with centered rings - Moved to top of body  --}}
    <div id="preloader">
        <div class="preloader-content">
            <div class="preloader-logo">
                <img src="{{ asset('Lambang_Kabupaten_Siak.png') }}" alt="Logo Siak" class="preloader-logo-img">
                <div class="preloader-glow"></div>
            </div>
            <div class="preloader-spinner">
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
            </div>
            <div class="preloader-text">
                <h4>Kampung Dalam</h4>
            </div>
        </div>
    </div>

    @include('partials.header')

    <main class="main">
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Scroll Top  --}}
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    {{-- Vendor JS Files  --}}
    <script src="{{ asset('fe/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    {{-- Main JS File  --}}
    <script src="{{ asset('fe/assets/js/main.js') }}"></script>
    {{-- Custom Scripts  --}}
    @stack('scripts')
    {{-- Performance and Analytics  --}}
    <script>
        // Enhanced page loading performance
        window.addEventListener('load', function() {
            // Hide preloader with smooth animation
            const preloader = document.getElementById('preloader');
            if (preloader) {
                // Add fade out animation
                preloader.style.opacity = '0';
                preloader.style.transition = 'opacity 0.8s ease';
                setTimeout(() => {
                    preloader.style.display = 'none';
                }, 800);
            }
            // Initialize AOS with custom settings
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-in-out-sine',
                    delay: 100,
                    once: true,
                    mirror: false
                });
            }
            // Enhanced scroll top button
            const scrollTop = document.getElementById('scroll-top');
            if (scrollTop) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 100) {
                        scrollTop.classList.add('active');
                    } else {
                        scrollTop.classList.remove('active');
                    }
                });
                scrollTop.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
            // Lazy loading for images
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            if (img.dataset.src) {
                                img.src = img.dataset.src;
                                img.classList.remove('lazy');
                                imageObserver.unobserve(img);
                            }
                        }
                    });
                });
                document.querySelectorAll('img[data-src]').forEach(img => {
                    imageObserver.observe(img);
                });
            }
            // Performance monitoring
            if ('performance' in window) {
                const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
                console.log('Page load time:', loadTime + 'ms');
                // Send to analytics if needed
                if (loadTime > 3000) {
                    console.warn('Page load time is slow:', loadTime + 'ms');
                }
            }
        });
        // Service Worker for caching (optional)
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js')
                    .then(function(registration) {
                        console.log('SW registered: ', registration);
                    })
                    .catch(function(registrationError) {
                        console.log('SW registration failed: ', registrationError);
                    });
            });
        }
    </script>
</body>

</html>
