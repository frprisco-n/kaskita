<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class TestMemberSeeder extends Seeder
{
    public function run(): void
    {
        $password = config('kaskita.seed_test_member_password');

        if (! $password) {
            throw new RuntimeException(
                'KASKITA_TEST_MEMBER_PASSWORD is not configured.'
            );
        }

        $user = User::updateOrCreate(
            ['email' => 'member@kaskita.test'],
            [
                'name' => 'Test Member',
                'password' => Hash::make($password),
                'role' => 'member',
                'is_active' => true,
            ]
        );

        Member::updateOrCreate(
            ['user_id' => $user->id],
            [
                'member_number' => 'TEST-001',
                'membership_status' => 'active',
                'joined_at' => now()->toDateString(),
                'left_at' => null,
            ]
        );
    }
}