<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObraContacto extends Model
{
    protected $table = "obracontacto";

    protected $fillable = [
        
        "idobra",
        "idcontacto",
        "nombrecontacto",
    ];

    public static $rules = [

        'idobra' => 'integer',
        'idcontacto' => 'integer',
        'nombrecontacto' => 'integer',
    ];

}
