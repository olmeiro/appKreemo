<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\Empresa;
use Illuminate\Http\Request;

class ChartCotizacion extends Controller
{

    public function index(){

        return view('chart.index');
    }

    public function estados(Request $request){
        $input = $request->all();
        $cotizacion = Cotizacion::select( "cotizacion.id","cotizacion.fechaCotizacion", "cotizacion.valorTotal", "empresa.nombre as nombre_empresa","obra.nombre as nombre_obra")
        ->join("empresa","cotizacion.idEmpresa", "=", "empresa.id")
        ->join("obra", "cotizacion.idObra", "=", "obra.id")
        ->where('cotizacion.idEmpresa', '=', [$input["id"]])
        ->get();


        //id=1 Inversion Artemisa

        return response(json_encode($cotizacion), 200)->header('Content-type','text/plain');


    }
}
