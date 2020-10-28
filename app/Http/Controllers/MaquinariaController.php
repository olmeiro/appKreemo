<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Maquinaria;
class MaquinariaController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Maquinaria::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn("estado", function($data){
                        return $data->estado == 1 ? "Disponible" : "En Uso";
                    })
                    ->addColumn('acciones', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editMaquinaria" style="margin: 2px"><i class="fas fa-edit"></i></a>';

                           $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteMaquinaria" id="deleteMaquinaria"><i class="fas fa-trash-alt"></i></a>';

                            return $btn;
                    })
                    ->addColumn('cambiar', function ($data) {
                        if($data->estado == 1)
                        {
                            return '<a class="btn btn-warning btn-sm" href="/maquinaria/cambiar/estado/'.$data->id.'/0">En Uso</a>';
                        }
                        else
                        {
                            return '<a class="btn btn-success btn-sm" href="/maquinaria/cambiar/estado/'.$data->id.'/1">Disponible</a>';
                        }
                    })
                    ->rawColumns(['acciones','cambiar'])
                    ->make(true);
        }

        return view('maquinaria.index');
    }

    public function updateState($id, $estado){

        $maquinaria = Maquinaria::find($id);

        if ($maquinaria==null) {
            Flash::error("Maquina no encontrada");
            return redirect("/maquinaria");
        }

        try {

            $maquinaria->update(["estado"=>$estado]);
            Flash::success("Se modifico el estado de la maquina");
            return redirect("/maquinaria");

        } catch (\Exception $e) {

            Flash::error($e->getMessage());
            return redirect("/maquinaria");
        }
    }

    public function store(Request $request)
    {
        Maquinaria::updateOrCreate(['id' => $request->maquinaria_id],
                ['estado' => 1,
                 'serialequipo' => $request->serialequipo,
                 'modelo' => $request->modelo,
                 'serialmotor' => $request->serialmotor,
                 'observacion' => $request->observacion]);

        return response()->json(['success'=>'Maquinaria guardada satisfactoriamente']);
    }

    public function edit($id)
    {
        $maquinaria = Maquinaria::find($id);
        return response()->json($maquinaria);
    }

    /* public function destroy($id)
    {
        $maquinaria = Maquinaria::find($id);
        $maquinaria->delete();
        return response()->json(['success'=>'Maquinaria borrada satisfactoriamente.']);
    } */

    public function destroy($id)
    {
        try
        {
            $maquinaria = Maquinaria::find($id);
            if (empty($maquinaria)) {
                Flash::error('maquinaria no encontrado');

                return redirect('/Maquinaria');
            }

            $maquinaria->delete($id);

            return response()->json(["ok"=>true]);
        }
        catch (\Throwable $th) {
            return response()->json(["ok"=>false]);
        }
    }
}

