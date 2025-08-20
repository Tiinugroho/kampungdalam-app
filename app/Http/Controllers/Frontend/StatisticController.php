<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

// Import models for each statistic type
use App\Models\PopulationStatistic;
use App\Models\EducationStatistic;
use App\Models\OccupationStatistic;
use App\Models\HealthStatistic;
use App\Models\InfrastructureStatistic;
use App\Models\EconomicStatistic;
use App\Models\SocialStatistic;
use App\Models\ReligionStatistic;

class StatisticController extends Controller
{
    /**
     * Fetches the latest statistic data for a given model and year.
     * If data for the current year is not found, it fetches the latest available data.
     *
     * @param string $modelClass The fully qualified class name of the Eloquent model.
     * @param array $defaultData An associative array of default values if no data is found.
     * @return object The fetched statistic data or a default empty object.
     */
    private function getStatisticData(string $modelClass, array $defaultData): object
    {
        $currentYear = Carbon::now()->year;
        $data = $modelClass::where('year', $currentYear)->first();

        if (!$data) {
            // If no data for current year, get the latest available year
            $data = $modelClass::orderBy('year', 'desc')->first();
        }

        // If still no data, provide a default empty object to prevent errors in Blade
        if (!$data) {
            $defaultData['year'] = $currentYear; // Ensure default year is current year
            return (object)$defaultData;
        }

        return $data;
    }

    public function index()
    {
        // This page will show a general overview and links to specific statistics pages
        return view('statistics.index');
    }

    public function population()
    {
        $populationData = $this->getStatisticData(PopulationStatistic::class, [
            'total_population' => 0, 'male_population' => 0, 'female_population' => 0, 'total_families' => 0,
            'age_0_4' => 0, 'age_5_9' => 0, 'age_10_14' => 0, 'age_15_19' => 0, 'age_20_24' => 0,
            'age_25_29' => 0, 'age_30_34' => 0, 'age_35_39' => 0, 'age_40_44' => 0, 'age_45_49' => 0,
            'age_50_54' => 0, 'age_55_59' => 0, 'age_60_64' => 0, 'age_65_plus' => 0
        ]);
        return view('statistics.population', compact('populationData'));
    }

    public function education()
    {
        $educationData = $this->getStatisticData(EducationStatistic::class, [
            'no_education' => 0, 'elementary' => 0, 'junior_high' => 0, 'senior_high' => 0,
            'diploma' => 0, 'bachelor' => 0, 'master' => 0, 'doctorate' => 0
        ]);
        return view('statistics.education', compact('educationData'));
    }

    public function occupation()
    {
        $occupationData = $this->getStatisticData(OccupationStatistic::class, [
            'farmer' => 0, 'trader' => 0, 'civil_servant' => 0, 'private_employee' => 0,
            'entrepreneur' => 0, 'fisherman' => 0, 'laborer' => 0, 'housewife' => 0,
            'student' => 0, 'unemployed' => 0, 'others' => 0
        ]);
        return view('statistics.occupation', compact('occupationData'));
    }

    public function health()
    {
        $healthData = $this->getStatisticData(HealthStatistic::class, [
            'posyandu_count' => 0, 'puskesmas_count' => 0, 'doctor_count' => 0, 'nurse_count' => 0,
            'midwife_count' => 0, 'infant_mortality_rate' => 0, 'maternal_mortality_rate' => 0,
            'stunting_cases' => 0, 'immunization_coverage' => 0
        ]);
        return view('statistics.health', compact('healthData'));
    }

    public function infrastructure()
    {
        $infrastructureData = $this->getStatisticData(InfrastructureStatistic::class, [
            'paved_road_length' => 0, 'unpaved_road_length' => 0, 'damaged_road_length' => 0,
            'clean_water_access' => 0, 'proper_sanitation' => 0, 'waste_management' => 0,
            'electricity_coverage' => 0, 'internet_coverage' => 0, 'mobile_coverage' => 0,
            'public_transport' => 0, 'bridge_count' => 0, 'government_buildings' => 0,
            'religious_buildings' => 0, 'market_count' => 0
        ]);
        return view('statistics.infrastructure', compact('infrastructureData'));
    }

    public function economic()
    {
        $economicData = $this->getStatisticData(EconomicStatistic::class, [
            'micro_business' => 0, 'small_business' => 0, 'medium_business' => 0, 'large_business' => 0,
            'rice_field_area' => 0, 'plantation_area' => 0, 'fishpond_area' => 0,
            'rice_production' => 0, 'fish_production' => 0, 'average_income' => 0,
            'village_income' => 0, 'bank_branch' => 0, 'atm_count' => 0, 'cooperative_count' => 0
        ]);
        return view('statistics.economic', compact('economicData'));
    }

    public function social()
    {
        $socialData = $this->getStatisticData(SocialStatistic::class, [
            'pkh_recipients' => 0, 'blt_recipients' => 0, 'bpnt_recipients' => 0,
            'kip_recipients' => 0, 'kis_recipients' => 0, 'youth_organization' => 0,
            'women_organization' => 0, 'farmer_group' => 0, 'fisherman_group' => 0,
            'art_group' => 0, 'cultural_event' => 0, 'sports_facility' => 0,
            'crime_cases' => 0, 'accident_cases' => 0, 'disaster_cases' => 0
        ]);
        return view('statistics.social', compact('socialData'));
    }

    public function religion()
    {
        $religionData = $this->getStatisticData(ReligionStatistic::class, [
            'islam' => 0, 'christian' => 0, 'catholic' => 0, 'hindu' => 0,
            'buddha' => 0, 'confucius' => 0, 'others' => 0
        ]);
        return view('statistics.religion', compact('religionData'));
    }
}
