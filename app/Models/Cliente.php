<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Flash;

class Cliente extends Model
{
    protected $table = "contacto";

    protected $fillable = [
        "idobra",
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
        'idobra' => 'required|integer',
        'idtipocontacto' => 'required|integer',
        'idtipocontacto' => 'required|integer',
        'nombre' => 'required|string|max:20',
        'apellido1' =>  'required|string|max:20',
        'apellido2' => 'string|max:20',
        'documento' => 'numeric|required',
        'estado' => 'in:1,0',
        'telefono1' => 'required|numeric|required',
        'telefono2' => 'numeric|required',
        'correo1' => 'email:rfc,dns',
        'correo2' => 'email:rfc,dns',
    ];
}
