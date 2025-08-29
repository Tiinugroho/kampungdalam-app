<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <div class="logo-container">
                <img src="{{ asset('Lambang_Kabupaten_Siak.png') }}" alt="Logo Siak" class="logo-img">
                <div class="logo-glow"></div>
            </div>
            <div class="logo-text">
                <h1 class="sitename">KELURAHAN KAMPUNG DALAM</h1>
                <span class="sitename">KABUPATEN SIAK</span>
            </div>
        </a>

        <!-- Desktop Navigation -->
        <nav id="navmenu" class="navmenu d-flex d-lg-flex justify-content-center align-items-center mx-4">
            <ul>
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        Beranda
                    </a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <span>Profil Desa</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('vision-mission') }}">Visi & Misi</a></li>
                        <li><a href="{{ route('history') }}">Sejarah Desa</a></li>
                        <li><a href="{{ route('officials') }}">Perangkat Desa</a></li>
                        <li><a href="{{ route('organization-structure') }}">Struktur
                                Organisasi</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                Kontak
                            </a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <span>Informasi</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('news.index') }}">Berita</a></li>
                        <li><a href="{{ route('services') }}">Layanan</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('sgds') }}" class="{{ request()->routeIs('sgds') ? 'active' : '' }}">
                        <span>Data & Statistik</span>
                    </a></li>

                {{-- <li class="dropdown dropdown-hover-consistent dropdown-statistik">
                    <a href="#" class="dropdown-toggle">
                        <span>Data & Statistik</span>
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <div class="mega-menu-content">
                            <div class="mega-menu-column">
                                <h6>Statistik Umum</h6>
                                <li><a href="{{ route('statistics.index') }}">Statistik
                                        Desa</a></li>
                                <li><a href="{{ route('statistics.population') }}">Data
                                        Penduduk</a></li>
                            </div>
                            <div class="mega-menu-column">
                                <h6>Data Sosial</h6>
                                <li><a href="{{ route('statistics.education') }}">Data
                                        Pendidikan</a></li>
                                <li><a href="{{ route('statistics.occupation') }}">Data
                                        Pekerjaan</a></li>
                                <li><a href="{{ route('statistics.health') }}">Data
                                        Kesehatan</a></li>
                            </div>
                            <div class="mega-menu-column">
                                <h6>Data Ekonomi</h6>
                                <li><a href="{{ route('statistics.infrastructure') }}">
                                        Data Infrastruktur</a></li>
                                <li><a href="{{ route('statistics.economic') }}">
                                        Data Ekonomi</a></li>
                                <li><a href="{{ route('statistics.social') }}">Data
                                        Sosial</a></li>
                                <li><a href="{{ route('statistics.religion') }}">Data
                                        Agama</a></li>
                            </div>
                        </div>
                    </ul>
                </li> --}}

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <span>Potensi Desa</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('tourism') }}">Wisata</a></li>
                        <li><a href="http://umkm.kampungdalam.com/">UMKM</a></li>
                        <li><a href="{{ route('gallery') }}">Galeri</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        Produk Hukum
                    </a></li>
            </ul>
        </nav>

        <!-- Header Actions - Moved to the right -->
        <div class="header-actions d-flex align-items-center">
            <!-- Search Button for Desktop -->
            {{-- <button type="button" class="search-toggle btn btn-outline-primary d-none d-md-flex" data-bs-toggle="modal"
                data-bs-target="#searchModal">
                <i class="bi bi-search"></i>
            </button> --}}

            <!-- Mobile Navigation Toggle - FIXED: Clean class structure -->
            <button class="mobile-nav-toggle d-lg-none" type="button">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="mobile-nav-menu">
        <div class="mobile-nav-header">
            <div class="mobile-logo">
                <img src="{{ asset('Lambang_Kabupaten_Siak.png') }}" alt="Logo Siak" class="mobile-logo-img">
                <span class="mobile-sitename">Kampung Dalam</span>
            </div>
            <button class="mobile-nav-close">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="mobile-nav-content">
            <ul class="mobile-nav-list">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="bi bi-house-door"></i> Beranda
                    </a></li>

                <li class="mobile-dropdown">
                    <a href="#" class="mobile-dropdown-toggle">
                        <i class="bi bi-info-circle"></i>
                        <span>Profil Desa</span>
                        <i class="mobile-toggle-icon"></i>
                    </a>
                    <ul class="mobile-dropdown-menu">
                        <li><a href="{{ route('about') }}"><i class="bi bi-building"></i> Tentang Kami</a></li>
                        <li><a href="{{ route('history') }}"><i class="bi bi-clock-history"></i> Sejarah</a></li>
                        <li><a href="{{ route('vision-mission') }}"><i class="bi bi-eye"></i> Visi & Misi</a></li>
                        <li><a href="{{ route('officials') }}"><i class="bi bi-people"></i> Perangkat Desa</a></li>
                        <li><a href="{{ route('organization-structure') }}"><i class="bi bi-diagram-3"></i> Struktur
                                Organisasi</a></li>
                    </ul>
                </li>

                <li class="mobile-dropdown">
                    <a href="#" class="mobile-dropdown-toggle">
                        <i class="bi bi-newspaper"></i>
                        <span>Informasi</span>
                        <i class="mobile-toggle-icon"></i>
                    </a>
                    <ul class="mobile-dropdown-menu">
                        <li><a href="{{ route('news.index') }}"><i class="bi bi-newspaper"></i> Berita</a></li>
                        <li><a href="{{ route('services') }}"><i class="bi bi-gear"></i> Layanan</a></li>
                        <li><a href="{{ route('faq') }}"><i class="bi bi-question-circle"></i> FAQ</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('sgds') }}" class="{{ request()->routeIs('sgds') ? 'active' : '' }}">
                        <i class="bi bi-house-door"></i> Data & Statistik
                    </a></li>

                <li class="mobile-dropdown">
                    <a href="#" class="mobile-dropdown-toggle">
                        <i class="bi bi-gem"></i>
                        <span>Potensi Desa</span>
                        <i class="mobile-toggle-icon"></i>
                    </a>
                    <ul class="mobile-dropdown-menu">
                        <li><a href="{{ route('tourism') }}"><i class="bi bi-camera"></i> Wisata</a></li>
                        <li><a href="{{ route('umkm') }}"><i class="bi bi-shop"></i> UMKM</a></li>
                        <li><a href="{{ route('gallery') }}"><i class="bi bi-images"></i> Galeri</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        <i class="bi bi-telephone"></i> Kontak
                    </a></li>
            </ul>

        </div>
    </div>

    <!-- Mobile Navigation Overlay -->
    <div class="mobile-nav-overlay"></div>
</header>

<style>
    /* FIXED: Modern Header Styles - Responsive Mobile Design */
    .header {
        color: white;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(0px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1000;
        box-shadow: none;
        border-bottom: 1px solid transparent;
        padding: 0.75rem 0;
    }

    /* Scrolled state with proper blur and white background */
    .header.scrolled {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
    }

    .header.scrolled .sitename,
    .header.scrolled .tagline,
    .header.scrolled .navmenu a {
        color: var(--neutral-gray-900);
    }

    .header.scrolled .logo-img {
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.1));
    }

    /* Logo Styles - Responsive */
    .logo {
        text-decoration: none;
        transition: transform 0.3s ease;
        flex-shrink: 0;
    }

    /* .logo:hover {
        transform: translateY(-2px);
    } */

    .logo-container {
        position: relative;
        margin-right: 0.75rem;
    }

    .logo-img {
        width: 50px;
        height: 60px;
        transition: all 0.3s ease;
        /* filter: drop-shadow(0 4px 8px rgba(255, 255, 255, 0.3)); */
    }

    /* .logo:hover .logo-img {
        transform: scale(1.05);
        filter: drop-shadow(0 6px 12px rgba(255, 255, 255, 0.4));
    } */

    .logo-glow {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 70px;
        height: 80px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .logo:hover .logo-glow {
        opacity: 1;
    }

    .logo-text {
        display: flex;
        flex-direction: column;
    }

    .logo-text h1 {
        color: white;
        font-size: 1rem;
        margin: 0;
        font-weight: 600;
        letter-spacing: -0.025em;
        transition: color 0.3s ease;
        line-height: 1.2;
    }

    .logo-text span {
        color: white;
        font-size: 1rem;
        margin: 0;
        letter-spacing: -0.025em;
        transition: color 0.3s ease;
        line-height: 1.2;
    }

    .tagline {
        font-size: 0.7rem;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
        margin-top: -2px;
        letter-spacing: 0.025em;
        transition: color 0.3s ease;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    /* FIXED: Header Actions - Properly positioned on the right */
    .header .container-fluid {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-left: auto;
        /* Force to right */
        order: 3;
        /* Ensure it's last */
    }

    /* FIXED: Modern Hamburger Menu - Now properly positioned on the right */
    .mobile-nav-toggle {
        background: none;
        border: none;
        padding: 8px;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 8px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 1001;
        margin-left: 0.5rem;
        /* Add small margin from search button */
    }

    .mobile-nav-toggle:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    .header.scrolled .mobile-nav-toggle:hover {
        background: rgba(59, 130, 246, 0.1);
    }

    /* FIXED: Hamburger Animation - More Reliable Reset */
    .hamburger-line {
        width: 24px;
        height: 2px;
        background: white;
        margin: 2px 0;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 2px;
        transform-origin: center;
        position: relative;
    }

    .header.scrolled .hamburger-line {
        background: var(--primary-blue);
    }

    /* Default state - explicitly defined */
    .mobile-nav-toggle .hamburger-line:nth-child(1) {
        transform: rotate(0deg) translate(0px, 0px);
    }

    .mobile-nav-toggle .hamburger-line:nth-child(2) {
        opacity: 1;
        transform: scaleX(1);
    }

    .mobile-nav-toggle .hamburger-line:nth-child(3) {
        transform: rotate(0deg) translate(0px, 0px);
    }

    /* Active state - X formation */
    .mobile-nav-toggle.active .hamburger-line:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .mobile-nav-toggle.active .hamburger-line:nth-child(2) {
        opacity: 0;
        transform: scaleX(0);
    }

    .mobile-nav-toggle.active .hamburger-line:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }

    /* Force reset when not active */
    .mobile-nav-toggle:not(.active) .hamburger-line:nth-child(1) {
        transform: rotate(0deg) translate(0px, 0px) !important;
        animation: resetLine1 0.3s ease-out forwards;
    }

    .mobile-nav-toggle:not(.active) .hamburger-line:nth-child(2) {
        opacity: 1 !important;
        transform: scaleX(1) !important;
        animation: resetLine2 0.3s ease-out forwards;
    }

    .mobile-nav-toggle:not(.active) .hamburger-line:nth-child(3) {
        transform: rotate(0deg) translate(0px, 0px) !important;
        animation: resetLine3 0.3s ease-out forwards;
    }

    /* Reset animations */
    @keyframes resetLine1 {
        0% {
            transform: rotate(45deg) translate(5px, 5px);
        }

        100% {
            transform: rotate(0deg) translate(0px, 0px);
        }
    }

    @keyframes resetLine2 {
        0% {
            opacity: 0;
            transform: scaleX(0);
        }

        100% {
            opacity: 1;
            transform: scaleX(1);
        }
    }

    @keyframes resetLine3 {
        0% {
            transform: rotate(-45deg) translate(7px, -6px);
        }

        100% {
            transform: rotate(0deg) translate(0px, 0px);
        }
    }

    /* Desktop Navigation Styles */
    .navmenu ul {
        margin: 0;
        margin-left: 4rem;
        padding: 0;
        list-style: none;
        display: flex;
        align-items: center;
        gap: .5rem;
    }

    .navmenu li {
        position: relative;
    }

    .navmenu a {
        color: white;
        text-decoration: none;
        /* font-weight: 600; */
        padding: 10px 14px;
        border-radius: 10px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 1rem;
        position: relative;
        overflow: hidden;
        /* text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2); */
    }

    .navmenu a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        /* background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent); */
        transition: left 0.5s ease;
    }

    .navmenu a:hover::before {
        left: 100%;
    }

    .navmenu a:hover,
    .navmenu a.active {
        color: white;
        background: rgba(255, 255, 255, 0.15);
        /* box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); */
        /* backdrop-filter: blur(10px); */
    }

    .header.scrolled .navmenu a:hover,
    .header.scrolled .navmenu a.active {
        color: var(--primary-blue);
        /* background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%); */
    }

    .navmenu a i {
        font-size: 0.9rem;
    }

    /* Dropdown Styles */
    .navmenu .dropdown ul {
        position: absolute;
        top: 100%;
        left: 0;
        /* background: rgba(255, 255, 255, 0.98); */
        /* backdrop-filter: blur(20px); */
        /* box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15); */
        border-radius: 16px;
        padding: 1rem 0;
        min-width: 280px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1000;
        flex-direction: column;
        border: 1px solid rgba(59, 130, 246, 0.1);
    }

    .navmenu .dropdown:hover ul {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .navmenu .dropdown ul li {
        margin: 0;
        width: 100%;
    }

    .navmenu .dropdown ul a {
        padding: 12px 24px;
        color: var(--neutral-gray-700);
        border-radius: 0;
        background: none;
        width: 100%;
        justify-content: flex-start;
        font-weight: 500;
        transition: all 0.3s ease;
        transform: none;
        box-shadow: none;
        text-shadow: none;
    }

    .navmenu .dropdown ul a:hover {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
        color: var(--primary-blue);
        transform: none;
        box-shadow: none;
    }

    /* Mega Menu */
    .mega-menu {
        min-width: 100%;
    }

    .mega-menu-content {
        display: flex;
        gap: 2rem;
        padding: 1rem;
    }

    .mega-menu-column {
        flex: 1;
    }

    .mega-menu-column h6 {
        color: var(--primary-blue);
        font-weight: 700;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid rgba(59, 130, 246, 0.2);
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    /* Search Button */
    .search-toggle {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        background: rgba(255, 255, 255, 0.1);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(10px);
        order: 1;
        /* Ensures it comes before hamburger */
    }

    .header.scrolled .search-toggle {
        border-color: rgba(59, 130, 246, 0.2);
        background: rgba(59, 130, 246, 0.05);
        color: var(--primary-blue);
    }

    .search-toggle::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .search-toggle:hover::before {
        left: 100%;
    }

    .search-toggle:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .header.scrolled .search-toggle:hover {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--success-green) 100%);
        color: white;
        border-color: transparent;
    }

    /* FIXED: Mobile Navigation Menu */
    .mobile-nav-menu {
        position: fixed;
        top: 0;
        right: -100%;
        width: 320px;
        height: 100vh;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 9999;
        box-shadow: -10px 0 30px rgba(0, 0, 0, 0.1);
        border-left: 1px solid rgba(0, 0, 0, 0.05);
        overflow-y: auto;
    }

    .mobile-nav-menu.active {
        right: 0;
    }

    .mobile-nav-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 9998;
    }

    .mobile-nav-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    /* FIXED: Mobile Navigation Header */
    .mobile-nav-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.05) 0%, rgba(5, 150, 105, 0.05) 100%);
    }

    .mobile-logo {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .mobile-logo-img {
        width: 40px;
        height: 48px;
    }

    .mobile-sitename {
        /* font-size: .5rem; */
        font-weight: 800;
        color: var(--primary-blue);
        letter-spacing: -0.025em;
    }

    /* FIXED: Mobile Navigation Close Button */
    .mobile-nav-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        color: var(--neutral-gray-600);
        cursor: pointer;
        padding: 8px;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
    }

    .mobile-nav-close:hover {
        background: rgba(59, 130, 246, 0.1);
        color: var(--primary-blue);
        transform: scale(1.1);
    }

    .mobile-nav-close i {
        font-size: 1.2rem;
    }

    .mobile-nav-content {
        padding: 1.5rem;
    }

    .mobile-nav-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .mobile-nav-list>li {
        margin-bottom: 0.5rem;
    }

    .mobile-nav-list>li>a {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        color: var(--neutral-gray-700);
        text-decoration: none;
        font-weight: 600;
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .mobile-nav-list>li>a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .mobile-nav-list>li>a:hover::before {
        left: 100%;
    }

    .mobile-nav-list>li>a:hover,
    .mobile-nav-list>li>a.active {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
        color: var(--primary-blue);
        transform: translateX(4px);
    }

    .mobile-nav-list>li>a i {
        font-size: 1.1rem;
        width: 20px;
        text-align: center;
    }

    /* Mobile Dropdown */
    .mobile-dropdown-toggle {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding: 1rem;
        color: var(--neutral-gray-700);
        text-decoration: none;
        font-weight: 600;
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .mobile-dropdown-toggle:hover {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
        color: var(--primary-blue);
    }

    .mobile-toggle-icon {
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .mobile-dropdown.active .mobile-toggle-icon {
        transform: rotate(180deg);
    }

    .mobile-dropdown-menu {
        list-style: none;
        padding: 0;
        margin: 0;
        max-height: 0;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        background: rgba(59, 130, 246, 0.02);
        border-radius: 0 0 12px 12px;
        margin-top: -12px;
        padding-top: 12px;
    }

    .mobile-dropdown.active .mobile-dropdown-menu {
        max-height: 500px;
        padding-bottom: 0.5rem;
    }

    .mobile-dropdown-menu li {
        margin: 0;
    }

    .mobile-dropdown-menu a {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1rem 0.75rem 2rem;
        color: var(--neutral-gray-600);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        border-radius: 8px;
        margin: 0 0.5rem;
        transition: all 0.3s ease;
    }

    .mobile-dropdown-menu a:hover {
        background: rgba(59, 130, 246, 0.1);
        color: var(--primary-blue);
        transform: translateX(4px);
    }

    .mobile-dropdown-menu a i {
        font-size: 0.9rem;
        width: 16px;
        text-align: center;
    }

    /* Mobile Search */
    .mobile-search-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--success-green) 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .mobile-search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
    }

    /* Search Modal */
    .search-modal {
        border: none;
        border-radius: 20px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(20px);
    }

    .search-modal .modal-header {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
        border-radius: 20px 20px 0 0;
        padding: 1.5rem 2rem;
    }

    .search-modal .modal-title {
        color: var(--primary-blue);
        font-weight: 700;
        font-size: 1.2rem;
    }

    .search-input-wrapper {
        position: relative;
        margin-bottom: 1rem;
    }

    .search-input-modal {
        border: 2px solid rgba(59, 130, 246, 0.2);
        border-radius: 16px;
        padding: 16px 60px 16px 20px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        background: rgba(59, 130, 246, 0.02);
    }

    .search-input-modal:focus {
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        background: white;
    }

    .search-btn-modal {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--success-green) 100%);
        border: none;
        color: white;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .search-btn-modal:hover {
        transform: translateY(-50%) scale(1.05);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .suggestion-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .suggestion-tag {
        background: rgba(59, 130, 246, 0.1);
        color: var(--primary-blue);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .suggestion-tag:hover {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--success-green) 100%);
        color: white;
        transform: translateY(-2px);
    }

    /* Responsive Design */
    @media (max-width: 991px) {
        .header {
            padding: 0.5rem 0;
        }

        .sitename {
            font-size: 1.1rem;
        }

        .logo-img {
            width: 45px;
            height: 55px;
        }

        .mobile-nav-menu {
            width: 280px;
        }
    }

    @media (max-width: 576px) {
        .header {
            padding: 0.5rem 0;
        }

        .sitename {
            font-size: 1rem;
        }

        .logo-img {
            width: 40px;
            height: 50px;
        }

        .logo-container {
            margin-right: 0.5rem;
        }

        .mobile-nav-menu {
            width: 100%;
            right: -100%;
        }

        .mobile-nav-menu.active {
            right: 0;
        }

        .mobile-nav-content {
            padding: 1rem;
        }

        .mobile-nav-header {
            padding: 1rem;
        }
    }

    /* Fix for body scroll when mobile menu is open */
    body.mobile-nav-open {
        overflow: hidden;
    }

    /* CSS Variables - Add these to your main CSS file */
    :root {
        --primary-blue: #3b82f6;
        --success-green: #059669;
        --neutral-gray-600: #6b7280;
        --neutral-gray-700: #374151;
        --neutral-gray-900: #111827;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile navigation elements
        const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
        const mobileNavMenu = document.querySelector('.mobile-nav-menu');
        const mobileNavOverlay = document.querySelector('.mobile-nav-overlay');
        const mobileNavClose = document.querySelector('.mobile-nav-close');
        const body = document.body;

        // Clean body classes function - NEW
        function cleanBodyClasses() {
            const classesToRemove = [
                'mobile-nav-active',
                'mobile-menu-active',
                'nav-active',
                'menu-open',
                'mobile-open'
            ];

            classesToRemove.forEach(className => {
                body.classList.remove(className);
            });

            console.log('Body classes after clean:', body.className); // Debug log
        }

        // Store original classes
        const originalClasses = mobileNavToggle ? mobileNavToggle.className : '';

        // Mobile navigation toggle - COMPLETELY FIXED
        if (mobileNavToggle) {
            mobileNavToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                console.log('Hamburger clicked'); // Debug log
                console.log('Current classes:', this.className); // Debug log

                // Check current state
                const isActive = this.classList.contains('active');

                if (isActive) {
                    // If currently active, close the menu
                    closeMobileNav();
                } else {
                    // If not active, open the menu
                    openMobileNav();
                }
            });
        }

        // Open mobile nav function
        function openMobileNav() {
            console.log('Opening mobile nav'); // Debug log

            // Clean body classes first
            cleanBodyClasses();

            if (mobileNavToggle) {
                // Clean all classes first, then add only what we need
                cleanHamburgerClasses();
                mobileNavToggle.classList.add('active');
            }
            if (mobileNavMenu) mobileNavMenu.classList.add('active');
            if (mobileNavOverlay) mobileNavOverlay.classList.add('active');

            // Only add our specific class
            body.classList.add('mobile-nav-open');
        }

        // Close mobile nav function - COMPLETELY FIXED
        function closeMobileNav() {
            console.log('Closing mobile nav'); // Debug log

            // Clean body classes first
            cleanBodyClasses();

            // Remove active classes
            if (mobileNavToggle) {
                // Clean all unwanted classes and keep only original ones
                cleanHamburgerClasses();
                console.log('Classes after clean:', mobileNavToggle.className); // Debug log
            }
            if (mobileNavMenu) {
                mobileNavMenu.classList.remove('active');
            }
            if (mobileNavOverlay) {
                mobileNavOverlay.classList.remove('active');
            }

            // Remove our specific class
            body.classList.remove('mobile-nav-open');

            // Force DOM reflow to ensure CSS transitions work
            if (mobileNavToggle) {
                // Force reflow by accessing offsetHeight
                void mobileNavToggle.offsetHeight;

                // Double-check and force reset hamburger lines
                const hamburgerLines = mobileNavToggle.querySelectorAll('.hamburger-line');
                hamburgerLines.forEach((line, index) => {
                    line.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';

                    if (index === 0) {
                        line.style.transform = 'rotate(0deg) translate(0px, 0px)';
                    } else if (index === 1) {
                        line.style.opacity = '1';
                        line.style.transform = 'scaleX(1)';
                    } else if (index === 2) {
                        line.style.transform = 'rotate(0deg) translate(0px, 0px)';
                    }
                });

                // Clear inline styles after animation completes
                setTimeout(() => {
                    hamburgerLines.forEach(line => {
                        line.style.transform = '';
                        line.style.opacity = '';
                    });
                }, 300);
            }
        }

        // Function to clean hamburger classes - NEW
        function cleanHamburgerClasses() {
            if (!mobileNavToggle) return;

            // List of classes that should be removed
            const classesToRemove = [
                'active',
                'bi-list',
                'bi-x',
                'bi-x-lg',
                'mobile-nav-active',
                'show'
            ];

            // Remove unwanted classes
            classesToRemove.forEach(className => {
                mobileNavToggle.classList.remove(className);
            });

            // Ensure we have the basic required classes
            const requiredClasses = ['mobile-nav-toggle', 'd-lg-none'];
            requiredClasses.forEach(className => {
                if (!mobileNavToggle.classList.contains(className)) {
                    mobileNavToggle.classList.add(className);
                }
            });

            console.log('Cleaned classes:', mobileNavToggle.className); // Debug log
        }

        // Close button - FIXED
        if (mobileNavClose) {
            mobileNavClose.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Close button clicked'); // Debug log
                closeMobileNav();
            });
        }

        // Overlay click
        if (mobileNavOverlay) {
            mobileNavOverlay.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Overlay clicked'); // Debug log
                closeMobileNav();
            });
        }

        // Close mobile nav when clicking on a link (not dropdown toggles)
        document.querySelectorAll('.mobile-nav-list a:not(.mobile-dropdown-toggle)').forEach(link => {
            link.addEventListener('click', function() {
                console.log('Nav link clicked'); // Debug log
                closeMobileNav();
            });
        });

        // Mobile dropdown toggle
        document.querySelectorAll('.mobile-dropdown-toggle').forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const dropdown = this.closest('.mobile-dropdown');
                const isActive = dropdown.classList.contains('active');

                console.log('Dropdown toggle clicked', isActive); // Debug log

                // Close all other dropdowns
                document.querySelectorAll('.mobile-dropdown').forEach(otherDropdown => {
                    if (otherDropdown !== dropdown) {
                        otherDropdown.classList.remove('active');
                    }
                });

                // Toggle current dropdown
                dropdown.classList.toggle('active');
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Desktop dropdown toggle for mobile view
        document.querySelectorAll('.toggle-dropdown').forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                if (window.innerWidth < 992) {
                    e.preventDefault();
                    const dropdown = this.closest('.dropdown');
                    dropdown.classList.toggle('active');

                    if (dropdown.classList.contains('active')) {
                        this.classList.remove('bi-chevron-down');
                        this.classList.add('bi-chevron-up');
                    } else {
                        this.classList.remove('bi-chevron-up');
                        this.classList.add('bi-chevron-down');
                    }
                }
            });
        });

        // Search suggestions
        document.querySelectorAll('.suggestion-tag').forEach(tag => {
            tag.addEventListener('click', function() {
                const searchInput = document.querySelector('.search-input-modal');
                if (searchInput) {
                    searchInput.value = this.textContent;
                    searchInput.focus();
                }
            });
        });

        // Close mobile nav on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992) {
                closeMobileNav();
            }
        });

        // Close mobile nav on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeMobileNav();
            }
        });

        // Clean classes on page load - NEW
        if (mobileNavToggle) {
            cleanHamburgerClasses();
        }

        // Prevent other scripts from adding unwanted classes - NEW
        if (mobileNavToggle) {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        const currentClasses = mobileNavToggle.className;

                        // Check if unwanted classes were added
                        if (currentClasses.includes('bi-list') ||
                            currentClasses.includes('bi-x') ||
                            (currentClasses.includes('active') && !mobileNavMenu.classList
                                .contains('active'))) {

                            console.log('Unwanted classes detected, cleaning...'); // Debug log

                            // Only clean if menu is not supposed to be active
                            if (!mobileNavMenu.classList.contains('active')) {
                                cleanHamburgerClasses();
                            }
                        }
                    }
                });
            });

            observer.observe(mobileNavToggle, {
                attributes: true,
                attributeFilter: ['class']
            });
        }

        // Monitor and clean body classes - NEW
        const bodyClassObserver = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    const currentClasses = body.className;

                    // Check if unwanted classes were added
                    if (currentClasses.includes('mobile-nav-active') ||
                        currentClasses.includes('mobile-menu-active') ||
                        currentClasses.includes('nav-active')) {

                        console.log('Unwanted body classes detected, cleaning...'); // Debug log

                        // Only clean if menu is not supposed to be active
                        if (!mobileNavMenu.classList.contains('active')) {
                            cleanBodyClasses();
                        }
                    }
                }
            });
        });

        bodyClassObserver.observe(body, {
            attributes: true,
            attributeFilter: ['class']
        });

        // Prevent body scroll when mobile menu is open
        const bodyObserver = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    if (body.classList.contains('mobile-nav-open')) {
                        body.style.overflow = 'hidden';
                    } else {
                        body.style.overflow = '';
                    }
                }
            });
        });

        bodyObserver.observe(body, {
            attributes: true,
            attributeFilter: ['class']
        });

        // Clean all classes on page load - NEW
        if (mobileNavToggle) {
            cleanHamburgerClasses();
        }
        cleanBodyClasses();


        const dropdowns = document.querySelectorAll(".dropdown");

        dropdowns.forEach(dropdown => {
            dropdown.addEventListener("mouseenter", function() {
                const menu = dropdown.querySelector(".dropdown-menu");

                if (menu) {
                    // Reset posisi dulu
                    menu.style.left = "";
                    menu.style.right = "";

                    const rect = menu.getBoundingClientRect();
                    const winWidth = window.innerWidth;

                    // Jika menu ada class khusus (paling kanan)
                    if (dropdown.classList.contains("dropdown-mega-right")) {
                        // Paksa menempel ke kanan container
                        menu.style.left = "auto";
                        menu.style.right = "0";
                    } else {
                        // Default: hanya geser kalau keluar layar
                        if (rect.right > winWidth) {
                            menu.style.right = "-50%";
                            menu.style.left = "auto";
                        }
                        if (rect.left < 0) {
                            menu.style.left = "0";
                            menu.style.right = "auto";
                        }
                    }
                }
            });
        });

    });
</script>
