<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'guest_email',
        'guest_name',
        'ticket_type',
        'quantity',
        'adult_count',
        'child_count',
        'purchase_date',
        'status',
        'points_earned',
        'barcode',
        'total_price',
        'detail_file'
    ];

    protected $casts = [
        'purchase_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function calculatePoints($ticketType, $quantity)
    {
        $pointsMap = [
            'Reguler' => 10,
            'Premium' => 25,
            'Khusus' => 0
        ];

        return ($pointsMap[$ticketType] ?? 0) * $quantity;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'aktif');
    }

    public function scopeUsed($query)
    {
        return $query->where('status', 'terpakai');
    }

    public function scopeProses($query)
    {
        return $query->where('status', 'proses');
    }

    public function getQrCodeContent()
    {
        return json_encode([
            'ticket_id' => $this->id,
            'barcode' => $this->barcode,
            'type' => $this->ticket_type,
            'status' => $this->status
        ]);
    }

    public function isOwnedByUser($user)
    {
        if ($user === null) {
            return false;
        }

        return $this->user_id === $user->id ||
               ($this->guest_email && $this->guest_email === $user->email);
    }
}
