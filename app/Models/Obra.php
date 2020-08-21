<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $table = "obra";

    protected $fillable = [
        "idempresa",
        "nombre",
        "direccion",
        "telefono1",
        "correo1",
    ];

    public static $rules = [
        'idempresa' => 'integer',
        'nombre' =>    'required|string|max:20',
        'direccion' =>  'required|string|max:100',
        'telefono1' => 'numeric|required|digits_between:7,10',
        'correo1' => 'email:rfc,dns',
    ];
}
