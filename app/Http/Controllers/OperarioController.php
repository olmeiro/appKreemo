<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Operario;

class OperarioController extends Controller
{
    public function index(){
        return view('operario.index');
    }

    public function listar(Request $request){

        //$cliente = Cliente::all();
        //dd($cliente);

        $operario = Operario::all();

        return DataTables::of($operario)

        ->addColumn('editar', function ($operario) {
            return '<a class="btn btn-primary btn-sm" href="/operario/editar/'.$operario->id.'">Editar</a>';
        })

        ->addColumn('eliminar', function ($operario) {
            return '<a class="btn btn-danger btn-sm" href="/operario/eliminar/'.$operario->id.'">Eliminar</a>';
        })
        ->rawColumns(['editar', 'eliminar'])
        ->make(true);
    }
    public function create()
    {
        $maquinaria = Operario::all();
        return view('operario.create');
    }
    public function save(Request $request)
    {
        $request->validate(Operario::$rules);

        $input = $request->all();

        try {
            Operario::create([

                "nombre" =>$input["nombre"],
                "apellido" =>$input["apellido"],
                "documento" =>$input["documento"],
                "celular" =>$input["celular"]
            ]);

            Flash::success("Registro éxitoso de Operario");
            return redirect("/operario");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/operario/crear");
        }
    }

    public function edit($id){

        //$categorias = Categoria::all();
        $operario = Operario::find($id);

        if ($operario==null) {

            Flash::error("operario no encontrado");
            return redirect("/operario");
        }
        //else{
            return view("operario.edit", compact("operario"));
        // }
    }
    public function update(Request $request){

        $request->validate(Operario::$rules);
        $input = $request->all();

        try {

            $operario = Operario::find($input["id"]);

            if ($operario==null) {
                Flash::error("Operario no encontrado");
                return redirect("/operario");
            }

            $operario->update([
                "nombre" =>$input["nombre"],
                "apellido" =>$input["apellido"],
                "documento" =>$input["documento"],
                "celular" =>$input["celular"]
            ]);

            Flash::success("Se modificó el operario");
            return redirect("/operario");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/operario");
        }
    }
    public function destroy($id)
    {
        $operario = Operario::find($id);

        if (empty($operario)) {
            Flash::error('Operario no encontrado');

            return redirect('/operario');
        }

        $operario->delete($id);

        Flash::success('Operario eliminado.');

        return redirect('/operario');
    }
}
