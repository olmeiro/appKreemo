<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visita extends Model
{
    use SoftDeletes;

    protected $table = "visita";

    protected $fillable = [

        "tipovisita",
        "idobra",
        "fecha",
        "horainicio",
        "horafinal",
        //"estado",
        "descripcion",


    ];

    public static $rules = [
        'tipovisita' =>'required',
        'idobra' =>'integer',
        'fecha' =>'required',
        'horainicio'=> 'required',
        'horafinal'=> 'required',
        //'estado' => 'in:1,0',
    ];

    protected $dates = ['deleted_at'];
}
