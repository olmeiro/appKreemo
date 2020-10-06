<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = "roles";

    protected $fillable = [
        "id",
        "name",
      
    ];

    public static $rules = [
        'id' => 'integer|max:11',
        'nombre' => 'required|string|max:20',
    ];
}
