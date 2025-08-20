<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HealthStatistic;

class HealthStatisticsSeeder extends Seeder
{
    public function run()
    {
        $years = range(2021, 2025);

        foreach ($years as $year) {
            HealthStatistic::create([
                'year' => $year,
                'puskesmas_count' => rand(1, 5),
                'pustu_count' => rand(1, 10),
                'posyandu_count' => rand(5, 30),
                'clinic_count' => rand(1, 10),
                'hospital_count' => rand(1, 3),
                'doctor_count' => rand(5, 50),
                'nurse_count' => rand(10, 100),
                'midwife_count' => rand(5, 50),
                'infant_mortality_rate' => rand(1, 10) / 10,
                'maternal_mortality_rate' => rand(1, 10) / 10,
                'life_expectancy' => rand(65, 75) + (rand(0, 99) / 100),
                'stunting_cases' => rand(10, 200),
                'malnutrition_cases' => rand(5, 100),
                'immunization_coverage' => rand(80, 100),
            ]);
        }
    }
}
