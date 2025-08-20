<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'pkh_recipients',
        'blt_recipients',
        'bpnt_recipients',
        'kip_recipients',
        'kis_recipients',
        'youth_organization',
        'women_organization',
        'farmer_group',
        'fisherman_group',
        'art_group',
        'cultural_event',
        'sports_facility',
        'crime_cases',
        'accident_cases',
        'disaster_cases',
    ];

    public function getSocialProgramsAttribute()
    {
        return [
            'PKH' => $this->pkh_recipients,
            'BLT' => $this->blt_recipients,
            'BPNT' => $this->bpnt_recipients,
            'KIP' => $this->kip_recipients,
            'KIS' => $this->kis_recipients,
        ];
    }

    public function getOrganizationsAttribute()
    {
        return [
            'Karang Taruna' => $this->youth_organization,
            'PKK' => $this->women_organization,
            'Kelompok Tani' => $this->farmer_group,
            'Kelompok Nelayan' => $this->fisherman_group,
            'Grup Seni' => $this->art_group,
        ];
    }

    public function getSafetyIndicatorsAttribute()
    {
        return [
            'Kasus Kriminal' => $this->crime_cases,
            'Kecelakaan' => $this->accident_cases,
            'Bencana' => $this->disaster_cases,
        ];
    }

    public function getTotalSocialProgramRecipientsAttribute()
    {
        return $this->pkh_recipients + $this->blt_recipients + $this->bpnt_recipients + 
               $this->kip_recipients + $this->kis_recipients;
    }

    public function getTotalOrganizationsAttribute()
    {
        return $this->youth_organization + $this->women_organization + $this->farmer_group + 
               $this->fisherman_group + $this->art_group;
    }

    public function scopeLatestYear($query)
    {
        return $query->orderBy('year', 'desc');
    }
}
