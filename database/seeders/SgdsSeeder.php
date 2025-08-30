<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SgdsSeeder extends Seeder
{
    public function run(): void
    {
        $startYear = 2021;
        $endYear   = Carbon::now()->year;

        for ($year = $startYear; $year <= $endYear; $year++) {
            DB::table('sgds')->insert([
                'desa' => 'Kampung Dalam',
                'kecamatan' => 'Siak',
                'kabupaten' => 'Siak',
                'icon' => null,
                'tahun' => $year,

                // random angka 0 - 100 dengan 2 desimal
                'desa_tanpa_kemiskinan' => number_format(rand(0, 10000) / 100, 2),
                'desa_tanpa_kelaparan' => number_format(rand(0, 10000) / 100, 2),
                'desa_sehat_sejahtera' => number_format(rand(0, 10000) / 100, 2),
                'pendidikan_desa_berkualitas' => number_format(rand(0, 10000) / 100, 2),
                'keterlibatan_perempuan_desa' => number_format(rand(0, 10000) / 100, 2),
                'desa_layak_air_bersih' => number_format(rand(0, 10000) / 100, 2),
                'desa_berenergi_bersih' => number_format(rand(0, 10000) / 100, 2),
                'pertumbuhan_ekonomi_desa' => number_format(rand(0, 10000) / 100, 2),
                'infrastruktur_desa' => number_format(rand(0, 10000) / 100, 2),
                'ketimpangan_desa' => number_format(rand(0, 10000) / 100, 2),
                'kawasan_desa' => number_format(rand(0, 10000) / 100, 2),
                'konsumsi_produksi_desa' => number_format(rand(0, 10000) / 100, 2),
                'perubahan_iklim_desa' => number_format(rand(0, 10000) / 100, 2),
                'ekosistem_darat_desa' => number_format(rand(0, 10000) / 100, 2),
                'ekosistem_laut_desa' => number_format(rand(0, 10000) / 100, 2),
                'desa_damai' => number_format(rand(0, 10000) / 100, 2),
                'kemitraan_desa' => number_format(rand(0, 10000) / 100, 2),
                'kelembagaan_desa_dinamis' => number_format(rand(0, 10000) / 100, 2),

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
