<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    protected $table = "jornada";

    protected $fillable = [

        "jornada_nombre",

    ];

    public static $rules = [

        "Jornada_Nombre" => 'required|between:1,25',


    ];
}
