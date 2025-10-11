<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'points',
        'member_level',
        'total_visits',
        'member_since',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'member_since' => 'date',
        ];
    }

    /**
     * Scope untuk mendapatkan user biasa
     */
    public function scopeRegularUsers($query)
    {
        return $query->where('role', 'user');
    }

    /**
     * Cek apakah user adalah admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Cek apakah user adalah regular user
     */
    public function isRegularUser()
    {
        return $this->role === 'user';
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function activeTickets()
    {
        return $this->hasMany(Ticket::class)->where('status', 'aktif');
    }

    public function rewardRedemptions()
    {
        return $this->hasMany(RewardRedemption::class);
    }

    public function activities()
    {
        return $this->hasMany(UserActivity::class);
    }

    public function addPoints($points, $activity = null)
{
    // Tambah poin aktif dan poin lifetime
    $this->increment('points', $points);
    $this->increment('points_lifetime', $points); // ✅ Tambahan untuk komplain #1

    // Catat aktivitas bila ada
    if ($activity) {
        $this->activities()->create([
            'type' => $activity['type'] ?? 'points_added',
            'description' => $activity['description'] ?? "Earned {$points} points",
            'points_earned' => $points,
            'activity_date' => now(),
        ]);
    }

    // Update level member setelah poin bertambah
    $this->updateMemberLevel();
}


    public function deductPoints($points, $activity = null)
    {
        $this->decrement('points', $points);
        
        if ($activity) {
            $this->activities()->create([
                'type' => $activity['type'] ?? 'points_used',
                'description' => $activity['description'] ?? "Used {$points} points",
                'points_used' => $points,
                'activity_date' => now(),
            ]);
        }
    }

    public function updateMemberLevel()
    {
        $points = $this->points;

        if ($points >= 10000) {
            $level = 'Platinum';
        } elseif ($points >= 5000) {
            $level = 'Gold';
        } elseif ($points >= 1000) {
            $level = 'Silver';
        } else {
            $level = 'Bronze';
        }

        if ($this->member_level !== $level) {
            $this->update(['member_level' => $level]);
        }
    }

    public function recordVisit()
    {
        $this->increment('total_visits');

        $pointsEarned = 50;
        $this->addPoints($pointsEarned, [
            'type' => 'visit',
            'description' => 'Visit to Fajar World - earned ' . $pointsEarned . ' points'
        ]);
    }
}
