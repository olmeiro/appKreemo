<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etapa extends Model
{
    use SoftDeletes;

    protected $table = "etapa";

    protected $fillable = ["etapa"];

    public static $rules = ["Etapa" => 'required|between:1,25'];

    protected $dates = ['deleted_at'];
}
