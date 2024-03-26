<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    public function position()
    {
        return $this->hasMany ('App\Models\Positions', 'positions_id');
    }
    public function nameposition()
    {
        return $this->belongsTo('App\Models\Positions', 'positions_id');
    }
}
