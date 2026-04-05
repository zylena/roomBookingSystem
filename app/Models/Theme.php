<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $primaryKey = 'theme_id';

    protected $fillable = [
        'theme_name',
        'description'
    ];

    // 🔗 Theme has many Rooms
    public function rooms()
    {
        return $this->hasMany(Room::class, 'theme_id');
    }
}