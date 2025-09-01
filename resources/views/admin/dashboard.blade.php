@extends('admin.partials.master')
@section('title', 'Dashboard')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Dashboard</strong> Desa {{ $profile->village_name ?? 'Kampung Dalam' }}</h1>

        {{-- Statistik Cards --}}
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Penduduk</h5>
                        <h2>{{ number_format($stats['total_population']) }}</h2>
                        <p class="text-muted mb-0">Total Keluarga: {{ number_format($stats['total_families']) }}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Berita</h5>
                        <h2>{{ $stats['total_news'] }}</h2>
                        <p class="text-success mb-0">Published: {{ $stats['published_news'] }}</p>
                        <p class="text-danger mb-0">Draft: {{ $stats['draft_news'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Layanan</h5>
                        <h2>{{ $stats['total_services'] }}</h2>
                        <p class="text-success mb-0">Active: {{ $stats['active_services'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">UMKM</h5>
                        <h2>{{ $stats['total_umkm'] }}</h2>
                        <p class="text-success mb-0">Active: {{ $stats['active_umkm'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Chart Berita Bulanan --}}
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Statistik Berita ({{ date('Y') }})</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="newsChart"></canvas>
                    </div>
                </div>
            </div>

            {{-- Recent Activities --}}
            <div class="col-12 col-lg-4">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Aktivitas Terbaru</h5>
                    </div>
                    <div class="card-body">
                        <h6>Berita</h6>
                        <ul>
                            @foreach($recentNews as $news)
                                <li>{{ $news->title }} <small class="text-muted">oleh {{ $news->author->name ?? '-' }}</small></li>
                            @endforeach
                        </ul>

                        <h6>Galeri</h6>
                        <ul>
                            @foreach($recentGalleries as $gallery)
                                <li>{{ $gallery->title }}</li>
                            @endforeach
                        </ul>

                        <h6>UMKM</h6>
                        <ul>
                            @foreach($recentUmkm as $umkm)
                                <li>{{ $umkm->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

{{-- ChartJS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('newsChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json(range(1,12)),
            datasets: [{
                label: 'Jumlah Berita',
                data: @json(array_values($monthlyNews->toArray())),
                backgroundColor: 'rgba(54, 162, 235, 0.7)'
            }]
        },
    });
</script>
@endsection
