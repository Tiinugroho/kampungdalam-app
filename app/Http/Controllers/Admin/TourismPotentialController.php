<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourismPotential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourismPotentialController extends Controller
{
    public function index()
    {
        $tourismPotentials = TourismPotential::latest()->paginate(10);
        return view('admin.tourism-potentials.index', compact('tourismPotentials'));
    }

    public function create()
    {
        $categories = TourismPotential::getCategories();
        $difficultyLevels = TourismPotential::getDifficultyLevels();

        return view('admin.tourism-potentials.create', compact('categories', 'difficultyLevels'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        // Upload featured image
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('tourism', 'public');
        }

        // Upload gallery images
        if ($request->hasFile('gallery_images')) {
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('tourism/gallery', 'public');
            }
            $validated['gallery_images'] = ($galleryImages);
        }

        // Convert facilities & activities
        $validated['gallery_images'] = $galleryImages; // jangan json_encode
        $validated['facilities'] = $this->convertToArray($request->input('facilities')); // juga pastikan return array
        $validated['activities'] = $this->convertToArray($request->input('activities'));

        // $validated['facilities'] = $this->convertToArray($request->input('facilities'));
        // $validated['activities'] = $this->convertToArray($request->input('activities'));

        TourismPotential::create($validated);

        return redirect()->route('admin.tourism-potentials.index')
            ->with('success', 'Potensi wisata berhasil ditambahkan.');
    }

    public function show(TourismPotential $tourismPotential)
    {
        return view('admin.tourism-potentials.show', compact('tourismPotential'));
    }

    public function edit(TourismPotential $tourismPotential)
    {
        $categories = TourismPotential::getCategories();
        $difficultyLevels = TourismPotential::getDifficultyLevels();

        // kalau gallery_images disimpan sebagai JSON di DB
        $galleryImages = is_array($tourismPotential->gallery_images)
            ? $tourismPotential->gallery_images
            : (json_decode($tourismPotential->gallery_images, true) ?? []);

        return view('admin.tourism-potentials.edit', compact(
            'tourismPotential',
            'categories',
            'difficultyLevels',
            'galleryImages'
        ));
    }


    public function update(Request $request, TourismPotential $tourismPotential)
    {
        $validated = $this->validateRequest($request);

        // Replace featured image
        if ($request->hasFile('featured_image')) {
            if ($tourismPotential->featured_image) {
                Storage::disk('public')->delete($tourismPotential->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('tourism', 'public');
        }

        // Replace gallery images
        if ($request->hasFile('gallery_images')) {
            if ($tourismPotential->gallery_images) {
                foreach (json_decode($tourismPotential->gallery_images, true) ?? [] as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('tourism/gallery', 'public');
            }
            $validated['gallery_images'] = ($galleryImages);
        }

        // Convert facilities & activities
        $validated['facilities'] = $this->convertToArray($request->input('facilities')); // juga pastikan return array
        $validated['activities'] = $this->convertToArray($request->input('activities'));


        $tourismPotential->update($validated);

        return redirect()->route('admin.tourism-potentials.index')
            ->with('success', 'Potensi wisata berhasil diperbarui.');
    }

    public function destroy(TourismPotential $tourismPotential)
    {
        if ($tourismPotential->featured_image) {
            Storage::disk('public')->delete($tourismPotential->featured_image);
        }

        if ($tourismPotential->gallery_images) {
            foreach (json_decode($tourismPotential->gallery_images, true) ?? [] as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $tourismPotential->delete();

        return redirect()->route('admin.tourism-potentials.index')
            ->with('success', 'Potensi wisata berhasil dihapus.');
    }

    public function toggleFeatured(TourismPotential $tourismPotential)
    {
        $tourismPotential->update([
            'is_featured' => !$tourismPotential->is_featured
        ]);

        $status = $tourismPotential->is_featured ? 'ditampilkan' : 'disembunyikan';

        return redirect()->back()
            ->with('success', "Potensi wisata berhasil {$status} dari featured.");
    }

    public function toggleActive(TourismPotential $tourismPotential)
    {
        $tourismPotential->update([
            'is_active' => !$tourismPotential->is_active
        ]);

        $status = $tourismPotential->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return redirect()->back()
            ->with('success', "Potensi wisata berhasil {$status}.");
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'name'              => 'required|string|max:255',
            'category'          => 'required|string|max:255',
            'description'       => 'required|string',
            'address'           => 'required|string',
            'featured_image'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gallery_images.*'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'location'          => 'nullable|string|max:255',
            'latitude'          => 'nullable|numeric|between:-90,90',
            'longitude'         => 'nullable|numeric|between:-180,180',
            'facilities'        => 'nullable',
            'activities'        => 'nullable',
            'opening_hours'     => 'nullable|string|max:255',
            'ticket_price'      => 'nullable|numeric|min:0',
            'contact_person'    => 'nullable|string|max:255',
            'contact_phone'     => 'nullable|string|max:20',
            'email'             => 'nullable|email|max:255',
            'website'           => 'nullable|url|max:255',
            'access_route'      => 'nullable|string',
            'difficulty_level'  => 'nullable|in:mudah,sedang,sulit',
            'estimated_duration' => 'nullable|integer|min:1',
            'is_featured'       => 'boolean',
            'is_active'         => 'boolean',
        ]);
    }

    private function convertToArray($value)
    {
        if (is_array($value)) {
            return $value;
        }

        if (is_string($value)) {
            return array_filter(array_map('trim', explode("\n", $value)));
        }

        return [];
    }
}
