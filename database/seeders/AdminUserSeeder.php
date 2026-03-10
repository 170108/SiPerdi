<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@siperdi.my.id');
        $password = env('ADMIN_PASSWORD', '12345678');

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin',
                'role' => User::ROLE_ADMIN,
                'status' => 'verified',
                'verified_at' => now(),
                'password' => Hash::make($password),
            ]
        );
    }
}
