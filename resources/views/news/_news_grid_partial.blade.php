{{-- 
===========================================
FILE: resources/views/news/_news_grid_partial.blade.php
DESKRIPSI: Partial untuk grid berita dan paginasi (digunakan oleh AJAX)
===========================================
--}}

<div class="row gy-4">
    @forelse($allNews as $news)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="news-card" data-category="{{ $news->category }}">
                <div class="news-image">
                    <img src="{{ $news->featured_image ? Storage::url('news/' . $news->featured_image) : '/placeholder.svg?height=250&width=400&text=Berita' }}"
                        alt="{{ $news->title }}" loading="lazy">
                    <div class="news-overlay">
                        <span class="news-category">{{ ucfirst($news->category) }}</span>
                    </div>
                </div>
                <div class="news-content">
                    <div class="news-meta">
                        <span class="news-date">
                            <i class="bi bi-calendar"></i>
                            {{ $news->published_at->format('d M Y') }}
                        </span>
                        <span class="news-views">
                            <i class="bi bi-eye"></i>
                            {{ $news->views }}
                        </span>
                    </div>
                    <h4 class="news-title">
                        <a href="{{ route('news.show', $news->slug) }}">
                            {{ $news->title }}
                        </a>
                    </h4>
                    <p class="news-excerpt">
                        {{ Str::limit($news->excerpt, 120) }}
                    </p>
                    <div class="news-footer">
                        <span class="news-author">
                            <i class="bi bi-person"></i>
                            {{ $news->author->name ?? 'Admin Desa' }}
                        </span>
                        <a href="{{ route('news.show', $news->slug) }}" class="read-more">
                            Baca <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-newspaper display-1 text-muted"></i>
            <h3 class="mt-3 text-muted">Belum ada berita tersedia</h3>
            <p class="text-muted">Silakan cek kembali nanti atau gunakan filter lain.</p>
        </div>
    @endforelse
</div>

{{-- Pagination --}}
<div class="row mt-5">
    <div class="col-12">
        <nav class="pagination-nav" data-aos="fade-up">
            {{ $allNews->links('pagination::bootstrap-5') }}
        </nav>
    </div>
</div>
