<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReligionStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'islam',
        'christian',
        'catholic',
        'hindu',
        'buddha',
        'confucius',
        'others',
    ];

    public function getReligionTypesAttribute()
    {
        return [
            'Islam' => $this->islam,
            'Kristen Protestan' => $this->christian,
            'Katolik' => $this->catholic,
            'Hindu' => $this->hindu,
            'Buddha' => $this->buddha,
            'Konghucu' => $this->confucius,
            'Lainnya' => $this->others,
        ];
    }

    public function getTotalPopulationAttribute()
    {
        return $this->islam + $this->christian + $this->catholic + 
               $this->hindu + $this->buddha + $this->confucius + $this->others;
    }

    public function getReligionPercentagesAttribute()
    {
        $total = $this->total_population;
        if ($total > 0) {
            return [
                'islam_percentage' => round(($this->islam / $total) * 100, 2),
                'christian_percentage' => round(($this->christian / $total) * 100, 2),
                'catholic_percentage' => round(($this->catholic / $total) * 100, 2),
                'hindu_percentage' => round(($this->hindu / $total) * 100, 2),
                'buddha_percentage' => round(($this->buddha / $total) * 100, 2),
                'confucius_percentage' => round(($this->confucius / $total) * 100, 2),
                'others_percentage' => round(($this->others / $total) * 100, 2),
            ];
        }
        return array_fill_keys(['islam_percentage', 'christian_percentage', 'catholic_percentage', 
                               'hindu_percentage', 'buddha_percentage', 'confucius_percentage', 
                               'others_percentage'], 0);
    }

    public function scopeLatestYear($query)
    {
        return $query->orderBy('year', 'desc');
    }
}
