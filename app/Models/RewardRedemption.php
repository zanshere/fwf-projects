<?php
// app/Models/RewardRedemption.php

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
        'points_before',
        'points_after',
        'status',
        'notes',
        'admin_notes',
        'redeemed_at',
        'processed_at',
        'approved_at',
        'approved_by',
    ];

    protected $casts = [
        'redeemed_at' => 'datetime',
        'processed_at' => 'datetime',
        'approved_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function approve($adminId, $notes = null)
    {
        $this->update([
            'status' => 'approved',
            'processed_at' => now(),
            'approved_at' => now(),
            'approved_by' => $adminId,
            'admin_notes' => $notes,
        ]);

        // Deduct from reward stock
        if ($this->reward->stock > 0) {
            $this->reward->decrement('stock');
        }
    }

    public function reject($adminId, $notes = null)
    {
        $this->update([
            'status' => 'rejected',
            'processed_at' => now(),
            'approved_at' => now(),
            'approved_by' => $adminId,
            'admin_notes' => $notes,
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

    // Scope untuk filtering
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}
