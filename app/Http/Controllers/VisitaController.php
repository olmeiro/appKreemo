<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Visita;
use App\Models\Obra;
use App\Models\ListaChequeo;
class VisitaController extends Controller
{
    public function index(){
        return view('visita.index');
    }

    public function listar(Request $request){


        $visita = Visita::select("visita.*", "obra.nombre as nombre_obra")
        ->join("obra", "visita.idobra", "=", "obra.id")
        ->get();
        return DataTables::of($visita)    
       
        ->addColumn('editar', function ($visita) {
            return '<a class="btn btn-xs btn-primary" href="/visita/editar/'.$visita->id.'">Editar</a>';
        })
        ->addColumn('eliminar', function ($visita) {
            return '<a class="btn btn-danger btn-xs" href="/visita/eliminar/'.$visita->id.'">Eliminar</a>';
        })
        ->rawColumns(['editar', 'eliminar'])
        ->make(true);
    }

    public function create()
    {
        $obra = Obra::all();
        $visita = Visita::all();
        return view('visita.create', compact ('obra'));
    }

    public function save(Request $request)
    {
        $request->validate(Visita::$rules);

        $input = $request->all();

        try {
            Visita::create([

                // "id" => $input["id"],
                "tipovisita"=>$input["tipovisita"],
                "idobra"=>$input["idobra"],
                "encargadovisita"=>$input["encargadovisita"],
                "Fecha_Hora"=>$input["Fecha_Hora"],
                "viabilidad"=>$input["viabilidad"],
            ]);

            Flash::success("Registro éxitoso de Visita");
            return redirect("/visita");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/visita/crear");
        }
    }

    public function edit($id){

        //$categorias = Categoria::all();
        $visita = Visita::find($id);
        $obra = Obra::all();
        if ($visita==null) {

            Flash::error("Visita no encontrada");
            return redirect("/visita");
        }
        //else{
            return view("visita.edit", compact("visita", "obra"));
        // }
    }

    public function update(Request $request){

        $request->validate(Visita::$rules);
        $input = $request->all();
        
    
        
        //dd($input);
        try {
    
            $visita = Visita::find($input["id"]);
    
            if ($visita==null) {
                Flash::error("Visita no encontrada");
                return redirect("/visita");
            }
    
            $visita->update([
                "tipovisita"=>$input["tipovisita"],
                "idobra"=>$input["idobra"],
                "encargadovisita"=>$input["encargadovisita"],
                "Fecha_Hora"=>$input["Fecha_Hora"],
                "viabilidad"=>$input["viabilidad"],
                
            ]);
    
            Flash::success("Se modificò la visita");
            return redirect("/visita");
    
        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/visita");
        }   
    }
    
    public function destroy($id)
    {
        $visita = Visita::find($id);

        if (empty($visita)) {
            Flash::error('Visita no encontrada');

            return redirect('/visita');
        }

        $visita->delete($id);

        Flash::success('Visita eliminada.');

        return redirect('/visita');
    }
}

