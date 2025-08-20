<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InfrastructureStatistic;

class InfrastructureStatisticsSeeder extends Seeder
{
    public function run()
    {
        $years = range(2021, 2025);

        foreach ($years as $year) {
            InfrastructureStatistic::create([
                'year' => $year,
                'paved_road_length' => rand(10, 100),
                'unpaved_road_length' => rand(5, 50),
                'damaged_road_length' => rand(1, 20),
                'clean_water_access' => rand(50, 100),
                'proper_sanitation' => rand(50, 100),
                'waste_management' => rand(50, 100),
                'electricity_coverage' => rand(80, 100),
                'internet_coverage' => rand(50, 100),
                'mobile_coverage' => rand(80, 100),
                'public_transport' => rand(1, 20),
                'bridge_count' => rand(1, 10),
                'government_buildings' => rand(1, 5),
                'religious_buildings' => rand(1, 20),
                'market_count' => rand(1, 10),
            ]);
        }
    }
}
