<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PopulationStatistic;

class PopulationStatisticsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'year' => 2021,
                'total_population' => 12000,
                'male_population' => 6000,
                'female_population' => 6000,
                'total_families' => 3500,
                'age_0_4' => 900,
                'age_5_9' => 1000,
                'age_10_14' => 1100,
                'age_15_19' => 950,
                'age_20_24' => 1200,
                'age_25_29' => 1300,
                'age_30_34' => 1400,
                'age_35_39' => 1100,
                'age_40_44' => 1000,
                'age_45_49' => 900,
                'age_50_54' => 800,
                'age_55_59' => 700,
                'age_60_64' => 600,
                'age_65_plus' => 550,
            ],
            [
                'year' => 2022,
                'total_population' => 12250,
                'male_population' => 6100,
                'female_population' => 6150,
                'total_families' => 3550,
                'age_0_4' => 920,
                'age_5_9' => 1010,
                'age_10_14' => 1120,
                'age_15_19' => 970,
                'age_20_24' => 1220,
                'age_25_29' => 1320,
                'age_30_34' => 1420,
                'age_35_39' => 1120,
                'age_40_44' => 1010,
                'age_45_49' => 910,
                'age_50_54' => 810,
                'age_55_59' => 710,
                'age_60_64' => 610,
                'age_65_plus' => 560,
            ],
            [
                'year' => 2023,
                'total_population' => 12500,
                'male_population' => 6250,
                'female_population' => 6250,
                'total_families' => 3600,
                'age_0_4' => 930,
                'age_5_9' => 1020,
                'age_10_14' => 1130,
                'age_15_19' => 980,
                'age_20_24' => 1230,
                'age_25_29' => 1330,
                'age_30_34' => 1430,
                'age_35_39' => 1130,
                'age_40_44' => 1020,
                'age_45_49' => 920,
                'age_50_54' => 820,
                'age_55_59' => 720,
                'age_60_64' => 620,
                'age_65_plus' => 570,
            ],
            [
                'year' => 2024,
                'total_population' => 12750,
                'male_population' => 6370,
                'female_population' => 6380,
                'total_families' => 3650,
                'age_0_4' => 940,
                'age_5_9' => 1030,
                'age_10_14' => 1140,
                'age_15_19' => 990,
                'age_20_24' => 1240,
                'age_25_29' => 1340,
                'age_30_34' => 1440,
                'age_35_39' => 1140,
                'age_40_44' => 1030,
                'age_45_49' => 930,
                'age_50_54' => 830,
                'age_55_59' => 730,
                'age_60_64' => 630,
                'age_65_plus' => 580,
            ],
            [
                'year' => 2025,
                'total_population' => 13000,
                'male_population' => 6200,
                'female_population' => 6500,
                'total_families' => 3700,
                'age_0_4' => 950,
                'age_5_9' => 1040,
                'age_10_14' => 1150,
                'age_15_19' => 1000,
                'age_20_24' => 1250,
                'age_25_29' => 1350,
                'age_30_34' => 1450,
                'age_35_39' => 1150,
                'age_40_44' => 1040,
                'age_45_49' => 940,
                'age_50_54' => 840,
                'age_55_59' => 740,
                'age_60_64' => 640,
                'age_65_plus' => 590,
            ],
        ];

        foreach ($data as $row) {
            PopulationStatistic::create($row);
        }
    }
}
