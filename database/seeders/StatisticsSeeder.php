<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PopulationStatistic;
use App\Models\EducationStatistic;
use App\Models\OccupationStatistic;
use App\Models\HealthStatistic;
use App\Models\InfrastructureStatistic;
use App\Models\EconomicStatistic;
use App\Models\SocialStatistic;
use App\Models\ReligionStatistic;

class StatisticsSeeder extends Seeder
{
    public function run()
    {
        // Population Statistics for last 5 years
        $years = [2020, 2021, 2022, 2023, 2024];
        
        foreach ($years as $index => $year) {
            $basePopulation = 2300 + ($index * 50);
            $malePopulation = intval($basePopulation * 0.52);
            $femalePopulation = $basePopulation - $malePopulation;
            
            PopulationStatistic::create([
                'year' => $year,
                'total_population' => $basePopulation,
                'male_population' => $malePopulation,
                'female_population' => $femalePopulation,
                'total_families' => intval($basePopulation / 3.8),
                'age_0_4' => intval($basePopulation * 0.08),
                'age_5_9' => intval($basePopulation * 0.09),
                'age_10_14' => intval($basePopulation * 0.10),
                'age_15_19' => intval($basePopulation * 0.11),
                'age_20_24' => intval($basePopulation * 0.12),
                'age_25_29' => intval($basePopulation * 0.13),
                'age_30_34' => intval($basePopulation * 0.12),
                'age_35_39' => intval($basePopulation * 0.10),
                'age_40_44' => intval($basePopulation * 0.08),
                'age_45_49' => intval($basePopulation * 0.07),
                'age_50_54' => intval($basePopulation * 0.06),
                'age_55_59' => intval($basePopulation * 0.05),
                'age_60_64' => intval($basePopulation * 0.04),
                'age_65_plus' => intval($basePopulation * 0.05),
            ]);
        }

        // Education Statistics
        EducationStatistic::create([
            'year' => 2024,
            'no_education' => 45,
            'elementary' => 680,
            'junior_high' => 520,
            'senior_high' => 780,
            'diploma' => 180,
            'bachelor' => 245,
            'master' => 35,
            'doctorate' => 5,
        ]);

        // Occupation Statistics
        OccupationStatistic::create([
            'year' => 2024,
            'farmer' => 450,
            'trader' => 280,
            'civil_servant' => 120,
            'private_employee' => 340,
            'entrepreneur' => 190,
            'fisherman' => 85,
            'laborer' => 220,
            'housewife' => 380,
            'student' => 420,
            'unemployed' => 95,
            'others' => 110,
        ]);

        // Health Statistics
        HealthStatistic::create([
            'year' => 2024,
            'puskesmas_count' => 1,
            'pustu_count' => 2,
            'posyandu_count' => 8,
            'clinic_count' => 3,
            'hospital_count' => 0,
            'doctor_count' => 2,
            'nurse_count' => 5,
            'midwife_count' => 3,
            'infant_mortality_rate' => 12.5,
            'maternal_mortality_rate' => 2.1,
            'life_expectancy' => 72.8,
            'stunting_cases' => 15,
            'malnutrition_cases' => 8,
            'immunization_coverage' => 92.5,
        ]);

        // Infrastructure Statistics
        InfrastructureStatistic::create([
            'year' => 2024,
            'paved_road_length' => 12.5,
            'unpaved_road_length' => 8.3,
            'damaged_road_length' => 2.1,
            'clean_water_access' => 580,
            'proper_sanitation' => 520,
            'waste_management' => 450,
            'electricity_coverage' => 95.8,
            'internet_coverage' => 78.2,
            'mobile_coverage' => 98.5,
            'public_transport' => 3,
            'bridge_count' => 5,
            'government_buildings' => 8,
            'religious_buildings' => 12,
            'market_count' => 2,
        ]);

        // Economic Statistics
        EconomicStatistic::create([
            'year' => 2024,
            'micro_business' => 85,
            'small_business' => 25,
            'medium_business' => 8,
            'large_business' => 2,
            'rice_field_area' => 125.5,
            'plantation_area' => 89.3,
            'fishpond_area' => 15.8,
            'rice_production' => 450.2,
            'fish_production' => 28.5,
            'average_income' => 3500000,
            'village_income' => 850000000,
            'bank_branch' => 1,
            'atm_count' => 2,
            'cooperative_count' => 3,
        ]);

        // Social Statistics
        SocialStatistic::create([
            'year' => 2024,
            'pkh_recipients' => 85,
            'blt_recipients' => 120,
            'bpnt_recipients' => 95,
            'kip_recipients' => 180,
            'kis_recipients' => 450,
            'youth_organization' => 5,
            'women_organization' => 8,
            'farmer_group' => 12,
            'fisherman_group' => 3,
            'art_group' => 4,
            'cultural_event' => 15,
            'sports_facility' => 6,
            'crime_cases' => 3,
            'accident_cases' => 8,
            'disaster_cases' => 2,
        ]);

        // Religion Statistics
        ReligionStatistic::create([
            'year' => 2024,
            'islam' => 2180,
            'christian' => 180,
            'catholic' => 85,
            'hindu' => 25,
            'buddha' => 15,
            'confucius' => 5,
            'others' => 10,
        ]);
    }
}
