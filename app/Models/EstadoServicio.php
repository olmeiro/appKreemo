<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Flash;

class EstadoServicio extends Model
{
    protected $table = "estadoservicio";

    protected $fillable = [
        "estado",
    ];

    public static $rules = [
        'estado' => 'required|string|max:30',
    ];
}
