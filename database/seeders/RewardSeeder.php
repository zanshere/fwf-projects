<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    public function run()
    {
        $rewards = [
            [
                'name' => 'Tiket Reguler Gratis',
                'description' => 'Tiket masuk reguler untuk 1 orang',
                'points_required' => 500,
                'stock' => 100,
                'icon' => 'ticket',
                'color' => 'from-blue-500 to-cyan-500',
            ],
        ];

        foreach ($rewards as $reward) {
            Reward::create($reward);
        }
    }
}
