<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Maquinaria;
class MaquinariaController extends Controller
{
    public function index(){
        return view('maquinaria.index');
    }
    public function listar(Request $request){

        //$cliente = Cliente::all();
        //dd($cliente);

        $maquinaria = Maquinaria::all();

        return DataTables::of($maquinaria)
        ->editColumn("estado", function($maquinaria){
            return $maquinaria->estado == 1 ? "Activa" : "Inactiva";
        })
        ->addColumn('editar', function ($maquinaria) {
            return '<a class="btn btn-primary btn-sm" href="/maquinaria/editar/'.$maquinaria->id.'"><i class="fas fa-edit"></i></a>';
        })
        ->addColumn('cambiar', function ($maquinaria) {
            if($maquinaria->estado == 1)
            {
                return '<a class="btn btn-danger btn-sm" href="/maquinaria/cambiar/estado/'.$maquinaria->id.'/0">Inactivar</a>';
            }
            else
            {
                return '<a class="btn btn-success btn-sm" href="/maquinaria/cambiar/estado/'.$maquinaria->id.'/1">Activar</a>';
            }
        })
        ->addColumn('eliminar', function ($maquinaria) {
            return '<a class="btn btn-danger btn-sm" href="/maquinaria/eliminar/'.$maquinaria->id.'"><i class="fas fa-trash-alt"></i></a>';
        })
        ->rawColumns(['editar', 'cambiar', 'eliminar'])
        ->make(true);
    }
    public function create()
    {
        $maquinaria = Maquinaria::all();
        return view('maquinaria.create');
    }

    public function save(Request $request)
    {
        $request->validate(Maquinaria::$rules);

        $input = $request->all();

        try {
            Maquinaria::create([

                // "id" => $input["id"],
                "estado" => 1,
                "serialequipo" =>$input["serialequipo"],
                "modelo" =>$input["modelo"],
                "serialmotor" =>$input["serialmotor"],
                "observacion" =>$input["observacion"]
            ]);

            Flash::success("Registro éxitoso de Maquinaria");
            return redirect("/maquinaria");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/maquinaria/crear");
        }
    }

    public function edit($id){

        //$categorias = Categoria::all();
        $maquinaria = Maquinaria::find($id);

        if ($maquinaria==null) {

            Flash::error("Maquinaria no encontrado");
            return redirect("/maquinaria");
        }
        //else{
            return view("maquinaria.edit", compact("maquinaria"));
        // }
    }

    public function update(Request $request){

        $request->validate(Maquinaria::$rules);
        $input = $request->all();

        try {

            $maquinaria = Maquinaria::find($input["id"]);

            if ($maquinaria==null) {
                Flash::error("Maquinaria no encontrado");
                return redirect("/maquinaria");
            }

            $maquinaria->update([
                "estado" => 1,
                "serialequipo" =>$input["serialequipo"],
                "modelo" =>$input["modelo"],
                "serialmotor" =>$input["serialmotor"],
                "observacion" =>$input["observacion"]
            ]);

            Flash::success("Se modificó la maquinaria");
            return redirect("/maquinaria");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/maquinaria");
        }
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

    public function destroy($id)
    {
        $maquinaria = Maquinaria::find($id);

        if (empty($maquinaria)) {
            Flash::error('Maquinaria no encontrada');

            return redirect('/maquinaria');
        }

        $maquinaria->delete($id);

        Flash::success('Maquina eliminada.');

        return redirect('/maquinaria');
    }
}
