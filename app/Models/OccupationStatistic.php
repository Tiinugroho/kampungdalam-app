<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccupationStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'farmer',
        'trader',
        'civil_servant',
        'private_employee',
        'entrepreneur',
        'fisherman',
        'laborer',
        'housewife',
        'student',
        'unemployed',
        'others',
    ];

    public function getOccupationTypesAttribute()
    {
        return [
            'Petani' => $this->farmer,
            'Pedagang' => $this->trader,
            'PNS' => $this->civil_servant,
            'Karyawan Swasta' => $this->private_employee,
            'Wiraswasta' => $this->entrepreneur,
            'Nelayan' => $this->fisherman,
            'Buruh' => $this->laborer,
            'Ibu Rumah Tangga' => $this->housewife,
            'Pelajar/Mahasiswa' => $this->student,
            'Pengangguran' => $this->unemployed,
            'Lainnya' => $this->others,
        ];
    }

    public function getTotalWorkforceAttribute()
    {
        return $this->farmer + $this->trader + $this->civil_servant + 
               $this->private_employee + $this->entrepreneur + $this->fisherman + 
               $this->laborer + $this->unemployed + $this->others;
    }

    public function getUnemploymentRateAttribute()
    {
        $totalWorkforce = $this->total_workforce;
        if ($totalWorkforce > 0) {
            return round(($this->unemployed / $totalWorkforce) * 100, 2);
        }
        return 0;
    }

    public function scopeLatestYear($query)
    {
        return $query->orderBy('year', 'desc');
    }
}
