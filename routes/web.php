<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\VillageProfileController;
use App\Http\Controllers\Admin\VillageOfficialController;
use App\Http\Controllers\Admin\TourismPotentialController;
use App\Http\Controllers\Admin\SgdsController as AdminSgdsController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TourismController;
use App\Http\Controllers\Frontend\SgdsController as FrontendSgdsController;
use App\Http\Controllers\Frontend\NewsController as FrontendNewsController;
use App\Http\Controllers\FrontEnd\GalleryController as FrontEndGalleryController;

// use App\Http\Controllers\FrontEnd\SgdsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/statistik', [FrontendSgdsController::class, 'index'])->name('sgds');

// Profile Routes
Route::prefix('profil')->group(function () {
    Route::get('/tentang', [HomeController::class, 'about'])->name('about');
    Route::get('/sejarah', [HomeController::class, 'history'])->name('history');
    Route::get('/visi-misi', [HomeController::class, 'visionMission'])->name('vision-mission');
    Route::get('/perangkat-desa', [HomeController::class, 'officials'])->name('officials');
    Route::get('/struktur-organisasi', [HomeController::class, 'organizationStructure'])->name('organization-structure');
});

// Information Routes
Route::prefix('informasi')->group(function () {
    Route::get('/berita', [FrontendNewsController::class, 'index'])->name('news.index');
    Route::get('/berita/{slug}', [FrontendNewsController::class, 'show'])->name('news.show');

    Route::get('/layanan', [HomeController::class, 'services'])->name('services');
    Route::get('/layanan/{slug}', [HomeController::class, 'serviceDetail'])->name('services.detail');
    Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
});

// Tourism Routes
Route::prefix('wisata')->name('tourism.')->group(function () {
    Route::get('/', [TourismController::class, 'index'])->name('index');
    Route::get('/kategori/{category}', [TourismController::class, 'category'])->name('category');
    Route::get('/{slug}', [TourismController::class, 'show'])->name('show');
});

// Potential Routes (Legacy support)
Route::prefix('potensi')->group(function () {
    Route::get('/wisata', [TourismController::class, 'index'])->name('tourism');
    Route::get('/wisata/{slug}', [TourismController::class, 'show'])->name('tourism.detail');
    Route::get('/wisata/kategori/{category}', [TourismController::class, 'category'])->name('tourism.category');

    Route::get('/galeri', [FrontEndGalleryController::class, 'index'])->name('gallery');
    Route::get('/galeri/kategori/{category}', [FrontEndGalleryController::class, 'category'])->name('gallery.category');
});

// Contact & Utility Routes
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');
Route::post('/kontak', [HomeController::class, 'contactSubmit'])->name('contact.send');
Route::get('/cari', [HomeController::class, 'search'])->name('search');

// SEO Routes
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [HomeController::class, 'robots'])->name('robots');

// Admin Routes (Protected by auth middleware)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('village-profiles', VillageProfileController::class);
    Route::resource('village-official', VillageOfficialController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('news', NewsController::class);
    Route::post('news/{news}/toggle-featured', [NewsController::class, 'toggleFeatured'])->name('news.toggle-featured');
    Route::post('news/{news}/toggle-published', [NewsController::class, 'togglePublished'])->name('news.toggle-published');
    
    Route::resource('galleries', AdminGalleryController::class);
    Route::post('galleries/{gallery}/toggle-featured', [AdminGalleryController::class, 'toggleFeatured'])->name('galleries.toggle-featured');
    
    Route::resource('tourism-potentials', TourismPotentialController::class);
    Route::post('tourism-potentials/{tourismPotential}/toggle-featured', [TourismPotentialController::class, 'toggleFeatured'])->name('tourism-potentials.toggle-featured');
    Route::post('tourism-potentials/{tourismPotential}/toggle-active', [TourismPotentialController::class, 'toggleActive'])->name('tourism-potentials.toggle-active');
    
    Route::resource('umkm', UmkmController::class);
    Route::post('umkm/{umkm}/toggle-active', [UmkmController::class, 'toggleActive'])->name('umkm.toggle-active');
    
    Route::resource('sgds', AdminSgdsController::class);
    Route::resource('users', UserController::class);
    Route::post('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
});

// Authentication Routes dari Breeze
require __DIR__ . '/auth.php';
