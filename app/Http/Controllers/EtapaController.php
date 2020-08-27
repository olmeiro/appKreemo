<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Etapa;

class EtapaController extends Controller
{
    public function index(){
        return view('componentes.index');
    }

    public function listar(Request $request){
        $etapa = Etapa::all();
        return Datatables::of($etapa)
            ->addColumn('editar', function ($etapa) {
                return '<a class="btn btn-xs btn-primary" href="/componentes/editar/'.$etapa->id.'">Editar</a>';
            })
            ->addColumn('eliminar', function ($etapa) {
                return '<a class="btn btn-danger btn-sm" href="/componentes/eliminar/'.$etapa->id.'">Eliminar</a>';
            })
            ->rawColumns(['editar', 'eliminar'])
            ->make(true);
    }
}
