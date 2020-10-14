<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\Empresa;
use App\Models\Visita;
use App\Models\ListaChequeo;
use Illuminate\Http\Request;
use App\Models\Encuesta;

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

        $listachequeo = ListaChequeo::select( "listachequeo.id","listachequeo.viabilidad", "listachequeo.idvisita","listachequeo.numeroplanilla", "obra.nombre as nombre_obra")
        ->join("visita","visita.id", "=", "listachequeo.idvisita")
        ->join("obra", "obra.id", "=", "visita.idobra")
        // ->where('listachequeo.id', '=', 1)
        ->get();

        //id=1 Inversion Artemisa

        return response(json_encode($listachequeo), 200)->header('Content-type','text/plain');
    }

    public function servicios(Request $request){

        $cotizacion = Cotizacion::select( "listachequeo.id","cotizacion.fechaCotizacion", "cotizacion.valorTotal", "empresa.nombre as nombre_empresa","obra.nombre as nombre_obra")
        ->join("empresa","cotizacion.idEmpresa", "=", "empresa.id")
        ->join("obra", "cotizacion.idObra", "=", "obra.id")
        ->where('cotizacion.idEmpresa', '=', 1)
        ->get();

        //id=1 Inversion Artemisa

        return response(json_encode($cotizacion), 200)->header('Content-type','text/plain');
    }

    public function encuesta(Request $request){

        $encuesta = Encuesta::all();
        //return DataTables::of($encuesta)

        // $cotizacion = Cotizacion::select( "cotizacion.id","cotizacion.fechaCotizacion", "cotizacion.valorTotal", "empresa.nombre as nombre_empresa","obra.nombre as nombre_obra")
        // ->join("empresa","cotizacion.idEmpresa", "=", "empresa.id")
        // ->join("obra", "cotizacion.idObra", "=", "obra.id")
        // ->where('cotizacion.idEmpresa', '=', 1)
        // ->get();

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
