<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            <div class="d-flex align-items-center justify-content-center gap-3">
                <img src="{{ asset('Lambang_Kabupaten_Siak.png') }}" alt="Logo" class="img-fluid" style="width: 40px; height: 50px;">
                <span class="align-middle">Admin Panel<br>Kampung Dalam</span>
            </div>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Dashboard</li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">Profil Desa</li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.village-profiles.index') }}">
                    <i class="align-middle" data-feather="info"></i> <span class="align-middle">Profil Desa</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.village-officials.index') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Perangkat Desa</span>
                </a>
            </li>

            <li class="sidebar-header">Informasi & Layanan</li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.services.index') }}">
                    <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Layanan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.news.index') }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Berita</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.faqs.index') }}">
                    <i class="align-middle" data-feather="help-circle"></i> <span class="align-middle">FAQ</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.galleries.index') }}">
                    <i class="align-middle" data-feather="image"></i> <span class="align-middle">Galeri</span>
                </a>
            </li>

            <li class="sidebar-header">Potensi Desa</li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.tourism-potentials.index') }}">
                    <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle">Wisata</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.umkm.index') }}">
                    <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">UMKM</span>
                </a>
            </li>

            <li class="sidebar-header">Statistik</li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.statistics.population') }}"><i class="align-middle" data-feather="users"></i> Penduduk</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.statistics.education') }}"><i class="align-middle" data-feather="book"></i> Pendidikan</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.statistics.occupation') }}"><i class="align-middle" data-feather="briefcase"></i> Pekerjaan</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.statistics.health') }}"><i class="align-middle" data-feather="heart"></i> Kesehatan</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.statistics.infrastructure') }}"><i class="align-middle" data-feather="cpu"></i> Infrastruktur</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.statistics.economic') }}"><i class="align-middle" data-feather="trending-up"></i> Ekonomi</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.statistics.social') }}"><i class="align-middle" data-feather="users"></i> Sosial</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.statistics.religion') }}"><i class="align-middle" data-feather="activity"></i> Agama</a></li>

            <li class="sidebar-header">Manajemen User</li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.users.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
