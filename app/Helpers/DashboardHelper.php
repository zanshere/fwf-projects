<?php

namespace App\Helpers;

class DashboardHelper
{
    public static function getActivityColor($type, $variant = 'from')
    {
        $colors = [
            'visit' => ['from' => 'green', 'to' => 'emerald'],
            'purchase' => ['from' => 'blue', 'to' => 'cyan'],
            'reward_redemption' => ['from' => 'yellow', 'to' => 'orange'],
            'points_added' => ['from' => 'green', 'to' => 'emerald'],
            'points_used' => ['from' => 'orange', 'to' => 'red'],
            'points_returned' => ['from' => 'green', 'to' => 'emerald'],
            'default' => ['from' => 'gray', 'to' => 'blue']
        ];

        $color = $colors[$type] ?? $colors['default'];
        return $color[$variant];
    }

    public static function getActivityIcon($type)
    {
        $icons = [
            'visit' => 'map-pin',
            'purchase' => 'shopping-cart',
            'reward_redemption' => 'gift',
            'points_added' => 'plus-circle',
            'points_used' => 'minus-circle',
            'points_returned' => 'refresh-cw',
            'default' => 'activity'
        ];

        return $icons[$type] ?? $icons['default'];
    }

    public static function getMemberLevelStars($level)
    {
        $stars = [
            'Bronze' => 1,
            'Silver' => 2,
            'Gold' => 3,
            'Platinum' => 4,
            'Diamond' => 5
        ];

        return $stars[$level] ?? 1;
    }
}
