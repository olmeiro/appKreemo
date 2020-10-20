<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jornada extends Model
{
    use SoftDeletes;

    protected $table = "jornada";

    protected $fillable = ["jornada_nombre"];

    public static $rules = ["Jornada_Nombre" => 'required|between:1,25'];

    protected $dates = ['deleted_at'];
}
