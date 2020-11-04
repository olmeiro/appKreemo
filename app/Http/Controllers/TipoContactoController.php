<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Models\tipoContacto;

class TipoContactoController extends Controller
{

    public function index()
    {
        return view('tipocontacto.index');
    }

    public function listar(Request $request){

        $tipoContacto = tipoContacto::all();

        return DataTables::of($tipoContacto)
        ->addColumn('editar', function ($tipoContacto) {
            return '<a class="btn btn-primary btn-md" href="/tipocontacto/editar/'.$tipoContacto->id.'"><i class="fas fa-edit"></i></a>';
        })
        ->addColumn('eliminar', function ($tipoContacto) {
            return '<a id="eliminar-tipoContacto1"  data-id='.$tipoContacto->id.' class="btn btn-danger delete-tipocontacto btn-md" ><i class="fas fa-trash-alt"></i></a>';
        })
        ->rawColumns(['editar','eliminar'])
        ->make(true);

    }

    public function create()
    {
        $tipoContacto = tipoContacto::all();
        return view('tipocontacto.create');
    }

    public function save(Request $request)
    {
        $input = $request->all();

        try {
            tipoContacto::create([


                "tipocontacto" => $input["tipocontacto"],

            ]);

            return response()->json(["ok"=>true]);

        } catch (\Exception $e ) {
            return response()->json(["ok"=>false]);
        }
    }


    public function edit($id){

        $tipoContacto = tipoContacto::find($id);

        if ($tipoContacto==null) {

            return redirect("/tipocontacto");
        }
            return view("tipocontacto.edit", compact("tipoContacto"));
    }


    public function update(Request $request){

        $input = $request->all();

        try {

            $tipoContacto = tipoContacto::find($input["id"]);

            if ($tipoContacto==null) {
                return redirect("/tipocontacto");
            }

            $tipoContacto->update([
                "tipocontacto"=>$input["tipocontacto"]
            ]);

            return response()->json(["ok"=>true]);

        } catch (\Exception $e ) {
            return response()->json(["ok"=>false]);
        }
    }

    public function destroy($id)
    {
        try
        {
            $tipoContacto = tipoContacto::find($id);
            if (empty($tipoContacto)) {

                return redirect('/tipocontacto');
            }

            $tipoContacto->delete($id);

            return response()->json(["ok"=>true]);

        }
        catch (\Throwable $th) {
            return response()->json(["ok"=>false]);
        }
    }
}
