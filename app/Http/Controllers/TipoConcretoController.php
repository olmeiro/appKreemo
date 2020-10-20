<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\TipoConcreto;

class TipoConcretoController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = TipoConcreto::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('acciones', function($row){

                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editTipoConcreto"><i class="fas fa-edit"></i></a>';

                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTipoConcreto"><i class="fas fa-trash-alt"></i></a>';

                            return $btn;
                    })
                    ->rawColumns(['acciones'])
                    ->make(true);
        }

        return view('tipoConcreto.index');
    }


    public function store(Request $request)
    {
        TipoConcreto::updateOrCreate(['id' => $request->tipoConcreto_id],
                ['tipo_concreto' => $request->tipo_concreto]);

        return response()->json(['success'=>'Tipo de concreto guardado correctamente.']);
    }

    public function edit($id)
    {
        $tipoConcreto = TipoConcreto::find($id);
        return response()->json($tipoConcreto);
    }


    public function destroy($id)
    {
        $tipoconcreto = TipoConcreto::find($id);
        $tipoconcreto->delete();

        return response()->json(['success'=>'Tipo de concreto eliminado correctamente.']);
    }

    public function listar(Request $request){
        $tipoconcreto = TipoConcreto::all();
        return Datatables::of($tipoconcreto)
            ->make(true);
    }
}
