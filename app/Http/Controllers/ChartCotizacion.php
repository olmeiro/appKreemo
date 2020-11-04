<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\Empresa;
use App\Models\EstadoCotizacion;
use Illuminate\Http\Request;

class ChartCotizacion extends Controller
{

    public function index(){

        $cotizacion = Cotizacion::all();
        $empresa = Empresa::all();
        return view('chart.index', compact('empresa','cotizacion'));
    }

    public function index1(){

        $cotizacion = Cotizacion::all();
        $empresa = Empresa::all();
        $estadocotizacion = EstadoCotizacion::all();
        return view('chart.estadosCotizacion', compact('empresa','cotizacion','estadocotizacion'));
    }

    public function empresas(Request $request){
        $input = $request->all();
        $cotizacion = Cotizacion::select( "cotizacion.id","cotizacion.fechaCotizacion", "cotizacion.valorTotal", "empresa.nombre as nombre_empresa","obra.nombre as nombre_obra")
        ->join("empresa","cotizacion.idEmpresa", "=", "empresa.id")
        ->join("obra", "cotizacion.idObra", "=", "obra.id")
        ->where('cotizacion.idEmpresa', '=', [$input["id"]])
        ->get();

        return response(json_encode($cotizacion), 200)->header('Content-type','text/plain');

    }

    public function estados(Request $request){
        $input = $request->all();
        $cotizacion = Cotizacion::select( "cotizacion.id","cotizacion.fechaCotizacion", "cotizacion.valorTotal", "empresa.nombre as nombre_empresa","obra.nombre as nombre_obra", "estadocotizacion.estado_cotizacion")
        ->join("empresa","cotizacion.idEmpresa", "=", "empresa.id")
        ->join("obra", "cotizacion.idObra", "=", "obra.id")
        ->join("estadocotizacion", "cotizacion.idEstado", "=", "estadocotizacion.id")
        ->where('cotizacion.idEstado', '=', [$input["id"]])
        ->get();

        return response(json_encode($cotizacion), 200)->header('Content-type','text/plain');

    }
}
