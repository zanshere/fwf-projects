<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardRedemption extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reward_id',
        'points_used',
        'status',
        'notes',
        'redeemed_at',
        'processed_at',
    ];

    protected $casts = [
        'redeemed_at' => 'datetime',
        'processed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }

    public function approve($notes = null)
    {
        $this->update([
            'status' => 'approved',
            'processed_at' => now(),
            'notes' => $notes,
        ]);

        // Deduct from reward stock if needed
        if ($this->reward->stock > 0) {
            $this->reward->decrement('stock');
        }
    }

    public function reject($notes = null)
    {
        $this->update([
            'status' => 'rejected',
            'processed_at' => now(),
            'notes' => $notes,
        ]);

        // Return points to user
        $this->user->addPoints($this->points_used, [
            'type' => 'points_returned',
            'description' => 'Points returned for rejected reward: ' . $this->reward->name
        ]);
    }

    public function complete($notes = null)
    {
        $this->update([
            'status' => 'completed',
            'notes' => $notes,
        ]);
    }
}
