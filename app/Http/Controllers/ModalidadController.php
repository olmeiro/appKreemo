<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Modalidad;

class ModalidadController extends Controller
{
    public function index(){
        return view('componentes.index');
    }

    public function listar(Request $request){
        $modalidad = Modalidad::all();
        return Datatables::of($modalidad)
            ->addColumn('editar', function ($modalidad) {
                return '<a class="btn btn-xs btn-secondary" href="/componentes/editar/'.$modalidad->id.'"><i class="fas fa-edit"></i></a>';
            })
            ->rawColumns(['editar'])
            ->make(true);
    }
}
