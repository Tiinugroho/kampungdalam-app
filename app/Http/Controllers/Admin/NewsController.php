<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Import Str facade

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Added webp
            'status' => 'required|string|in:draft,published,archived',
            'published_at' => 'nullable|date',
        ]);

        $imageFilename = null; // Akan menyimpan hanya nama file
        if ($request->hasFile('featured_image')) {
            // Simpan file ke folder 'news' di public disk, lalu ambil hanya nama filenya
            $fullPath = $request->file('featured_image')->store('news', 'public');
            $imageFilename = basename($fullPath); // Ambil hanya nama file
        }

        News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Use Str::slug
            'category' => $request->category,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'featured_image' => $imageFilename, // Ini akan menjadi hanya nama file
            'status' => $request->status,
            'published_at' => $request->published_at,
            'author_id' => auth()->id(), // Assign current authenticated user as author
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Added webp
            'status' => 'required|string|in:draft,published,archived',
            'published_at' => 'nullable|date',
        ]);

        $imageFilename = $news->featured_image; // Ambil nama file yang sudah ada
        if ($request->hasFile('featured_image')) {
            // Hapus gambar lama jika ada dan bukan placeholder
            if ($news->featured_image && Storage::disk('public')->exists('news/' . $news->featured_image)) {
                Storage::disk('public')->delete('news/' . $news->featured_image);
            }
            // Simpan file baru dan ambil hanya nama filenya
            $fullPath = $request->file('featured_image')->store('news', 'public');
            $imageFilename = basename($fullPath); // Ambil hanya nama file
        }

        $news->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Use Str::slug
            'category' => $request->category,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'featured_image' => $imageFilename, // Ini akan menjadi hanya nama file
            'status' => $request->status,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        // Hapus gambar dari storage/app/public/news/
        if ($news->featured_image && Storage::disk('public')->exists('news/' . $news->featured_image)) {
            Storage::disk('public')->delete('news/' . $news->featured_image);
        }
        $news->delete();

        return redirect()->route('admin.news.index')
                     ->with('success', 'Berita berhasil dihapus.');
    }
}
