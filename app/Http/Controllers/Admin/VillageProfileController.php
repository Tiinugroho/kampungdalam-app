<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use Illuminate\Http\Request;

class VillageProfileController extends Controller
{
    public function index()
    {
        $villageProfiles = VillageProfile::get();
        return view('admin.village-profile.index', compact('villageProfiles'));
    }

    public function edit()
    {
        $villageProfiles = VillageProfile::first();
        if (!$villageProfiles) {
            $villageProfiles = VillageProfile::create([]);
        }
        return view('admin.village-profile.edit', compact('villageProfiles'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'village_name' => 'string|max:255',
            'about' => 'nullable|string',
            'history' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'total_population' => 'required|integer|min:0',
            'total_families' => 'required|integer|min:0',
            'area_size' => 'required|numeric|min:0',
            'map_embed_url' => 'nullable|url',
            'village_boundaries' => 'nullable|string',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
            'contact_address' => 'nullable|string',
        ]);

        $villageProfiles = VillageProfile::first();
        if (!$villageProfiles) {
            $villageProfiles = VillageProfile::create($request->all());
        } else {
            $villageProfiles->update($request->all());
        }

        return redirect()->route('admin.village-profile.index')
                        ->with('success', 'Profil desa berhasil diperbarui.');
    }
}
