<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = "cotizacion";

    protected $fillable = [
        "idEmpresa",
        "idEstado",
        "idModalidad",
        "idEtapa",
        "idJornada",
        "idTipo_Concreto",
        "idObra",
        "idMaquinaria",
        "idOperario",
        "fechaCotizacion",
        "inicioBombeo",
        "ciudad",
        "losas",
        "tuberia",
        "metrosCubicos",
        "valorMetro",
        "AIU",
        "subtotal",
        "ivaAIU",
        "valorTotal",
        "observaciones",
    ];

    public static $rules = [
        'IdEmpresa' =>'required|integer',
        'IdEstado' =>'required|integer',
        'IdModalidad' =>'required|integer',
        'IdEtapa' =>'required|integer',
        'IdJornada' =>'required|integer',
        'IdTipo_Concreto' =>'required|integer',
        'IdObra' =>'required|integer',
        'IdMaquinaria' =>'required|integer',
        'IdOperario' =>'required|integer',
        'FechaCotizacion' =>'required',
        'InicioBombeo' =>'required',
        'Ciudad' =>'required|string|max:50',
        'Losas' =>'required|numeric|between: 1,2147483646',
        'Tuberia' =>'required|numeric|between: 1,2147483646',
        'MetrosCubicos' =>'required|numeric|between: 1,2147483646',
        'ValorMetro' =>'required|numeric|between: 1,2147483646',
        'AIU' =>'required|numeric|between: 1,2147483646',
        'Subtotal' =>'required|numeric|between: 1,2147483646',
        'IvaAIU' =>'required|numeric|between: 1,2147483646',
        'ValorTotal' =>'required|numeric|between: 1,2147483646',
        'Observaciones' =>'max:100',
    ];
}
