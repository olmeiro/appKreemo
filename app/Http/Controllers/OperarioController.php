<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-md editOperario" style="margin: 2px"><i class="fas fa-edit"></i></a>';

                        $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-md deleteOperario" id="deleteOperario"><i class="fas fa-trash-alt"></i></a>';

                        return $btn;
                    })
                    ->rawColumns(['acciones'])
                    ->make(true);
        }

        return view('operario.index');
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

    /* public function destroy($id)
    {
        $operario = Operario::find($id);
        $operario->delete();

        return response()->json(['success'=>'Operario borrado satisfactoriamente.']);
    } */

    public function destroy($id)
    {
        try
        {
            $operario = Operario::find($id);
            if (empty($operario)) {
                Flash::error('operario no encontrado');

                return redirect('/Operario');
            }

            $operario->delete($id);

            return response()->json(["ok"=>true]);
            // Flash::success("Se eliminó el tipo contacto");
            // return redirect("/tipocontacto");
        }
        catch (\Throwable $th) {
            return response()->json(["ok"=>false]);
            // Flash::success("No se puede eliminar tipo contacto");
            // return redirect("/tipocontacto");
        }

    }
}
