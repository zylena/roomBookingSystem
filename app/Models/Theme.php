<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $table = 'themes';
    protected $primaryKey = 'theme_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'theme_name',
        'description',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'theme_id', 'theme_id');
    }
}