<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'category'     => 'required|string|max:255',
            'description'  => 'required|string',
            'requirements' => 'nullable|string',
            'process'      => 'nullable|string',
            'duration'     => 'nullable|string|max:255',
            'cost'         => 'required|numeric|min:0',
            'is_active'    => 'boolean',
        ]);

        Service::create([
            'name'         => $request->name,
            'slug'         => Str::slug($request->name), // generate slug otomatis
            'category'     => $request->category,
            'description'  => $request->description,
            'requirements' => $request->requirements,
            'process'      => $request->process,
            'duration'     => $request->duration,
            'cost'         => $request->cost,
            'is_active'    => $request->is_active ?? true,
        ]);

        return redirect()->route('admin.services.index')
                        ->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'category'     => 'required|string|max:255',
            'description'  => 'required|string',
            'requirements' => 'nullable|string',
            'process'      => 'nullable|string',
            'duration'     => 'nullable|string|max:255',
            'cost'         => 'required|numeric|min:0',
            'is_active'    => 'boolean',
        ]);

        $service->update([
            'name'         => $request->name,
            'slug'         => Str::slug($request->name), // update slug juga
            'category'     => $request->category,
            'description'  => $request->description,
            'requirements' => $request->requirements,
            'process'      => $request->process,
            'duration'     => $request->duration,
            'cost'         => $request->cost,
            'is_active'    => $request->is_active ?? true,
        ]);

        return redirect()->route('admin.services.index')
                        ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
                        ->with('success', 'Layanan berhasil dihapus.');
    }
}
