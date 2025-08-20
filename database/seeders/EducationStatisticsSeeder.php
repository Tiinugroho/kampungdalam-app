<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationStatistic;

class EducationStatisticsSeeder extends Seeder
{
    public function run()
    {
        $years = range(2021, 2025);

        foreach ($years as $year) {
            EducationStatistic::create([
                'year' => $year,
                'no_education' => rand(100, 500),
                'elementary' => rand(500, 2000),
                'junior_high' => rand(500, 2000),
                'senior_high' => rand(500, 2000),
                'diploma' => rand(100, 500),
                'bachelor' => rand(100, 500),
                'master' => rand(20, 100),
                'doctorate' => rand(5, 20),
            ]);
        }
    }
}
