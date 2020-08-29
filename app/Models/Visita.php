<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $table = "visita";

    protected $fillable = [
        "id",
        "tipovisita",
        "idobra",
        "encargadovisita",
        "Fecha_Hora",
        "viabilidad",
        
    ];

    public static $rules = [
        'id'=> 'integer',
        'tipovisita' =>'required|string|max:10',
        'idobra' =>'integer',
        'encargadovisita' =>'required|string|max:45',
        'Fecha_Hora'=> 'required',
        'viabilidad'=> 'string',
    ];
}
