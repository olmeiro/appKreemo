<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\Empresa;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index(){
        $empresa = Empresa::all();
        return view('chart.index', compact('empresa'));
    }

    public function index1(){
        return view('chart.visita');
    }

    public function index2(){
        return view('chart.servicio');
    }

    public function index3(){
        return view('chart.encuesta');
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

    public function viabilidad(Request $request){

        $cotizacion = Cotizacion::select( "cotizacion.id","cotizacion.fechaCotizacion", "cotizacion.valorTotal", "empresa.nombre as nombre_empresa","obra.nombre as nombre_obra")
        ->join("empresa","cotizacion.idEmpresa", "=", "empresa.id")
        ->join("obra", "cotizacion.idObra", "=", "obra.id")
        ->where('cotizacion.idEmpresa', '=', 1)
        ->get();

        //id=1 Inversion Artemisa

        return response(json_encode($cotizacion), 200)->header('Content-type','text/plain');
    }

    public function servicios(Request $request){

        $cotizacion = Cotizacion::select( "cotizacion.id","cotizacion.fechaCotizacion", "cotizacion.valorTotal", "empresa.nombre as nombre_empresa","obra.nombre as nombre_obra")
        ->join("empresa","cotizacion.idEmpresa", "=", "empresa.id")
        ->join("obra", "cotizacion.idObra", "=", "obra.id")
        ->where('cotizacion.idEmpresa', '=', 1)
        ->get();

        //id=1 Inversion Artemisa

        return response(json_encode($cotizacion), 200)->header('Content-type','text/plain');
    }

    public function encuesta(Request $request){

        $cotizacion = Cotizacion::select( "cotizacion.id","cotizacion.fechaCotizacion", "cotizacion.valorTotal", "empresa.nombre as nombre_empresa","obra.nombre as nombre_obra")
        ->join("empresa","cotizacion.idEmpresa", "=", "empresa.id")
        ->join("obra", "cotizacion.idObra", "=", "obra.id")
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
