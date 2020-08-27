<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    protected $table = "etapa";

    protected $fillable = [

        "etapa",

    ];

    public static $rules = [

        "Etapa" => 'required|between:1,25',


    ];
}
