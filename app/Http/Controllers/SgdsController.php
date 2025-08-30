<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sgds;
use Illuminate\Http\Request;

class SgdsController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tahun sekarang
        $nowYear = Carbon::now()->year;

        // Ambil tahun terbesar dari database
        $lastYear = Sgds::max('tahun');

        // Jika database kosong, fallback ke tahun sekarang
        $lastYear = $lastYear ?? $nowYear;

        // Current year = max antara tahun sekarang atau tahun terbesar dari database
        $currentYear = max($nowYear, $lastYear);

        // Generate 5 tahun terakhir sampai current
        $tahunList = range($currentYear - 4, $currentYear);

        // Tahun yang dipilih (default currentYear)
        $tahun = $request->get('tahun', $currentYear);

        // Ambil data sesuai tahun dari database
        $sgds = Sgds::where('tahun', $tahun)->first();

        return view('sgds', compact('tahunList', 'tahun', 'sgds'));
    }
}
