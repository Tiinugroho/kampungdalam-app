<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use Illuminate\Http\Request;

class VillageProfileController extends Controller
{
    public function index()
    {
        $villageProfile = VillageProfile::get();
        return view('admin.village-profile.index', compact('villageProfile'));
    }

    public function create()
    {
        // Hanya kalau belum ada profile
        if (VillageProfile::exists()) {
            return redirect()->route('admin.village-profiles.index')
                             ->with('error', 'Profil desa sudah ada, silakan edit.');
        }

        return view('admin.village-profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'village_name'      => 'required|string|max:255',
            'village_code'      => 'nullable|string|max:255',
            'district'          => 'nullable|string|max:255',
            'regency'           => 'nullable|string|max:255',
            'province'          => 'nullable|string|max:255',
            'postal_code'       => 'nullable|string|max:10',
            'about'             => 'nullable|string',
            'history'           => 'nullable|string',
            'vision'            => 'nullable|string',
            'mission'           => 'nullable|string',
            'total_population'  => 'required|integer|min:0',
            'total_families'    => 'required|integer|min:0',
            'area_size'         => 'required|numeric|min:0',
            'total_rt'          => 'required|integer|min:0',
            'total_rw'          => 'required|integer|min:0',
            'map_embed_url'     => 'nullable|url',
            'boundary_north'    => 'nullable|string',
            'boundary_south'    => 'nullable|string',
            'boundary_east'     => 'nullable|string',
            'boundary_west'     => 'nullable|string',
            'village_boundaries'=> 'nullable|string',
            'contact_phone'     => 'nullable|string|max:20',
            'contact_email'     => 'nullable|email|max:255',
            'contact_address'   => 'nullable|string',
            'website'           => 'nullable|url',
            'latitude'          => 'nullable|numeric',
            'longitude'         => 'nullable|numeric',
        ]);

        VillageProfile::create($request->all());

        return redirect()->route('admin.village-profiles.index')
                         ->with('success', 'Profil desa berhasil dibuat.');
    }

    public function show(VillageProfile $villageProfile)
    {
        return view('admin.village-profile.show', compact('villageProfile'));
    }

    public function edit(VillageProfile $villageProfile)
    {
        return view('admin.village-profile.edit', compact('villageProfile'));
    }

    public function update(Request $request, VillageProfile $villageProfile)
    {
        $request->validate([
            'village_name'      => 'required|string|max:255',
            'village_code'      => 'nullable|string|max:255',
            'district'          => 'nullable|string|max:255',
            'regency'           => 'nullable|string|max:255',
            'province'          => 'nullable|string|max:255',
            'postal_code'       => 'nullable|string|max:10',
            'about'             => 'nullable|string',
            'history'           => 'nullable|string',
            'vision'            => 'nullable|string',
            'mission'           => 'nullable|string',
            'total_population'  => 'required|integer|min:0',
            'total_families'    => 'required|integer|min:0',
            'area_size'         => 'required|numeric|min:0',
            'total_rt'          => 'required|integer|min:0',
            'total_rw'          => 'required|integer|min:0',
            'map_embed_url'     => 'nullable|url',
            'boundary_north'    => 'nullable|string',
            'boundary_south'    => 'nullable|string',
            'boundary_east'     => 'nullable|string',
            'boundary_west'     => 'nullable|string',
            'village_boundaries'=> 'nullable|string',
            'contact_phone'     => 'nullable|string|max:20',
            'contact_email'     => 'nullable|email|max:255',
            'contact_address'   => 'nullable|string',
            'website'           => 'nullable|url',
            'latitude'          => 'nullable|numeric',
            'longitude'         => 'nullable|numeric',
        ]);

        $villageProfile->update($request->all());

        return redirect()->route('admin.village-profiles.index')
                         ->with('success', 'Profil desa berhasil diperbarui.');
    }

    public function destroy(VillageProfile $villageProfile)
    {
        $villageProfile->delete();
        return redirect()->route('admin.village-profiles.index')
                         ->with('success', 'Profil desa berhasil dihapus.');
    }
}
