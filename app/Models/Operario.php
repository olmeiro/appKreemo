<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operario extends Model
{
    protected $table = "operario";

    protected $fillable = [
        "id",
        "nombre",
        "apellido",
        "documento",
        "celular"
    ];

    public static $rules = [
        'id' => 'integer|max:11',
        'nombre' => 'required|string|max:20',
        'apellido' =>  'required|string|max:20',
        'documento' => 'required|integer|digits_between:7,13',
        'celular' => 'integer|required|digits_between:7,14'
    ];
}
