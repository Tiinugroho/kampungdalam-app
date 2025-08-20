{{-- 
===========================================
FILE: resources/views/contact.blade.php
DESKRIPSI: Halaman Kontak
ROUTE: /kontak
===========================================
--}}

@extends('partials.master')

@section('title', 'Kontak Kami - Kampung Dalam')
@section('description', 'Hubungi Desa Kampung Dalam untuk pertanyaan, saran, atau informasi lebih lanjut.')

@section('content')
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Kontak Kami</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan, saran, atau membutuhkan bantuan.
                        Kami siap melayani Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section id="contact" class="contact section">
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

        /* Contact Page Styles */
        .contact-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-10px);
        }

        .contact-icon {
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

        .contact-card:hover .contact-icon {
            transform: scale(1.1);
        }

        .contact-card h4 {
            color: #1f2937;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .contact-details {
            margin-bottom: 2rem;
        }

        .contact-details p {
            color: #6b7280;
            margin-bottom: 0.5rem;
            line-height: 1.6;
        }

        .contact-details strong {
            color: #374151;
        }

        .contact-btn {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 1rem 2rem;
            border-radius: 15px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .contact-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
            color: white;
        }

        .contact-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .contact-map {
            margin-top: 4rem;
        }

        .form-card {
            background: white;
            padding: 3rem;
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.75rem;
            display: block;
        }

        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 15px;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
            outline: none;
        }

        .form-check {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }

        .form-check-input {
            margin-top: 0.25rem;
        }

        .form-check-label {
            color: #6b7280;
            line-height: 1.6;
        }

        .form-check-label a {
            color: #3b82f6;
            text-decoration: none;
        }

        .form-check-label a:hover {
            text-decoration: underline;
        }

        .submit-btn {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            padding: 1.25rem 3rem;
            border: none;
            border-radius: 20px;
            font-weight: 700;
            font-size: 1.1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
        }

        .submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .hours-card {
            background: white;
            padding: 3rem;
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .hours-grid {
            display: grid;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .hours-item {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            align-items: center;
            padding: 1.5rem;
            background: #f8fafc;
            border-radius: 15px;
            border-left: 4px solid #e5e7eb;
        }

        .hours-item:nth-child(1),
        .hours-item:nth-child(2) {
            border-left-color: #10b981;
        }

        .hours-item:nth-child(3),
        .hours-item:nth-child(4) {
            border-left-color: #ef4444;
        }

        .day {
            font-weight: 700;
            color: #1f2937;
        }

        .time {
            color: #6b7280;
            font-weight: 600;
        }

        .status {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            text-align: center;
        }

        .status.open {
            background: #dcfce7;
            color: #166534;
        }

        .status.closed {
            background: #fee2e2;
            color: #991b1b;
        }

        .hours-note {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.5rem;
            background: #eff6ff;
            border-radius: 15px;
            border-left: 4px solid #3b82f6;
        }

        .hours-note i {
            color: #3b82f6;
            font-size: 1.2rem;
            margin-top: 0.25rem;
        }

        .hours-note p {
            color: #1e40af;
            margin: 0;
            line-height: 1.6;
        }

        .map-container {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border-radius: 20px 20px 0 0;
            padding: 2rem;
        }

        .modal-title {
            font-weight: 700;
            font-size: 1.3rem;
        }

        .btn-close {
            filter: invert(1);
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-body h6 {
            color: #1f2937;
            font-weight: 700;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }

        .modal-body h6:first-child {
            margin-top: 0;
        }

        .modal-body p,
        .modal-body li {
            color: #6b7280;
            line-height: 1.6;
        }

        .modal-body ul {
            padding-left: 1.5rem;
        }

        .contact .info-item {
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .contact .info-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .contact .info-item i {
            font-size: 24px;
            color: var(--primary-color);
            background: var(--light-bg);
            padding: 10px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .contact .info-item h4 {
            padding: 0;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--primary-color);
        }

        .contact .info-item p {
            padding: 0;
            margin-bottom: 0;
            font-size: 14px;
            color: #666;
        }

        .contact .php-email-form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        }

        .contact .php-email-form .form-control {
            border-radius: 5px;
            border-color: #ddd;
            padding: 10px 15px;
        }

        .contact .php-email-form textarea {
            min-height: 150px;
        }

        .contact .php-email-form button[type="submit"] {
            background: var(--primary-color);
            border: 0;
            padding: 10px 30px;
            color: #fff;
            transition: 0.3s;
            border-radius: 50px;
        }

        .contact .php-email-form button[type="submit"]:hover {
            background: #2563eb;
        }

        .contact-section .info-box,
        .contact-section .contact-form {
            border-radius: 15px;
        }

        .contact-section .info-box h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 0.2rem;
        }

        .contact-section .info-box p {
            font-size: 0.95rem;
            color: #6b7280;
            margin-bottom: 0;
        }

        .contact-section .form-label {
            font-weight: 600;
            color: var(--text-color);
        }

        .contact-section .form-control,
        .contact-section .form-select {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border-color: var(--border-color);
        }

        .contact-section .form-control:focus,
        .contact-section .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(30, 64, 175, 0.25);
        }

        .contact-section .map-container {
            border: 1px solid var(--border-color);
        }

        @media (max-width: 768px) {
            .contact-card {
                padding: 2rem;
            }

            .contact-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .form-card {
                padding: 2rem;
            }

            .hours-card {
                padding: 2rem;
            }

            .hours-item {
                grid-template-columns: 1fr;
                gap: 0.5rem;
                text-align: center;
            }

            .hours-note {
                flex-direction: column;
                text-align: center;
            }

            .modal-header,
            .modal-body {
                padding: 1.5rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Contact form submission
            document.getElementById('contactForm').addEventListener('submit', function(e) {
                e.preventDefault();

                // Get form data
                const formData = new FormData(this);
                const submitBtn = document.querySelector('.btn-primary[type="submit"]');
                const originalText = submitBtn.innerHTML;

                // Show loading state
                submitBtn.innerHTML =
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mengirim...';
                submitBtn.disabled = true;

                // Simulate form submission
                setTimeout(() => {
                    // Show success message
                    // This part would typically involve an actual fetch/XHR request
                    // For now, we simulate success
                    const successMessage = document.createElement('div');
                    successMessage.className =
                        'alert alert-success alert-dismissible fade show mt-3';
                    successMessage.innerHTML = `Pesan Anda telah terkirim. Terima kasih!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;
                    submitBtn.closest('form').insertAdjacentElement('beforebegin', successMessage);

                    // Reset form
                    this.reset();

                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        });
    </script>
@endpush
