<?php
use Illuminate\Support\Str;
use Carbon\Carbon;
?>

@extends('partials.master')

@section('title', $galleryItem->title . ' - Galeri Foto Desa')
@section('description', Str::limit(strip_tags($galleryItem->description), 150))

@section('content')
  {{-- Hero Section --}}
  <section id="hero" class="hero section">
      <div class="hero-bg" style="background-image: url('{{ asset('slider1.jpg') }}');"></div> {{-- Ganti dengan gambar hero galeri --}}
      <div class="hero-overlay"></div>
      <div class="container">
          <div class="row justify-content-center text-center">
              <div class="col-lg-8">
                  <h1 class="hero-title" data-aos="fade-up">{{ $galleryItem->title }}</h1>
                  <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                      Momen dan keindahan Desa Kampung Dalam dalam gambar.
                  </p>
              </div>
          </div>
      </div>
  </section>

  {{-- Gallery Detail Section --}}
  <section class="gallery-detail section bg-light">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <article class="gallery-article bg-white p-5 rounded-lg shadow-sm">
                      <img src="{{ $galleryItem->image_url }}" class="img-fluid rounded mb-4" alt="{{ $galleryItem->title }}">
                      <span class="badge bg-info mb-3">{{ $galleryItem->category }}</span>
                      <h2 class="mb-3">{{ $galleryItem->title }}</h2>
                      <p class="text-muted mb-4"><i class="bi bi-calendar-event"></i> {{ Carbon::parse($galleryItem->published_at)->translatedFormat('d F Y') }}</p>
                      <div class="article-content">
                          <p>{{ $galleryItem->description }}</p>
                          {{-- Add more detailed content if available --}}
                      </div>
                      <div class="mt-5 pt-4 border-top text-center">
                          <a href="{{ route('gallery.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Kembali ke Galeri Foto</a>
                      </div>
                  </article>
              </div>
              <div class="col-lg-4 mt-4 mt-lg-0">
                  <div class="sidebar">
                      <div class="sidebar-widget related-gallery-widget">
                          <h4 class="sidebar-title">Foto Terkait Lainnya</h4>
                          @if($relatedItems->isEmpty())
                              <p class="text-muted">Tidak ada foto terkait lainnya.</p>
                          @else
                              <ul class="list-unstyled">
                                  @foreach($relatedItems as $related)
                                      <li class="mb-3 pb-3 border-bottom">
                                          <h5 class="mb-1"><a href="{{ url('/potensi/galeri/' . $related->slug) }}">{{ $related->title }}</a></h5>
                                          <small class="text-muted"><i class="bi bi-calendar-event"></i> {{ Carbon::parse($related->published_at)->translatedFormat('d F Y') }}</small>
                                      </li>
                                  @endforeach
                              </ul>
                          @endif
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection

@push('styles')
<style>
  /* Specific styles for gallery detail page */
  .gallery-article {
      line-height: 1.8;
      font-size: 1.05rem;
      color: var(--text-color);
  }

  .gallery-article h2, .gallery-article h3 {
      color: var(--heading-color);
      margin-top: 1.5rem;
      margin-bottom: 1rem;
  }

  .gallery-article p {
      margin-bottom: 1rem;
  }

  .gallery-article img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
      margin: 1.5rem 0;
      display: block;
  }

  .sidebar {
      background: white;
      padding: 2rem;
