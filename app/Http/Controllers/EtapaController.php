<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-md editEtapa"><i class="fas fa-edit"></i></a>';

                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-md deleteEtapa"><i class="fas fa-trash-alt"></i></a>';

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
        try
        {
            $etapa = Etapa::find($id);
            if (empty($etapa)) {

                return redirect('/Etapa');
            }

            $etapa->delete($id);

            return response()->json(["ok"=>true]);

        }
        catch (\Throwable $th) {
            return response()->json(["ok"=>false]);

        }

    }
    public function listar(Request $request){
        $etapa = Etapa::all();
        return Datatables::of($etapa)

            ->make(true);
    }
}
