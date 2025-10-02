<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@fajarworld.com',
            'password' => Hash::make('zanshere'),
            'role' => 'admin',
            'member_since' => now(),
        ]);

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@fajarworld.com');
        $this->command->info('Password: zanshere');
    }
}
