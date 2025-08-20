<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    use HasFactory;

    protected $table = 'village_profiles';

    protected $fillable = [
        'village_name',
        'village_code',
        'district',
        'regency',
        'province',
        'postal_code',
        'about',
        'history',
        'vision',
        'mission',
        'total_population',
        'total_families',
        'area_size',
        'total_rt',
        'total_rw',
        'map_embed_url',
        'boundary_north',
        'boundary_south',
        'boundary_east',
        'boundary_west',
        'village_boundaries',
        'contact_phone',
        'contact_email',
        'contact_address',
        'website',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'area_size' => 'decimal:2',
        'total_population' => 'integer',
        'total_families' => 'integer',
        'total_rt' => 'integer',
        'total_rw' => 'integer',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];
}
