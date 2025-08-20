<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'puskesmas_count',
        'pustu_count',
        'posyandu_count',
        'clinic_count',
        'hospital_count',
        'doctor_count',
        'nurse_count',
        'midwife_count',
        'infant_mortality_rate',
        'maternal_mortality_rate',
        'life_expectancy',
        'stunting_cases',
        'malnutrition_cases',
        'immunization_coverage',
    ];

    protected $casts = [
        'infant_mortality_rate' => 'decimal:2',
        'maternal_mortality_rate' => 'decimal:2',
        'life_expectancy' => 'decimal:2',
        'immunization_coverage' => 'decimal:2',
    ];

    public function getHealthFacilitiesAttribute()
    {
        return [
            'Puskesmas' => $this->puskesmas_count,
            'Pustu' => $this->pustu_count,
            'Posyandu' => $this->posyandu_count,
            'Klinik' => $this->clinic_count,
            'Rumah Sakit' => $this->hospital_count,
        ];
    }

    public function getHealthPersonnelAttribute()
    {
        return [
            'Dokter' => $this->doctor_count,
            'Perawat' => $this->nurse_count,
            'Bidan' => $this->midwife_count,
        ];
    }

    public function getTotalHealthFacilitiesAttribute()
    {
        return $this->puskesmas_count + $this->pustu_count + $this->posyandu_count + 
               $this->clinic_count + $this->hospital_count;
    }

    public function getTotalHealthPersonnelAttribute()
    {
        return $this->doctor_count + $this->nurse_count + $this->midwife_count;
    }

    public function scopeLatestYear($query)
    {
        return $query->orderBy('year', 'desc');
    }
}
