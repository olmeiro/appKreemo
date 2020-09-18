<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $table = "visita";

    protected $fillable = [
    
        "tipovisita",
        "idobra",
        "fecha",
        "horainicio",
        "horafinal",
        "estado",
        "descripcion",
        
        
    ];

    public static $rules = [
        'tipovisita' =>'required',
        'idobra' =>'integer',
        'fecha' =>'required',
        'horainicio'=> 'required',
        'horafinal'=> 'required',
    ];
}
