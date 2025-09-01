<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TourismPotential extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'address',
        'description',
        'featured_image',
        'gallery_images',
        'location',
        'latitude',
        'longitude',
        'facilities',
        'activities',
        'opening_hours',
        'ticket_price',
        'contact_person',
        'contact_phone',
        'email',
        'website',
        'access_route',
        'difficulty_level',
        'estimated_duration',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'gallery_images' => 'array',   // ✅ otomatis decode JSON ke array
        'facilities'     => 'array',
        'activities'     => 'array',
        'is_featured'    => 'boolean',
        'is_active'      => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Accessors
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }
        return asset('images/default-tourism.jpg');
    }

    public function getGalleryImageUrlsAttribute()
    {
        if ($this->gallery_images && is_array($this->gallery_images)) {
            return array_map(function($image) {
                return asset('storage/' . $image);
            }, $this->gallery_images);
        }
        return [];
    }

    public function getHasCoordinatesAttribute()
    {
        return !is_null($this->latitude) && !is_null($this->longitude);
    }

    public function getFormattedTicketPriceAttribute()
    {
        if ($this->ticket_price) {
            return 'Rp ' . number_format($this->ticket_price, 0, ',', '.');
        }
        return 'Gratis';
    }

    public function getEstimatedDurationTextAttribute()
    {
        if ($this->estimated_duration) {
            $hours = floor($this->estimated_duration / 60);
            $minutes = $this->estimated_duration % 60;
            
            if ($hours > 0 && $minutes > 0) {
                return $hours . ' jam ' . $minutes . ' menit';
            } elseif ($hours > 0) {
                return $hours . ' jam';
            } else {
                return $minutes . ' menit';
            }
        }
        return null;
    }

    public function getDifficultyLevelTextAttribute()
    {
        $levels = [
            'mudah' => 'Mudah',
            'sedang' => 'Sedang',
            'sulit' => 'Sulit'
        ];
        
        return $levels[$this->difficulty_level] ?? 'Mudah';
    }

    public function getCategoryTextAttribute()
    {
        $categories = [
            'alam' => 'Wisata Alam',
            'budaya' => 'Wisata Budaya',
            'sejarah' => 'Wisata Sejarah',
            'kuliner' => 'Wisata Kuliner',
            'religi' => 'Wisata Religi',
            'edukasi' => 'Wisata Edukasi',
            'adventure' => 'Wisata Petualangan',
            'agro' => 'Agrowisata'
        ];
        
        return $categories[$this->category] ?? ucfirst($this->category);
    }

    // Static methods
    public static function getCategories()
    {
        return [
            'alam' => 'Wisata Alam',
            'budaya' => 'Wisata Budaya',
            'sejarah' => 'Wisata Sejarah',
            'kuliner' => 'Wisata Kuliner',
            'religi' => 'Wisata Religi',
            'edukasi' => 'Wisata Edukasi',
            'adventure' => 'Wisata Petualangan',
            'agro' => 'Agrowisata'
        ];
    }

    public static function getDifficultyLevels()
    {
        return [
            'mudah' => 'Mudah',
            'sedang' => 'Sedang',
            'sulit' => 'Sulit'
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tourism) {
            if (empty($tourism->slug)) {
                $tourism->slug = Str::slug($tourism->name);
            }
        });

        static::updating(function ($tourism) {
            if ($tourism->isDirty('name')) {
                $tourism->slug = Str::slug($tourism->name);
            }
        });
    }
}
