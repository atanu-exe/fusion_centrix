<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Super Admin
        User::firstOrCreate(
            ['email' => 'admin@fusioncentrix.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('Admin@123'),
                'user_type' => User::TYPE_SUPER_ADMIN,
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // Create a regular admin for testing
        User::firstOrCreate(
            ['email' => 'manager@fusioncentrix.com'],
            [
                'name' => 'Admin Manager',
                'password' => Hash::make('Admin@123'),
                'user_type' => User::TYPE_ADMIN,
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // Create an employee for testing
        User::firstOrCreate(
            ['email' => 'employee@fusioncentrix.com'],
            [
                'name' => 'Content Writer',
                'password' => Hash::make('Admin@123'),
                'user_type' => User::TYPE_EMPLOYEE,
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Admin users created successfully!');
        $this->command->info('Super Admin: admin@fusioncentrix.com / Admin@123');
        $this->command->info('Admin: manager@fusioncentrix.com / Admin@123');
        $this->command->info('Employee: employee@fusioncentrix.com / Admin@123');
    }
}
