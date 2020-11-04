<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Models\Modalidad;

class ModalidadController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Modalidad::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('acciones', function($row){

                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-md editModalidad"><i class="fas fa-edit"></i></a>';

                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-md deleteModalidad"><i class="fas fa-trash-alt"></i></a>';

                            return $btn;
                    })
                    ->rawColumns(['acciones'])
                    ->make(true);
        }

        return view('modalidad.index');
    }


    public function store(Request $request)
    {
        Modalidad::updateOrCreate(['id' => $request->modalidad_id],
                ['modalidad' => $request->modalidad]);

        return response()->json(['success'=>'Modalidad guardada correctamente.']);
    }

    public function edit($id)
    {
        $modalidad = Modalidad::find($id);
        return response()->json($modalidad);
    }

    public function destroy($id)
    {
        try
        {
            $modalidad =Modalidad::find($id);
            if (empty($modalidad)) {

                return redirect('/Modalidad');
            }

            $modalidad->delete($id);

            return response()->json(["ok"=>true]);
        }
        catch (\Throwable $th) {
            return response()->json(["ok"=>false]);
        }

    }
    public function listar(Request $request){
        $modalidad = Modalidad::all();
        return Datatables::of($modalidad)
            ->make(true);
    }
}
