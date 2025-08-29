<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SgdsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'desa' => 'Kampung Dalam',
                'kecamatan' => 'Siak',
                'kabupaten' => 'Siak',
                'icon' => 'desa.png',
                'tahun' => 2022,
                'desa_tanpa_kemiskinan' => 70,
                'desa_tanpa_kelaparan' => 65,
                'desa_sehat_sejahtera' => 80,
                'pendidikan_desa_berkualitas' => 75,
                'keterlibatan_perempuan_desa' => 60,
                'desa_layak_air_bersih' => 85,
                'desa_berenergi_bersih' => 55,
                'pertumbuhan_ekonomi_desa' => 68,
                'infrastruktur_desa' => 77,
                'ketimpangan_desa' => 50,
                'kawasan_desa' => 70,
                'konsumsi_produksi_desa' => 66,
                'perubahan_iklim_desa' => 40,
                'ekosistem_darat_desa' => 72,
                'ekosistem_laut_desa' => 65,
                'desa_damai' => 80,
                'kemitraan_desa' => 75,
                'kelembagaan_desa_dinamis' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'desa' => 'Kampung Dalam',
                'kecamatan' => 'Siak',
                'kabupaten' => 'Siak',
                'icon' => 'desa.png',
                'tahun' => 2023,
                'desa_tanpa_kemiskinan' => 75,
                'desa_tanpa_kelaparan' => 70,
                'desa_sehat_sejahtera' => 82,
                'pendidikan_desa_berkualitas' => 78,
                'keterlibatan_perempuan_desa' => 65,
                'desa_layak_air_bersih' => 88,
                'desa_berenergi_bersih' => 60,
                'pertumbuhan_ekonomi_desa' => 72,
                'infrastruktur_desa' => 80,
                'ketimpangan_desa' => 55,
                'kawasan_desa' => 74,
                'konsumsi_produksi_desa' => 70,
                'perubahan_iklim_desa' => 45,
                'ekosistem_darat_desa' => 75,
                'ekosistem_laut_desa' => 68,
                'desa_damai' => 83,
                'kemitraan_desa' => 77,
                'kelembagaan_desa_dinamis' => 73,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'desa' => 'Kampung Dalam',
                'kecamatan' => 'Siak',
                'kabupaten' => 'Siak',
                'icon' => 'desa.png',
                'tahun' => 2024,
                'desa_tanpa_kemiskinan' => 80,
                'desa_tanpa_kelaparan' => 75,
                'desa_sehat_sejahtera' => 85,
                'pendidikan_desa_berkualitas' => 82,
                'keterlibatan_perempuan_desa' => 70,
                'desa_layak_air_bersih' => 90,
                'desa_berenergi_bersih' => 65,
                'pertumbuhan_ekonomi_desa' => 78,
                'infrastruktur_desa' => 85,
                'ketimpangan_desa' => 60,
                'kawasan_desa' => 78,
                'konsumsi_produksi_desa' => 74,
                'perubahan_iklim_desa' => 50,
                'ekosistem_darat_desa' => 80,
                'ekosistem_laut_desa' => 72,
                'desa_damai' => 86,
                'kemitraan_desa' => 80,
                'kelembagaan_desa_dinamis' => 76,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('sgds')->insert($data);
    }
}
