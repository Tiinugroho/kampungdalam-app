<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EconomicStatistic;

class EconomicStatisticsSeeder extends Seeder
{
    public function run()
    {
        $years = range(2021, 2025);

        foreach ($years as $year) {
            EconomicStatistic::create([
                'year' => $year,
                'micro_business' => rand(50, 200),
                'small_business' => rand(20, 100),
                'medium_business' => rand(10, 50),
                'large_business' => rand(1, 10),
                'rice_field_area' => rand(100, 500),
                'plantation_area' => rand(50, 300),
                'fishpond_area' => rand(10, 100),
                'rice_production' => rand(500, 2000),
                'fish_production' => rand(100, 500),
                'average_income' => rand(2000000, 7000000),
                'village_income' => rand(50000000, 200000000),
                'bank_branch' => rand(1, 5),
                'atm_count' => rand(2, 10),
                'cooperative_count' => rand(1, 10),
            ]);
        }
    }
}
