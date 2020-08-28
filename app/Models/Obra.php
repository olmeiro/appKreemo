<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $table = "obra";

    protected $fillable = [
        "nombre",
        "direccion",
        "telefono1",
        "correo1",
    ];

    public static $rules = [
        'nombre' =>    'required|string|max:50',
        'direccion' =>  'required|string|max:100',
        'telefono1' => 'string|required|between:7,10',
        'correo1' => 'email:rfc,dns',
    ];
}
