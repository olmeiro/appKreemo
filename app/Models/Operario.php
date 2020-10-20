<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operario extends Model
{
    use SoftDeletes;

    protected $table = "operario";

    protected $fillable = [
        "id",
        "nombre",
        "apellido",
        "documento",
        "celular"
    ];

    public static $rules = [
        'id' => 'integer|max:11',
        'nombre' => 'required|string|max:20',
        'apellido' =>  'required|string|max:20',
        'documento' => 'required|integer|digits_between:7,12',
        'celular' => 'numeric|required|digits_between:7,13'
    ];

    protected $dates = ['deleted_at'];
}
