<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Sgds; // pastikan kamu sudah buat model Sgd

class SgdsController extends Controller
{
    public function index()
    {
        $sgds = Sgds::latest()->paginate(10);
        return view('admin.sgds.index', compact('sgds'));
    }

    public function create()
    {
        return view('admin.sgds.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $data = $request->all();

        // handle upload icon
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('sgds_icons', 'public');
        }

        Sgds::create($data);

        return redirect()->route('admin.sgds.index')->with('success', 'Data SGDs berhasil ditambahkan');
    }

    public function edit(Sgds $sgd)
    {
        return view('admin.sgds.edit', compact('sgd'));
    }

    public function update(Request $request, Sgds $sgd)
    {
        $request->validate([
            'desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $data = $request->all();

        // handle update icon
        if ($request->hasFile('icon')) {
            if ($sgd->icon && Storage::disk('public')->exists($sgd->icon)) {
                Storage::disk('public')->delete($sgd->icon);
            }
            $data['icon'] = $request->file('icon')->store('sgds_icons', 'public');
        }

        $sgd->update($data);

        return redirect()->route('admin.sgds.index')->with('success', 'Data SGDs berhasil diperbarui');
    }

    public function destroy(Sgds $sgd)
    {
        if ($sgd->icon && Storage::disk('public')->exists($sgd->icon)) {
            Storage::disk('public')->delete($sgd->icon);
        }

        $sgd->delete();

        return redirect()->route('admin.sgds.index')->with('success', 'Data SGDs berhasil dihapus');
    }
}
