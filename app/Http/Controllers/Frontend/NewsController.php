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
        // Base query for news
        $query = News::with('author');

        // Apply published filter unless 'all' is requested
        if (!$request->filled('all')) {
            $query;
        }

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('content', 'like', '%' . $searchTerm . '%')
                    ->orWhere('excerpt', 'like', '%' . $searchTerm . '%');
            });
        }

        // Category filtering
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        // Featured news: top 1 by views
        $featuredNews = News::with('author')

            ->orderBy('views', 'desc')
            ->get();

        // Popular news: top 5 by views
        $popularNews = News::with('author')

            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        // All news with pagination
        $allNews = $query->latest('published_at')->paginate(12);

        // AJAX response
        if ($request->ajax()) {
            $paginationHtml = $allNews->links('pagination::bootstrap-5')->toHtml();

            $newsData = $allNews->map(function ($news) {
                return [
                    'id' => $news->id,
                    'title' => $news->title,
                    'slug' => $news->slug,
                    'excerpt' => Str::limit($news->excerpt, 120),
                    'content' => $news->content,
                    'category' => ucfirst($news->category),
                    'published_at' => $news->published_at->format('d M Y'),
                    'views' => $news->views,
                    'author_name' => $news->author->name ?? 'Admin Desa',
                    'featured_image_url' => $news->featured_image
                        ? Storage::url('news/' . $news->featured_image)
                        : '/placeholder.svg?height=250&width=400&text=Berita',
                    'detail_url' => route('news.show', $news->slug),
                ];
            });

            return response()->json([
                'news' => $newsData,
                'pagination_html' => $paginationHtml,
                'has_news' => $allNews->count() > 0,
            ]);
        }

        // Non-AJAX initial page load
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
        $news = News::with('author')
            ->where('slug', $slug)
            ->firstOrFail();

        // Increment views
        $news->increment('views');

        // Get related news (random 4, excluding current news)
        $relatedNews = News::published()
            ->where('id', '!=', $news->id)
            ->inRandomOrder()
            ->limit(4)
            ->select('id', 'category', 'slug', 'title', 'featured_image', 'published_at')
            ->get();

        return view('news.detail', compact('news', 'relatedNews'));
    }
}
