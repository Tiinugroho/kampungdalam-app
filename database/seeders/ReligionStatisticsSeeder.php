<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReligionStatistic;

class ReligionStatisticsSeeder extends Seeder
{
    public function run()
    {
        $years = range(2021, 2025);

        foreach ($years as $year) {
            ReligionStatistic::create([
                'year' => $year,
                'islam' => rand(500, 2000),
                'christian' => rand(50, 500),
                'catholic' => rand(50, 500),
                'hindu' => rand(10, 200),
                'buddha' => rand(10, 200),
                'confucius' => rand(1, 50),
                'others' => rand(1, 50),
            ]);
        }
    }
}
