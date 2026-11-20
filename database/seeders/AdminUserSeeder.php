<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $password = config('kaskita.seed_admin_password');

        if (! $password) {
            throw new RuntimeException(
                'KASKITA_ADMIN_PASSWORD is not configured.'
            );
        }

        User::updateOrCreate(
            ['email' => 'admin@kaskita.test'],
            [
                'name' => 'KasKita Admin',
                'password' => Hash::make($password),
                'role' => 'admin',
                'is_active' => true,
            ]
        );
    }
}