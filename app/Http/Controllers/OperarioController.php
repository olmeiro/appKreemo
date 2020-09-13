<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Operario;

class OperarioController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Operario::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('acciones', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editOperario" style="margin: 2px"><i class="fas fa-edit"></i></a>';

                           $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteOperario" id="deleteOperario" onclick="return ConfirmDelete()"><i class="fas fa-trash-alt"></i></a>';

                            return $btn;
                    })
                    ->rawColumns(['acciones'])
                    ->make(true);
        }

        return view('operario/operarioajax');
    }

    public function store(Request $request)
    {
        Operario::updateOrCreate(['id' => $request->operario_id],
                ['nombre' => $request->nombre,
                 'apellido' => $request->apellido,
                 'documento' => $request->documento,
                 'celular' => $request->celular ]);

        return response()->json(['success'=>'Operario guardado satisfactoriamente']);
    }

    public function edit($id)
    {
        $operario = Operario::find($id);
        return response()->json($operario);
    }

    public function destroy($id)
    {
        Operario::find($id)->delete();

        return response()->json(['success'=>'Operario borrado satisfactoriamente.']);
    }
}
