<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $primaryKey = 'slot_id';

    protected $fillable = [
        'room_id',
        'slot_date',
        'start_time',
        'end_time',
        'availability_status'
    ];

    // 🔗 belongs to Room
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    // 🔗 one slot = one booking
    public function booking()
    {
        return $this->hasOne(Booking::class, 'slot_id');
    }
}