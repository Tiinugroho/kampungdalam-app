<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::ordered()->get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category' => 'required',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        Faq::create($request->all());

        return redirect()->route('admin.faqs.index')
                        ->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category' => 'required|in:layanan,administrasi,umum,wisata,umkm',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $faq->update($request->all());

        return redirect()->route('admin.faqs.index')
                        ->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')
                        ->with('success', 'FAQ berhasil dihapus.');
    }
}
