<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Flash;

class Maquinaria extends Model
{
    use SoftDeletes;

    protected $table = "maquinaria";

    protected $fillable = [
        "id",
        "estado",
        "serialequipo",
        "modelo",
        "serialmotor",
        "observacion"
    ];

    public static $rules = [
        // 'id' => 'integer|max:11',
        // 'estado' => 'in:1,0',
        // 'serialequipo' =>  'required|integer|digits_between:7,20',
        // 'modelo' => 'required|string|max:50',
        // 'serialmotor' => 'string|required|max:50',
        // 'observacion' => 'string|max:100'
    ];

    protected $dates = ['deleted_at'];
}
