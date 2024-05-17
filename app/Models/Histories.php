<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histories extends Model
{
    use HasFactory;

    public function employee_vehicle()
    {
        return $this->belongsTo('App\Models\Employee_vehicle', 'employee_vehicle_id');
    }
    public function nameequipment()
    {
        return $this->belongsTo('App\Models\Equipments', 'equipments_id');
    }
}
