<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Super Admin
        User::create([
            'name' => 'Super Administrator',
            'email' => 'superadmin@kampungdalam.id',
            'password' => Hash::make('password'),
            'role' => 'super-admin',
            'email_verified_at' => now(),
        ]);

        // Staff
        User::create([
            'name' => 'Staff Desa',
            'email' => 'staff@kampungdalam.id',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'email_verified_at' => now(),
        ]);

        // Additional staff members
        User::create([
            'name' => 'Sekretaris Desa',
            'email' => 'sekretaris@kampungdalam.id',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'email_verified_at' => now(),
        ]);
    }
}
