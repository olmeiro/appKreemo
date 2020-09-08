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
                return '<a class="btn btn-xs btn-secondary" href="/componentes/editar/'.$etapa->id.'"><i class="fas fa-trash-alt"></i></a>';
            })
            ->rawColumns(['editar'])
            ->make(true);
    }
}
