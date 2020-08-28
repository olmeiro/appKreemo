<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $table = "obra";

    protected $fillable = [
        "idvisita",
        "tipovisita",
        "idobra",
        "encargadovisita",
        "fecha_hora",
        
    ];

    public static $rules = [
        'idempresa' => 'integer',
        'nombre' =>    'required|string|max:20',
        'direccion' =>  'required|string|max:100',
        'telefono1' => 'numeric|required|digits_between:7,10',
        'correo1' => 'email:rfc,dns',
    ];
}
