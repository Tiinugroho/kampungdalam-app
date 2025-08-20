<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'slug',
        'description',
        'requirements',
        'process',
        'duration',
        'cost',
        'is_active',
    ];

    protected $casts = [
        'cost' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getFormattedCostAttribute()
    {
        if ($this->cost == 0) {
            return 'Gratis';
        }
        return 'Rp ' . number_format($this->cost, 0, ',', '.');
    }

    public function getRequirementsArrayAttribute()
    {
        if ($this->requirements) {
            return explode("\n", $this->requirements);
        }
        return [];
    }

    public function getProcessArrayAttribute()
    {
        if ($this->process) {
            return explode("\n", $this->process);
        }
        return [];
    }
}
