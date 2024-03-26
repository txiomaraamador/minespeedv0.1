<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    public function typevehicle()
    {
        return $this->hasMany ('App\Models\Typevehicles', 'typevehicles_id');
    }
    public function nametypevehicle()
    {
        return $this->belongsTo('App\Models\Typevehicles', 'typevehicles_id');
    }
}
