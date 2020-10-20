<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obra extends Model
{
    use SoftDeletes;

    protected $table = "obra";

    protected $fillable = [
        'idempresa',
        "nombre",
        "direccion",
        "telefono1",
        "correo1",
    ];

    public static $rules = [
        // 'idempresa' => 'required|integer',
        // 'nombre' =>    'required|string|max:50',
        // 'direccion' =>  'required|string|max:100',
        // 'telefono1' => 'string|required|between:7,10',
        // 'correo1' => 'email:rfc,dns',
    ];
    protected $dates = ['deleted_at'];
}
