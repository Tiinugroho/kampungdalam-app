<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::orderBy('id', 'desc')->get();
        return view('admin.umkm.index', compact('umkms'));
    }

    public function create()
    {
        return view('admin.umkm.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        // Upload featured image
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('umkm', 'public');
        }

        // Upload product images
        if ($request->hasFile('product_images')) {
            $productImages = [];
            foreach ($request->file('product_images') as $image) {
                $productImages[] = $image->store('umkm/products', 'public');
            }
            $validated['product_images'] = $productImages; // array, bukan json
        }

        Umkm::create($validated);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil ditambahkan.');
    }

    public function show(Umkm $umkm)
    {
        return view('admin.umkm.show', compact('umkm'));
    }

    public function edit(Umkm $umkm)
    {
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $validated = $this->validateRequest($request);

        // Replace featured image
        if ($request->hasFile('featured_image')) {
            if ($umkm->featured_image) {
                Storage::disk('public')->delete($umkm->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('umkm', 'public');
        }

        // Replace product images
        if ($request->hasFile('product_images')) {
            if ($umkm->product_images) {
                foreach ((array) $umkm->product_images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            $productImages = [];
            foreach ($request->file('product_images') as $image) {
                $productImages[] = $image->store('umkm/products', 'public');
            }
            $validated['product_images'] = $productImages;
        }

        $umkm->update($validated);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil diperbarui.');
    }

    public function destroy(Umkm $umkm)
    {
        if ($umkm->featured_image) {
            Storage::disk('public')->delete($umkm->featured_image);
        }

        if ($umkm->product_images) {
            foreach ((array) $umkm->product_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $umkm->delete();

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil dihapus.');
    }

    public function toggleActive(Umkm $umkm)
    {
        $umkm->update([
            'is_active' => !$umkm->is_active
        ]);

        $status = $umkm->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return redirect()->back()
            ->with('success', "UMKM berhasil {$status}.");
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'business_name'     => 'required|string|max:255',
            'owner_name'        => 'required|string|max:255',
            'nik'               => 'nullable|string|max:20',
            'category'          => 'required|in:kuliner,kerajinan,pertanian,perdagangan,jasa,teknologi,lainnya',
            'description'       => 'required|string',
            'featured_image'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'product_images.*'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'address'           => 'required|string',
            'phone'             => 'nullable|string|max:20',
            'whatsapp'          => 'nullable|string|max:20',
            'email'             => 'nullable|email|max:255',
            'instagram'         => 'nullable|string|max:255',
            'facebook'          => 'nullable|string|max:255',
            'website'           => 'nullable|url|max:255',
            'products'          => 'nullable|string',
            'capital'           => 'nullable|numeric|min:0',
            'monthly_revenue'   => 'nullable|numeric|min:0',
            'employee_count'    => 'nullable|integer|min:0',
            'established_date'  => 'nullable|date',
            'license_number'    => 'nullable|string|max:255',
            'is_active'         => 'boolean',
        ]);
    }
}
