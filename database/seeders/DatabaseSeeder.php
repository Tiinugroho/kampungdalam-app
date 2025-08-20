<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            VillageProfileSeeder::class,
            VillageOfficialSeeder::class,
            ServiceSeeder::class,
            UmkmSeeder::class,
            TourismPotentialSeeder::class,
            PopulationStatisticsSeeder::class,
            EducationStatisticsSeeder::class,
            InfrastructureStatisticsSeeder::class,
            HealthStatisticsSeeder::class,
            EconomicStatisticsSeeder::class,
            SocialStatisticsSeeder::class,
            ReligionStatisticsSeeder::class,
            OccupationStatisticsSeeder::class,
            ServiceSeeder::class,
            FaqsSeeder::class,
            // NewsSeeder::class,
            // StatisticsSeeder::class,
        ]);
    }
}
