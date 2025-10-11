<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'points',
        'daily_points',
        'daily_points_date',
        'points_used',  // ✅ Ubah dari points_lifetime
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
            'daily_points_date' => 'date',
        ];
    }

    /**
     * Reset daily points jika sudah berbeda hari
     */
    public function checkAndResetDailyPoints()
    {
        $today = Carbon::today();

        if (!$this->daily_points_date || !$this->daily_points_date->isSameDay($today)) {
            $this->daily_points = 0;
            $this->daily_points_date = $today;
            $this->save();
        }
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

    /**
     * ✅ Tambah poin (daily + aktif saja, TIDAK ke points_used)
     */
    public function addPoints($points, $activity = null)
    {
        // Reset daily points jika sudah berbeda hari
        $this->checkAndResetDailyPoints();

        // Tambah ke daily points (poin hari ini)
        $this->increment('daily_points', $points);

        // Tambah poin aktif (bisa digunakan)
        $this->increment('points', $points);

        // ❌ TIDAK menambah ke points_used karena ini untuk tracking poin yang DIPAKAI

        // Catat aktivitas bila ada
        if ($activity) {
            $this->activities()->create([
                'type' => $activity['type'] ?? 'points_added',
                'description' => $activity['description'] ?? "Earned {$points} points",
                'points_earned' => $points,
                'activity_date' => now(),
            ]);
        }

        // Update level member berdasarkan total points yang pernah dikumpulkan
        $this->updateMemberLevel();
    }

    /**
     * ✅ Kurangi poin aktif DAN tambah ke points_used
     */
    public function deductPoints($points, $activity = null)
    {
        // Cek apakah poin cukup
        if ($this->points < $points) {
            throw new \Exception('Poin tidak mencukupi. Anda memiliki ' . number_format($this->points) . ' poin.');
        }

        // Kurangi dari poin aktif
        $this->decrement('points', $points);

        // ✅ Tambah ke total poin yang terpakai
        $this->increment('points_used', $points);

        if ($activity) {
            $this->activities()->create([
                'type' => $activity['type'] ?? 'points_used',
                'description' => $activity['description'] ?? "Used {$points} points",
                'points_used' => $points,
                'activity_date' => now(),
            ]);
        }
    }

    /**
     * ✅ Update member level berdasarkan TOTAL POINTS yang pernah dimiliki
     * Formula: points_active + points_used = total poin yang pernah dikumpulkan
     */
    public function updateMemberLevel()
    {
        // Total poin = poin aktif + poin yang sudah dipakai
        $totalPointsEarned = $this->points + $this->points_used;

        if ($totalPointsEarned >= 10000) {
            $level = 'Platinum';
        } elseif ($totalPointsEarned >= 5000) {
            $level = 'Gold';
        } elseif ($totalPointsEarned >= 2000) {
            $level = 'Silver';
        } else {
            $level = 'Bronze';
        }

        if ($this->member_level !== $level) {
            $this->update(['member_level' => $level]);

            // Catat aktivitas level up
            $this->activities()->create([
                'type' => 'level_up',
                'description' => "Naik level menjadi {$level} Member!",
                'points_earned' => 0,
                'activity_date' => now(),
            ]);
        }
    }

    /**
     * Catat kunjungan dan berikan poin
     */
    public function recordVisit()
    {
        $this->increment('total_visits');

        $pointsEarned = 50;
        $this->addPoints($pointsEarned, [
            'type' => 'visit',
            'description' => 'Visit to Fajar World - earned ' . $pointsEarned . ' points'
        ]);
    }

    /**
     * Get daily points info (helper)
     */
    public function getDailyPointsInfo()
    {
        $this->checkAndResetDailyPoints();

        return [
            'daily_points' => $this->daily_points,
            'date' => $this->daily_points_date ? $this->daily_points_date->format('d M Y') : '-',
        ];
    }

    /**
     * ✅ Get points summary
     */
    public function getPointsSummary()
    {
        $this->checkAndResetDailyPoints();

        return [
            'daily' => $this->daily_points,              // Poin hari ini
            'active' => $this->points,                   // Poin yang bisa digunakan
            'used' => $this->points_used,                // Total poin yang sudah dipakai
            'total_earned' => $this->points + $this->points_used, // Total poin yang pernah dikumpulkan
        ];
    }
}
