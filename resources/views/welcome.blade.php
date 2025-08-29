@extends('partials.master')

@section('title', 'Kampung Dalam - Website Resmi Desa')
@section('description',
    'Website resmi Desa Kampung Dalam, Kecamatan Siak, Kabupaten Siak, Provinsi Riau. Informasi
    layanan, berita, dan profil desa.')
@section('keywords', 'kampung dalam, desa, siak, riau, layanan desa, berita desa, profil desa')

@section('content')
    <!-- Hero Section with Typing Effect and Vector -->
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="row align-items-center" data-aos="zoom-out">
                <div class="col-lg-8">
                    <h1 class="hero-title">{{ $profile->village_name ?? 'Kampung Dalam' }}</h1>
                    <p class="hero-subtitle">Desa yang maju, mandiri, dan sejahtera di Kecamatan Siak, Kabupaten Siak,
                        Provinsi Riau</p>
                    <!-- Typing Effect Section -->
                    <div class="typing-container">
                        <div class="typing-text" id="typing-text"></div>
                        <div class="typing-cursor"></div>
                    </div>
                    <div class="hero-actions mt-4">
                        <a href="#vision-mission" class="btn-contact">Jelajahi Desa</a>
                        <a href="#contact" class="btn-contact">Hubungi Kami</a>
                    </div>
                </div>
                <!-- Vector Illustration -->

            </div>
            <!-- Statistics Cards -->
            <div class="row gy-4 mt-5 text-white">
                <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="100">
                    <div class="icon-box hover-lift">
                        <div class="icon icon-white" style="padding-top: 1.3rem;"><img
                                src="{{ asset('vector/Asset190.svg') }}" alt="" class="img-fluid"></div>
                        <h4 class="title">
                            <a href="#">Layanan Masyarakat asas</a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="200">
                    <div class="icon-box hover-lift">
                        <div class="icon icon-white" style="padding-top: 1.3rem;"><img
                                src="{{ asset('vector/Asset189.svg') }}" alt=""></div>
                        <h4 class="title">
                            <a href="#">Potensi Desa</a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="300">
                    <div class="icon-box hover-lift">
                        <div class="icon icon-white" style="padding-top: 1.3rem;"><img
                                src="{{ asset('vector/Asset187.svg') }}" alt=""></div>
                        <h4 class="title">
                            <a href="#">Pembangunan Desa</a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="400">
                    <div class="icon-box hover-lift">
                        <div class="icon icon-white" style="padding-top: 1.3rem;"><img
                                src="{{ asset('vector/Asset192.svg') }}" alt=""></div>
                        <h4 class="title">
                            <a href="#">Keuangan Desa</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Vision Mission Section -->
    <section id="vision-mission" class="vision-mission section">
        <div class="container section-title" data-aos="fade-up">
            <h2 class="section-heading">Visi & Misi</h2>
            <p class="section-subtitle">Komitmen kami untuk membangun Desa Kampung Dalam yang lebih baik</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="vision-card">
                        <div class="vision-icon">
                            <i class="bi bi-stickies-fill"></i>
                        </div>
                        <h3>Visi</h3>
                        <p>{{ $profile->vision ?? 'Mewujudkan Desa Kampung Dalam yang maju, mandiri, dan sejahtera berdasarkan nilai-nilai gotong royong dan kearifan lokal.' }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="mission-card">
                        <div class="mission-icon">
                            <i class="bi bi-crosshair2"></i>
                        </div>
                        <h3>Misi</h3>
                        <ul class="mission-list">
                            @if ($profile && $profile->mission)
                                @foreach (explode('.', $profile->mission) as $mission)
                                    @if (!empty(trim($mission)))
                                        <li>{{ trim($mission) }}</li>
                                    @endif
                                @endforeach
                            @else
                                <li>Meningkatkan kualitas pelayanan publik yang prima dan transparan</li>
                                <li>Mengembangkan potensi ekonomi masyarakat dan UMKM lokal</li>
                                <li>Melestarikan budaya dan kearifan lokal</li>
                                <li>Membangun infrastruktur yang berkelanjutan</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container section-title" data-aos="fade-up">
            <h2 class="section-heading">Tentang Desa</h2>
            <p class="section-subtitle">Mengenal lebih dekat Desa Kampung Dalam</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <p class="about-text">
                        {{ $profile->about ?? 'Desa Kampung Dalam adalah salah satu desa di Kecamatan Siak, Kabupaten Siak, Provinsi Riau yang memiliki potensi alam dan sumber daya manusia yang berkualitas.' }}
                    </p>
                    <ul class="feature-list">
                        <li class="feature-item"><i class="bi bi-check2-circle"></i> <span>Pelayanan publik yang prima dan
                                transparan</span></li>
                        <li class="feature-item"><i class="bi bi-check2-circle"></i> <span>Pembangunan infrastruktur yang
                                berkelanjutan</span></li>
                        <li class="feature-item"><i class="bi bi-check2-circle"></i> <span>Pemberdayaan masyarakat dan
                                ekonomi lokal</span></li>
                    </ul>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="history-card">
                        <h4>Sejarah Singkat</h4>
                        <p>{{ $profile->history ?? 'Kampung Dalam merupakan salah satu desa yang terletak di Kecamatan Siak, Kabupaten Siak, Provinsi Riau. Desa ini memiliki sejarah panjang sebagai bagian dari Kesultanan Siak Sri Indrapura yang berdiri sejak abad ke-18.' }}
                        </p>
                        <p>Nama "Kampung Dalam" berasal dari posisinya yang berada di bagian dalam wilayah Kesultanan Siak,
                            yang dahulu merupakan pusat pemerintahan dan perdagangan di kawasan Riau.</p>
                        <a href="{{ route('history') }}" class="custom-btn primary-btn">
                            <span>Baca Sejarah Lengkap</span><i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Stats Section -->
    <section id="stats" class="stats section stats-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0"
                            data-purecounter-end="{{ $populationStats->total_population ?? 2500 }}"
                            data-purecounter-duration="2" class="purecounter"></span>
                        <p class="text-white">Total Penduduk</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0"
                            data-purecounter-end="{{ $populationStats->total_families ?? 650 }}"
                            data-purecounter-duration="2" class="purecounter"></span>
                        <p class="text-white">Jumlah Keluarga</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $services->count() ?? 15 }}"
                            data-purecounter-duration="2" class="purecounter"></span>
                        <p class="text-white">Layanan Tersedia</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $umkms->count() ?? 45 }}"
                            data-purecounter-duration="2" class="purecounter"></span>
                        <p class="text-white">UMKM Aktif</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section -->
    <section id="team" class="team section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Perangkat Desa</h2>
            <p>Struktur pemerintahan Desa {{ $profile->village_name ?? 'Kampung Dalam' }}</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                @forelse($officials->take(8) as $official)
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up"
                        data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="member">
                            @if ($official->photo && Storage::disk('public')->exists($official->photo))
                                <img src="{{ asset('storage/' . $official->photo) }}" class="img-fluid"
                                    alt="{{ $official->name }}" loading="lazy">
                            @else
                                <img src="/placeholder.svg?height=300&width=300&text={{ urlencode($official->name ?? 'Official') }}"
                                    class="img-fluid" alt="{{ $official->name }}" loading="lazy">
                            @endif
                            <div class="member-content">
                                <h4>{{ $official->name }}</h4>
                                <span>{{ $official->position }}</span>
                            </div>
                            <div class="social">
                                @if ($official->phone)
                                    <a href="tel:{{ $official->phone }}"><i class="bi bi-telephone"></i></a>
                                @endif
                                @if ($official->email)
                                    <a href="mailto:{{ $official->email }}"><i class="bi bi-envelope"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <div class="member">
                                <img src="/placeholder.svg?height=300&width=300&text=Official+{{ $i }}"
                                    class="img-fluid" alt="Team Member {{ $i }}" loading="lazy">
                                <div class="member-content">
                                    <h4>Nama Perangkat {{ $i }}</h4>
                                    <span>Jabatan {{ $i }}</span>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endforelse
            </div>
            <div class="text-center mt-4" data-aos="fade-up">
                <a href="{{ route('officials') }}" class="custom-btn primary-btn">Lihat Semua Perangkat</a>
            </div>
        </div>
    </section>
    <!-- Statistics Section -->
    <section id="village-stats" class="village-stats section">
        <div class="container section-title" data-aos="fade-up">
            <h2 class="section-heading">Data Statistik Desa</h2>
            <p class="section-subtitle">Informasi lengkap tentang kondisi demografis dan sosial ekonomi</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Demografi (Tahun {{ $populationStats->year ?? 'Tidak diketahui' }})</h4>
                        <div class="stat-details">
                            <div class="stat-item">
                                <span class="stat-label">Laki-laki:</span>
                                <span
                                    class="stat-value">{{ number_format($populationStats->male_population ?? 1275) }}</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Perempuan:</span>
                                <span
                                    class="stat-value">{{ number_format($populationStats->female_population ?? 1225) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Services Section -->
    <section id="services" class="services section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Layanan Desa</h2>
            <p>Berbagai layanan yang tersedia untuk masyarakat</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                @forelse($services->take(6) as $service)
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="service-item position-relative h-100">
                            {{-- <div class="icon">
                                <i class="bi {{ $service->icon ?? 'bi-activity' }}"></i>
                            </div> --}}
                            <h4><a href="{{ route('services.detail', $service->slug) }}"
                                    class="stretched-link">{{ $service->name }}</a></h4>
                            <p>{{ Str::limit($service->description, 100) }}</p>
                            @if ($service->requirements)
                                <div class="requirements mt-2">
                                    <small class="text-muted">
                                        <i class="bi bi-file-text"></i>
                                        {{ Str::limit($service->requirements, 80) }}
                                    </small>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada layanan yang tersedia.</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-4" data-aos="fade-up">
                <a href="{{ route('services') }}" class="custom-btn primary-btn">Lihat Semua Layanan</a>
            </div>
        </div>
    </section>
    <!-- UMKM & Tourism Section -->
            
    <section id="umkm-tourism" class="umkm-tourism section" style="background: linear-gradient(135deg, rgba(30, 64, 175, 0.85) 0%, rgba(5, 150, 105, 0.75) 100%);">
        <div class="container hero-content py-5">
            <div class="row align-items-center" data-aos="zoom-out">
                <!-- Kolom Penjelasan (Kiri) -->

                <div class="col-lg-7">
                    <h1 class="hero-title mb-4">Istana Siak Sri Indrapura</h1>
                    <p class="hero-desc">
                        Istana Siak Sri Indrapura, yang juga dikenal sebagai <strong>Istana Asserayah Hasyimiah</strong>,
                        merupakan salah satu peninggalan sejarah terbesar di Provinsi Riau dan simbol kejayaan
                        Kesultanan Siak pada abad ke-18 hingga awal abad ke-20. Dibangun pada tahun 1889 oleh
                        Sultan Syarif Hasyim Abdul Jalil Syaifuddin, istana ini memadukan arsitektur
                        Melayu, Arab, dan Eropa, sehingga menciptakan bangunan megah yang anggun sekaligus unik.
                    </p>

                    <p class="hero-desc">
                        Dengan luas mencapai lebih dari <strong>1.000 meter persegi</strong>, Istana Siak
                        memiliki dua lantai yang menyimpan berbagai peninggalan bersejarah, termasuk
                        singgasana berlapis emas, alat musik kuno <em>Komet</em> yang hanya ada dua di dunia,
                        koleksi porselen dari Eropa, hingga senjata-senjata antik. Setiap ruangan di dalamnya
                        merepresentasikan kemegahan, kekuatan, dan kebijaksanaan Kesultanan Siak dalam memimpin
                        wilayahnya pada masa lalu.
                    </p>

                    <p class="hero-desc">
                        Kini, Istana Siak tidak hanya menjadi ikon kebanggaan masyarakat Kabupaten Siak,
                        tetapi juga menjadi <strong>destinasi wisata sejarah</strong> yang wajib dikunjungi
                        bagi siapa pun yang ingin memahami perjalanan panjang budaya Melayu di Nusantara.
                        Keindahan arsitektur, nilai sejarah, dan cerita kejayaan yang melekat menjadikan
                        Istana Siak sebagai saksi bisu masa keemasan Riau serta bukti nyata warisan budaya
                        yang masih terjaga hingga hari ini.
                    </p>

                    <p class="hero-desc">
                        Mengunjungi Istana Siak adalah perjalanan menapak tilas sejarah, menyelami budaya,
                        sekaligus merasakan atmosfer kerajaan yang masih terasa kuat dalam setiap sudutnya.
                        Tempat ini tidak hanya sekadar bangunan bersejarah, tetapi juga cerminan identitas
                        masyarakat Melayu yang kaya akan tradisi, seni, dan kebesaran peradaban.
                    </p>
                </div>

                <!-- Kolom Gambar (Kanan) -->
                <div class="col-lg-5">
                    <img src="{{ asset('istana.jpg') }}" alt="Istana Siak" class="img-fluid w-100 rounded shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <section id="umkm-tourism" class="umkm-tourism section">
        <div class="container section-title" data-aos="fade-up">
            <h2 class="section-heading">UMKM & Wisata</h2>
            <p class="section-subtitle">Potensi ekonomi dan pariwisata Istana Siak</p>
        </div>
        <div class="container">
            <div class="row">
                <!-- UMKM Tab -->
                <div class="col-12">
                    <ul class="nav nav-tabs justify-content-center mb-4" id="potentialTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="umkm-tab" data-bs-toggle="tab" data-bs-target="#umkm"
                                type="button" role="tab">
                                <i class="bi bi-shop"></i> UMKM
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tourism-tab" data-bs-toggle="tab" data-bs-target="#tourism"
                                type="button" role="tab">
                                <i class="bi bi-camera"></i> Wisata
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="potentialTabsContent">
                <!-- UMKM Content -->
                <div class="tab-pane fade show active" id="umkm" role="tabpanel">
                    <div class="row gy-4" id="umkm-list">
                        @forelse($umkms->take(6) as $umkm)
                            <div class="col-lg-4 col-md-6" data-aos="fade-up"
                                data-aos-delay="{{ $loop->iteration * 100 }}">
                                <div class="umkm-card">
                                    <div class="umkm-image">
                                        @if ($umkm->featured_image && Storage::disk('public')->exists($umkm->featured_image))
                                            <img src="{{ asset('storage/' . $umkm->featured_image) }}"
                                                alt="{{ $umkm->business_name }}" loading="lazy">
                                        @else
                                            <img src="/placeholder.svg?height=200&width=300&text={{ urlencode($umkm->business_name) }}"
                                                alt="{{ $umkm->business_name }}" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="umkm-content">
                                        <span class="umkm-category">{{ ucfirst($umkm->category) }}</span>
                                        <h4 class="umkm-title">{{ $umkm->business_name }}</h4>
                                        <p class="umkm-owner">Pemilik: {{ $umkm->owner_name }}</p>
                                        <p class="umkm-description">{{ Str::limit($umkm->description, 100) }}</p>
                                        <div class="umkm-contact">
                                            <i class="bi bi-telephone"></i>
                                            <span>{{ $umkm->phone ?? 'Tidak tersedia' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <i class="bi bi-shop display-1 text-muted"></i>
                                <p class="text-muted mt-3">Belum ada data UMKM tersedia</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="text-center mt-4" data-aos="fade-up">
                        <a href="{{ route('umkm') }}" class="custom-btn primary-btn">Lihat Semua UMKM</a>
                    </div>
                </div>
                <!-- Tourism Content -->
                <div class="tab-pane fade" id="tourism" role="tabpanel">
                    <div class="row gy-4">
                        @forelse($tourismPotentials->take(6) as $tourism)
                            <div class="col-lg-4 col-md-6" data-aos="fade-up"
                                data-aos-delay="{{ $loop->iteration * 100 }}">
                                <div class="tourism-card">
                                    <div class="tourism-image">
                                        @if ($tourism->featured_image && Storage::disk('public')->exists($tourism->featured_image))
                                            <img src="{{ asset('storage/' . $tourism->featured_image) }}"
                                                alt="{{ $tourism->name }}" loading="lazy">
                                        @else
                                            <img src="/placeholder.svg?height=200&width=300&text={{ urlencode($tourism->name) }}"
                                                alt="{{ $tourism->name }}" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="tourism-content">
                                        <span class="tourism-category">{{ ucfirst($tourism->category) }}</span>
                                        <h4 class="tourism-title">{{ $tourism->name }}</h4>
                                        <p class="tourism-address"><i class="bi bi-geo-alt"></i> {{ $tourism->address }}
                                        </p>
                                        <p class="tourism-description">{{ Str::limit($tourism->description, 100) }}</p>
                                        @if ($tourism->ticket_price)
                                            <div class="tourism-price">
                                                <i class="bi bi-tag"></i>
                                                <span>Rp {{ number_format($tourism->ticket_price, 0, ',', '.') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <i class="bi bi-camera display-1 text-muted"></i>
                                <p class="text-muted mt-3">Belum ada data wisata tersedia</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="text-center mt-4" data-aos="fade-up">
                        <a href="{{ route('tourism') }}" class="custom-btn primary-btn">Lihat Semua Wisata</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- News Section -->
    <section id="news" class="news section">
        <div class="container section-title" data-aos="fade-up">
            <h2 class="section-heading">Berita Terkini</h2>
            <p class="section-subtitle">Informasi dan berita terbaru seputar kegiatan dan perkembangan Desa Kampung Dalam
            </p>
        </div>
        <div class="container">
            <div class="row gy-4">
                <!-- News Carousel - Left Side -->
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="news-carousel-wrapper">
                        <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                            <div class="carousel-indicators">
                                @forelse($latestNews->take(6) as $index => $news)
                                    <button type="button" data-bs-target="#newsCarousel"
                                        data-bs-slide-to="{{ $index }}"
                                        class="{{ $index === 0 ? 'active' : '' }}" aria-current="true"
                                        aria-label="Slide {{ $index + 1 }}"></button>
                                @empty
                                    <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                @endforelse
                            </div>
                            <div class="carousel-inner">
                                @forelse($latestNews->take(6) as $index => $news)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <div class="news-slide">
                                            <div class="news-image">
                                                <img src="{{ Storage::url('news/' . $news->featured_image) }}"
                                                    alt="{{ $news->title }}" class="d-block w-100" loading="lazy">

                                                <div class="news-overlay"></div>
                                            </div>
                                            <div class="news-content">
                                                <div class="news-meta">
                                                    <span class="news-category">{{ ucfirst($news->category) }}</span>
                                                    <span
                                                        class="news-date">{{ $news->created_at->format('d M Y') }}</span>
                                                    <span class="news-views"><i class="bi bi-eye"></i>
                                                        {{ $news->views ?? 0 }}</span>
                                                </div>
                                                <h3 class="news-title">
                                                    <a
                                                        href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a>
                                                </h3>
                                                <p class="news-excerpt">{{ Str::limit($news->excerpt, 120) }}</p>
                                                <a href="{{ route('news.show', $news->slug) }}" class="read-more-btn">
                                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="carousel-item active">
                                        <div class="news-slide">
                                            <div class="news-image">
                                                <img src="/placeholder.svg?height=500&width=800&text=Belum+Ada+Berita"
                                                    class="d-block w-100" alt="No News">
                                                <div class="news-overlay"></div>
                                            </div>
                                            <div class="news-content">
                                                <div class="news-meta">
                                                    <span class="news-category">Informasi</span>
                                                    <span class="news-date">{{ now()->format('d M Y') }}</span>
                                                </div>
                                                <h3 class="news-title">
                                                    <a href="#">Belum Ada Berita Tersedia</a>
                                                </h3>
                                                <p class="news-excerpt">Berita dan informasi terkini akan segera
                                                    dipublikasikan di website ini.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- News Sidebar - Right Side -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="news-sidebar">
                        <!-- Latest News -->
                        <div class="sidebar-widget">
                            <h4 class="widget-title">Berita Terbaru</h4>
                            <div class="latest-news-list">
                                @forelse($latestNews->take(5) as $news)
                                    <div class="news-item">
                                        <div class="news-thumb">
                                            <img src="{{ Storage::url('news/' . $news->featured_image) }}"
                                                alt="{{ $news->title }}" class="d-block w-100" loading="lazy">
                                            <div class="news-date-badge">{{ $news->created_at->format('d M') }}</div>
                                        </div>
                                        <div class="news-info">
                                            <span class="news-category-small">{{ ucfirst($news->category) }}</span>
                                            <h5 class="news-title-small">
                                                <a
                                                    href="{{ route('news.show', $news->slug) }}">{{ Str::limit($news->title, 60) }}</a>
                                            </h5>
                                            <div class="news-meta-small">
                                                <span><i class="bi bi-eye"></i> {{ $news->views ?? 0 }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-4">
                                        <i class="bi bi-newspaper display-4 text-muted"></i>
                                        <p class="text-muted mt-2">Belum ada berita tersedia</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View All News Button -->
            @if ($latestNews->count() > 0)
                <div class="text-center mt-4" data-aos="fade-up">
                    <a href="{{ route('news.index') }}" class="custom-btn primary-btn">
                        <i class="bi bi-newspaper"></i> Lihat Semua Berita
                    </a>
                </div>
            @endif
        </div>
    </section>
    <!-- Gallery Section -->
    <section id="portfolio" class="portfolio section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Galeri</h2>
            <p>Dokumentasi kegiatan dan keindahan Desa {{ $profile->village_name ?? 'Kampung Dalam' }}</p>
        </div>
        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @forelse($featuredGallery->take(8) as $gallery)
                        <div
                            class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ strtolower($gallery->category) }}">
                            <img src="{{ $gallery->image_path && Storage::disk('public')->exists($gallery->image_path) ? asset('storage/' . $gallery->image_path) : '/placeholder.svg?height=300&width=400&text=Gallery+' . $loop->iteration }}"
                                class="img-fluid" alt="{{ $gallery->title }}" loading="lazy">
                            <div class="portfolio-info">
                                <h4>{{ $gallery->title }}</h4>
                                <p>{{ $gallery->description }}</p>
                                <a href="{{ $gallery->image_path && Storage::disk('public')->exists($gallery->image_path) ? asset('storage/' . $gallery->image_path) : '/placeholder.svg?height=800&width=1200&text=Gallery+' . $loop->iteration }}"
                                    title="{{ $gallery->title }}"
                                    data-gallery="portfolio-gallery-{{ strtolower($gallery->category) }}"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    @empty
                        @for ($i = 1; $i <= 8; $i++)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item">
                                <img src="/placeholder.svg?height=300&width=400&text=Gallery+{{ $i }}"
                                    class="img-fluid" alt="Gallery {{ $i }}" loading="lazy">
                                <div class="portfolio-info">
                                    <h4>Galeri {{ $i }}</h4>
                                    <p>Dokumentasi kegiatan desa</p>
                                    <a href="/placeholder.svg?height=800&width=1200&text=Gallery+{{ $i }}"
                                        title="Galeri {{ $i }}" data-gallery="portfolio-gallery-default"
                                        class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                </div>
                            </div>
                        @endfor
                    @endforelse
                </div>
            </div>
            <div class="text-center mt-4" data-aos="fade-up">
                <a href="{{ route('gallery') }}" class="custom-btn primary-btn">Lihat Semua Galeri</a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
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
                                        <div id="collapse{{ $faq->id }}"
                                            class="accordion-collapse collapse rounded-3 mb-3"
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
    <!-- FIXED: Contact Section -->
    <section id="contact" class="contact section">
        <div class="container section-title" data-aos="fade-up">
            <h2 class="section-heading">Kontak Kami</h2>
            <p class="section-subtitle">Jangan ragu untuk menghubungi kami untuk pertanyaan atau bantuan</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Alamat</h3>
                            <p>{{ $profile->address ?? 'Jl. Raya Kampung Dalam, Kec. Siak, Kab. Siak, Riau 28671' }}</p>
                        </div>
                    </div><!-- End Info Item -->
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Telepon</h3>
                            <p>{{ $profile->phone ?? '+62 761 123456' }}</p>
                        </div>
                    </div><!-- End Info Item -->
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email</h3>
                            <p>{{ $profile->email ?? 'info@kampungdalam.go.id' }}</p>
                        </div>
                    </div><!-- End Info Item -->
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-clock flex-shrink-0"></i>
                        <div>
                            <h3>Jam Kerja</h3>
                            <p>Senin - Jumat: 08:00 - 16:00 WIB</p>
                            <p>Sabtu: 08:00 - 12:00 WIB</p>
                            <p>Minggu & Hari Libur Nasional: Tutup</p>
                        </div>
                    </div><!-- End Info Item -->
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('contact.send') }}" method="post" class="php-email-form"
                        data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Nama Anda"
                                    required>
                            </div>
                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Email Anda"
                                    required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subjek" required>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Pesan Anda" required></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="loading">Memuat</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>
                                <button type="submit" class="custom-btn primary-btn">Kirim Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Google Maps Embed -->
        <div class="container contact-map" data-aos="fade-up" data-aos-delay="200">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15168.134137051906!2d102.050517!3d0.8024114999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d427486d615127%3A0x94decb4b46dc7a37!2sKp.%20Dalam%2C%20Kec.%20Siak%2C%20Kabupaten%20Siak%2C%20Riau!5e1!3m2!1sid!2sid!4v1754576030885!5m2!1sid!2sid"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            {{-- <p class="map-note">
                <i class="bi bi-info-circle"></i> Lokasi di peta adalah contoh. Harap ganti dengan koordinat Desa Kampung Dalam yang sebenarnya.
            </p> --}}
        </div>
    </section><!-- End Contact Section -->
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

        /* Reset and Base Styles */
        * {
            box-sizing: border-box;
        }

        /* Section spacing */
        .section {
            padding: 60px 0;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .section+.section {
            margin-top: 0;
        }

        /* Hero Section with Typing Effect and Vector */
        .hero {
            /* margin-top: 10%; */
            min-height: 100vh;
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

        .hero-content {
            margin-top: 5rem;
            position: relative;
            z-index: 3;
        }

        .hero-title {
            font-size: clamp(3rem, 6vw, 5rem);
            font-weight: 900;
            color: var(--neutral-white);
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            margin-bottom: 1rem;
            letter-spacing: -0.025em;
        }

        .hero-subtitle {
            font-size: clamp(1.2rem, 2.5vw, 1.6rem);
            color: rgba(255, 255, 255, 0.95);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin-bottom: 2rem;
            line-height: 1.6;
            max-width: 600px;
        }
        .hero-desc {
            /* font-size: clamp(1.2rem, 2.5vw, 1.6rem); */
            color: rgba(255, 255, 255, 0.95);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin-bottom: 2rem;
            /* line-height: 1.6; */
            /* max-width: 600px; */
        }

        /* Typing Effect */
        .typing-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 2rem;
            margin: 2rem 0;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .typing-text {
            color: var(--neutral-white);
            font-size: 1.1rem;
            line-height: 1.7;
            min-height: 120px;
            font-weight: 400;
            position: relative;
        }

        @keyframes blink {

            0%,
            50% {
                opacity: 1;
            }

            51%,
            100% {
                opacity: 0;
            }
        }

        /* Hero Actions */
        .hero-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .btn-get-started {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 18px 36px;
            background: var(--success-green);
            color: var(--neutral-white);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid var(--success-green);
            box-shadow: var(--shadow-lg);
            position: relative;
            z-index: 10;
        }

        .btn-get-started:hover {
            background: var(--success-green-light);
            border-color: var(--success-green-light);
            color: var(--neutral-white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .btn-contact {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 18px 36px;
            background: transparent;
            color: var(--neutral-white);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid var(--neutral-white);
            box-shadow: var(--shadow-lg);
            position: relative;
            z-index: 10;
        }

        .btn-contact:hover {
            background: var(--neutral-white);
            color: var(--primary-blue);
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        /* Hero Vector */
        .hero-vector {
            text-align: center;
            padding: 2rem;
        }

        .village-illustration {
            width: 100%;
            max-width: 400px;
            height: auto;
            filter: drop-shadow(0 15px 35px rgba(0, 0, 0, 0.2));
            animation: floatAnimation 6s ease-in-out infinite;
        }

        @keyframes floatAnimation {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(1deg);
            }
        }

        /* Icon Boxes - White background with centered icons */
        .icon-box {
            background: var(--neutral-white);
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-lg);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            z-index: 5;
        }

        .icon-box:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-blue-light);
        }

        .icon {
            width: 80px;
            height: 80px;
            /* border-radius: 20px; */
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            position: relative;
            /* overflow: hidden; */
        }

        .icon img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            /* biar tidak terpotong */
        }


        .icon-white {
            background: var(--neutral-white) !important;
            color: var(--primary-blue) !important;
            /* border: 2px solid var(--primary-blue-light); */
        }

        .icon-box .title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--neutral-gray-900);
            margin-bottom: 1rem;
        }

        .icon-box .title a {
            color: inherit;
            text-decoration: none;
        }

        .icon-box .description {
            color: var(--neutral-gray-600);
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Vision Mission Section */
        .vision-mission.section {
            background: var(--neutral-gray-50);
        }

        .vision-card,
        .mission-card {
            background: var(--neutral-white);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            height: 100%;
            border: 1px solid var(--neutral-gray-200);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .vision-card:hover,
        .mission-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .vision-icon,
        .mission-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
            color: var(--neutral-white);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
        }

        .vision-card h3,
        .mission-card h3 {
            color: var(--neutral-gray-900);
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.4rem;
        }

        .mission-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mission-list li {
            padding: 0.5rem 0;
            padding-left: 2rem;
            position: relative;
            color: var(--neutral-gray-600);
            line-height: 1.6;
        }

        .mission-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--success-green);
            font-weight: bold;
            font-size: 1.2rem;
        }

        /* About Section */
        .about.section {
            background: var(--neutral-white);
        }

        .about-text {
            color: var(--neutral-gray-600);
            line-height: 1.7;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            color: var(--neutral-gray-600);
            font-size: 1rem;
            line-height: 1.6;
        }

        .feature-item i {
            color: var(--success-green);
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .history-card {
            background: var(--neutral-white);
            padding: 2rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--neutral-gray-200);
            height: 100%;
        }

        .history-card h4 {
            color: var(--primary-blue);
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .history-card p {
            color: var(--neutral-gray-600);
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        .animated-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 10;
        }

        .animated-link:hover {
            color: var(--primary-blue-dark);
            transform: translateX(4px);
        }

        /* Stats Section */
        .stats-background {
            background: linear-gradient(135deg, var(--primary-blue-dark) 0%, var(--primary-blue) 50%, var(--success-green) 100%);
            position: relative;
            z-index: 2;
        }

        .stats-item {
            color: var(--neutral-white);
            text-align: center;
            padding: 2rem;
            color: white;
        }

        .stats-item .purecounter {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            display: block;
            margin-bottom: 0.5rem;
            letter-spacing: -0.025em;
        }

        .stats-item p {
            font-size: 1.1rem;
            font-weight: 500;
            opacity: 0.95;
            margin: 0;
        }

        /* Team Members */
        .member {
            background: var(--neutral-white);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            border: 1px solid var(--neutral-gray-200);
            position: relative;
            z-index: 5;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 350px;
        }

        .member::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--success-green) 0%, var(--primary-blue) 100%);
        }

        .member:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--success-green);
        }

        .member img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 1.5rem;
            border: 4px solid var(--primary-blue);
            transition: border-color 0.3s ease;
        }

        .member:hover img {
            border-color: var(--success-green);
        }

        .member-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .member h4 {
            color: var(--neutral-gray-900);
            margin-bottom: 0.5rem;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .member span {
            color: var(--primary-blue);
            font-weight: 600;
            display: block;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .member .social {
            margin-top: auto;
            display: flex;
            justify-content: center;
            gap: 0.75rem;
        }

        .member .social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--success-green) 100%);
            color: var(--neutral-white);
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 1.1rem;
        }

        .member .social a:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: var(--shadow-md);
        }

        /* Village Statistics Section */
        .village-stats.section {
            background: var(--neutral-white);
        }

        .stat-card {
            background: var(--neutral-white);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--neutral-gray-200);
            height: 100%;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--success-green) 0%, var(--success-green-light) 100%);
            color: var(--neutral-white);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .stat-card h4 {
            color: var(--neutral-gray-900);
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }

        .stat-details {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .stat-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid var(--neutral-gray-200);
        }

        .stat-item:last-child {
            border-bottom: none;
        }

        .stat-label {
            color: var(--neutral-gray-600);
            font-weight: 500;
        }

        .stat-value {
            color: var(--primary-blue);
            font-weight: 700;
        }

        /* Service Items */
        .service-item {
            background: var(--neutral-white);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--neutral-gray-200);
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 5;
            overflow: hidden;
        }

        .service-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--success-green) 100%);
        }

        .service-item:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-blue-light);
        }

        .service-item .icon {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
            margin-bottom: 1.5rem;
            width: 70px;
            height: 70px;
            border-radius: 16px;
            color: var(--neutral-white);
        }

        .service-item h4 {
            color: var(--neutral-gray-900);
            margin-bottom: 1rem;
            font-weight: 700;
            font-size: 1.3rem;
            flex-grow: 0;
        }

        .service-item h4 a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
            position: relative;
            z-index: 10;
        }

        .service-item h4 a:hover {
            color: var(--primary-blue);
        }

        .service-item p {
            color: var(--neutral-gray-600);
            line-height: 1.6;
            flex-grow: 1;
            margin-bottom: 1rem;
        }

        .service-item .requirements {
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid var(--neutral-gray-200);
        }

        .service-item .requirements small {
            color: var(--neutral-gray-500);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* UMKM & Tourism Section */
        .umkm-tourism.section {
            background: var(--neutral-gray-50);
        }

        .nav-tabs {
            border-bottom: 2px solid var(--neutral-gray-200);
        }

        .nav-tabs .nav-link {
            border: none;
            background: none;
            color: var(--neutral-gray-600);
            font-weight: 600;
            padding: 1rem 2rem;
            border-radius: 12px 12px 0 0;
            transition: all 0.3s ease;
            margin-right: 0.5rem;
        }

        .nav-tabs .nav-link:hover {
            color: var(--primary-blue);
            background: rgba(59, 130, 246, 0.1);
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-blue);
            background: var(--neutral-white);
            border-bottom: 2px solid var(--primary-blue);
        }

        .umkm-card,
        .tourism-card {
            background: var(--neutral-white);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--neutral-gray-200);
            height: 100%;
        }

        .umkm-card:hover,
        .tourism-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .umkm-image,
        .tourism-image {
            height: 200px;
            overflow: hidden;
        }

        .umkm-image img,
        .tourism-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .umkm-card:hover .umkm-image img,
        .tourism-card:hover .tourism-image img {
            transform: scale(1.05);
        }

        .umkm-content,
        .tourism-content {
            padding: 1.5rem;
        }

        .umkm-category,
        .tourism-category {
            background: var(--primary-blue);
            color: var(--neutral-white);
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .umkm-title,
        .tourism-title {
            color: var(--neutral-gray-900);
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .umkm-owner {
            color: var(--neutral-gray-500);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .umkm-description,
        .tourism-description {
            color: var(--neutral-gray-600);
            line-height: 1.6;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .umkm-contact,
        .tourism-address,
        .tourism-price {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--success-green);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .tourism-address {
            color: var(--neutral-gray-500);
            margin-bottom: 0.5rem;
        }

        /* News Section */
        .news.section {
            background: var(--neutral-gray-50);
            position: relative;
            z-index: 2;
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

        .news-slide {
            position: relative;
            height: 500px;
            overflow: hidden;
        }

        .news-image {
            position: relative;
            height: 100%;
            overflow: hidden;
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .news-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(17, 24, 39, 0.9) 0%, rgba(17, 24, 39, 0.4) 50%, transparent 100%);
        }

        .news-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2.5rem;
            color: var(--neutral-white);
            z-index: 10;
        }

        .news-meta {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .news-category {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
            color: var(--neutral-white);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.025em;
        }

        .news-date,
        .news-views {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }

        .news-title {
            font-size: clamp(1.3rem, 3vw, 1.8rem);
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.3;
            letter-spacing: -0.025em;
        }

        .news-title a {
            color: var(--neutral-white);
            text-decoration: none;
            transition: color 0.3s ease;
            position: relative;
            z-index: 15;
        }

        .news-title a:hover {
            color: var(--primary-blue-light);
        }

        .news-excerpt {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .read-more-btn {
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

        .read-more-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            color: var(--neutral-white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Carousel Controls */
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

        /* News Sidebar */
        .news-sidebar {
            background: var(--neutral-white);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow-xl);
            height: fit-content;
            position: sticky;
            top: 120px;
            border: 1px solid var(--neutral-gray-200);
            z-index: 5;
        }

        .sidebar-widget {
            margin-bottom: 2rem;
        }

        .sidebar-widget:last-child {
            margin-bottom: 0;
        }

        .widget-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--neutral-gray-900);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid var(--primary-blue);
            position: relative;
            letter-spacing: -0.025em;
        }

        .widget-title::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--success-green);
            border-radius: 2px;
        }

        /* News Item in Sidebar */
        .news-item {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--neutral-gray-200);
        }

        .news-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .news-thumb {
            position: relative;
            flex-shrink: 0;
            width: 80px;
            height: 60px;
            border-radius: 8px;
            overflow: hidden;
        }

        .news-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .news-date-badge {
            position: absolute;
            top: 4px;
            right: 4px;
            background: var(--primary-blue);
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 600;
        }

        .news-info {
            flex: 1;
            min-width: 0;
        }

        .news-category-small {
            background: var(--neutral-gray-100);
            color: var(--primary-blue);
            font-size: 0.7rem;
            padding: 2px 8px;
            border-radius: 12px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .news-title-small {
            font-size: 0.9rem;
            font-weight: 600;
            line-height: 1.4;
            margin-bottom: 0.5rem;
        }

        .news-title-small a {
            color: var(--neutral-gray-900);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .news-title-small a:hover {
            color: var(--primary-blue);
        }

        .news-meta-small {
            font-size: 0.75rem;
            color: var(--neutral-gray-500);
        }

        /* Portfolio/Gallery */
        .portfolio-item {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--neutral-gray-200);
        }

        .portfolio-item:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .portfolio-item img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .portfolio-item:hover img {
            transform: scale(1.05);
        }

        .portfolio-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(17, 24, 39, 0.95));
            color: var(--neutral-white);
            padding: 2.5rem;
            transform: translateY(100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .portfolio-item:hover .portfolio-info {
            transform: translateY(0);
        }

        .portfolio-info h4 {
            color: var(--neutral-white);
            margin-bottom: 0.75rem;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .portfolio-info p {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .preview-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--success-green) 100%);
            color: var(--neutral-white);
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 1.2rem;
        }

        .preview-link:hover {
            background: var(--neutral-white);
            color: var(--primary-blue);
            transform: scale(1.1);
        }

        /* FAQ Section */
        .faq.section {
            background: var(--neutral-white);
            position: relative;
            z-index: 2;
        }

        .faq-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .faq-item {
            background: var(--neutral-white);
            border-radius: 16px;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-md);
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--neutral-gray-200);
            color: black;
        }

        .faq-item:hover {
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-blue-light);
            color: black;
        }

        .faq-item h3 {
            background: var(--neutral-gray-50);
            padding: 1.75rem 2rem;
            margin: 0;
            font-size: 1.2rem;
            font-weight: 600;
            /* color: var(--neutral-gray-900); */
            color: black;
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
            border: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .faq-item h3:hover {
            background: var(--primary-blue);
            /* color: var(--neutral-white); */
            color: black;
        }

        .faq-toggle {
            font-size: 1.2rem;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            flex-shrink: 0;
        }

        .faq-item.active .faq-toggle {
            transform: rotate(90deg);
            color: black;
        }

        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: black;
        }

        .faq-content p {
            padding: 2rem;
            margin: 0;
            /* color: var(--neutral-gray-600); */
            line-height: 1.7;
            font-size: 1rem;
            color: black;

        }

        /* Custom Buttons */
        .custom-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 14px 28px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
            position: relative;
            z-index: 10;
            cursor: pointer;
            overflow: hidden;
        }

        .custom-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .custom-btn:hover::before {
            left: 100%;
        }

        .primary-btn {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
            color: var(--neutral-white);
            border-color: var(--primary-blue);
            box-shadow: var(--shadow-md);
        }

        .primary-btn:hover {
            color: var(--neutral-white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Section Titles */
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
            z-index: 2;
        }

        .section-heading {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: var(--neutral-gray-900);
            margin-bottom: 1rem;
            letter-spacing: -0.025em;
            position: relative;
        }

        .section-heading::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--success-green) 100%);
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: var(--neutral-gray-600);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
            font-weight: 400;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .section {
                padding: 50px 0;
            }

            .news-sidebar {
                position: static;
                margin-top: 2rem;
            }

            .hero-actions {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .section {
                padding: 40px 0;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .typing-container {
                padding: 1.5rem;
            }

            .hero-actions {
                flex-direction: column;
                align-items: center;
            }

            .btn-get-started,
            .btn-contact {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }

            .news-slide {
                height: 400px;
            }

            .news-content {
                padding: 2rem;
            }

            .news-title {
                font-size: 1.4rem;
            }

            .carousel-control-prev,
            .carousel-control-next {
                width: 48px;
                height: 48px;
            }

            .carousel-control-prev {
                left: 16px;
            }

            .carousel-control-next {
                right: 16px;
            }

            .section-heading {
                font-size: 2.2rem;
            }

            .icon-box,
            .service-item,
            .member {
                padding: 1.5rem;
            }

            .portfolio-item img {
                height: 240px;
            }

            .portfolio-info {
                padding: 2rem;
            }

            .member {
                min-height: 300px;
            }
        }

        @media (max-width: 480px) {
            .section {
                padding: 30px 0;
            }

            .hero-content .row {
                margin-top: 2rem;
            }

            .icon-box,
            .service-item,
            .member {
                padding: 1.25rem;
            }

            .news-content {
                padding: 1.5rem;
            }

            .faq-item h3 {
                padding: 1.5rem;
                font-size: 1.1rem;
                color: black;
            }

            .faq-content p {
                padding: 1.5rem;
                color: black;
            }

            .member {
                min-height: 280px;
            }
        }

        /* FIXED: Contact Section Styles */
        .contact.section {
            background: var(--neutral-gray-50);
        }

        .contact .info-item {
            background: var(--neutral-white);
            padding: 2rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            margin-bottom: 1.5rem;
            border: 1px solid var(--neutral-gray-200);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .contact .info-item:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-blue-light);
        }

        .contact .info-item i {
            font-size: 1.8rem;
            color: var(--primary-blue);
            background: rgba(59, 130, 246, 0.1);
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin-right: 1.5rem;
        }

        .contact .info-item h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--neutral-gray-900);
        }

        .contact .info-item p {
            padding: 0;
            margin-bottom: 0;
            font-size: 0.95rem;
            color: var(--neutral-gray-600);
            line-height: 1.6;
        }

        .contact .php-email-form {
            background: var(--neutral-white);
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--neutral-gray-200);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .contact .php-email-form:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-blue-light);
        }

        .contact .php-email-form .form-control {
            border-radius: 12px;
            padding: 1rem 1.25rem;
            border: 1px solid var(--neutral-gray-300);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .contact .php-email-form .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        .contact .php-email-form textarea {
            min-height: 150px;
            resize: vertical;
        }

        .contact .php-email-form .loading,
        .contact .php-email-form .error-message,
        .contact .php-email-form .sent-message {
            display: none;
            text-align: center;
            padding: 15px;
            margin-bottom: 1rem;
            border-radius: 8px;
        }

        .contact .php-email-form .loading {
            background: var(--neutral-gray-100);
            color: var(--neutral-gray-700);
        }

        .contact .php-email-form .error-message {
            background: #f8d7da;
            color: #721c24;
        }

        .contact .php-email-form .sent-message {
            background: #d4edda;
            color: #155724;
        }

        .contact .php-email-form button[type="submit"] {
            width: auto;
            padding: 14px 30px;
            font-size: 1.1rem;
            border-radius: 12px;
            margin-top: 1rem;
        }

        .contact-map {
            margin-top: 4rem;
            position: relative;
            /* border-radius: 20px; */
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--neutral-gray-200);
        }

        .contact-map iframe {
            width: 100%;
            height: 450px;
            border: 0;
            transition: all 0.3s ease;
        }

        .contact-map iframe:hover {
            filter: grayscale(0) opacity(1);
        }

        @media (max-width: 768px) {
            .contact .info-item {
                padding: 1.5rem;
                margin-bottom: 1rem;
            }

            .contact .info-item i {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
                margin-right: 1rem;
            }

            .contact .info-item h3 {
                font-size: 1.1rem;
            }

            .contact .info-item p {
                font-size: 0.9rem;
            }

            .contact .php-email-form {
                padding: 2rem;
            }

            .contact .php-email-form .form-control {
                padding: 0.8rem 1rem;
                font-size: 0.9rem;
            }

            .contact .php-email-form button[type="submit"] {
                padding: 12px 24px;
                font-size: 1rem;
            }

            .contact-map {
                margin-top: 2rem;
            }

            .contact-map iframe {
                height: 300px;
            }

            .contact-map .map-note {
                font-size: 0.75rem;
                padding: 0.4rem 0.8rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Typing effect for hero section
            const typingText = document.getElementById('typing-text');
            if (typingText) {
                const text =
                    "Kampung Dalam adalah sebuah desa yang terletak di Kabupaten Siak, Provinsi Riau. Desa ini memiliki potensi alam yang indah dan masyarakat yang ramah serta gotong royong yang tinggi. Dengan luas wilayah 15,75 km², desa ini dihuni oleh 2.500 jiwa yang terbagi dalam 650 kepala keluarga.";
                let index = 0;

                function typeWriter() {
                    if (index < text.length) {
                        typingText.innerHTML = text.substring(0, index + 1);
                        index++;
                        setTimeout(typeWriter, 50);
                    }
                }

                // Start typing when element is in view
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            setTimeout(typeWriter, 1000); // Delay start
                            observer.unobserve(entry.target);
                        }
                    });
                });
                observer.observe(typingText);
            }

            // Enhanced carousel functionality
            const newsCarousel = document.getElementById('newsCarousel');
            if (newsCarousel) {
                const carousel = new bootstrap.Carousel(newsCarousel, {
                    interval: 5000,
                    wrap: true,
                    pause: 'hover'
                });
                // Pause on hover
                newsCarousel.addEventListener('mouseenter', function() {
                    carousel.pause();
                });
                newsCarousel.addEventListener('mouseleave', function() {
                    carousel.cycle();
                });
            }

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

            // FAQ Functionality
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const question = item.querySelector('h3');
                const content = item.querySelector('.faq-content');
                question.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    // Close all other FAQ items
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                            const otherContent = otherItem.querySelector('.faq-content');
                            otherContent.style.maxHeight = '0';
                        }
                    });
                    // Toggle current item
                    if (isActive) {
                        item.classList.remove('active');
                        content.style.maxHeight = '0';
                    } else {
                        item.classList.add('active');
                        content.style.maxHeight = content.scrollHeight + 'px';
                    }
                });
            });

            // Counter Animation
            const counters = document.querySelectorAll('.purecounter');
            const observerOptions = {
                threshold: 0.5,
                rootMargin: '0px 0px -100px 0px'
            };
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.getAttribute('data-purecounter-end'));
                        const duration = parseInt(counter.getAttribute(
                            'data-purecounter-duration')) * 1000;
                        animateCounter(counter, 0, target, duration);
                        counterObserver.unobserve(counter);
                    }
                });
            }, observerOptions);
            counters.forEach(counter => {
                counterObserver.observe(counter);
            });

            function animateCounter(element, start, end, duration) {
                let startTime = null;

                function animate(currentTime) {
                    if (startTime === null) startTime = currentTime;
                    const timeElapsed = currentTime - startTime;
                    const progress = Math.min(timeElapsed / duration, 1);
                    const value = Math.floor(progress * (end - start) + start);
                    element.textContent = value.toLocaleString();
                    if (progress < 1) {
                        requestAnimationFrame(animate);
                    }
                }
                requestAnimationFrame(animate);
            }

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        const headerHeight = document.querySelector('.header')?.offsetHeight || 0;
                        const targetPosition = target.offsetTop - headerHeight - 20;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Performance monitoring
            window.addEventListener('load', function() {
                console.log('Village website loaded successfully');
                if ('performance' in window) {
                    const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
                    console.log('Page load time:', loadTime + 'ms');
                }
            });

            // FIXED: Contact Form Submission (using a placeholder for actual submission logic)
            const contactForm = document.querySelector('.php-email-form');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const loading = this.querySelector('.loading');
                    const errorMessage = this.querySelector('.error-message');
                    const sentMessage = this.querySelector('.sent-message');

                    loading.style.display = 'block';
                    errorMessage.style.display = 'none';
                    sentMessage.style.display = 'none';

                    // Simulate form submission
                    setTimeout(() => {
                        const isSuccess = Math.random() > 0.2; // 80% success rate for demo
                        loading.style.display = 'none';
                        if (isSuccess) {
                            sentMessage.style.display = 'block';
                            this.reset(); // Clear form fields on success
                        } else {
                            errorMessage.textContent =
                                'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.';
                            errorMessage.style.display = 'block';
                        }
                    }, 2000); // Simulate 2-second network delay
                });
            }
        });
    </script>
@endpush
