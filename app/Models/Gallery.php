<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'category',
        'order',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public static function getCategories()
    {
        return [
            'kegiatan' => 'Kegiatan',
            'fasilitas' => 'Fasilitas',
            'wisata'   => 'Wisata',
            'umkm'     => 'UMKM',
            'lainnya'  => 'Lainnya',
        ];
    }
}
