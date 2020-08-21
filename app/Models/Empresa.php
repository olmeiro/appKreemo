<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";

    protected $fillable = [
        "nit",
        "nombre",
        "nombrerepresentante",
        "direccion",
        "telefono1",
        "correo1",
    ];

    public static $rules = [
        'nit' => 'required|string|max:20',
        'nombre' =>    'required|string|max:20',
        'nombrerepresentante' =>  'required|string|max:20',
        'direccion' => 'required|string|max:60',
        'telefono1' => 'numeric|required|digits_between:7,11',
        'correo1' => 'email:rfc,dns',
    ];
}
