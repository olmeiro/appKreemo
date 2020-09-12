<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Flash;

class Encuesta extends Model
{
    protected $table = "encuesta";

    protected $fillable = [

        "idservicio",
        "directorobra",
        "constructora",
        "correo",
        "celular",
        "mes",
        "respuesta1_1",
        "respuesta1_2",
        "respuesta1_3",
        "respuesta1_4",
        "respuesta2",
        "respuesta3",
        "respuesta4",
        "respuesta5",
        "respuesta6",
        "respuesta7",
    ];

    public static $rules = [

        // 'idservicio' => 'required|numeric|digits_between:1,10000',
        // 'directorobra' => 'required|string|max:20',
        // 'constructora' => 'required|string|max:30',
        // 'correo' => 'required|string|max:30',
        // 'celular' => 'required|numeric|digits_between:7,11',
        // 'mes' => 'required|date',
        // 'respuesta1_1' => 'required|integer|min:1, max:5',
        // 'respuesta1_2' => 'required|integer|min:1, max:5',
        // 'respuesta1_3' => 'required|integer|min:1, max:5',
        // 'respuesta1_4' => 'required|integer|min:1, max:5',
        // 'respuesta2' => 'required|string',
        // 'respuesta3' => 'max:300',
        // 'respuesta4' => 'required|string',
        // 'respuesta5' => 'max:300',
        // 'respuesta6' => 'required|string',
        // 'respuesta7' => 'required|string',

    ];
}
