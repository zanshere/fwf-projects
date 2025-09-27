<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'points_required',
        'stock',
        'icon',
        'color',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function redemptions()
    {
        return $this->hasMany(RewardRedemption::class);
    }

    public function getAvailableStockAttribute()
    {
        return $this->stock - $this->redemptions()->whereIn('status', ['pending', 'approved'])->count();
    }

    public function canBeRedeemedBy(User $user)
    {
        return $this->is_active
            && $user->points >= $this->points_required
            && $this->available_stock > 0;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeAvailable($query)
    {
        return $query->active()->where('stock', '>', 0);
    }
}
