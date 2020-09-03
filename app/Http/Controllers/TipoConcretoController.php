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
                return '<a class="btn btn-xs btn-secondary" href="/componentes/editar/'.$tipoconcreto->id.'">Editar</a>';
            })
            ->rawColumns(['editar'])
            ->make(true);
    }
}
