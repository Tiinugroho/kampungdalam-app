<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TourismPotential;
use Illuminate\Http\Request;

class TourismController extends Controller
{
    public function index(Request $request)
    {
        $query = TourismPotential::active();

        // Filter by category
        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // Sort options
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'name':
                $query->orderBy('name');
                break;
            case 'featured':
                $query->orderBy('is_featured', 'desc')->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at');
                break;
            default:
                $query->latest();
        }

        // Pagination with query string (supaya filter & search ikut ke halaman berikutnya)
        $tourismPotentials = $query->paginate(6)->withQueryString();

        $featuredTourism = TourismPotential::active()->featured()->take(6)->get();
        $categories = TourismPotential::getCategories();

        return view('potensi.wisata', compact(
            'tourismPotentials', 
            'featuredTourism', 
            'categories'
        ));
    }

    public function show($slug)
    {
        $tourism = TourismPotential::active()
                                  ->where('slug', $slug)
                                  ->firstOrFail();

        // Get related tourism (same category, different item)
        $relatedTourism = TourismPotential::active()
                                         ->byCategory($tourism->category)
                                         ->where('id', '!=', $tourism->id)
                                         ->take(4)
                                         ->get();

        return view('frontend.tourism.show', compact('tourism', 'relatedTourism'));
    }

    public function category($category)
    {
        $categoryName = TourismPotential::getCategories()[$category] ?? ucfirst($category);
        
        $tourismPotentials = TourismPotential::active()
                                           ->byCategory($category)
                                           ->latest()
                                           ->paginate(12)
                                           ->withQueryString();

        $categories = TourismPotential::getCategories();

        return view('frontend.tourism.category', compact(
            'tourismPotentials', 
            'category', 
            'categoryName', 
            'categories'
        ));
    }
}
