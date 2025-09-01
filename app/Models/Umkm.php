<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'owner_name',
        'nik',
        'category',
        'description',
        'featured_image',
        'product_images',
        'address',
        'phone',
        'whatsapp',
        'email',
        'instagram',
        'facebook',
        'website',
        'products',
        'capital',
        'monthly_revenue',
        'employee_count',
        'established_date',
        'license_number',
        'is_active',
    ];

    protected $casts = [
        'product_images' => 'array',
        'capital' => 'decimal:2',
        'established_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function getFeaturedImageUrlAttribute()
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }
        return asset('images/default-umkm.jpg');
    }

    public function getCategoryLabelAttribute()
    {
        $categories = [
            'kuliner' => 'Kuliner',
            'kerajinan' => 'Kerajinan',
            'pertanian' => 'Pertanian',
            'perdagangan' => 'Perdagangan',
            'jasa' => 'Jasa',
            'teknologi' => 'Teknologi',
            'lainnya' => 'Lainnya',
        ];

        return $categories[$this->category] ?? 'Lainnya';
    }

    public function getFormattedCapitalAttribute()
    {
        if ($this->capital) {
            return 'Rp ' . number_format($this->capital, 0, ',', '.');
        }
        return '-';
    }

    public function getFormattedMonthlyRevenueAttribute()
    {
        if ($this->monthly_revenue) {
            return 'Rp ' . number_format($this->monthly_revenue, 0, ',', '.');
        }
        return '-';
    }

    public function getBusinessAgeAttribute()
    {
        if ($this->established_date) {
            return $this->established_date->diffInYears(now()) . ' tahun';
        }
        return '-';
    }
}
