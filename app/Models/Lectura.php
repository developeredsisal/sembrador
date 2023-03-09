<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    use HasFactory;
    protected $table = "lectura";

    public function actividades()
    {
        return $this->hasMany('App\Models\Actividad');
    }
}
