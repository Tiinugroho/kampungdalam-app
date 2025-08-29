<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NewsScrapingController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TourismController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\StatisticController;
use App\Http\Controllers\Frontend\InfographicController;
use App\Http\Controllers\Frontend\NewsController as FrontendNewsController;
use App\Http\Controllers\Admin\VillageProfileController;
use App\Http\Controllers\Admin\VillageOfficialController;
use App\Http\Controllers\Admin\TourismPotentialController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\StatisticController as AdminStatisticController;
use App\Http\Controllers\SgdsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/statistik', [SgdsController::class, 'index'])->name('sgds');

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

// Alternative route names for compatibility
// Route::get('/statistik', [StatisticController::class, 'index'])->name('statistics');

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

    Route::get('/umkm', [HomeController::class, 'umkm'])->name('umkm');
    Route::get('/umkm/{id}', [HomeController::class, 'umkmDetail'])->name('umkm.detail');
    Route::get('/umkm/kategori/{category}', [HomeController::class, 'umkmByCategory'])->name('umkm.category');

    Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery');
    Route::get('/galeri/kategori/{category}', [HomeController::class, 'galleryByCategory'])->name('gallery.category');
});

// Route::get('/scrape-riau-news', [NewsScrapingController::class, 'scrapeRiauNews']);


// Contact & Utility Routes
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');
Route::post('/kontak', [HomeController::class, 'contactSubmit'])->name('contact.send');
Route::get('/cari', [HomeController::class, 'search'])->name('search');

// SEO Routes
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [HomeController::class, 'robots'])->name('robots');

// Dashboard Route (if needed for public dashboard)
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Authentication Routes
// Auth::routes();

// Admin Routes (Protected by auth middleware)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Village Profile Management
    Route::resource('village-profiles', VillageProfileController::class);

    // Village Officials Management
    Route::resource('village-officials', VillageOfficialController::class);

    // Services Management
    Route::resource('services', ServiceController::class);

    // News Management
    Route::resource('news', NewsController::class);
    Route::post('news/{news}/toggle-featured', [NewsController::class, 'toggleFeatured'])->name('news.toggle-featured');
    Route::post('news/{news}/toggle-published', [NewsController::class, 'togglePublished'])->name('news.toggle-published');

    // Gallery Management
    Route::resource('galleries', GalleryController::class);
    Route::post('galleries/{gallery}/toggle-featured', [GalleryController::class, 'toggleFeatured'])->name('galleries.toggle-featured');

    // Tourism Potential Management
    Route::resource('tourism-potentials', TourismPotentialController::class);
    Route::post('tourism-potentials/{tourismPotential}/toggle-featured', [TourismPotentialController::class, 'toggleFeatured'])->name('tourism-potentials.toggle-featured');
    Route::post('tourism-potentials/{tourismPotential}/toggle-active', [TourismPotentialController::class, 'toggleActive'])->name('tourism-potentials.toggle-active');

    // UMKM Management
    Route::resource('umkm', UmkmController::class);

    // FAQ Management
    Route::resource('faqs', FaqController::class);

    // Statistics Management
    Route::prefix('statistics')->name('statistics.')->group(function () {
        Route::get('/', [AdminStatisticController::class, 'index'])->name('index');
        Route::get('/population', [AdminStatisticController::class, 'population'])->name('population');
        Route::post('/population', [AdminStatisticController::class, 'storePopulation'])->name('population.store');
        Route::put('/population/{id}', [AdminStatisticController::class, 'updatePopulation'])->name('population.update');
        Route::delete('/population/{id}', [AdminStatisticController::class, 'destroyPopulation'])->name('population.destroy');

        Route::get('/education', [AdminStatisticController::class, 'education'])->name('education');
        Route::post('/education', [AdminStatisticController::class, 'storeEducation'])->name('education.store');
        Route::put('/education/{id}', [AdminStatisticController::class, 'updateEducation'])->name('education.update');
        Route::delete('/education/{id}', [AdminStatisticController::class, 'destroyEducation'])->name('education.destroy');

        Route::get('/occupation', [AdminStatisticController::class, 'occupation'])->name('occupation');
        Route::post('/occupation', [AdminStatisticController::class, 'storeOccupation'])->name('occupation.store');
        Route::put('/occupation/{id}', [AdminStatisticController::class, 'updateOccupation'])->name('occupation.update');
        Route::delete('/occupation/{id}', [AdminStatisticController::class, 'destroyOccupation'])->name('occupation.destroy');

        Route::get('/health', [AdminStatisticController::class, 'health'])->name('health');
        Route::post('/health', [AdminStatisticController::class, 'storeHealth'])->name('health.store');
        Route::put('/health/{id}', [AdminStatisticController::class, 'updateHealth'])->name('health.update');
        Route::delete('/health/{id}', [AdminStatisticController::class, 'destroyHealth'])->name('health.destroy');

        Route::get('/infrastructure', [AdminStatisticController::class, 'infrastructure'])->name('infrastructure');
        Route::post('/infrastructure', [AdminStatisticController::class, 'storeInfrastructure'])->name('infrastructure.store');
        Route::put('/infrastructure/{id}', [AdminStatisticController::class, 'updateInfrastructure'])->name('infrastructure.update');
        Route::delete('/infrastructure/{id}', [AdminStatisticController::class, 'destroyInfrastructure'])->name('infrastructure.destroy');

        Route::get('/economic', [AdminStatisticController::class, 'economic'])->name('economic');
        Route::post('/economic', [AdminStatisticController::class, 'storeEconomic'])->name('economic.store');
        Route::put('/economic/{id}', [AdminStatisticController::class, 'updateEconomic'])->name('economic.update');
        Route::delete('/economic/{id}', [AdminStatisticController::class, 'destroyEconomic'])->name('economic.destroy');

        Route::get('/social', [AdminStatisticController::class, 'social'])->name('social');
        Route::post('/social', [AdminStatisticController::class, 'storeSocial'])->name('social.store');
        Route::put('/social/{id}', [AdminStatisticController::class, 'updateSocial'])->name('social.update');
        Route::delete('/social/{id}', [AdminStatisticController::class, 'destroySocial'])->name('social.destroy');

        Route::get('/religion', [AdminStatisticController::class, 'religion'])->name('religion');
        Route::post('/religion', [AdminStatisticController::class, 'storeReligion'])->name('religion.store');
        Route::put('/religion/{id}', [AdminStatisticController::class, 'updateReligion'])->name('religion.update');
        Route::delete('/religion/{id}', [AdminStatisticController::class, 'destroyReligion'])->name('religion.destroy');
    });

    // User Management
    Route::resource('users', UserController::class);
    Route::post('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
});
// Authentication Routes dari Breeze
require __DIR__ . '/auth.php';
