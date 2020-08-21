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

        //dd($tipoContacto);

        return DataTables::of($tipoContacto)    
        ->addColumn('editar', function ($tipoContacto) {
            return '<a class="btn btn-primary btn-sm" href="/tipocontacto/editar/'.$tipoContacto->id.'">Editar</a>';
        })
        ->addColumn('eliminar', function ($tipoContacto) {
            return '<a class="btn btn-danger btn-sm" href="/tipocontacto/eliminar/'.$tipoContacto->id.'">Eliminar</a>';
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
        $request->validate(tipoContacto::$rules);
        $input = $request->all();

        try {
            tipoContacto::create([


                "tipocontacto" => $input["tipocontacto"],
               
            ]);

            Flash::success("Registro éxitoso de Tipo de Contacto");
            return redirect("/tipocontacto");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/tipocontacto/crear");
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

        $request->validate(tipoContacto::$rules);
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

            Flash::success("Se modifico el tipo contacto");
            return redirect("/tipocontacto");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/tipocontacto");
        }   
    }

    public function destroy($id)
    {
        $tipoContacto = tipoContacto::find($id);

        if (empty($tipoContacto)) {
            Flash::error('Tipo contacto no encontrado');

            return redirect('/tipocontacto');
        }

        $tipoContacto->delete($id);

        Flash::success('Tipo contacto eliminado.');

        return redirect('/tipocontacto');
    }

    
}
