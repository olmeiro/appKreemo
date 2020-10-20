<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modalidad extends Model
{
    use SoftDeletes;

    protected $table = "modalidad";

    protected $fillable = ["modalidad"];

    public static $rules = ["Modalidad" => 'required|between:1,25'];

    protected $dates = ['deleted_at'];
}
