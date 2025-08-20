<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="footer-logo">
                        <img src="{{ asset('Lambang_Kabupaten_Siak.png') }}" alt="Logo Siak" class="footer-logo-img">
                        <div class="footer-logo-text">
                            <h3 class="footer-sitename">Kampung Dalam</h3>
                            <span class="footer-tagline">Desa Digital Terdepan</span>
                        </div>
                    </div>
                    <p class="footer-description">
                        Desa Kampung Dalam berkomitmen untuk memberikan pelayanan terbaik kepada masyarakat melalui 
                        inovasi digital dan transparansi pemerintahan yang baik.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-link instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-link youtube"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="social-link whatsapp"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Navigasi</h4>
                    <ul>
                        <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right"></i> Beranda</a></li>
                        <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right"></i> Tentang Desa</a></li>
                        <li><a href="{{ route('news.index') }}"><i class="bi bi-chevron-right"></i> Berita</a></li>
                        <li><a href="{{ route('services') }}"><i class="bi bi-chevron-right"></i> Layanan</a></li>
                        <li><a href="{{ route('contact') }}"><i class="bi bi-chevron-right"></i> Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Layanan Populer</h4>
                    <ul>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Surat Keterangan Domisili</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Surat Keterangan Tidak Mampu</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Surat Pengantar Nikah</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Surat Keterangan Usaha</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Surat Keterangan Kelahiran</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Kontak Kami</h4>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="bi bi-geo-alt"></i>
                            <div>
                                <strong>Alamat:</strong>
                                {{ $profile->contact_address ?? 'Jl. Raya Kampung Dalam, Kec. Siak, Kab. Siak, Riau 28671' }}
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="bi bi-telephone"></i>
                            <div>
                                <strong>Telepon:</strong>
                                {{ $profile->contact_phone ?? '+62 761 123456' }}
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="bi bi-envelope"></i>
                            <div>
                                <strong>Email:</strong>
                                {{ $profile->contact_email ?? 'kampungdalam@siak.go.id' }}
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="bi bi-clock"></i>
                            <div>
                                <strong>Jam Pelayanan:</strong>
                                Senin - Jumat: 08:00 - 16:00 WIB<br>
                                Sabtu: 08:00 - 12:00 WIB
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- FIXED: Simple footer bottom without card -->
    <div class="footer-bottom">
        <div class="container">
            <div class="text-center">
                <p class="copyright-text">
                    © {{ date('Y') }} <strong>Desa Kampung Dalam</strong>. All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
    /* FIXED: Team Members - Consistent Card Heights */
.team .row {
    display: flex;
    flex-wrap: wrap;
    align-items: stretch; /* Ensure all cards have same height */
}

.team .col-xl-3,
.team .col-md-6 {
    display: flex;
    margin-bottom: 2rem;
}

.member {
    background: var(--neutral-white);
    border-radius: 20px;
    padding: 2rem;
    text-align: center;
    box-shadow: var(--shadow-lg);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid var(--neutral-gray-200);
    position: relative;
    z-index: 5;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    width: 100%;
    min-height: 400px; /* Consistent minimum height */
    max-height: 450px; /* Maximum height to prevent too tall cards */
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
    flex-shrink: 0; /* Prevent image from shrinking */
}

.member:hover img {
    border-color: var(--success-green);
}

.member-content {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
    padding: 0.5rem 0;
}

.member h4 {
    color: var(--neutral-gray-900);
    margin-bottom: 0.5rem;
    font-weight: 700;
    font-size: 1.2rem;
    line-height: 1.3;
    min-height: 2.6rem; /* Consistent height for names */
    display: flex;
    align-items: center;
    justify-content: center;
}

.member span {
    color: var(--primary-blue);
    font-weight: 600;
    display: block;
    font-size: 1rem;
    margin-bottom: 1rem;
    line-height: 1.4;
    min-height: 2.8rem; /* Consistent height for positions */
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.member .social {
    margin-top: auto;
    display: flex;
    justify-content: center;
    gap: 0.75rem;
    padding-top: 1rem;
    flex-shrink: 0; /* Prevent social links from shrinking */
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

/* FIXED: Mobile Dropdown - Left Aligned */
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
    text-align: left !important; /* Force left alignment */
}

.mobile-dropdown.active .mobile-dropdown-menu {
    max-height: 500px;
    padding-bottom: 0.5rem;
}

.mobile-dropdown-menu li {
    margin: 0;
    text-align: left !important; /* Force left alignment */
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
    text-align: left !important; /* Force left alignment */
    justify-content: flex-start !important; /* Force left alignment */
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
    flex-shrink: 0;
}

/* FIXED: Mobile Navigation - All Left Aligned */
.mobile-nav-list {
    list-style: none;
    padding: 0;
    margin: 0;
    text-align: left !important;
}

.mobile-nav-list > li {
    margin-bottom: 0.5rem;
    text-align: left !important;
}

.mobile-nav-list > li > a {
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
    text-align: left !important;
    justify-content: flex-start !important;
}

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
    text-align: left !important;
}

.mobile-dropdown-toggle .mobile-toggle-icon {
    margin-left: auto;
    flex-shrink: 0;
}

/* FIXED: Footer Mobile Responsive */
.footer {
    background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 50%, #059669 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.03)"/><circle cx="20" cy="80" r="0.5" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.footer-top {
    padding: 4rem 0 2rem;
    position: relative;
    z-index: 2;
}

.footer-about {
    margin-bottom: 2rem;
}

.footer-logo {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
}

.footer-logo-img {
    width: 50px;
    height: 60px;
    margin-right: 1rem;
    flex-shrink: 0;
}

.footer-logo-text h3 {
    color: white;
    font-size: 1.5rem;
    font-weight: 800;
    margin: 0;
    letter-spacing: -0.025em;
}

.footer-tagline {
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
}

.footer-description {
    color: white;
    line-height: 1.7;
    margin-bottom: 2rem;
    font-size: 0.95rem;
}

.social-links {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.social-link {
    width: 44px;
    height: 44px;
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(10px);
}

.social-link:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.4);
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    color: white;
}

.social-link.facebook:hover { background: #1877f2; border-color: #1877f2; }
.social-link.instagram:hover { background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); border-color: #bc1888; }
.social-link.youtube:hover { background: #ff0000; border-color: #ff0000; }
.social-link.whatsapp:hover { background: #25d366; border-color: #25d366; }

.footer-links h4,
.footer-contact h4 {
    color: white;
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 0.5rem;
}

.footer-links h4::after,
.footer-contact h4::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 3px;
    background: linear-gradient(135deg, #60a5fa 0%, #34d399 100%);
    border-radius: 2px;
}

.footer-links ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links ul li {
    margin-bottom: 0.75rem;
}

.footer-links ul li a {
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    font-size: 0.9rem;
}

.footer-links ul li a i {
    margin-right: 0.5rem;
    font-size: 0.8rem;
    transition: transform 0.3s ease;
}

.footer-links ul li a:hover {
    color: #60a5fa;
    padding-left: 0.5rem;
}

.footer-links ul li a:hover i {
    transform: translateX(3px);
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.contact-item i {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #60a5fa;
    font-size: 1.1rem;
    flex-shrink: 0;
    margin-top: 2px;
}

.contact-item div {
    color: white;
    font-size: 0.9rem;
    line-height: 1.6;
}

.contact-item strong {
    color: white;
    display: block;
    margin-bottom: 0.25rem;
}

.footer-bottom {
    background: rgba(0, 0, 0, 0.2);
    padding: 1.5rem 0;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    position: relative;
    z-index: 2;
}

.copyright-text {
    color: white;
    font-size: 0.9rem;
    margin: 0;
}

/* FIXED: Mobile Responsive Styles */
@media (max-width: 991px) {
    /* Team Members Mobile */
    .member {
        min-height: 350px;
        max-height: 400px;
        padding: 1.5rem;
    }
    
    .member img {
        width: 100px;
        height: 100px;
    }
    
    .member h4 {
        font-size: 1.1rem;
        min-height: 2.2rem;
    }
    
    .member span {
        font-size: 0.9rem;
        min-height: 2.4rem;
    }
}

@media (max-width: 768px) {
    /* Team Members Mobile */
    .team .col-xl-3,
    .team .col-md-6 {
        flex: 0 0 100%;
        max-width: 100%;
        margin-bottom: 1.5rem;
    }
    
    .member {
        min-height: 320px;
        max-height: 380px;
        padding: 1.25rem;
        margin: 0 auto;
        max-width: 350px;
    }
    
    .member img {
        width: 90px;
        height: 90px;
        margin-bottom: 1rem;
    }
    
    .member h4 {
        font-size: 1rem;
        min-height: 2rem;
    }
    
    .member span {
        font-size: 0.85rem;
        min-height: 2.2rem;
    }
    
    /* Footer Mobile */
    .footer-top {
        padding: 3rem 0 1.5rem;
    }
    
    .footer-about {
        text-align: center;
        margin-bottom: 3rem;
    }
    
    .footer-logo {
        justify-content: center;
        text-align: center;
    }
    
    .footer-description {
        text-align: center;
    }
    
    .social-links {
        justify-content: center;
    }
    
    .footer-links,
    .footer-contact {
        margin-bottom: 2.5rem;
        text-align: left !important;
    }
    
    .footer-links h4,
    .footer-contact h4 {
        text-align: left !important;
        margin-bottom: 1rem;
    }
    
    .footer-links h4::after,
    .footer-contact h4::after {
        left: 0;
        transform: none;
    }
    
    .contact-info {
        align-items: flex-start;
    }
    
    .contact-item {
        flex-direction: row;
        text-align: left;
        gap: 1rem;
        align-items: flex-start;
    }
    
    .contact-item i {
        margin-top: 0;
    }
    
    .contact-item div {
        flex: 1;
    }
    
    /* Mobile Navigation Fixes */
    .mobile-nav-content {
        padding: 1rem;
    }
    
    .mobile-nav-list > li > a,
    .mobile-dropdown-toggle {
        padding: 0.875rem;
        font-size: 0.95rem;
    }
    
    .mobile-dropdown-menu a {
        padding: 0.625rem 0.875rem 0.625rem 1.75rem;
        font-size: 0.85rem;
    }
}

@media (max-width: 576px) {
    /* Team Members Small Mobile */
    .member {
        min-height: 300px;
        max-height: 350px;
        padding: 1rem;
        max-width: 320px;
    }
    
    .member img {
        width: 80px;
        height: 80px;
    }
    
    .member h4 {
        font-size: 0.95rem;
        min-height: 1.9rem;
    }
    
    .member span {
        font-size: 0.8rem;
        min-height: 2rem;
    }
    
    .member .social a {
        width: 38px;
        height: 38px;
        font-size: 1rem;
    }
    
    /* Footer Small Mobile */
    .footer-top {
        padding: 2.5rem 0 1rem;
    }
    
    .footer-logo-img {
        width: 40px;
        height: 48px;
    }
    
    .footer-logo-text h3 {
        font-size: 1.3rem;
    }
    
    .footer-description {
        font-size: 0.9rem;
    }
    
    .social-link {
        width: 40px;
        height: 40px;
    }
    
    .footer-links h4,
    .footer-contact h4 {
        font-size: 1.1rem;
    }
    
    .footer-links ul li a,
    .contact-item div {
        font-size: 0.85rem;
    }
    
    .contact-item i {
        width: 36px;
        height: 36px;
        font-size: 1rem;
    }
    
    .copyright-text {
        font-size: 0.8rem;
    }
    
    /* Mobile Navigation Small */
    .mobile-nav-header {
        padding: 1rem;
    }
    
    .mobile-nav-content {
        padding: 0.75rem;
    }
    
    .mobile-nav-list > li > a,
    .mobile-dropdown-toggle {
        padding: 0.75rem;
        font-size: 0.9rem;
    }
    
    .mobile-dropdown-menu a {
        padding: 0.5rem 0.75rem 0.5rem 1.5rem;
        font-size: 0.8rem;
    }
}

/* CSS Variables */
:root {
    --primary-blue: #3b82f6;
    --success-green: #059669;
    --neutral-gray-600: #6b7280;
    --neutral-gray-700: #374151;
    --neutral-gray-900: #111827;
    --neutral-white: #ffffff;
    --neutral-gray-200: #e5e7eb;
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
}

</style>
