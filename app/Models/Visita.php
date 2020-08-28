<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $table = "visita";

    protected $fillable = [
        "idvisita",
        "tipovisita",
        
        
    ];

    public static $rules = [
        
    ];
}
