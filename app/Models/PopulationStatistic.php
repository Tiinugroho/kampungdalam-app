<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopulationStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'total_population',
        'male_population',
        'female_population',
        'total_families',
        'age_0_4',
        'age_5_9',
        'age_10_14',
        'age_15_19',
        'age_20_24',
        'age_25_29',
        'age_30_34',
        'age_35_39',
        'age_40_44',
        'age_45_49',
        'age_50_54',
        'age_55_59',
        'age_60_64',
        'age_65_plus',
    ];

    public function getAgeGroupsAttribute()
    {
        return [
            '0-4 Tahun' => $this->age_0_4,
            '5-9 Tahun' => $this->age_5_9,
            '10-14 Tahun' => $this->age_10_14,
            '15-19 Tahun' => $this->age_15_19,
            '20-24 Tahun' => $this->age_20_24,
            '25-29 Tahun' => $this->age_25_29,
            '30-34 Tahun' => $this->age_30_34,
            '35-39 Tahun' => $this->age_35_39,
            '40-44 Tahun' => $this->age_40_44,
            '45-49 Tahun' => $this->age_45_49,
            '50-54 Tahun' => $this->age_50_54,
            '55-59 Tahun' => $this->age_55_59,
            '60-64 Tahun' => $this->age_60_64,
            '65+ Tahun' => $this->age_65_plus,
        ];
    }

    public function getGenderDistributionAttribute()
    {
        return [
            'Laki-laki' => $this->male_population,
            'Perempuan' => $this->female_population,
        ];
    }

    public function getGenderPercentageAttribute()
    {
        $total = $this->total_population;
        if ($total > 0) {
            return [
                'male_percentage' => round(($this->male_population / $total) * 100, 2),
                'female_percentage' => round(($this->female_population / $total) * 100, 2),
            ];
        }
        return ['male_percentage' => 0, 'female_percentage' => 0];
    }

    public function scopeLatestYear($query)
    {
        return $query->orderBy('year', 'desc');
    }

    public function scopeByYear($query, $year)
    {
        return $query->where('year', $year);
    }
}
