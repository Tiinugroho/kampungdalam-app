<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfrastructureStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'paved_road_length',
        'unpaved_road_length',
        'damaged_road_length',
        'clean_water_access',
        'proper_sanitation',
        'waste_management',
        'electricity_coverage',
        'internet_coverage',
        'mobile_coverage',
        'public_transport',
        'bridge_count',
        'government_buildings',
        'religious_buildings',
        'market_count',
    ];

    protected $casts = [
        'paved_road_length' => 'decimal:2',
        'unpaved_road_length' => 'decimal:2',
        'damaged_road_length' => 'decimal:2',
        'electricity_coverage' => 'decimal:2',
        'internet_coverage' => 'decimal:2',
        'mobile_coverage' => 'decimal:2',
    ];

    public function getRoadConditionAttribute()
    {
        return [
            'Jalan Beraspal' => $this->paved_road_length,
            'Jalan Tanah' => $this->unpaved_road_length,
            'Jalan Rusak' => $this->damaged_road_length,
        ];
    }

    public function getUtilitiesAttribute()
    {
        return [
            'Air Bersih' => $this->clean_water_access,
            'Sanitasi Layak' => $this->proper_sanitation,
            'Pengelolaan Sampah' => $this->waste_management,
        ];
    }

    public function getTotalRoadLengthAttribute()
    {
        return $this->paved_road_length + $this->unpaved_road_length + $this->damaged_road_length;
    }

    public function getRoadConditionPercentageAttribute()
    {
        $total = $this->total_road_length;
        if ($total > 0) {
            return [
                'paved_percentage' => round(($this->paved_road_length / $total) * 100, 2),
                'unpaved_percentage' => round(($this->unpaved_road_length / $total) * 100, 2),
                'damaged_percentage' => round(($this->damaged_road_length / $total) * 100, 2),
            ];
        }
        return ['paved_percentage' => 0, 'unpaved_percentage' => 0, 'damaged_percentage' => 0];
    }

    public function scopeLatestYear($query)
    {
        return $query->orderBy('year', 'desc');
    }
}
