<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Jornada;

class JornadaController extends Controller
{
    public function index(){
        return view('componentes.index');
    }

    public function listar(Request $request){
        $jornada = Jornada::all();
        return Datatables::of($jornada)
            ->addColumn('editar', function ($jornada) {
                return '<a class="btn btn-xs btn-secondary" href="/componentes/editar/'.$jornada->id.'">Editar</a>';
            })
            ->rawColumns(['editar'])
            ->make(true);
    }
}
