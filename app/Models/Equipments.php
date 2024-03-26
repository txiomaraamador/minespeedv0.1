<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
    use HasFactory;

    public function typeequipment()
    {
        return $this->hasMany ('App\Models\Typeequipments', 'typeequipments_id');
    }
    public function nametypeequipment()
    {
        return $this->belongsTo('App\Models\Typeequipments', 'typeequipments_id');
    }

    public function area()
    {
        return $this->hasMany ('App\Models\Areas', 'areas_id');
    }
    public function namearea()
    {
        return $this->belongsTo('App\Models\Areas', 'areas_id');
    }
}
