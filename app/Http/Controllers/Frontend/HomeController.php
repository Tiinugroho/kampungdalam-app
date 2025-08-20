<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use App\Models\PopulationStatistic;
use App\Models\EducationStatistic;
use App\Models\OccupationStatistic;
use App\Models\HealthStatistic;
use App\Models\InfrastructureStatistic;
use App\Models\EconomicStatistic;
use App\Models\SocialStatistic;
use App\Models\ReligionStatistic;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\VillageOfficial;
use App\Models\TourismPotential;
use App\Models\Umkm;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class HomeController extends Controller
{
    // Update method index untuk menangani homepage dengan data yang sesuai
    public function index()
    {
        // Get village profile
        $profile = VillageProfile::first();
        // Get latest statistics
        $populationStats = PopulationStatistic::latestYear()->first();
        $educationStats = EducationStatistic::latestYear()->first();
        $occupationStats = OccupationStatistic::latestYear()->first();
        $healthStats = HealthStatistic::latestYear()->first();
        $infrastructureStats = InfrastructureStatistic::latestYear()->first();
        $economicStats = EconomicStatistic::latestYear()->first();
        $socialStats = SocialStatistic::latestYear()->first();
        $religionStats = ReligionStatistic::latestYear()->first();
        // Get content for homepage
        $latestNews = News::get();
        $featuredGallery = Gallery::featured()->ordered()->take(8)->get();
        $services = Service::active()->take(6)->get();
        $officials = VillageOfficial::active()->ordered()->get();
        $tourismPotentials = TourismPotential::active()->take(4)->get();
        $umkms = Umkm::active()->take(6)->get();
        $faqs = Faq::active()->get();
        // Population trend for chart
        $populationTrend = PopulationStatistic::orderBy('year', 'desc')
            ->take(5)
            ->get()
            ->reverse()
            ->values();
        // Determine which view to use based on request
        $viewName = request()->is('/') ? 'welcome' : 'home';
        return view($viewName, compact(
            'profile',
            'populationStats',
            'educationStats',
            'occupationStats',
            'healthStats',
            'infrastructureStats',
            'economicStats',
            'socialStats',
            'religionStats',
            'latestNews',
            'featuredGallery',
            'services',
            'officials',
            'tourismPotentials',
            'umkms',
            'faqs',
            'populationTrend'
        ));
    }

    public function about()
    {
        $profile = VillageProfile::first();
        $officials = VillageOfficial::active()->ordered()->get();
        $populationStats = PopulationStatistic::latestYear()->first();
        return view('about', compact('profile', 'officials', 'populationStats'));
    }

    public function history()
    {
        $profile = VillageProfile::first();
        $historicalData = PopulationStatistic::orderBy('year', 'asc')->get();
        return view('history', compact('profile', 'historicalData'));
    }

    public function visionMission()
    {
        $profile = VillageProfile::first();
        return view('vision-mission', compact('profile'));
    }

    public function officials()
    {
        $officials = VillageOfficial::active()->ordered()->get();
        return view('officials', compact('officials'));
    }

    public function organizationStructure()
    {
        $officials = VillageOfficial::active()->ordered()->get();
        return view('organization-structure', compact('officials'));
    }

    public function services()
    {
        // Fetch real services data from database
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function serviceDetail($slug)
    {
        // Fetch real service detail from database by slug
        $service = Service::where('slug', $slug)->firstOrFail(); // This will throw 404 if not found
        // Fetch related services (example, adjust as needed)
        $relatedServices = Service::where('slug', '!=', $slug)
                                  ->inRandomOrder() // TODO: Adjust logic for related services
                                  ->take(3)
                                  ->get();
        return view('services.detail', compact('service', 'relatedServices'));
    }

    public function gallery(Request $request)
    {
        $query = Gallery::ordered();
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }
        $gallery = $query->paginate(16);
        $categories = Gallery::select('category')->distinct()->get();
        $featuredGalleries = Gallery::featured()->ordered()->take(8)->get();
        return view('gallery.index', compact('gallery', 'categories', 'featuredGalleries'));
    }

    public function galleryByCategory($category)
    {
        $galleries = Gallery::where('category', $category)->ordered()->paginate(16);
        $categories = Gallery::select('category')->distinct()->get();
        return view('gallery.category', compact('galleries', 'categories', 'category'));
    }

    public function tourism()
    {
        $tourismPotentials = TourismPotential::active()->get();
        $categories = TourismPotential::select('category')->distinct()->get();
        return view('tourism.index', compact('tourismPotentials', 'categories'));
    }

    public function tourismDetail($slug)
    {
        $tourism = TourismPotential::where('slug', $slug)->active()->firstOrFail();
        $relatedTourism = TourismPotential::active()
            ->where('id', '!=', $tourism->id)
            ->where('category', $tourism->category)
            ->take(3)
            ->get();
        return view('tourism.detail', compact('tourism', 'relatedTourism'));
    }

    public function umkm(Request $request)
    {
        $query = Umkm::active();
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }
        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('business_name', 'like', '%' . $request->search . '%')
                    ->orWhere('owner_name', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        $umkm = $query->get();
        $categories = Umkm::select('category')->distinct()->get();
        return view('umkm.index', compact('umkm', 'categories'));
    }

    public function umkmDetail($id)
    {
        $umkm = Umkm::active()->findOrFail($id);
        $relatedUmkm = Umkm::active()
            ->where('id', '!=', $id)
            ->where('category', $umkm->category)
            ->take(3)
            ->get();
        return view('umkm.detail', compact('umkm', 'relatedUmkm'));
    }

    public function umkmByCategory($category)
    {
        $umkm = Umkm::active()->where('category', $category)->get();
        $categories = Umkm::select('category')->distinct()->get();
        return view('umkm.category', compact('umkm', 'categories', 'category'));
    }

    public function faq()
    {
        $faqs = Faq::active()->ordered()->get()->groupBy('category');
        $categories = Faq::select('category')->distinct()->get();
        return view('faq', compact('faqs', 'categories'));
    }

    public function contact()
    {
        $profile = VillageProfile::first();
        return view('contact', compact('profile'));
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        try {
            // Send email notification
            Mail::send('emails.contact', $request->all(), function ($message) use ($request) {
                $message->to(config('mail.admin_email', 'admin@kampungdalam.id'))
                    ->subject('Pesan Kontak: ' . $request->subject)
                    ->from($request->email, $request->name);
            });
            return back()->with('success', 'Pesan Anda telah berhasil dikirim. Terima kasih!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
        }
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        if (!$query) {
            return redirect()->route('home');
        }
        // Search in news
        $news = News::published()
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('content', 'like', '%' . $query . '%');
            })
            ->take(10)
            ->get();
        // Search in services
        $services = Service::active()
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%');
            })
            ->take(10)
            ->get();
        // Search in UMKM
        $umkm = Umkm::active()
            ->where(function ($q) use ($query) {
                $q->where('business_name', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%');
            })
            ->take(10)
            ->get();
        // Search in tourism
        $tourism = TourismPotential::active()
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%');
            })
            ->take(10)
            ->get();
        return view('search', compact('query', 'news', 'services', 'umkm', 'tourism'));
    }

    public function sitemap()
    {
        $news = News::published()->get();
        $services = Service::active()->get();
        $tourism = TourismPotential::active()->get();
        return response()->view('sitemap', compact('news', 'services', 'tourism'))
            ->header('Content-Type', 'text/xml');
    }

    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Sitemap: " . route('sitemap') . "\n";
        return response($content)->header('Content-Type', 'text/plain');
    }

    // English versions (if needed)
    public function indexEn()
    {
        // English version of homepage
        return view('en.home');
    }

    public function aboutEn()
    {
        // English version of about page
        return view('en.about');
    }
}
