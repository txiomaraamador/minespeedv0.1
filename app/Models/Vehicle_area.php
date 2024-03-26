<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_area extends Model
{
    use HasFactory;

    public function area()
    {
        return $this->hasMany ('App\Models\Areas', 'areas_id');
    }
    public function namearea()
    {
        return $this->belongsTo('App\Models\Areas', 'areas_id');
    }

    public function vehicle()
    {
        return $this->hasMany ('App\Models\Vehicles', 'vehicles_id');
    }
    public function namevehicle()
    {
        return $this->belongsTo('App\Models\Vehicles', 'vehicles_id');
    }
}
