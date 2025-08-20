<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialStatistic;

class SocialStatisticsSeeder extends Seeder
{
    public function run()
    {
        $years = range(2021, 2025);

        foreach ($years as $year) {
            SocialStatistic::create([
                'year' => $year,
                'pkh_recipients' => rand(50, 500),
                'blt_recipients' => rand(50, 500),
                'bpnt_recipients' => rand(50, 500),
                'kip_recipients' => rand(50, 500),
                'kis_recipients' => rand(50, 500),
                'youth_organization' => rand(1, 10),
                'women_organization' => rand(1, 10),
                'farmer_group' => rand(1, 10),
                'fisherman_group' => rand(1, 5),
                'art_group' => rand(1, 10),
                'cultural_event' => rand(1, 20),
                'sports_facility' => rand(1, 10),
                'crime_cases' => rand(0, 50),
                'accident_cases' => rand(0, 30),
                'disaster_cases' => rand(0, 20),
            ]);
        }
    }
}
