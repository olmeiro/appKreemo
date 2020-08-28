<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Flash;

class ListaChequeo extends Model
{
    protected $table = "listachequeo";

    protected $fillable = [
        "id",
        "idvisita",
        "numeroplanilla",
        "estadovia",
        "ph",
        "hueco",
        "techo",
        "desarenadero",
        "desague",
        "agua",
        "lineaelectrica",
        "senializacion",
        "iluminacion",
        "banios",
        "condicioninsegura",
        "ordenpublico",
        "vigilancia",
        "caspete",
        "infoSST",
        "politicashoras",
        "encargadovisita",
        "viabilidad",
        
    ];

    public static $rules = [
        'id'=> 'integer',
        'idvisita' => 'integer',
        'numeroplanilla' =>'required|string|max:45',
        'estadovia'=> 'required|string|max:2',
        'ph'=> 'required|string|max:2',
        'hueco'=> 'required|string|max:2',
        'techo'=> 'required|string|max:2',
        'desarenadero'=> 'required|string|max:2',
        'desague'=> 'required|string|max:2',
        'agua'=> 'required|string|max:2',
        'lineaelectrica'=> 'required|string|max:2',
        'senializacion'=> 'required|string|max:2',
        'iluminacion'=> 'required|string|max:2',
        'banios'=> 'required|string|max:2',
        'condicioninsegura'=> 'required|string|max:2',
        'ordenpublico'=> 'required|string|max:2',
        'vigilancia'=> 'required|string|max:2',
        'caspete'=> 'required|string|max:2',
        'infoSST'=> 'required|string|max:2',
        'politicashoras'=>'required|string|max:2',
        'encargadovisita'=> 'required|string|max:45',
        'viabilidad'=> 'required|string|max:2',
        

    ];
}
