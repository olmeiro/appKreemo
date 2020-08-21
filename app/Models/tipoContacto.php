<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipoContacto extends Model
{
    protected $table = 'tipocontacto';

    protected $fillable = [
        "tipocontacto",
    ];

    public static $rules = [
        'tipocontacto' => 'required'
    ];
}
