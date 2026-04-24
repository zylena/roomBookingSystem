<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'room_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'theme_id',
        'room_name',
        'description',
        'difficulty_level',
        'duration_minutes',
        'price_per_pax',
        'max_pax',
        'image_url',
        'status'
    ];

    // 🔗 Room belongs to Theme
    public function theme()
    {
        return $this->belongsTo(Theme::class, 'theme_id');
    }

    // 🔗 Room has many TimeSlots
    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class, 'room_id');
    }
}