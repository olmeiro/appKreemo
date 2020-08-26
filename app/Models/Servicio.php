<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Flash;

class Servicio extends Model
{
    protected $table = "servicio";

    protected $fillable = [

        "idestadoservicio",
        "idcotizacion",
        "fechainicio",
        "fechafin"
    ];

    public static $rules = [

        'idestadoservicio' => 'required|numeric|digits_between:1,10000',
        'idcotizacion' => 'required|numeric|digits_between:1,10000',
        'fechainicio' => 'required|date',
        'fechafin' => 'required|date'

    ];


}
