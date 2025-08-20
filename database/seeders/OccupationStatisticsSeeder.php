<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OccupationStatistic;

class OccupationStatisticsSeeder extends Seeder
{
    public function run()
    {
        $years = range(2021, 2025);

        foreach ($years as $year) {
            OccupationStatistic::create([
                'year' => $year,
                'farmer' => rand(500, 2000),
                'trader' => rand(300, 1500),
                'civil_servant' => rand(50, 300),
                'private_employee' => rand(300, 1500),
                'entrepreneur' => rand(100, 500),
                'fisherman' => rand(100, 500),
                'laborer' => rand(300, 1500),
                'housewife' => rand(500, 2000),
                'student' => rand(500, 2000),
                'unemployed' => rand(100, 500),
                'others' => rand(50, 200),
            ]);
        }
    }
}
