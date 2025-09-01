<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use App\Models\PopulationStatistic;
use App\Models\News;
use App\Models\Service;
use App\Models\VillageOfficial;
use App\Models\Gallery;
use App\Models\TourismPotential;
use App\Models\Umkm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        $profile = VillageProfile::first();

        // Ambil data kependudukan terbaru (kalau ada migration population)
        $latestPopulation = VillageProfile::latest()->first();
        // Statistik
        $stats = [
            'total_population'   => $latestPopulation->total_population ?? 0,
            'total_families'     => $latestPopulation->total_families ?? 0,
            'total_news'         => News::count(),
            'published_news'     => News::where('status', 'published')->count(),
            'draft_news'         => News::where('status', 'draft')->count(),
            'total_services'     => Service::count(),
            'active_services'    => Service::where('is_active', true)->count(),
            'total_officials'    => VillageOfficial::count(),
            'active_officials'   => VillageOfficial::where('is_active', true)->count(),
            'total_galleries'    => Gallery::count(),
            'featured_galleries' => Gallery::where('is_featured', true)->count(),
            'total_tourism'      => TourismPotential::count(),
            'active_tourism'     => TourismPotential::where('is_active', true)->count(),
            'total_umkm'         => Umkm::count(),
            'active_umkm'        => Umkm::where('is_active', true)->count(),
            'total_users'        => User::count(),
        ];

        // Recent activities
        $recentNews      = News::with('author')->latest()->take(5)->get();
        $recentGalleries = Gallery::latest()->take(5)->get();
        $recentUmkm      = Umkm::latest()->take(5)->get();

        // Statistik berita bulanan (untuk chart)
        $monthlyNews = News::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        return view('admin.dashboard', compact(
            'profile',
            'stats',
            'recentNews',
            'recentGalleries',
            'recentUmkm',
            'monthlyNews'
        ));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();
        $data = $request->only(['name', 'email']);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password berhasil diperbarui.');
    }

    public function settings()
    {
        $settings = [
            'site_name' => config('app.name'),
            'site_description' => 'Website Resmi Kampung Dalam',
            'admin_email' => config('mail.admin_email'),
            'facebook_url' => config('social.facebook'),
            'instagram_url' => config('social.instagram'),
            'youtube_url' => config('social.youtube'),
        ];

        return view('admin.settings', compact('settings'));
    }

    public function updateGeneralSettings(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|string|max:500',
            'admin_email' => 'required|email',
        ]);

        // Update configuration files or database settings
        // This would typically involve updating a settings table or config files

        return back()->with('success', 'Pengaturan umum berhasil diperbarui.');
    }

    public function updateEmailSettings(Request $request)
    {
        $request->validate([
            'mail_driver' => 'required|string',
            'mail_host' => 'required|string',
            'mail_port' => 'required|integer',
            'mail_username' => 'required|string',
            'mail_password' => 'required|string',
        ]);

        // Update email configuration
        return back()->with('success', 'Pengaturan email berhasil diperbarui.');
    }

    public function updateSocialSettings(Request $request)
    {
        $request->validate([
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
        ]);

        // Update social media settings
        return back()->with('success', 'Pengaturan media sosial berhasil diperbarui.');
    }

    public function fileManager()
    {
        $files = Storage::disk('public')->allFiles();
        $directories = Storage::disk('public')->allDirectories();

        return view('admin.file-manager', compact('files', 'directories'));
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB max
            'directory' => 'nullable|string',
        ]);

        $directory = $request->directory ?? 'uploads';
        $path = $request->file('file')->store($directory, 'public');

        return response()->json([
            'success' => true,
            'path' => $path,
            'url' => Storage::disk('public')->url($path)
        ]);
    }

    public function deleteFile($file)
    {
        if (Storage::disk('public')->exists($file)) {
            Storage::disk('public')->delete($file);
            return back()->with('success', 'File berhasil dihapus.');
        }

        return back()->with('error', 'File tidak ditemukan.');
    }

    public function downloadFile($file)
    {
        if (Storage::disk('public')->exists($file)) {
            return Storage::disk('public')->download($file);
        }

        abort(404);
    }

    public function createBackup()
    {
        try {
            Artisan::call('backup:run');
            return back()->with('success', 'Backup berhasil dibuat.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal membuat backup: ' . $e->getMessage());
        }
    }

    public function viewLogs()
    {
        $logFile = storage_path('logs/laravel.log');
        $logs = [];

        if (file_exists($logFile)) {
            $logs = array_reverse(file($logFile));
            $logs = array_slice($logs, 0, 100); // Show last 100 lines
        }

        return view('admin.logs', compact('logs'));
    }

    public function clearCache()
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('view:clear');
            Artisan::call('route:clear');

            return back()->with('success', 'Cache berhasil dibersihkan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal membersihkan cache: ' . $e->getMessage());
        }
    }

    public function reports()
    {
        return view('admin.reports.index');
    }

    public function populationReport()
    {
        $populationData = PopulationStatistic::orderBy('year', 'desc')->get();
        return view('admin.reports.population', compact('populationData'));
    }

    public function servicesReport()
    {
        $servicesData = Service::with('statistics')->get();
        return view('admin.reports.services', compact('servicesData'));
    }

    public function newsReport()
    {
        $newsData = News::with('author')
            ->selectRaw('*, MONTH(created_at) as month, YEAR(created_at) as year')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.reports.news', compact('newsData'));
    }

    public function umkmReport()
    {
        $umkmData = Umkm::selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->get();
        return view('admin.reports.umkm', compact('umkmData'));
    }

    public function tourismReport()
    {
        $tourismData = TourismPotential::selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->get();
        return view('admin.reports.tourism', compact('tourismData'));
    }

    public function generateReport(Request $request)
    {
        $request->validate([
            'report_type' => 'required|in:population,services,news,umkm,tourism',
            'format' => 'required|in:pdf,excel',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date|after_or_equal:date_from',
        ]);

        // Generate report based on type and format
        // This would involve creating PDF or Excel files

        return back()->with('success', 'Laporan berhasil dibuat dan akan diunduh otomatis.');
    }

    public function activityLogs()
    {
        // This would show activity logs from a logging system
        $activities = collect([
            [
                'user' => 'Admin',
                'action' => 'Created news article',
                'description' => 'Berita: Pembangunan Jalan Desa',
                'timestamp' => now()->subHours(2),
            ],
            [
                'user' => 'Staff',
                'action' => 'Updated village profile',
                'description' => 'Updated contact information',
                'timestamp' => now()->subHours(5),
            ],
        ]);

        return view('admin.activity-logs', compact('activities'));
    }

    public function notifications()
    {
        $notifications = auth()->user()->notifications()->paginate(20);
        return view('admin.notifications', compact('notifications'));
    }

    public function markAsRead($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);
        if ($notification) {
            $notification->markAsRead();
        }

        return back()->with('success', 'Notifikasi ditandai sebagai dibaca.');
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return back()->with('success', 'Semua notifikasi ditandai sebagai dibaca.');
    }

    public function deleteNotification($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);
        if ($notification) {
            $notification->delete();
        }

        return back()->with('success', 'Notifikasi berhasil dihapus.');
    }
}
