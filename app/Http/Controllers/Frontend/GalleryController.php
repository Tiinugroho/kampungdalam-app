<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('order')
                            ->latest()
                            ->paginate(12);

        $categories = Gallery::getCategories();

        return view('potensi.galeri', compact('galleries', 'categories'));
    }

    public function category($category)
    {
        $categories = Gallery::getCategories();
        $categoryName = $categories[$category] ?? ucfirst($category);

        $galleries = Gallery::where('category', $category)
                            ->orderBy('order')
                            ->latest()
                            ->paginate(12);

        return view('potensi.galeri', compact('galleries', 'categories', 'category', 'categoryName'));
    }
}
