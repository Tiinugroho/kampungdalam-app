@extends('partials.master')

@section('title', 'Struktur Organisasi - Kampung Dalam')
@section('description',
    'Struktur organisasi pemerintahan Desa Kampung Dalam yang profesional dan berorientasi
    pelayanan')

@section('content')
    <section id="hero" class="hero section">
        <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title" data-aos="fade-up">Struktur Organisasi</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Struktur pemerintahan desa yang solid dan profesional
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="organization-chart section">
        <div class="container">
            <div class="org-chart-container" data-aos="fade-up">
                {{-- Kepala Desa --}}
                @php
                    $head = $officials->firstWhere('position', 'Kepala Desa');
                    $secretary = $officials->firstWhere('position', 'Sekretaris Desa');
                    $staffs = $officials->filter(function($item) {
                        return !in_array($item->position, ['Kepala Desa', 'Sekretaris Desa']);
                    });
                @endphp

                @if($head)
                <div class="org-level level-1">
                    <div class="org-card head-card">
                        <div class="org-photo">
                            <img src="{{ $head->photo_url }}" alt="{{ $head->name }}">
                        </div>
                        <div class="org-info">
                            <h4>{{ $head->name }}</h4>
                            <p>{{ $head->position }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="connection-line vertical"></div>

                {{-- Sekretaris --}}
                @if($secretary)
                <div class="org-level level-2">
                    <div class="org-card secretary-card">
                        <div class="org-photo">
                            <img src="{{ $secretary->photo_url }}" alt="{{ $secretary->name }}">
                        </div>
                        <div class="org-info">
                            <h4>{{ $secretary->name }}</h4>
                            <p>{{ $secretary->position }}</p>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Staff lainnya --}}
                @if($staffs->count())
                <div class="connection-lines">
                    <div class="connection-line vertical short"></div>
                    <div class="connection-line horizontal"></div>
                    @foreach($staffs as $i => $staff)
                        <div class="connection-line vertical short down" style="left: {{ $i * (100 / max(1, $staffs->count()-1)) }}%"></div>
                    @endforeach
                </div>

                <div class="org-level level-3">
                    @foreach($staffs as $staff)
                        <div class="org-card dept-card">
                            <div class="org-photo">
                                <img src="{{ $staff->photo_url }}" alt="{{ $staff->name }}">
                            </div>
                            <div class="org-info">
                                <h5>{{ $staff->name }}</h5>
                                <p>{{ $staff->position }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>
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

        /* Organization Chart Styles */
        .org-chart-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            padding: 2rem 0;
        }

        .org-level {
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .level-3 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .org-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
        }

        .org-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .head-card {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            max-width: 350px;
        }

        .secretary-card {
            background: linear-gradient(135deg, #059669, #10b981);
            color: white;
            max-width: 300px;
        }

        .dept-card {
            background: white;
            border: 2px solid #e5e7eb;
        }

        .org-photo {
            width: 100px;
            height: 100px;
            margin: 0 auto 1.5rem;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid rgba(255, 255, 255, 0.3);
        }

        .dept-card .org-photo {
            width: 80px;
            height: 80px;
            border: 3px solid #e5e7eb;
        }

        .org-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .org-info h4 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .org-info h5 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }

        .org-info p {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            opacity: 0.9;
        }

        .dept-card .org-info p {
            color: #3b82f6;
            font-weight: 600;
        }

        .period {
            font-size: 0.9rem;
            opacity: 0.8;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            display: inline-block;
        }

        .responsibilities {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            justify-content: center;
            margin-top: 1rem;
        }

        .resp-tag {
            background: #f3f4f6;
            color: #374151;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .connection-line {
            background: #d1d5db;
            position: absolute;
        }

        .connection-line.vertical {
            width: 2px;
            height: 60px;
            left: 50%;
            transform: translateX(-50%);
            top: -30px;
        }

        .connection-line.vertical.short {
            height: 30px;
            top: -15px;
        }

        .connection-line.vertical.down {
            top: auto;
            bottom: -45px;
        }

        .connection-line.horizontal {
            height: 2px;
            width: 80%;
            left: 10%;
            top: -30px;
        }

        .connection-lines {
            position: relative;
            height: 0;
            margin-bottom: 2rem;
        }

        .rt-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .rt-card:hover {
            transform: translateY(-10px);
        }

        .rt-header {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .rt-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }

        .rt-header h4 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }

        .rt-info {
            padding: 2rem;
            text-align: center;
        }

        .rt-info h5 {
            color: #1f2937;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .rt-area {
            color: #6b7280;
            margin-bottom: 1.5rem;
        }

        .rt-stats {
            display: flex;
            justify-content: space-around;
            border-top: 1px solid #e5e7eb;
            padding-top: 1rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            display: block;
            font-size: 1.5rem;
            font-weight: 700;
            color: #3b82f6;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #6b7280;
        }

        .info-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-10px);
        }

        .info-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 1.8rem;
        }

        .info-card h4 {
            color: #1f2937;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .info-card p {
            color: #6b7280;
            line-height: 1.6;
            margin: 0;
        }

        @media (max-width: 768px) {
            .level-3 {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .org-card {
                padding: 1.5rem;
            }

            .org-photo {
                width: 80px;
                height: 80px;
            }

            .connection-lines {
                display: none;
            }

            .rt-header,
            .rt-info {
                padding: 1.5rem;
            }
        }
    </style>
@endpush
