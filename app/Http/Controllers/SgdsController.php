<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sgds;
use Illuminate\Http\Request;

class SgdsController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tahun terbesar dari database
        $lastYear = Sgds::max('tahun');
        
        // Kalau tidak ada data, fallback ke tahun sekarang
        $lastYear = $lastYear ?? Carbon::now()->year;

        // Tahun current = tahun terbesar di database + 1
        $currentYear = $lastYear + 1;

        // Generate 5 tahun terakhir sampai current
        $tahunList = range($currentYear - 4, $currentYear);

        // Tahun yang dipilih (default currentYear)
        $tahun = $request->get('tahun', $currentYear);

        // Ambil data sesuai tahun dari database
        $sgds = Sgds::where('tahun', $tahun)->first();

        return view('sgds', compact('tahunList', 'tahun', 'sgds'));
    }
}
