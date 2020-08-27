<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TipoConcreto extends Model
{
    protected $table = "tipoconcreto";

    protected $fillable = [

        "tipo_concreto",

    ];

    public static $rules = [

        "Tipo_Concreto" => 'required|between:1,25',


    ];
}
