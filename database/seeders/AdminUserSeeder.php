<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@fuzzy.com'],
            [
                'name' => 'Admin Fuzzy',
                'password' => Hash::make('admin123'), // Ganti sesuai kebutuhan
                'role' => 'admin'
            ]
        );


User::updateOrCreate(
    ['email' => 'user2@fuzzy.com'],
    [
        'name' => 'User Biasa 2',
        'password' => Hash::make('user123'),
        'role' => 'user'
    ]
);
    }
}
