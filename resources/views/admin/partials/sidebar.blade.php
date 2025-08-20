<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('admin.dashboard') }}" class="b-brand text-primary">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ asset('Lambang_Kabupaten_Siak.png') }}" class="img-fluid" alt="logo">
                    <span class="m-text">Admin Panel Kelurahan Kampung Dalam</span>
                </div>
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                
                {{-- Dashboard --}}
                <li class="pc-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                {{-- Caption: Master Data --}}
                <li class="pc-item pc-caption">
                    <label>Master Data</label>
                    <i class="ti ti-database"></i>
                </li>

                {{-- Village Profile --}}
                <li class="pc-item {{ request()->routeIs('admin.village-profile.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.village-profile.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-home"></i></span>
                        <span class="pc-mtext">Village Profile</span>
                    </a>
                </li>

                {{-- Village Officials --}}
                <li class="pc-item {{ request()->routeIs('admin.village-officials.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.village-officials.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-users"></i></span>
                        <span class="pc-mtext">Village Officials</span>
                    </a>
                </li>

                {{-- Services --}}
                <li class="pc-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.services.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-briefcase"></i></span>
                        <span class="pc-mtext">Services</span>
                    </a>
                </li>

                {{-- Caption: Content --}}
                <li class="pc-item pc-caption">
                    <label>Content</label>
                    <i class="ti ti-edit"></i>
                </li>

                {{-- News --}}
                <li class="pc-item {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.news.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-news"></i></span>
                        <span class="pc-mtext">News</span>
                    </a>
                </li>

                {{-- Galleries --}}
                <li class="pc-item {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.galleries.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-photo"></i></span>
                        <span class="pc-mtext">Galleries</span>
                    </a>
                </li>

                {{-- Tourism Potentials --}}
                <li class="pc-item {{ request()->routeIs('admin.tourism-potentials.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.tourism-potentials.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-map"></i></span>
                        <span class="pc-mtext">Tourism Potentials</span>
                    </a>
                </li>

                {{-- UMKM --}}
                <li class="pc-item {{ request()->routeIs('admin.umkm.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.umkm.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-building-store"></i></span>
                        <span class="pc-mtext">UMKM</span>
                    </a>
                </li>

                {{-- FAQs --}}
                <li class="pc-item {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.faqs.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-help"></i></span>
                        <span class="pc-mtext">FAQs</span>
                    </a>
                </li>

                {{-- Caption: Statistics --}}
                <li class="pc-item pc-caption">
                    <label>Statistics</label>
                    <i class="ti ti-chart-bar"></i>
                </li>

                {{-- Statistics --}}
                <li class="pc-item pc-hasmenu {{ request()->routeIs('admin.statistics.*') ? 'active open' : '' }}">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-chart-bar"></i></span>
                        <span class="pc-mtext">Statistics</span>
                        <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link {{ request()->routeIs('admin.statistics.population*') ? 'active' : '' }}" href="{{ route('admin.statistics.population') }}">Population</a></li>
                        <li class="pc-item"><a class="pc-link {{ request()->routeIs('admin.statistics.education*') ? 'active' : '' }}" href="{{ route('admin.statistics.education') }}">Education</a></li>
                        <li class="pc-item"><a class="pc-link {{ request()->routeIs('admin.statistics.occupation*') ? 'active' : '' }}" href="{{ route('admin.statistics.occupation') }}">Occupation</a></li>
                        <li class="pc-item"><a class="pc-link {{ request()->routeIs('admin.statistics.health*') ? 'active' : '' }}" href="{{ route('admin.statistics.health') }}">Health</a></li>
                        <li class="pc-item"><a class="pc-link {{ request()->routeIs('admin.statistics.infrastructure*') ? 'active' : '' }}" href="{{ route('admin.statistics.infrastructure') }}">Infrastructure</a></li>
                        <li class="pc-item"><a class="pc-link {{ request()->routeIs('admin.statistics.economic*') ? 'active' : '' }}" href="{{ route('admin.statistics.economic') }}">Economic</a></li>
                        <li class="pc-item"><a class="pc-link {{ request()->routeIs('admin.statistics.social*') ? 'active' : '' }}" href="{{ route('admin.statistics.social') }}">Social</a></li>
                        <li class="pc-item"><a class="pc-link {{ request()->routeIs('admin.statistics.religion*') ? 'active' : '' }}" href="{{ route('admin.statistics.religion') }}">Religion</a></li>
                    </ul>
                </li>

                {{-- Caption: User Management --}}
                <li class="pc-item pc-caption">
                    <label>User Management</label>
                    <i class="ti ti-user"></i>
                </li>

                {{-- Users --}}
                <li class="pc-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-user"></i></span>
                        <span class="pc-mtext">Users</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
