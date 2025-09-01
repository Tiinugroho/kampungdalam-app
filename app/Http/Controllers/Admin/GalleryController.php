<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::ordered()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'nullable|string',
        'image_path'  => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        'category'    => 'required|in:kegiatan,fasilitas,wisata,umkm,lainnya',
        'order'       => 'required|integer|min:0',
        'is_featured' => 'boolean',
    ]);

    $imageFilename = null;
    if ($request->hasFile('image_path')) {
        $fullPath = $request->file('image_path')->store('gallery', 'public');
        $imageFilename = basename($fullPath); // simpan hanya nama file
    }

    Gallery::create([
        'title'       => $request->title,
        'description' => $request->description,
        'image_path'  => $imageFilename,
        'category'    => $request->category,
        'order'       => $request->order,
        'is_featured' => $request->boolean('is_featured'),
    ]);

    return redirect()->route('admin.galleries.index')
        ->with('success', 'Galeri berhasil ditambahkan.');
}

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'nullable|string',
        'image_path'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'category'    => 'required|in:kegiatan,fasilitas,wisata,umkm,lainnya',
        'order'       => 'required|integer|min:0',
        'is_featured' => 'boolean',
    ]);

    $data = [
        'title'       => $request->title,
        'description' => $request->description,
        'category'    => $request->category,
        'order'       => $request->order,
        'is_featured' => $request->boolean('is_featured'),
    ];

    if ($request->hasFile('image_path')) {
        // hapus file lama
        if ($gallery->image_path) {
            Storage::disk('public')->delete('gallery/'.$gallery->image_path);
        }

        $fullPath = $request->file('image_path')->store('gallery', 'public');
        $data['image_path'] = basename($fullPath);
    }

    $gallery->update($data);

    return redirect()->route('admin.galleries.index')
        ->with('success', 'Galeri berhasil diperbarui.');
}

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')
                        ->with('success', 'Galeri berhasil dihapus.');
    }
}
