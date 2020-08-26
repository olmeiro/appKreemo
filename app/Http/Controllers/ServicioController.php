<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Servicio;
//use App\Models\Cotizacion;

class ServicioController extends Controller
{
    public function index(){
        return view('servicio.index');
    }

    public function listar(Request $request){


        $servicio = Servicio::all();

        return DataTables::of($servicio)

        ->make(true);

    }
}
