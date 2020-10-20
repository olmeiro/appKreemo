<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoCotizacion extends Model
{
    use SoftDeletes;

    protected $table = "estadocotizacion";

    protected $fillable = ["estado_cotizacion"];

    public static $rules = ["Estado_Cotizacion" => 'required|between:1,25'];

    protected $dates = ['deleted_at'];
}
