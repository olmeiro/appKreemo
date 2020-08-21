<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Flash;

class Cliente extends Model
{
    protected $table = "contacto";

    protected $fillable = [
        "idtipocontacto",
        "nombre",
        "apellido1",
        "apellido2",
        "documento",
        "estado",
        "telefono1",
        "telefono2",
        "correo1",
        "correo2",
    ];

    public static $rules = [
        'idtipocontacto' => 'integer',
        'nombre' =>    'required|string|max:20',
        'apellido1' =>  'required|string|max:20',
        'apellido2' => 'required|string|max:20',
        'documento' => 'numeric|required|digits_between:7,10',
        'estado' => 'in:1,0',
        'telefono1' => 'numeric|required|digits_between:7,13',
        'telefono2' => 'numeric|required|digits_between:7,13',
        'correo1' => 'email:rfc,dns',
        'correo2' => 'email:rfc,dns',
    ];
}
