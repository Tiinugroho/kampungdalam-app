<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EconomicStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'micro_business',
        'small_business',
        'medium_business',
        'large_business',
        'rice_field_area',
        'plantation_area',
        'fishpond_area',
        'rice_production',
        'fish_production',
        'average_income',
        'village_income',
        'bank_branch',
        'atm_count',
        'cooperative_count',
    ];

    protected $casts = [
        'rice_field_area' => 'decimal:2',
        'plantation_area' => 'decimal:2',
        'fishpond_area' => 'decimal:2',
        'rice_production' => 'decimal:2',
        'fish_production' => 'decimal:2',
        'average_income' => 'decimal:2',
        'village_income' => 'decimal:2',
    ];

    public function getBusinessScaleAttribute()
    {
        return [
            'Usaha Mikro' => $this->micro_business,
            'Usaha Kecil' => $this->small_business,
            'Usaha Menengah' => $this->medium_business,
            'Usaha Besar' => $this->large_business,
        ];
    }

    public function getAgricultureAreaAttribute()
    {
        return [
            'Sawah' => $this->rice_field_area,
            'Perkebunan' => $this->plantation_area,
            'Tambak' => $this->fishpond_area,
        ];
    }

    public function getTotalBusinessAttribute()
    {
        return $this->micro_business + $this->small_business + $this->medium_business + $this->large_business;
    }

    public function getTotalAgricultureAreaAttribute()
    {
        return $this->rice_field_area + $this->plantation_area + $this->fishpond_area;
    }

    public function getFormattedAverageIncomeAttribute()
    {
        return 'Rp ' . number_format($this->average_income, 0, ',', '.');
    }

    public function getFormattedVillageIncomeAttribute()
    {
        return 'Rp ' . number_format($this->village_income, 0, ',', '.');
    }

    public function scopeLatestYear($query)
    {
        return $query->orderBy('year', 'desc');
    }
}
