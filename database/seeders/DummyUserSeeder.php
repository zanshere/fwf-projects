<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Zans User', 'email' => 'zans@example.com'],
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com'],
            ['name' => 'Bob Smith', 'email' => 'bob@example.com'],
            ['name' => 'Charlie Davis', 'email' => 'charlie@example.com'],
            ['name' => 'Eve Martinez', 'email' => 'eve@example.com'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('zanshere'), // bcrypt otomatis
                'remember_token' => Str::random(10),
            ]);
        }

        $this->command->info('5 dummy users berhasil dibuat!');
    }
}
