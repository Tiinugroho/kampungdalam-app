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
        $umkm = Umkm::all();
        return view('admin.umkm.index', compact('umkm'));
    }

    public function create()
    {
        return view('admin.umkm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'category' => 'required|in:kuliner,kerajinan,pertanian,perdagangan,jasa,lainnya',
            'description' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'product_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'products' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('umkm', 'public');
        }

        if ($request->hasFile('product_images')) {
            $productImages = [];
            foreach ($request->file('product_images') as $image) {
                $productImages[] = $image->store('umkm/products', 'public');
            }
            $data['product_images'] = $productImages;
        }

        Umkm::create($data);

        return redirect()->route('admin.umkm.index')
                        ->with('success', 'UMKM berhasil ditambahkan.');
    }

    public function edit(Umkm $umkm)
    {
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'category' => 'required|in:kuliner,kerajinan,pertanian,perdagangan,jasa,lainnya',
            'description' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'product_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'products' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('featured_image')) {
            if ($umkm->featured_image) {
                Storage::disk('public')->delete($umkm->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('umkm', 'public');
        }

        if ($request->hasFile('product_images')) {
            if ($umkm->product_images) {
                foreach ($umkm->product_images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            $productImages = [];
            foreach ($request->file('product_images') as $image) {
                $productImages[] = $image->store('umkm/products', 'public');
            }
            $data['product_images'] = $productImages;
        }

        $umkm->update($data);

        return redirect()->route('admin.umkm.index')
                        ->with('success', 'UMKM berhasil diperbarui.');
    }

    public function destroy(Umkm $umkm)
    {
        if ($umkm->featured_image) {
            Storage::disk('public')->delete($umkm->featured_image);
        }

        if ($umkm->product_images) {
            foreach ($umkm->product_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $umkm->delete();

        return redirect()->route('admin.umkm.index')
                        ->with('success', 'UMKM berhasil dihapus.');
    }
}
