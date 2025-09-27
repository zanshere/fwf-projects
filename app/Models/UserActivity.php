<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'description',
        'points_earned',
        'points_used',
        'metadata',
        'activity_date',
    ];

    protected $casts = [
        'activity_date' => 'datetime',
        'metadata' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeRecent($query, $limit = 10)
    {
        return $query->orderBy('activity_date', 'desc')->limit($limit);
    }

    public function scopePointsEarned($query)
    {
        return $query->where('points_earned', '>', 0);
    }

    public function scopePointsUsed($query)
    {
        return $query->where('points_used', '>', 0);
    }
}
