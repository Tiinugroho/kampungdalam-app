<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            <div class="d-flex align-items-center justify-content-center gap-3">
                <img src="{{ asset('Lambang_Kabupaten_Siak.png') }}" alt="Logo" class="img-fluid"
                    style="width: 40px; height: 50px;">
                <span class="align-middle">Admin Panel<br>Kampung Dalam</span>
            </div>
        </a>

        <ul class="sidebar-nav">
            {{-- Dashboard --}}
            <li class="sidebar-header">Dashboard</li>
            <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="home"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            {{-- Profil Desa --}}
            <li class="sidebar-header">Profil Desa</li>
            <li class="sidebar-item {{ request()->routeIs('admin.village-profiles.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.village-profiles.index') }}">
                    <i class="align-middle" data-feather="info"></i>
                    <span class="align-middle">Profil Desa</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.village-official.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.village-official.index') }}">
                    <i class="align-middle" data-feather="users"></i>
                    <span class="align-middle">Perangkat Desa</span>
                </a>
            </li>

            {{-- Informasi & Layanan --}}
            <li class="sidebar-header">Informasi & Layanan</li>
            <li class="sidebar-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.services.index') }}">
                    <i class="align-middle" data-feather="layers"></i>
                    <span class="align-middle">Layanan</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.news.index') }}">
                    <i class="align-middle" data-feather="file-text"></i>
                    <span class="align-middle">Berita</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.faqs.index') }}">
                    <i class="align-middle" data-feather="help-circle"></i>
                    <span class="align-middle">FAQ</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.galleries.index') }}">
                    <i class="align-middle" data-feather="image"></i>
                    <span class="align-middle">Galeri</span>
                </a>
            </li>

            {{-- Potensi Desa --}}
            <li class="sidebar-header">Potensi Desa</li>
            <li class="sidebar-item {{ request()->routeIs('admin.tourism-potentials.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.tourism-potentials.index') }}">
                    <i class="align-middle" data-feather="map-pin"></i>
                    <span class="align-middle">Wisata</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.umkm.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.umkm.index') }}">
                    <i class="align-middle" data-feather="shopping-bag"></i>
                    <span class="align-middle">UMKM</span>
                </a>
            </li>

            {{-- SGDs --}}
            <li class="sidebar-header">SGDs</li>
            <li class="sidebar-item {{ request()->routeIs('admin.sgds.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.sgds.index') }}">
                    <i class="align-middle" data-feather="bar-chart-2"></i>
                    <span class="align-middle">Data SGDs</span>
                </a>
            </li>

            {{-- Manajemen User --}}
            @if (auth()->user()->role === 'super-admin')
                <li class="sidebar-header">Manajemen User</li>
                <li class="sidebar-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.users.index') }}">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">Users</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
