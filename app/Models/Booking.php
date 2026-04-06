<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'booking_reference',
        'user_id',
        'room_id',
        'slot_id',
        'customer_name',
        'pax',
        'total_amount',
        'payment_status',
        'payment_method',
        'expires_at'
    ];

    // 🔗 belongs to Room
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    // 🔗 belongs to TimeSlot
    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class, 'slot_id');
    }
}