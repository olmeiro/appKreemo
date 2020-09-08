<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\EstadoServicio;

class EstadoServicioController extends Controller
{
    public function index()
    {
        return view('estadoservicio.index');
    }

    public function listar(Request $request){

        $estadoservicio = EstadoServicio::all();

        return DataTables::of($estadoservicio)
        ->addColumn('editar', function ($estadoservicio) {
            return '<a class="btn btn-primary btn-sm" href="/estadoservicio/editar/'.$estadoservicio->id.'"><i class="fas fa-edit"></i></a>';
        })
        ->addColumn('eliminar', function ($estadoservicio) {
            return '<a class="btn btn-danger btn-sm" href="/estadoservicio/eliminar/'.$estadoservicio->id.'"><i class="fas fa-trash-alt"></i></a>';
        })
        ->rawColumns(['editar','eliminar'])
        ->make(true);

    }
    public function create()
    {
        $estadoservicio = EstadoServicio::all();
        return view('estadoservicio.create');
    }

    public function save(Request $request)
    {
        $request->validate(EstadoServicio::$rules);
        $input = $request->all();

        try {
            EstadoServicio::create([


                "estado" => $input["estado"],

            ]);

            Flash::success("Nuevo estado registrado con éxito");
            return redirect("/estadoservicio");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/estadoservicio/crear");
        }
    }


    public function edit($id){

        $estadoservicio = EstadoServicio::find($id);

        if ($estadoservicio==null) {

            Flash::error("Estado no encontrado");
            return redirect("/estadoservicio");
        }
            return view("estadoservicio.edit", compact("estadoservicio"));
    }


    public function update(Request $request){

        $request->validate(EstadoServicio::$rules);
        $input = $request->all();

        try {

            $estadoservicio = EstadoServicio::find($input["id"]);

            if ($estadoservicio==null) {
                Flash::error("Estado no encontrado");
                return redirect("/estadoservicio");
            }

            $estadoservicio->update([
                "estado"=>$input["estado"]
            ]);

            Flash::success("Se modifico el estado");
            return redirect("/estadoservicio");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/estadoservicio");
        }
    }

    public function destroy($id)
    {
        $estadoservicio = EstadoServicio::find($id);

        if (empty($estadoservicio)) {
            Flash::error('Estado no encontrado');

            return redirect('/estadoservicio');
        }

        $estadoservicio->delete($id);

        Flash::success('Estado eliminado.');

        return redirect('/estadoservicio');
    }
}
