<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
        'email_verified_at',
        'last_logout_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $dates = ['last_logout_at'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'author_id');
    }

    public function isSuperAdmin()
    {
        return $this->role === 'super-admin';
    }

    public function isStaff()
    {
        return $this->role === 'staff';
    }

    public function scopeSuperAdmin($query)
    {
        return $query->where('role', 'super-admin');
    }

    public function scopeStaff($query)
    {
        return $query->where('role', 'staff');
    }
}
