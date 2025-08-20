<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageOfficial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageOfficialController extends Controller
{
    public function index()
    {
        $officials = VillageOfficial::ordered()->get();
        return view('admin.village-officials.index', compact('officials'));
    }

    public function create()
    {
        return view('admin.village-officials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('officials', 'public');
        }

        VillageOfficial::create($data);

        return redirect()->route('admin.village-officials.index')
                        ->with('success', 'Perangkat desa berhasil ditambahkan.');
    }

    public function edit(VillageOfficial $villageOfficial)
    {
        return view('admin.village-officials.edit', compact('villageOfficial'));
    }

    public function update(Request $request, VillageOfficial $villageOfficial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($villageOfficial->photo) {
                Storage::disk('public')->delete($villageOfficial->photo);
            }
            $data['photo'] = $request->file('photo')->store('officials', 'public');
        }

        $villageOfficial->update($data);

        return redirect()->route('admin.village-officials.index')
                        ->with('success', 'Perangkat desa berhasil diperbarui.');
    }

    public function destroy(VillageOfficial $villageOfficial)
    {
        if ($villageOfficial->photo) {
            Storage::disk('public')->delete($villageOfficial->photo);
        }

        $villageOfficial->delete();

        return redirect()->route('admin.village-officials.index')
                        ->with('success', 'Perangkat desa berhasil dihapus.');
    }
}
