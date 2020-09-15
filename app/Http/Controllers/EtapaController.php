<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Etapa;

class EtapaController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Etapa::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('acciones', function($row){

                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editEtapa"><i class="fas fa-edit"></i></a>';

                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteEtapa"><i class="fas fa-trash-alt"></i></a>';

                            return $btn;
                    })
                    ->rawColumns(['acciones'])
                    ->make(true);
        }

        return view('etapa.index');
    }


    public function store(Request $request)
    {
        Etapa::updateOrCreate(['id' => $request->etapa_id],
                ['etapa' => $request->etapa]);

        return response()->json(['success'=>'Tipo de concreto guardado correctamente.']);
    }

    public function edit($id)
    {
        $etapa = Etapa::find($id);
        return response()->json($etapa);
    }


    public function destroy($id)
    {
        Etapa::find($id)->delete();

        return response()->json(['success'=>'Tipo de concreto eliminado correctamente.']);
    }

    public function listar(Request $request){
        $etapa = Etapa::all();
        return Datatables::of($etapa)

            ->make(true);
    }
}
