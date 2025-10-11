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
        'activity_date' => 'datetime', // Ubah ke datetime agar lebih akurat
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope untuk aktivitas terbaru
     */
    public function scopeRecent($query, $limit = 5)
    {
        return $query->orderBy('activity_date', 'desc')
                     ->orderBy('created_at', 'desc')
                     ->limit($limit);
    }

    /**
     * Scope untuk aktivitas dengan poin yang didapat
     */
    public function scopePointsEarned($query)
    {
        return $query->where('points_earned', '>', 0);
    }

    /**
     * Scope untuk aktivitas dengan poin yang digunakan
     */
    public function scopePointsUsed($query)
    {
        return $query->where('points_used', '>', 0);
    }

    /**
     * Scope untuk aktivitas hari ini
     */
    public function scopeToday($query)
    {
        return $query->whereDate('activity_date', today());
    }

    /**
     * Scope untuk aktivitas minggu ini
     */
    public function scopeThisWeek($query)
    {
        return $query->whereBetween('activity_date', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ]);
    }

    /**
     * Scope untuk aktivitas bulan ini
     */
    public function scopeThisMonth($query)
    {
        return $query->whereMonth('activity_date', now()->month)
                     ->whereYear('activity_date', now()->year);
    }

    /**
     * Scope berdasarkan tipe aktivitas
     */
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }
}
