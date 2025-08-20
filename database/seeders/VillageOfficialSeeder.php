<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageOfficial;

class VillageOfficialSeeder extends Seeder
{
    public function run()
    {
        $officials = [
            [
                'name' => 'H. Ahmad Syahrul, S.Sos',
                'position' => 'Kepala Desa',
                'phone' => '081234567890',
                'email' => 'kades@kampungdalam.id',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Siti Aminah, S.Pd',
                'position' => 'Sekretaris Desa',
                'phone' => '081234567891',
                'email' => 'sekdes@kampungdalam.id',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Budi Santoso',
                'position' => 'Kepala Urusan Keuangan',
                'phone' => '081234567892',
                'email' => 'kaur.keuangan@kampungdalam.id',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Rina Marlina, A.Md',
                'position' => 'Kepala Urusan Umum',
                'phone' => '081234567893',
                'email' => 'kaur.umum@kampungdalam.id',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Dedi Kurniawan',
                'position' => 'Kepala Seksi Pemerintahan',
                'phone' => '081234567894',
                'email' => 'kasi.pemerintahan@kampungdalam.id',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Yuni Astuti, S.ST',
                'position' => 'Kepala Seksi Kesejahteraan',
                'phone' => '081234567895',
                'email' => 'kasi.kesejahteraan@kampungdalam.id',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($officials as $official) {
            VillageOfficial::create($official);
        }
    }
}
