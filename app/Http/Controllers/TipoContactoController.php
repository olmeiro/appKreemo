<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
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

        // dd($tipoContacto);
        // href="/tipocontacto/eliminarget/'.$tipoContacto->id.'"

        return DataTables::of($tipoContacto)
        ->addColumn('editar', function ($tipoContacto) {
            return '<a class="btn btn-primary btn-md" href="/tipocontacto/editar/'.$tipoContacto->id.'"><i class="fas fa-edit"></i></a>';
        })
        ->addColumn('eliminar', function ($tipoContacto) {
            return '<a id="eliminar-tipoContacto1"  data-id='.$tipoContacto->id.' class="btn btn-danger delete-tipocontacto btn-md" href="/tipocontacto/eliminar/'.$tipoContacto->id.'"><i class="fas fa-trash-alt"></i></a>';
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

            //Flash::success("Registro éxitoso de Tipo de Contacto");
            return response()->json(["ok"=>true]);
            //return redirect("/tipocontacto");

        } catch (\Exception $e ) {
            //Flash::error($e->getMessage());
            return response()->json(["ok"=>false]);
            //return redirect("/tipocontacto/crear");
        }
    }


    public function edit($id){

        //$categorias = Categoria::all();
        $tipoContacto = tipoContacto::find($id);

        if ($tipoContacto==null) {

            Flash::error("Tipo Contacto no encontrado");
            return redirect("/tipocontacto");
        }
        //else{
            return view("tipocontacto.edit", compact("tipoContacto"));
        // }
    }


    public function update(Request $request){

        $input = $request->all();

        try {

            $tipoContacto = tipoContacto::find($input["id"]);

            if ($tipoContacto==null) {
                Flash::error("Tipo Contacto no encontrado");
                return redirect("/tipocontacto");
            }

            $tipoContacto->update([
                "tipocontacto"=>$input["tipocontacto"]
            ]);

            return response()->json(["ok"=>true]);
            // Flash::success("Se modifico el tipo contacto");
            // return redirect("/tipocontacto");

        } catch (\Exception $e ) {
            return response()->json(["ok"=>false]);
            // Flash::error($e->getMessage());
            // return redirect("/tipocontacto");
        }
    }

    public function destroy($id)
    {
        try
        {
            $tipoContacto = tipoContacto::find($id);
            if (empty($tipoContacto)) {
                Flash::error('Tipo contacto no encontrado');

                return redirect('/tipocontacto');
            }

            $tipoContacto->delete($id);

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
