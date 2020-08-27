<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\TipoConcreto;

class TipoConcretoController extends Controller
{
    public function index(){
        return view('componentes.index');
    }

    public function listar(Request $request){
        $tipoconcreto = TipoConcreto::all();
        return Datatables::of($tipoconcreto)
            ->addColumn('editar', function ($tipoconcreto) {
                return '<a class="btn btn-xs btn-primary" href="/componentes/editar/'.$tipoconcreto->id.'">Editar</a>';
            })
            ->addColumn('eliminar', function ($tipoconcreto) {
                return '<a class="btn btn-danger btn-sm" href="/componentes/eliminar/'.$tipoconcreto->id.'">Eliminar</a>';
            })
            ->rawColumns(['editar', 'eliminar'])
            ->make(true);
    }
}
