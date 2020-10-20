<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Flash;

class Servicio extends Model
{
    use SoftDeletes;

    protected $table = "servicio";

    protected $fillable = [

        "idestadoservicio",
        "idcotizacion",
        "idmaquina",
        "idoperario1",
        "idoperario2",
        "fechainicio",
        "fechafin",
        "horainicio",
        "horafin",
        "estado",
        "descripcion"
    ];

    public static $rules = [

        'idestadoservicio' => 'required|numeric|digits_between:1,10000',
        'idcotizacion' => 'required|numeric|digits_between:1,10000',
        'idmaquina' => 'required',
        'idoperario1' => 'required',
        'idoperario2' => 'required',
        'fechainicio' => 'required|date',
        'fechafin' => 'required|date',
        'horainicio' => 'required',
        'horafin' => 'required',
        'descripcion' => '',
        'estado' => 'in:1,0'

    ];

    protected $dates = ['deleted_at'];

}
