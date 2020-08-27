<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class EstadoCotizacion extends Model
{
    protected $table = "estadocotizacion";

    protected $fillable = [

        "estado_cotizacion",

    ];

    public static $rules = [

        "Estado_Cotizacion" => 'required|between:1,25',


    ];
}
