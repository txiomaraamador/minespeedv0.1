<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_vehicle extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->hasMany ('App\Models\Employees', 'employees_id');
    }
    public function nameemployee()
    {
        return $this->belongsTo('App\Models\Employees', 'employees_id');
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
