<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'no_education',
        'elementary',
        'junior_high',
        'senior_high',
        'diploma',
        'bachelor',
        'master',
        'doctorate',
    ];

    public function getEducationLevelsAttribute()
    {
        return [
            'Tidak Sekolah' => $this->no_education,
            'SD/Sederajat' => $this->elementary,
            'SMP/Sederajat' => $this->junior_high,
            'SMA/Sederajat' => $this->senior_high,
            'Diploma' => $this->diploma,
            'Sarjana (S1)' => $this->bachelor,
            'Magister (S2)' => $this->master,
            'Doktor (S3)' => $this->doctorate,
        ];
    }

    public function getTotalEducatedAttribute()
    {
        return $this->elementary + $this->junior_high + $this->senior_high + 
               $this->diploma + $this->bachelor + $this->master + $this->doctorate;
    }

    public function getLiteracyRateAttribute()
    {
        $total = $this->total_educated + $this->no_education;
        if ($total > 0) {
            return round(($this->total_educated / $total) * 100, 2);
        }
        return 0;
    }

    public function scopeLatestYear($query)
    {
        return $query->orderBy('year', 'desc');
    }
}
