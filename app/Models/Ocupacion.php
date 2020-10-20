<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    protected $table = "ocupacion";

    protected $fillable = [
        "id",
        "idmaqiuna",
        "fechainicio",
        "fechafin",
    ];

    public static $rules = [
        
    ];
}
