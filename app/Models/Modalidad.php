<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $table = "modalidad";

    protected $fillable = [

        "modalidad",

    ];

    public static $rules = [

        "Modalidad" => 'required|between:1,25',


    ];
}
