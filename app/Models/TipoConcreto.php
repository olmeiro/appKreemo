<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoConcreto extends Model
{
    use SoftDeletes;

    protected $table = "tipoconcreto";

    protected $fillable = ["tipo_concreto"];

    public static $rules = ["Tipo_Concreto" => 'required|between:1,25'];

    protected $dates = ['deleted_at'];
}
