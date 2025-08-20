<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     * This method handles both the main news list and category filtering.
     */
    public function index(Request $request)
    {
        $query = News::published()->with('author');

        // Search functionality
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('content', 'like', '%' . $searchTerm . '%')
                  ->orWhere('excerpt', 'like', '%' . $searchTerm . '%');
            });
        }

        // Category filtering
        if ($request->has('category') && $request->category && $request->category !== 'all') {
            $query->where('category', $request->category);
        }
        
        // Get featured news (most viewed) - for the main news page, usually the top 1
        $featuredNews = News::published()
            ->with('author')
            ->orderBy('views', 'desc')
            ->take(1)
            ->get();

        // Get popular news (top 5 by views) - for the sidebar
        $popularNews = News::published()
            ->with('author')
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        // Get all news with pagination
        $allNews = $query->latest('published_at')->paginate(12);

        // If it's an AJAX request, return JSON
        if ($request->ajax()) {
            // Manually render pagination links to send as HTML string
            $paginationHtml = $allNews->links('pagination::bootstrap-5')->toHtml();

            // Prepare news data for JSON response
            $newsData = $allNews->map(function($news) {
                return [
                    'id' => $news->id,
                    'title' => $news->title,
                    'slug' => $news->slug,
                    'excerpt' => Str::limit($news->excerpt, 120),
                    'content' => $news->content, // Include if needed for client-side rendering
                    'category' => ucfirst($news->category),
                    'published_at' => $news->published_at->format('d M Y'),
                    'views' => $news->views,
                    'author_name' => $news->author->name ?? 'Admin Desa',
                    'featured_image_url' => $news->featured_image ? Storage::url('news/' . $news->featured_image) : '/placeholder.svg?height=250&width=400&text=Berita',
                    'detail_url' => route('news.show', $news->slug),
                ];
            });

            return response()->json([
                'news' => $newsData,
                'pagination_html' => $paginationHtml,
                'has_news' => $allNews->count() > 0,
            ]);
        }

        // For initial page load (non-AJAX)
        return view('news.index', compact(
            'featuredNews',
            'popularNews',
            'allNews'
        ));
    }

    /**
     * Display the specified news.
     */
    public function show($slug)
    {
        $news = News::published()
            ->with('author')
            ->where('slug', $slug)
            ->firstOrFail();

        // Increment views
        $news->increment('views');

        // Get related news (random 4, excluding current news)
        $relatedNews = News::published()
            ->with('author')
            ->where('id', '!=', $news->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('news.detail', compact('news', 'relatedNews'));
    }
}
