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
        'activity_date'
    ];

    protected $casts = [
        'activity_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeRecent($query, $limit = 5)
    {
        return $query->orderBy('created_at', 'desc')->limit($limit);
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
