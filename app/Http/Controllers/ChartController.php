<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cotizacion;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index(){
        return view('chart.index');
    }

    public function estados(Request $request){

        $cotizacion = Cotizacion::select( "cotizacion.fechaCotizacion", "cotizacion.valorTotal")
        ->where('cotizacion.idEmpresa', '=', 1)
        ->get();

        //id=1 Inversion Artemisa
    
        return response(json_encode($cotizacion), 200)->header('Content-type','text/plain');
    }
}


// $cotizacion = Cotizacion::select( "empresa.nombre as nombre_empresa", "cotizacion.valorTotal")
// ->join("empresa","cotizacion.idEmpresa", "=", "empresa.id")
// ->where('empresa.id', '=', 1)
// ->get();

// //id=1 Inversion Artemisa

// return response(json_encode($cotizacion), 200)->header('Content-type','text/plain');
